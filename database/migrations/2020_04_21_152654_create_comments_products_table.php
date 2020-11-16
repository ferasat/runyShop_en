<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->index();
            $table->string('name');
            $table->string('user_id')->nullable(); // در صورتی که عضو سایت باشد
            $table->string('email')->nullable();
            $table->longText('text')->nullable();
            $table->string('replayTo')->nullable(); //پاسخ به کدام کامنت -- ای دی کامنت وارد می شود
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
        Schema::dropIfExists('comments_products');
    }
}
