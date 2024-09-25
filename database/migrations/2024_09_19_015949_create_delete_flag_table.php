<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeleteFlagTable extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->boolean('delete_flag')->default(false);
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->boolean('delete_flag')->default(false);
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('delete_flag');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('delete_flag');
        });
    }
}
