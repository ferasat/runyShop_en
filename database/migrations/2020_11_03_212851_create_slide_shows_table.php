<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSlideShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_shows', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('text')->nullable();
            $table->string('urlpic')->nullable();
            $table->timestamps();
        });

        DB::table('slide_shows')->insert([
            'subject' => 'خانه',
        ]);
    }


    public function down()
    {
        Schema::dropIfExists('slide_shows');
    }
}
