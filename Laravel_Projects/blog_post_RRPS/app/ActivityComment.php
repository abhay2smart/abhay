<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityComment extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id','activity_id','body'];
}
