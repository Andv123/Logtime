<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UserExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        return view('admin/user_manage/export', [
            'user' => User::all()
        ]);
    }
}
