<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Klass extends Model
{
    protected $fillable = ["klass_name", "user_id", "join_code"];
    public function joinedKlasses()
{
    return $this->hasMany(JoinedKlass::class);
}
public function homework()
{
    return $this->hasMany(Homework::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}
}
