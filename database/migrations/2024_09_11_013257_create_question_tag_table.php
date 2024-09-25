<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_tags', function (Blueprint $table) {
            $table->id();  // プライマリーキー
            $table->unsignedBigInteger('question_id');  // questionsテーブルのidを参照
            $table->unsignedBigInteger('tags_id');       // tagsテーブルのidを参照

            // 外部キー制約
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
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
        Schema::dropIfExists('question_tags');
    }
}
