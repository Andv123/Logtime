<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Overtime;
use App\Attendence;
use App\List_to_do;
use Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdminExportOT;
use App\Exports\AdminExportOFF;
use App\Exports\AdminExportOT_One;

class AdminController extends Controller
{

    //view home page admin
    public function getHome() {
        $user = User::all();
        $ot = [];
        $att = [];
        foreach ($user as $us) {
            $ot[$us->id] = [];
            $time = Overtime::where('user_id', $us->id)->sum('over_time');
            $off = Attendence::where('user_id',$us->id)->sum('off_time');
            if ($time != 0) {
                $h = substr($time, 0, strlen($time) - 4);
                $m = substr($time, strlen($time) - 4, strlen($time) - 4);
                $s = substr($time, strlen($time) - 2, strlen($time));
                $time = $h . ':' . $m . ':' . $s;
                $ot[$us->id]['overtime'] = $time;
            } else {
                $ot[$us->id]['overtime'] = "00:00:00";
            }
            $ot[$us->id]['id'] = $us->id;
            $ot[$us->id]['name'] = $us->full_name;
            $ot[$us->id]['picture'] = $us->picture;

            $att[$us->full_name] = $off;
        }

        $lists = List_to_do::orderBy('time','DESC')->paginate(5);

        return view('admin/layout/home',['lists'=> $lists, 'overtime' => $ot, 'attendence' => $att]);
    }

    //search user admin
    public function postSearch(Request  $request)
    {
        $this->validate($request,
        [
         'searchKey'=>'required'
        ],
        [
            'searchKey.required' => 'Please enter user name search'
        ]);
        $key = $request->searchKey;
        if (isset($key)) {
            $user = User::where('full_name', 'LIKE', "%$key%")->get();
            $data = array('key' => $key,
                'user' => $user);

            return view('admin.layout.search', ['data' => $data]);
        }
    }

    //view search detail
    public function getDetails($id)
    {
        $user = User::find($id);
        $ot = Overtime::where('user_id', $id)->get();
        $off = Attendence::where('user_id',$id)->get();
        $data = array('user' => $user,
            'ot' => $ot,
            'off' => $off);

        return view('admin.layout.details', ['data' => $data]);
    }

    //add list to do
    public function  postListAdd(Request $request) {
        $this->validate($request,
            [
                'todo' => 'required|max:100',
                'date_todo' => 'required'
            ],
            [
                'date_todo.required' => "Please select date to do",
                'todo.required' => "Please enter work to do",
                'todo.max' => "Work to do max 255characters"
            ]);
        $list = new List_to_do();
        $list->work_to_do = $request->todo;
        $list->time = $request->date_todo;
        $list->save();
        return redirect('admin/home');
    }

    //delete list to do
    public function getListDelete($id) {
        $list = List_to_do::find($id);
        $list->delete();
        return redirect('admin/home');
    }

    //export Over time
    public function getExportOT() {
        return Excel::download(new AdminExportOT, 'overtime.xls');
        return redirect('admin/home');
    }

    //export Off time
    public function getExportOFF() {
        return Excel::download(new AdminExportOFF, 'offtime.xls');
        return redirect('admin/home');
    }

    //export Over time one user
    public function getExportOT_One($id) {
        $us = User::find($id);//dd($us->full_name);
        return Excel::download(new AdminExportOT_One($id), 'overtime_'.$us->full_name.'.xls');
        return redirect('admin/home');
    }
}

