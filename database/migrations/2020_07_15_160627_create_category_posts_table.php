<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('picture')->nullable();
            $table->string('icon')->nullable();
            $table->enum('statusMaster' , ['yes' , 'no'])->default('yes'); // سردسته هست یا نه
            $table->string('statusChild')->nullable(); // فرزند دارد یا نه
            $table->string('Inherited')->nullable(); // سر دسته چه دسته ای هست -- آی دی اون دسته وارد شود
            $table->enum('statusPublish', ['forCheck', 'publish' , 'draft'])->default('publish')->nullable();
            $table->string('focusKeyword')->nullable(); // عبارت کلیدی کانونی
            $table->string('titleSeo')->nullable(); // عنوان سئو
            $table->string('url')->unique()->index()->nullable(); // نامک
            $table->string('metaDescription')->nullable(); // توضیح متا
            $table->timestamps();
        });

        DB::table('category_posts')->insert([
            'name' => 'دستبندی نشده' ,
            'statusMaster' => 'yes' ,
            'url' => 'uncat' ,
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
        Schema::dropIfExists('category_posts');
    }
}
