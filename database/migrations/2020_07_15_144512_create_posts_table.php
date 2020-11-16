<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_publish')->nullable(); // تاریخ نمایش پست
            $table->longText('texts')->nullable();
            $table->longText('shortDescription')->nullable();
            $table->integer('specialPin')->default('0');  /// هر عدد یه معنی : 0 معمولی - 1 خاص و پین شده
            $table->enum('formatPost' , ['text','video','gallery','dl-video','dl-file'])->default('text');  /// فرمت نمایش پست را نشان می دهد
            $table->enum('statusPublish', ['forCheck', 'publish' , 'draft'])->default('draft')->nullable();
            $table->string('user_id');
            $table->string('category_id')->nullable();
            $table->string('picture')->nullable();
            $table->longText('gallery')->nullable();
            $table->string('metaDescription')->nullable();
            $table->string('focusKeyword')->nullable();
            $table->string('titleSeo')->nullable();
            $table->integer('numberView')->nullable();  // آمار بازدید این مطلب
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });

        DB::table('posts')->insert([
            'name' => 'First Post For test' ,
            'user_id' => 1 ,
            'slug' => 'post1' ,
            'statusPublish' => 'publish'
        ]);
    }


    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
