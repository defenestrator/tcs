<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('facebook');
            $table->boolean('rollitup');
            $table->boolean('fourtwentymag');
            $table->boolean('instagram');
            $table->boolean('twitter');
            $table->boolean('snapchat');
            $table->boolean('thcfarmer');
            $table->boolean('strainly');
            $table->boolean('clonify');
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
        Schema::dropIfExists('profile_settings');
    }
}
