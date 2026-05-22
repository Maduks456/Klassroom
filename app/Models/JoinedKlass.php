<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class JoinedKlass extends Model
{
    protected $fillable = ["user_id", "class_id"];
}
