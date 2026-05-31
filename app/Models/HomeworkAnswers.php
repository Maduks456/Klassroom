<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class HomeworkAnswers extends Model
{
    protected $fillable = ["homework_id", "user_id", "raiting", "comment", "answer_file"];
    public function homework()
{
    return $this->belongsTo(Homework::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}
}
