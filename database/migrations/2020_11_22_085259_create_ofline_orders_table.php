<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOflineOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofline_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('value')->nullable();
            $table->string('email')->nullable();
            $table->string('qty')->nullable();
            $table->string('sku')->nullable();
            $table->string('product')->nullable();
            $table->string('product_id')->nullable();
            $table->string('customer_note')->nullable();
            $table->string('status')->nullable();
            $table->string('note')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('ofline_orders');
    }
}
