<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'text', 'delete_flag','user_id'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'articles_tag', 'articles_id', 'tags_id');
    }
    protected static function boot()
    {
        parent::boot();

        // 削除されていない記事のみ取得
        static::addGlobalScope('notDeleted', function ($query) {
            $query->where('delete_flag', false);
        });

    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
