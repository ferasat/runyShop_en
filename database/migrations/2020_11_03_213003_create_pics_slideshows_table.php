<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicsSlideshowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pics_slideshows', function (Blueprint $table) {
            $table->id();
            $table->string('slideshow_id')->index();
            $table->string('subject')->nullable();
            $table->string('text')->nullable();
            $table->string('urlpic');
            $table->string('link')->nullable();
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
        Schema::dropIfExists('pics_slideshows');
    }
}
