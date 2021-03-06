<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');    
            $table->integer('event_id');   
            $table->integer('qualification'); 
            $table->string('opinion')->nullable(); 
            $table->string('question1')->nullable(); 
            $table->string('question2')->nullable(); 
            $table->string('question3')->nullable(); 
            $table->string('question4')->nullable();             
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
        Schema::dropIfExists('judments');
    }
}
