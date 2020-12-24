<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThirdParty extends Model
{
    public function statuses()
    {
        return $this->hasMany('App\Status');
    }
}
