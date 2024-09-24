<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('id');       // プライマリーキー
            $table->string('title');         // 記事のタイトル
            $table->text('text');            // 記事の本文
<<<<<<< HEAD
            $table->boolean('popular')->nullable();  // 人気記事かどうか（NULL許可）
=======
            $table->integer('popular')->default(0);  // 人気記事かどうか（NULL許可）
>>>>>>> main
            $table->string('movie_url')->nullable(); // 動画のURL（NULL許可）
            $table->timestamps();            // created_at, updated_atのタイムスタンプ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
