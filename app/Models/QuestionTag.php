<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_Tag extends Model
{
    use HasFactory;
    protected $table = 'question_tag';
    protected $fillable = ['question_id', 'tags_id'];
}