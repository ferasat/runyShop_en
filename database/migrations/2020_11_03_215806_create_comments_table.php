<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('post_id')->index();
            $table->string('name');
            $table->string('user_id')->nullable(); // در صورتی که عضو سایت باشد
            $table->string('email')->nullable();
            $table->longText('text')->nullable();
            $table->enum('confirmation',['Approved' , 'Not Approved']);
            $table->integer('replayTo')->nullable()->default('0'); //پاسخ به کدام کامنت -- ای دی کامنت وارد می شود
            $table->timestamps();
        });

        DB::table('comments')->insert([
            'post_id' => '1',
            'name' => 'امین فراست',
            'email' => 'tarahsite.net@gmail.com',
            'text' => 'اولین دیدگاه در این سایت . امیدوارم موفق باشید',
            'replayTo' => '0',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
