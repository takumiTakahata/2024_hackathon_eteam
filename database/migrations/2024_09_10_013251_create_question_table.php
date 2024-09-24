<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id('id');                      // プライマリーキー
            $table->string('title');               // 質問のタイトル
            $table->text('content');               // 質問の内容
            $table->foreignId('user_id')           // ユーザーID
                  ->constrained()                  // usersテーブルのIDを参照
                  ->onDelete('cascade');           // ユーザー削除時に質問も削除
            $table->timestamps();   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
