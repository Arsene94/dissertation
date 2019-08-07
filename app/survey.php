<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class survey extends Model
{
    protected $fillable = ['pollID', 'pollQuestion', 'pollType'];

    public static function getsurveysbyuser($eventID) {
        $value = DB::table('polls')->where([
            ['eventID', '=', $eventID],
            ['pollType', '=', 5],
        ])->get();
        return $value;
    }
}
