<?php

namespace App\Http\Controllers;

use App\Overtime;
use Illuminate\Http\Request;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OvertimeExport;

class OvertimeController extends Controller
{
    function __construct()
    {
        $user = User::all();
        view()->share(['user' => $user]);
    }

    //view over time
    public function getList()
    {
        $ot = Overtime::orderBy('date','DESC')->orderBy('user_id')->orderBy('time_start')->paginate(10);
        return view('admin/over_time/list', ['overtime' => $ot]);
    }

    //view add over time
    public function getAdd()
    {
        return view('admin/over_time/add');
    }

    //add over time
    public function postAdd(Request $request)
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
        $ot = new Overtime();

        $date_type = $request->date_type;
        if ($date_type == 1) {
            $type = '1.5';
        } elseif ($date_type ==2) {
            $type = '2';
        } else {
            $type = '3';
        }
        $id = $request->username;
        $dateOT = $request->dateOT;
        $start = $request->start;
        $end = $request->end;
        if (strtotime($start) > strtotime($end)) {
            return redirect('admin/overtime/add')->
                with('error', 'The end time must be less than the start time !!');
        }
        $over = Overtime::where('user_id', $id)->get();//dd($over);
        foreach ($over as $overtime) {
            if ($overtime->date == $dateOT) {
                if ($overtime->id != $id) {
                    if (((strtotime($start) < strtotime($overtime->time_start)) &&
                        (strtotime($end) > strtotime($overtime->time_start))) ||
                        ((strtotime($start) >= strtotime($overtime->time_start)) &&
                        (strtotime($start) <= strtotime($overtime->time_end)))) {
                            return redirect('admin/overtime/add')->
                                with('error', 'This time there was a period of overtime !!');
                    }
                }
            }
        }
        $time = strtotime($end) - strtotime($start);
        $over_time = $time * $type;
        $over_time = gmdate('H:i', $over_time);//var_dump($over_time);exit();

        $ot->date = $dateOT;
        $ot->date_type = $date_type;
        $ot->user_id = $id;
        $ot->time_start = $start;
        $ot->time_end = $end;
        $ot->work = $request->work;
        $ot->over_time = $over_time;
        $ot->save();

        return redirect('admin/overtime/add')->with('global', 'Add over time was success');
    }

    //view edit over time
    public function getEdit($id)
    {
        $ot = Overtime::find($id);
        return view('admin/over_time/edit', ['overtime' => $ot]);

    }

    //edit over time
    public function postEdit(Request $request, $id)
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
        $date_type = $request->date_type;
        if ($date_type == 1) {
            $type = '1.5';
        } elseif ($date_type ==2) {
            $type = '2';
        } else {
            $type = '3';
        }
        $user_id = $ot->user_id;
        $dateOT = $request->dateOT;
        $start = $request->start;
        $end = $request->end;
        if (strtotime($start) > strtotime($end)) {
            return redirect('admin/overtime/edit/'.$id)->
                with('error', 'The end time must be less than the start time !!');
        }
        $over = Overtime::where('user_id', $user_id)->get();//dd($over);
        foreach ($over as $overtime) {
            if ($overtime->date == $dateOT) {
                //dd($overtime->id);
                if ($overtime->id != $id) {
                    if (((strtotime($start) < strtotime($overtime->time_start)) &&
                        (strtotime($end) > strtotime($overtime->time_start))) ||
                        ((strtotime($start) >= strtotime($overtime->time_start)) &&
                        (strtotime($start) <= strtotime($overtime->time_end)))) {
                            return redirect('admin/overtime/edit/'.$id)->
                                with('error', 'This time there was a period of overtime !!');
                    }
                }
            }
        }
        $time = strtotime($end) - strtotime($start);
        $over_time = $time * $type;
        $over_time = gmdate('H:i', $over_time);

        $ot->date = $request->dateOT;
        $ot->date_type = $date_type;
        $ot->user_id = $request->username;
        $ot->time_start = $start;
        $ot->time_end = $end;
        $ot->work = $request->work;
        $ot->over_time = $over_time;
        $ot->save();

        return redirect('admin/overtime/list')->with('global', 'Repaired successfully');
    }

    //delete over time
    public function getDelete($id)
    {
        $ot = Overtime::find($id);
        $ot->delete();
        return redirect('admin/overtime/list')->with('global', 'Deleted successfully');
    }

    //export over time
    public function getExport()
    {
        return Excel::download(new OvertimeExport(), 'user_overtime.xls');
        return redirect('admin/home');
    }
}
