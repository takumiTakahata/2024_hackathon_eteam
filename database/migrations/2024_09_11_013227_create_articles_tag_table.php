<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_tag', function (Blueprint $table) {
            $table->id();  // プライマリーキー
            $table->unsignedBigInteger('articles_id');  // articlesテーブルのidを参照
            $table->unsignedBigInteger('tags_id');      // tagsテーブルのidを参照

            // 外部キー制約
            $table->foreign('articles_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');

            $table->timestamps();  // created_at, updated_atのタイムスタンプ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles_tag');
    }

    
}
