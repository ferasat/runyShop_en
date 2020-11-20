<?php

namespace App\Http\Controllers;

use App\PicsSlideshow;
use App\Post;
use App\Product;
use App\ThemeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $allProducts = Product::all()->sortByDesc('id')->take(12);
        $homePage = ThemeSetting::find('1');
        if ($homePage !== null){
            $slide_id = $homePage -> slide_id;
        }else{
            $slide_id = 1 ;
        }

        $picsSlideshow = PicsSlideshow::where('slideshow_id' , $slide_id)->get();
        $countpic = 0 ;
        foreach ($picsSlideshow as $item){
            $countpic = 1 + $countpic ;
        }

/*        //@dd($picsSlideshow);
        $slide_banner1url = $homePage -> banner1url;
        $picsSlideBanner1url = PicsSlideshow::where('slideshow_id' , $slide_banner1url)->get();
        $countpic2 = 0 ;
        foreach ($picsSlideBanner1url as $item){
            $countpic2 = 1 + $countpic2 ;
        }
        //@dd($picsSlideBanner1url);*/
        return view('customer.stone-en.home' , compact('allProducts' , 'picsSlideshow' , 'homePage' , 'countpic' ));
    }

    public function home()
    {
        return view('home');
    }
}
