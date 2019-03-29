<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableParse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parse', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('date_start')->nullable();
            $table->string('date_end')->nullable();
            $table->string('cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
