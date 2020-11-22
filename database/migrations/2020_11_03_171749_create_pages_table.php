<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{

    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_publish')->nullable(); // تاریخ نمایش پست
            $table->longText('texts')->nullable();
            $table->longText('shortDescription')->nullable();
            $table->integer('specialPin')->default('0');  /// هر عدد یه معنی : 0 معمولی - 1 خاص و پین شده
            $table->enum('formatPost' , ['text','video','gallery','dl-video','dl-file'])->default('text');  /// فرمت نمایش پست را نشان می دهد
            $table->enum('statusPublish', ['forCheck', 'publish' , 'draft'])->default('draft')->nullable();
            $table->enum('mahfoz', ['no', 'yas' ])->default('no')->nullable();/// برای حفاظت از پاک شدن یا نشدن
            $table->string('user_id');
            $table->string('picture')->nullable();
            $table->longText('gallery')->nullable();
            $table->string('metaDescription')->nullable();
            $table->string('focusKeyword')->nullable();
            $table->string('titleSeo')->nullable();
            $table->integer('numberView')->nullable();  // آمار بازدید این مطلب
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });


        DB::table('pages')->insert([
            'name' => 'first page' ,
            'user_id' => 1 ,
            'slug' => 'page1' ,
            'mahfoz' => 'yes' ,
            'statusPublish' => 'draft'
        ]);
        DB::table('pages')->insert([
            'name' => 'About us' ,
            'user_id' => 1 ,
            'slug' => 'about-us' ,
            'statusPublish' => 'publish'
        ]);
        DB::table('pages')->insert([
            'name' => 'Content us' ,
            'user_id' => 1 ,
            'slug' => 'content-us' ,
            'statusPublish' => 'publish'
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
