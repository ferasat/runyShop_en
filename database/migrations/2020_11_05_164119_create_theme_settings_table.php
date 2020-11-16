<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_settings', function (Blueprint $table) {
            $table->id();
            $table->string('slide_id')->nullable();
            $table->string('service1')->nullable();
            $table->string('service1url')->nullable();
            $table->string('service2')->nullable();
            $table->string('service2url')->nullable();
            $table->string('service3')->nullable();
            $table->string('service3url')->nullable();
            $table->string('service4')->nullable();
            $table->string('service4url')->nullable();
            $table->string('banner1')->nullable();
            $table->string('banner1url')->nullable();
            $table->string('banner2')->nullable();
            $table->string('banner3')->nullable();
            $table->string('banner2url')->nullable();
            $table->string('banner3url')->nullable();
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
        Schema::dropIfExists('theme_settings');
    }
}
