<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teamEvents extends Model
{
    protected $fillable = ['eventID', 'teamName', 'membersNumber'];
}
