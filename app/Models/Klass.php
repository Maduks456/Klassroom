<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klass extends Model
{
    protected $fillable = ["class_name", "teacher_id", "join_code"];
    public function joinedKlasses()
{
    return $this->hasMany(JoinedKlass::class, 'class_id');
}
public function teacher()
{
    return $this->belongsTo(User::class, 'teacher_id');
}
}
