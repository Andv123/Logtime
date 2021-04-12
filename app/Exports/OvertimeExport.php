<?php

namespace App\Exports;

use App\Overtime;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OvertimeExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        return view('admin/over_time/export', [
            'overtime' => Overtime::all()
        ]);
    }
}
