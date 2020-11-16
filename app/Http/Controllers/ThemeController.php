<?php

namespace App\Http\Controllers;

use App\ThemeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status');
    }

    public function HomePage()
    {
        $titlePage = 'تنظیمات صفحه اول';
        $setting = ThemeSetting::first();
        //dd($setting);
        return view('user.setting.theme.homePageSetting' , compact('titlePage' , 'setting'));
    }

    public function update(Request $request)
    {
        //dd( $request->file('banner1file') );
        //dd($request->all());
        $update = ThemeSetting::find('1');
        $user_id = Auth::id();
        $mytime = time();
        $slide_id = $request -> slide_id;
        $service1url = $request -> service1url;
        $service2url = $request -> service2url;
        $service3url = $request -> service3url;
        $service4url = $request -> service4url;
        $banner1url = $request -> banner1url;
        $banner2url = $request -> banner2url;
        $banner3url = $request -> banner3url;
        $service1 = $request -> service1;
        $service2 = $request -> service2;
        $service3 = $request -> service3;
        $service4 = $request -> service4;
        $banner1 = $request -> banner1;
        $banner2 = $request -> banner2;
        $banner3 = $request -> banner3;

        if (isset($service1)){
            $filename = 'serveic1-'.$request->file('service1')->getClientOriginalExtension();
            $pathAdress = "uploads/" . date("Y", $mytime) . "/setting/user_" . $user_id;
            $request->file('service1')->move(public_path($pathAdress), $filename);
            $filePathService1 = $pathAdress . '/' . $filename;

            DB::table('file_managers')->insert([
                'filename' => 'تنظیمات صفحه' ,
                'user_id' => $user_id ,
                'path' =>  $pathAdress . '/' . $filename,
            ]);

            $update-> service1 = $filePathService1 ;
        }

        if (isset($service2)){
            $filename = 'serveic2-'.$request->file('service2')->getClientOriginalExtension();
            $pathAdress = "uploads/" . date("Y", $mytime) . "/setting/user_" . $user_id;
            $request->file('service2')->move(public_path($pathAdress), $filename);
            $filePathService2 = $pathAdress . '/' . $filename;

            DB::table('file_managers')->insert([
                'filename' => 'تنظیمات صفحه' ,
                'user_id' => $user_id ,
                'path' =>  $pathAdress . '/' . $filename,
            ]);

            $update-> service2 = $filePathService2 ;
        }

        if (isset($service3)){
            $filename = 'serveic3-'.$request->file('service3')->getClientOriginalExtension();
            $pathAdress = "uploads/" . date("Y", $mytime) . "/setting/user_" . $user_id;
            $request->file('service3')->move(public_path($pathAdress), $filename);
            $filePathService3 = $pathAdress . '/' . $filename;

            DB::table('file_managers')->insert([
                'filename' => 'تنظیمات صفحه' ,
                'user_id' => $user_id ,
                'path' =>  $pathAdress . '/' . $filename,
            ]);

            $update-> service3 = $filePathService3 ;
        }

        if (isset($service4)){
            $filename = 'serveic4-'.$request->file('service4')->getClientOriginalExtension();
            $pathAdress = "uploads/" . date("Y", $mytime) . "/setting/user_" . $user_id;
            $request->file('service4')->move(public_path($pathAdress), $filename);
            $filePathService4 = $pathAdress . '/' . $filename;

            DB::table('file_managers')->insert([
                'filename' => 'تنظیمات صفحه' ,
                'user_id' => $user_id ,
                'path' =>  $pathAdress . '/' . $filename,
            ]);

            $update-> service4 = $filePathService4 ;
        }

        if (isset($banner1)){
            $filename = 'banner1-'.$request->file('banner1')->getClientOriginalExtension();
            $pathAdress = "uploads/" . date("Y", $mytime) . "/setting/user_" . $user_id;
            $request->file('banner1')->move(public_path($pathAdress), $filename);
            $banner1path = $pathAdress . '/' . $filename;

            DB::table('file_managers')->insert([
                'filename' => 'تنظیمات صفحه' ,
                'user_id' => $user_id ,
                'path' =>  $pathAdress . '/' . $filename,
            ]);

            $update-> banner1 = $banner1path ;
        }

        if (isset($banner2)){
            $filename = 'banner2-'.$request->file('banner2')->getClientOriginalExtension();
            $pathAdress = "uploads/" . date("Y", $mytime) . "/setting/user_" . $user_id;
            $request->file('banner2')->move(public_path($pathAdress), $filename);
            $banner2path = $pathAdress . '/' . $filename;

            DB::table('file_managers')->insert([
                'filename' => 'تنظیمات صفحه' ,
                'user_id' => $user_id ,
                'path' =>  $pathAdress . '/' . $filename,
            ]);

            $update-> banner2 = $banner2path ;
        }

        if (isset($banner3)){
            $filename = 'banner3-'.$request->file('banner3')->getClientOriginalExtension();
            $pathAdress = "uploads/" . date("Y", $mytime) . "/setting/user_" . $user_id;
            $request->file('banner3')->move(public_path($pathAdress), $filename);
            $banner3path = $pathAdress . '/' . $filename;

            DB::table('file_managers')->insert([
                'filename' => 'تنظیمات صفحه' ,
                'user_id' => $user_id ,
                'path' =>  $pathAdress . '/' . $filename,
            ]);

            $update-> banner3 = $banner3path ;
        }

        $update-> slide_id = $slide_id ;
        $update-> service1url = $service1url ;
        $update-> service2url = $service2url ;
        $update-> service3url = $service3url ;
        $update-> service4url = $service4url ;
        $update-> banner1url = $banner1url ;
        $update-> banner2url = $banner2url ;
        $update-> banner3url = $banner3url ;

        $update->save();

        return back();

    }
}
