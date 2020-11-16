<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable(); // مشتری - می تونه مهمان باشه
            $table->string('token')->nullable();
            $table->integer('amount')->nullable(); // مبلغ خرید
            $table->enum('statusPay' , ['Paid' , 'Payment upon receipt' , 'unpaid'])->default('unpaid')->nullable(); // وضعیت پرداخت
            $table->string('codeMarsolePost')->nullable(); // کد مرسوله پست
            $table->string('name')->nullable(); // نام خریدار
            $table->string('family')->nullable(); // نام خانوادگی
            $table->longText('address')->nullable();
            $table->string('cellPhone')->nullable();
            $table->string('zipCode')->nullable(); // کد پستی
            $table->string('email')->nullable(); // ایمیل خریدار
            $table->integer('pricePost')->nullable(); // هزینه ارسال
            $table->string('typePost')->nullable(); // پیشتاز یا سفارشی
            $table->longText('note')->nullable(); // یادداشت های ادمین
            $table->enum('type_sale' , ['major' , 'singleSell'])->default('singleSell')->nullable(); // نوع فروش
            $table->integer('user_id')->nullable(); // کاربر ثبت کننده
            $table->string('user_name')->nullable(); // کاربر ثبت کننده
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
        Schema::dropIfExists('orders');
    }
}
