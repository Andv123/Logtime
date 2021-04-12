<?php

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use App\User;
    use App\Attendence;
    use Maatwebsite\Excel\Facades\Excel;
    use App\Exports\AttendenceExport;

class AttendenceController extends Controller
{
    function __construct()
    {
        $user = User::all();
        view()->share(['user' => $user]);
    }

    //view list attendence
    public function getList()
    {
        $attendence = Attendence::orderBy('date','DESC')->paginate(15);
        return view('admin/attendence/list', ['attendence' => $attendence]);
    }

    //view add attendence
    public function getAdd()
    {
        return view('admin/attendence/add');
    }

    //add attendence
    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'username' =>'required',
                'dateOff' => 'required',
                'reason' => 'required|max:255'
            ],
            [
                'username.required' => 'Please select user name !',
                'dateOff.required' => 'Please select date off !',
                'reason.required' => "Please enter reason off",
                'reason.max' => "Reason off max 255 characters"
            ]
        );
        //dd($request->timeOff);
        $id = $request->username;
        $dateOff = $request->dateOff;
        $timeOff = $request->timeOff;
        $attendence = Attendence::where('user_id', $id)->get();//dd($att);
        foreach ($attendence as $att) {
            if ($att->date == $dateOff) {
                if (($att->off_time + $timeOff) > 8) {
                    return redirect('admin/attendence/add')->
                    with('error', 'Staff can not off more 8 hours on 1day');
                }
            }
        }

        $off = new Attendence();
        $off->user_id = $id;
        $off->date = $dateOff;
        $off->off_time = $timeOff;
        $off->reason = $request->reason;
        $off->save();

        return redirect('admin/attendence/add')->with('global', 'Add off time was success');
    }

    //view edit attendence
    public function getEdit($id)
    {
        $off = Attendence::find($id);
        return view('admin/attendence/edit', ['attendence' => $off]);

    }

    //edit attendence
    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
            [
                'username' => 'required',
                'dateOff' => 'required',
                'reason' => 'required|max:255'
            ],
            [
                'username.required' => 'Please select user name !',
                'dateOff.required' => 'Please enter date off !',
                'reason.required' => "Please enter reason off",
                'reason.max' => "Reason max 255 characters"
            ]
        );
        $user_id = $request->username;
        $dateOff = $request->dateOff;
        $timeOff = $request->timeOff;
        $reason = $request->reason;
        $attendence = Attendence::where('user_id', $user_id)->get();//dd($attendence);
        foreach ($attendence as $att) {
            //dd($dateOff);
            if ($att->date == $dateOff) {
                if (($att->off_time + $timeOff) > 8) {
                    $atten = Attendence::find($id);
                    $error = 'Staff can not off more 8 hours on 1day';
                    return view('admin/attendence/edit',['error' => $error, 'attendence' => $atten]);
                }
            }
        }
        dd('ok');
        $off = Attendence::find($id);
        $off->user_id = $id;
        $off->date = $dateOff;
        $off->off_time = $timeOff;
        $off->reason = $reason;
        $off->save();

        return redirect('admin/attendence/list')->with('global', 'Repaired successfully !');
    }

    //delete attendence
    public function getDelete($id)
    {
        $off = Attendence::find($id);
        $off->delete();
        return redirect('admin/attendence/list')->with('global', 'Offtime was delete !');
    }

    //export attendence
    public function getExport()
    {
        return Excel::download(new AttendenceExport(), 'user_offtime.xls');
        return redirect('admin/home');
    }

}

