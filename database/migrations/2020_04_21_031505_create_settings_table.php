<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('settingName');
            $table->string('settingTextName')->nullable(); // نام فیلد که در ترجمه نمایش در میاد
            $table->longText('value');
            $table->string('autoload')->default('yes');
            $table->timestamps();
        });
        DB::table('settings')->insert([
            'settingName' => 'siteUrl',
            'settingTextName' => 'آدرس سایت',
            'value' => 'tarahsite.net',
        ]);
        DB::table('settings')->insert([
            'settingName' => 'siteName',
            'settingTextName' => 'نام سایت',
            'value' => 'سامانه فروشگاهی رانی',
        ]);
        DB::table('settings')->insert([
            'settingName' => 'siteDescription',
            'settingTextName' => 'شرح سایت',
            'value' => 'سامانه فروشگاهی رانی',
        ]);
        DB::table('settings')->insert([
            'settingName' => 'adminEmail',
            'settingTextName' => 'ایمیل سایت',
            'value' => 'runy.shop@tarahsite.net',
        ]);
        DB::table('settings')->insert([
            'settingName' => 'siteLogo',
            'settingTextName' => 'لوگوی سایت',
            'value' => 'http://tarahsite.net/wp-content/themes/tarahsite-V-4/img/logo-tarah.png',
        ]);
        DB::table('settings')->insert([
            'settingName' => 'siteIcon',
            'settingTextName' => 'آیکون سایت',
            'value' => 'http://tarahsite.net/wp-content/themes/tarahsite-V-4/img/logo-tarah.png',
        ]);
        DB::table('settings')->insert([
            'settingName' => 'phoneNumber',
            'settingTextName' => 'شماره موبایل',
            'value' => '9372088771',
        ]);
        DB::table('settings')->insert([
            'settingName' => 'address',
            'settingTextName' => 'آدرس ',
            'value' => 'اصفهان',
        ]);
        DB::table('settings')->insert([
            'settingName' => 'linkTelegram',
            'settingTextName' => 'لینک تلگرام',
            'value' => 'https://t.me/tarahsitenet',
        ]);
        DB::table('settings')->insert([
            'settingName' => 'linkWhatsapp',
            'settingTextName' => 'لینک واتساپ',
            'value' => 'https://wa.me/989372088771',
        ]);
        DB::table('settings')->insert([
            'settingName' => 'linkInstagram',
            'settingTextName' => 'اینستاگرام',
            'value' => 'https://instageram.com/tarahsite_net',
        ]);
        DB::table('settings')->insert([
            'settingName' => 'linkLinkedin',
            'settingTextName' => 'لینکدین',
            'value' => 'https://linkedin.com/company/tarahsite',
        ]);
        DB::table('settings')->insert([
            'settingName' => 'currency',
            'settingTextName' => 'واحد پولی',
            'value' => 'تومان',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
