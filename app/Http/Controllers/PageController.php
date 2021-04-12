<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Overtime;
use App\Attendence;
use App\List_to_do;
use Mail;

class PageController extends Controller
{
    //view home page user
    public function getHomePage() {
        return view('page/layout/home');
    }


    //view contact page
    public function getContact() {
        return view('page.layout.contact');
    }

    //post contact page
    public function postContact(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:20',
                'email' => 'required|email',
                'message' => 'required'
            ],
            [
                'name.required' => 'Please enter your full name',
                'name.max' => 'Full name max 20characters',
                'email.required' => 'Please enter email address',
                'email.email' => 'Please enter a validate email address !',
                'message.required' => 'Please enter a message'
            ]
        );

        Mail::send('mail.contact',
            [
                'name' => $request->name,
                'email' => $request->email,
                'content' => $request->message
            ],
            function ($message) use($request){
                $message->from($request->email);
                $message->to('andinh.da@gmail.com')->subject('User Feedback!');
            }
        );

        return redirect('page/contact')->with('global','Your message was sent, thank you!');
    }

    //view profile
    public function getProfile() {
        return view('page.profile.profile');
    }

    //view edit profile
    public function getEdit($id) {
        $user = User::find($id);
        return view('page/profile/edit',['user'=> $user]);
    }

    //post edit profile
    public function postEdit(Request $request, $id) {
        $this->validate($request,
            [
                'username' => array(
                    'required',
                    'regex:/^(?=.{6,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/'
                ),
                'email' => 'required|email',
                'password' => 'min:3|max:16',
                'password_again' => 'same:password',
                'position' => 'required|max:50'
            ],
            [
                'username.required' => 'Please enter user name !',
                'email.required' => 'Please enter email !',
                'email.email' => "Please enter a validate email address !",
                'password.min' => "Password min 3 characters",
                'password.max' => "Password max 16 characters",
                'password_again.same' => "Password not match",
                'position.required' => "Please enter position",
                'position.max' => "Position max 50 characters"
            ]
        );
        $all = User::all();
        $user = User::find($id);
        $username = $request->username;
        $fullname = $request->fullname;
        $email = $request->email;
        $error = [];
        foreach ($all as $us) {
            if ($us->id != $id) {
                if ($us->user_name == $username) {
                    $error[] = "Username already exist !";
                }
                if (isset($fullname)) {
                    if ($us->full_name == $fullname) {
                        $error[] = "Fullname already exist !";
                    }
                }
                if ($us->email == $email) {
                    $error[] = "Email already exist !";
                }
            }
        }
        if (count($error) > 0) {
            $user['user_name'] = $username;
            $user['full_name'] = $fullname;
            $user['id'] = $id;
            $user['email'] = $email;
            return view('page/profile/edit', ['user' => $user, 'error' => $error]);
        }

        $user->full_name = $fullname;
        $user->user_name = $username;
        if ($request["changePassword"] == "on") {
            $user->password = bcrypt($request->password);
        }
        $user->email = $email;
        $user->position = $request->position;
        $user->role = "0";
        $user->phone_number = $request->phone_number;
        if (isset($request->picture)) {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');

                $picture = $file->getClientOriginalName();
                $user->picture = $picture;
            }
        }
        $user->save();
        return redirect('page/profile');
    }

    // view overtime
    public function getOvertime($id) {
        $ot = Overtime::orderBy('date')->where('user_id',$id)->paginate(10);
        return view('page/over_time/list',['overtime'=> $ot]);
    }

    //view add overtime
    public function getAddOvertime($id)
    {
        $ot = Overtime::where('user_id',$id)->get();
        $over = [];
        foreach ($ot as $over_time) {
            if ($over_time->work == null) {
                $over['id'] = $over_time->id;
                $over['date'] = $over_time->date;
                $over['date_type'] = $over_time->date_type;
                $over['start'] = $over_time->time_start;
                $over['end'] = $over_time->time_end;
            }
        }
        return view('page/over_time/add', ['overtime' => $over]);
    }

    //post add overtime
    public function postAddOvertime(Request $request, $id)
    {
        $overtime_id = $request->overtimeId;
        if (isset($overtime_id)) {
            $ot = Overtime::find($overtime_id);
        } else {
            $ot = new Overtime();
        }
        $date = $request->dateOT;
        $date_type = $request->date_type;
        if ($date_type == 1) {
            $type = '1.5';
        } elseif ($date_type ==2) {
            $type = '2';
        } else {
            $type = '3';
        }
        $start = $request->start;
        $end = $request->end;
        $work = $request->work;
        if (isset($end)) {
            if (strtotime($end) < strtotime($start)) {
                $over['date'] = $date;
                $over['date_type'] = $date_type;
                $over['start'] = $start;
                $over['end'] = $end;
                $over['work'] = $work;
                $error = 'The time start was more than the time end !';
                return view('page/over_time/add', ['error' => $error, 'overtime' => $over]);
            }
        }
        $time = strtotime($end) - strtotime($start);
        $over_time = $time * $type;
        $over_time = gmdate('H:i', $over_time);

        $ot->date = $date;
        $ot->date_type = $date_type;
        $ot->user_id = $id;
        $ot->time_start = $start;
        $ot->time_end = $end;
        $ot->work = $work;
        $ot->over_time = $over_time;//dd($over_time);
        $ot->save();
        if ($work != "") {
            return redirect('page/overtime/add/'.$id)->with('global', 'Add over time was success');
        }else {
            return redirect('page/overtime/add/' . $id);
        }
    }

    //view edit over time
    public function getEditOvertime($id) {
        $ot = Overtime::find($id);
        return view('page/over_time/edit', ['overtime' => $ot]);
    }

    //post edit over time
    public function postEditOvertime(Request $request, $id)
    {
        $this->validate($request,
            [
                'dateOT' => 'required',
                'start' => 'required',
                'end' => 'required',
                'work' => 'required'
            ],
            [
                'dateOT.required' => 'Please enter date OT !',
                'start.required' => "Please enter time start",
                'end.required' => "Please enter time end",
                'work.required' => "Please enter work OT"
            ]
        );
        $ot = Overtime::find($id);
        $user_id = $request->username;
        $date_type = $request->date_type;
        if ($date_type == 1) {
            $type = '1.5';
        } elseif ($date_type ==2) {
            $type = '2';
        } else {
            $type = '3';
        }
        $dateOT = $request->dateOT;
        $start = $request->start;
        $end = $request->end;
        if (strtotime($start) > strtotime($end)) {
            return redirect('page/overtime/edit/'.$id)->
                with('error', 'The end time must be less than the start time !!');
        }
        $over = Overtime::where('user_id',$user_id)->where('date', $dateOT)->get();
        foreach ($over as $overtime) {
            if ($overtime->id != $id) {
                if (((strtotime($start) < strtotime($overtime->time_start)) &&
                    (strtotime($end) > strtotime($overtime->time_start))) ||
                    ((strtotime($start) >= strtotime($overtime->time_start)) &&
                    (strtotime($start) <= strtotime($overtime->time_end)))) {
                    return redirect('page/overtime/edit/'.$id)->
                        with('error', 'This time there was a period of overtime !!');
                }
            }
        }
        $time = strtotime($end) - strtotime($start);
        $over_time = $time * $type;
        $over_time = gmdate('H:i', $over_time);

        $ot->date = $dateOT;
        $ot->date_type = $date_type;
        $ot->user_id = $user_id;
        $ot->time_start = $start;
        $ot->time_end = $end;
        $ot->work = $request->work;
        $ot->over_time = $over_time;
        $ot->save();

        return redirect('page/overtime/'.$ot->user_id)->with('global', 'Repaired successfully');
    }

    //delete over time
    public function getDeleteOvertime($id)
    {
        $ot = Overtime::find($id);
        $ot->delete();
        return redirect('page/overtime/'.$ot->user_id)->with('global', 'Deleted successfully');
    }

    //view all attendence
    public function getOfftime($id) {
        $off = Attendence::where('user_id',$id)->orderBy('date','DESC')->paginate(10);
        return view('page/attendence/list',['attendence'=> $off]);
    }

    //view page add attendence
    public function getAddOfftime($id)
    {
        return view('page/attendence/add');
    }

    //post add attendence
    public function postAddOfftime(Request $request,$id)
    {
        $this->validate($request,
            [
                'dateOff' => 'required',
                'reason' => 'required|max:255'
            ],
            [
                'dateOff.required' => 'Please select date off !',
                'reason.required' => "Please enter reason off",
                'reason.max' => "Reason off max 255 characters"
            ]
        );
        $date = getdate();
        $dateOff = $request->dateOff;
        $timeOff = $request->timeOff;
        $today = ($date['year']."-".$date['mon']."-".$date['mday']);
        if (strtotime($dateOff) <= strtotime($today)) {
            return redirect('page/attendence/add/'.$id)->with('error', 'Date is not Invalid !');
        }

        $attendence = Attendence::where('user_id', $id)->get();
        foreach ($attendence as $att) {
            if ($att->date == $dateOff) {
                if (($att->off_time + $timeOff) > 8) {
                    return redirect('page/attendence/add/'.$id)->
                    with('error', 'You can not off more 8 hours on 1day !!');
                }
            }
        }
        $off = new Attendence();
        $off->user_id = $id;
        $off->date = $dateOff;
        $off->off_time = $timeOff;
        $off->reason = $request->reason;
        $off->save();

        return redirect('page/attendence/'.$id)->with('global', 'Add off time was success');
    }
    
}
