<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('statusPublish', ['برای برسی', 'انتشار' , 'پیش نویس'])->nullable();
            $table->string('focusKeyword')->nullable(); // عبارت کلیدی کانونی
            $table->string('titleSeo')->nullable(); // عنوان سئو
            $table->string('slug')->unique()->index()->nullable(); // نامک
            $table->string('metaDescription')->nullable(); // توضیح متا
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
        Schema::dropIfExists('tag_products');
    }
}
