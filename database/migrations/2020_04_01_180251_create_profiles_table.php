<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->efficientUuid('uuid')->index();
            $table->string('facebook', 140);
            $table->string('rollitup', 140);
            $table->string('fourtwentymag', 140);
            $table->string('instagram', 140);
            $table->string('twitter', 140);
            $table->string('snapchat', 140);
            $table->string('thcfarmer', 140);
            $table->string('strainly', 140);
            $table->string('clonify', 140);
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
        Schema::dropIfExists('profiles');
    }
}
