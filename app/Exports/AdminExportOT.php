<?php

namespace App\Exports;

use App\Overtime;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AdminExportOT implements FromView,ShouldAutoSize
{

    public function view(): View
    {
        $user = User::all();
        $ot = [];
        foreach ($user as $us) {
            $ot[$us->id] = [];
            $time = Overtime::where('user_id', $us->id)->sum('over_time');
            if ($time != 0) {
                $h = substr($time, 0, strlen($time) - 4);
                $m = substr($time, strlen($time) - 4, strlen($time) - 4);
                $s = substr($time, strlen($time) - 2, strlen($time));
                $time = $h . ':' . $m . ':' . $s;
                $ot[$us->id]['overtime'] = $time;
            } else {
                $ot[$us->id]['overtime'] = "00:00:00";
            }
            $ot[$us->id]['user_id'] = $us->id;
            $ot[$us->id]['email'] = $us->email;
            $ot[$us->id]['name'] = $us->full_name;

        }
        return view('admin/layout/export-ot', [
            'overtime' => $ot
        ]);
    }
}
