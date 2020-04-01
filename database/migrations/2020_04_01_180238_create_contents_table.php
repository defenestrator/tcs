<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->efficientUuid('uuid')->index();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title', 140);
            $table->longText('body');
            $table->string('slug', 180)->unique();
            $table->timestamp('published_at')->nullable();
            $table->string('contentable_type', 100)->nullable();
            $table->unsignedBigInteger('contentable_id')->nullable();
            $table->json('custom_fields')->nullable();
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
        Schema::dropIfExists('contents');
    }
}
