<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'question';

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'question_tags', 'question_id', 'tags_id');
    }
}
