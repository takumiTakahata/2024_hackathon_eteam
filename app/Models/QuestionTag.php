<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionTag extends Model
{
    use HasFactory;
    protected $table = 'question_tags';
    protected $fillable = ['question_id', 'tags_id'];
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_tags', 'tags_id', 'question_id');
    }
}