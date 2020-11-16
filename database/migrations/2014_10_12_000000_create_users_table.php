<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family')->nullable();
            $table->enum('status' , ['Active','deActivate'])->nullable();
            $table->string('role')->nullable()->default('customer'); // contributor / editor / Admin /
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('pic')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            'name' => 'admin' ,
            'email' => 'admin@tarahsite.net' ,
            'phone' => '9372088771' ,
            'status' => 'Active' ,
            'role' => 'superAdmin' ,
            'pic' => 'http://tarahsite.net/wp-content/uploads/Amin-ferasat.ir_.jpg' ,
            'password' => bcrypt('@dmiN98A' ),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
