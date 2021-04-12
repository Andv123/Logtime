<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $tablle = "Overtime";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
