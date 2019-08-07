<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class correctanswer extends Model
{
    protected $fillable = ['answerID', 'pollID', 'surveyID', 'correctanswer'];
}
