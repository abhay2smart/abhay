<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = ['image','user_id','dob'];
    public $timestamps = false;
}
