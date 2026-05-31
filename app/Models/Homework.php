<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $fillable = ["klass_id", "homework_name", "homework_file"];
    public function homeworkanswers()
{
    return $this->hasMany(HomeworkAnswers::class);
}
public function hasAnswerFromUser($userId): bool
    {
        return $this->homeworkanswers()->where('user_id', $userId)->exists();
    }
    public function getAnswerFromUser($userId)
{
    return $this->homeworkanswers()->where('user_id', $userId)->first();
}
public function klass()
{
    return $this->belongsTo(Klass::class);
}
}
