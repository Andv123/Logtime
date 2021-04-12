<?php

namespace App\Exports;

use App\Overtime;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AdminExportOT_One implements FromView,ShouldAutoSize
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $ot = Overtime::where('user_id',$this->id)->get();

        return view('admin/layout/export-ot-user', [
            'overtime' => $ot
        ]);
    }
}

