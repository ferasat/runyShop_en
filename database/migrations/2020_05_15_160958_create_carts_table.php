<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->index();
            $table->string('product_name')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('image')->nullable();
            $table->string('sku')->nullable(); // کد محصول
            $table->integer('qty')->nullable(); // تعداد
            $table->integer('price')->nullable(); // قیمت تک
            $table->integer('price_buy')->nullable(); // قیمت خرید
            $table->string('detail')->nullable(); // جزئیات محصول مثلا رنگ و ...
            $table->string('customer_note')->nullable(); // یاداشت خریدار
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
        Schema::dropIfExists('carts');
    }
}
