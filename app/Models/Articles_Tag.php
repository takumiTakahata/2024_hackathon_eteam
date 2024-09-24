<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles_Tag extends Model
{
    use HasFactory;
    protected $table = 'articles_tag';
    // 挿入可能なカラムを指定
    protected $fillable = ['articles_id', 'tags_id'];
}
