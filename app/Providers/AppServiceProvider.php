<?php

namespace App\Providers;

use App\CategoryProduct;
use App\Post;
use App\Product;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Schema::defaultStringLength(191);

            $allCatsProducts = CategoryProduct::where('statusPublish' , 'publish')->get()->sortByDesc('id');
            $allPosts = Post::where('statusPublish' , 'publish')->get()->sortByDesc('id')->take('6');
            $recentProducts = Product::where('statusPublish' , 'publish')->get()->sortByDesc('id')->take('6');
            $settings = Setting::all();
            $settingName = [];
            foreach ($settings as $setting){
                if ($setting -> settingName == 'siteUrl'){
                    $siteUrl = $setting -> value ;
                }elseif ($setting -> settingName == 'siteName'){
                    $siteName = $setting -> value ;
                }elseif ($setting -> settingName == 'siteDescription'){
                    $siteDescription = $setting -> value ;
                }elseif ($setting -> settingName == 'adminEmail'){
                    $adminEmail = $setting -> value ;
                }elseif ($setting -> settingName == 'siteLogo'){
                    $siteLogo = $setting -> value ;
                }elseif ($setting -> settingName == 'siteIcon'){
                    $siteIcon = $setting -> value ;
                }elseif ($setting -> settingName == 'phoneNumber'){
                    $phoneNumber = $setting -> value ;
                }elseif ($setting -> settingName == 'linkLinkedin'){
                    $linkLinkedin = $setting -> value ;
                }elseif ($setting -> settingName == 'linkInstagram'){
                    $linkInstagram = $setting -> value ;
                }elseif ($setting -> settingName == 'linkWhatsapp'){
                    $linkWhatsapp = $setting -> value ;
                }elseif ($setting -> settingName == 'linkTelegram'){
                    $linkTelegram = $setting -> value ;
                }elseif ($setting -> settingName == 'address'){
                    $address = $setting -> value ;
                }
            }
            $settingName = [
                'siteIcon'=> $siteIcon ,
                'siteLogo'=> $siteLogo ,
                'adminEmail'=> $adminEmail ,
                'siteName'=> $siteName ,
                'siteDescription'=> $siteDescription,
                'siteUrl'=> $siteUrl ,
                'phoneNumber'=> $phoneNumber,
                'address'=> $address,
                'linkWhatsapp'=> $linkWhatsapp,
                'linkLinkedin'=> $linkLinkedin,
                'linkTelegram'=> $linkTelegram,
                'linkInstagram'=> $linkInstagram
            ];
            View::share([
                'allCatsProducts' => $allCatsProducts ,
                'allPosts' => $allPosts ,
                'recentProducts' => $recentProducts,
                'settings' => $settingName ,
            ]);


    }
}
