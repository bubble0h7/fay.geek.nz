<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('now', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('age');
            $table->string('sex', 1);
            $table->string('location', 50);
            $table->string('occupation');
            $table->text('listening_to');
            $table->text('watching');
            $table->text('playing');
            $table->text('reading');
            $table->text('excited_about');
            $table->text('working_on');
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
        Schema::dropIfExists('now');
    }
}
