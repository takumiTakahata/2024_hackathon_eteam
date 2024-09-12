<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer', function (Blueprint $table) {
            $table->id();                // プライマリーキー
            $table->text('text');        // 回答の本文
            $table->unsignedBigInteger('question_id'); // questionテーブルのIDを参照
            $table->foreign('question_id')->references('id')->on('question')->onDelete('cascade');
            $table->timestamps();        // created_at, updated_atのタイムスタンプ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer');
    }
}
