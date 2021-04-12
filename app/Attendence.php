<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $tablle = "Attendence";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
