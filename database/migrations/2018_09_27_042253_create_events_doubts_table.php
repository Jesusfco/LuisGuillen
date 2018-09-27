<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsDoubtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_doubts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id'); 
            $table->integer('user_id'); 
            $table->integer('responder_id')->nullable(); 
            $table->string('question');  
            $table->string('answer')->nullable();  
            $table->boolean('public')->default(false);  
            $table->boolean('read')->default(false);  
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
        Schema::dropIfExists('events_doubts');
    }
}
