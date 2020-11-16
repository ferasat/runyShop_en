<?php

namespace App\Http\Controllers;

use App\FileManager;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // تعیین صفحه اول سایت
    public function HomePage()
    {
        return view('', compact());
    }

    public function index()
    {
        $titlePage = 'تنظیمات عمومی';
        $settings = Setting::all();
        return view('user.setting.publicSetting', compact('titlePage', 'settings'));
    }

    public function publicSave(Request $request)
    {
        $settings = Setting::all();
        //dd($request);
        $user_id = Auth::id();
        $mytime = time();
        $x = 1;
        foreach ($settings as $setting) {
            if (isset($request->$x)) {
                if ($setting->id == $x) {
                    $updateSetting = Setting::find($x);
                    if ($updateSetting->settingName == 'siteLogo' or $updateSetting->settingName == 'siteIcon') {
                        if ($request->$x == !null) {
                            $file = new FileManager();
                            $file->filename = 'logo-';
                            $file->user_id = $user_id;
                            $file->description = 'Logo';
                            $file->save();
                            $filename = 'logo-'.$file->id . '.' . $request->file($x)->getClientOriginalExtension();
                            $pathAdress = "uploads/setting/" . date("Y", $mytime) . "/picture/user_" . $user_id;
                            $request->file($x)->move(public_path($pathAdress), $filename);
                            $file->path = $pathAdress . '/' . $filename;
                            $path_pictour = $pathAdress . '/' . $filename;
                            $file->save();

                            $updateSetting->value = $path_pictour;
                            $updateSetting->save();

                        }
                    }else{
                        $updateSetting->value = $request->$x;
                        $updateSetting->save();
                    }

                }
            }
            $x = $x + 1;
        }
        return back();
    }
}
