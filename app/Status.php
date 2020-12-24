<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    public function thirdparties()
    {
        return $this->belongsTo('App\ThirdParty');
    }


    protected static function boot(){
        parent::boot();

        static::saved(function (Status $status) {

            $trac = new Tracking();
            $trac->status_id = $status->id;
            $trac->awb = $status->awb;
            $trac->checkpoint_id = $status->checkpoint_id;
            // if ($status->third_party_id != ''){
            //     $trac->third_party_id = $status->third_party_id;
            // }
            $trac->user_id = $status->user_id;
            $trac->status_date = $status->status_date;
            $trac->save();
        });

    }




}
