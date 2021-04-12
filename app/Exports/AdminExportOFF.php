<?php

namespace App\Exports;

use App\Attendence;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AdminExportOFF implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $user = User::all();
        $att = [];
        foreach ($user as $us) {
            $off = Attendence::where('user_id',$us->id)->sum('off_time');
            $att[$us->id]['attendence'] = $off;
            $att[$us->id]['user_id'] = $us->id;
            $att[$us->id]['email'] = $us->email;
            $att[$us->id]['name'] = $us->full_name;
        }
        return view('admin/layout/export-off', [
            'attendence' => $att
        ]);
    }
}
