<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'question';
    protected $fillable = ['title', 'text', 'delete_flag','user_id'];


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'question_tags', 'question_id', 'tags_id');
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
    protected static function boot()
    {
        parent::boot();

        // 削除されていない知恵袋のみ取得
        static::addGlobalScope('notDeleted', function ($query) {
            $query->where('delete_flag', false);
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
