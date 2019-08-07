<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use DB;

class events extends Model
{
    protected $table = 'events';
    protected $fillable = ['eventName', 'user_id', 'eventCode', 'competitionTime', 'competitionPoints'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public static function geteventsbyuser($uid) {
        $value = DB::table('events')->where('user_id', $uid)->get();
        return $value;
    }

    public static function geteventbyid($id, $uid) {
        $value = DB::table('events')->where('id', $id)->first();
        return $value;
    }

    public function polls() {
        return $this->hasMany('App\polls');
    }
}
