<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_tickets', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('country_id');
            $table->integer('main_country_id');
            $table->integer('admin_id')->nullable();
            $table->integer('agent_id');
            $table->enum('level',['deserve','not'])->default('not');
            $table->string('image');
            $table->text('message')->nullable();
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
        Schema::drop('support_tickets');
    }
}
