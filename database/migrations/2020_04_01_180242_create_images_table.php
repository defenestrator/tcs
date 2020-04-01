<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->efficientUuid('uuid')->index();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('caption')->nullable();
            $table->string('credits')->nullable();
            $table->string('path');
            $table->timestamp('published_at')->nullable();
            $table->string('imageable_type', 100);
            $table->unsignedBigInteger('imageable_id');
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
        Schema::dropIfExists('images');
    }
}
