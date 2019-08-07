<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    protected $fillable = ['pollID', 'surveyID', 'answer'];
}
