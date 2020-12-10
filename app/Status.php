<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{


    protected static function boot(){
        parent::boot();

        static::saved(function (Status $status) {

            $trac = new Tracking();
            $trac->awb = $status->awb;
            $trac->checkpoint_id = $status->checkpoint_id;
            $trac->user_id = $status->user_id;
            $trac->status_date = $status->status_date;
            $trac->save();
        });

    }




}
