<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class polls extends Model
{
    protected $fillable = ['eventID', 'user_id', 'pollType', 'pollQuestion'];

    public function events() {
        return $this->belongsTo('App\events');
    }

    public static function getpollsbyuser($eventID) {
        $value = DB::table('polls')->where('eventID', $eventID)->get();
        return $value;
    }

    public static function updateLiveAnswers($pollID) {
        $get = DB::table('polls')->where('id', $pollID)->first();
        if($get->liveAnswers == 0)
            $value = 1;
        elseif($get->liveAnswers == 1)
            $value = 0;
        $value = DB::table('polls')->where('id', $pollID)->update(['liveAnswers' => $value]);
    }

    public static function startPoll($pollID, $uid) {
        $val = DB::table('polls')->where('id', $pollID)->first();
        if($val->startPoll == 0)
            $value = 1;
        elseif($val->startPoll == 1)
            $value = 0;
        $set1 = DB::table('polls')->update(['startPoll' => '0']);
        $set2 = DB::table('polls')->where('id', $pollID)->update(['startPoll' =>  $value]);
    }
}
