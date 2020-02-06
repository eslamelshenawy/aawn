<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sitename_ar');
            $table->string('sitename_en');
            $table->string('logo');
            $table->string('icon');
            $table->string('email');
            $table->string('main_lang')->default('ar');
            $table->longText('description')->nullable();
            $table->longText('keywords')->nullable();
            $table->enum('status',['open','close'])->default('open');
            $table->longText('message_mentenance')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
