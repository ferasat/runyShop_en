<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('customShow')->nullable(); // نوع نمایش محصول
            $table->longText('short')->nullable(); /// توضیحات کوتاه محصول
            $table->integer('specialPin')->default('0');  /// هر عدد یه معنی : 0 معمولی - 1 خاص و پین شده
            $table->longText('description')->nullable(); // توضیحات کامل محصول
            $table->longText('description2')->nullable(); // توضیحات کامل محصول
            $table->string('picture')->nullable(); /// تصویر اصلی یا شاخص محصول
            $table->string('bgProduct')->nullable(); /// تصویر اصلی یا شاخص محصول
            $table->string('gallery')->nullable(); // تصاویر محصول
            $table->integer('purchasePrice')->nullable(); /// قیمت خرید
            $table->integer('price')->nullable(); /// قیمت فروش
            $table->enum('specialSales',['0','1'])->nullable(); // فروش ویژه - 0 نیست - 1 فروش ویژه هست
            $table->integer('salesPrice')->nullable(); /// قیمت فروش ویژه
            $table->string('sku')->nullable(); // شناسه محصول
            $table->enum('statusStock' , ['stock', 'outofstock'])->default('stock')->nullable(); // وضعیت موجودی
            $table->integer('numStock')->default('1')->nullable(); // تعداد موجودی
            $table->integer('realNumStock')->default('1')->nullable(); // تعداد واقعی موجودی
            $table->integer('lowStockAmount')->default('2')->nullable(); /// آستانه کم شدن موجوی کالا
            $table->string('weight')->nullable(); /// وزن محصول
            $table->string('length')->nullable(); /// طول محصول
            $table->string('width')->nullable(); /// عرض محصول
            $table->string('height')->nullable(); /// ارتفاع محصول
            $table->string('source')->nullable(); // مرجع خرید
            $table->integer('category')->nullable(); // ایدی دستبندی میاید
            $table->integer('salesNumber')->nullable()->default('0'); // تعداد فروش محصول
            $table->string('tag')->nullable();
            $table->enum('statusPublish', ['forCheck', 'publish' , 'draft'])->default('publish')->nullable();
            $table->string('focusKeyword')->nullable(); // عبارت کلیدی کانونی
            $table->string('titleSeo')->nullable(); // عنوان سئو
            $table->string('slug')->nullable(); // نامک
            $table->integer('numberView')->nullable()->default('0'); // بازدید
            $table->string('metaDescription')->nullable(); // توضیح متا
            $table->enum('statusComment' , ['close' , 'open'])->default('open')->nullable(); // وضعیت نظرات
            $table->string('user_id')->nullable(); // ای دی کاربر ثبت کننده
            $table->timestamps();
        });
        DB::table('products')->insert([
            'name' => 'first product for test' ,
            'price' => 2500 ,
            'user_id' => 1 ,
            'slug' => 'test' ,
            'picture' => 'http://tarahsite.net/wp-content/uploads/%D8%B7%D8%B1%D8%A7%D8%AD%DB%8C-%D8%AA%D8%AC%D9%87%DB%8C%D8%B2%D8%A7%D8%AA-%D9%BE%D8%B2%D8%B4%DA%A9%DB%8C.jpg' ,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
