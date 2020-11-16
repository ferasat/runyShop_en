<?php

namespace App\Http\Controllers;

use App\FileManager;
use App\PicsSlideshow;
use App\SlideShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SlideShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status');
    }
    public function index()
    {
        $slides = Slideshow::all()->sortByDesc('id');
        $titlePage = 'اسلاید ها';
        return view('user.slideshow.indexSlide', compact('slides' , 'titlePage'));
    }

    public function new()
    {
        $editor = true;
        $dropzone = true;
        $titlePage = 'اسلاید جدید';
        $XEditable = true;
        return view('user.slideshow.newSlide', compact('editor', 'dropzone' , 'titlePage', 'XEditable'));
    }

    public function save(Request $request)
    {
        //dd($request->all());
        $mytime = time();
        $user_id = Auth::user()->id;
        $subject = $request->subject;
        $text = $request->text;
        $filename = $subject;

        $newSlide = new Slideshow();
        $newSlide->subject = $subject;
        $newSlide->text = $text;
        $newSlide->save();

        $count = 0;
        $x = true;
        while ($x) {
            $text = 'text_' . $count;
            $fileN = 'file_' . $count;
            $link = 'link_' . $count;
            //$nameF = $request -> $fileN ;
            //dd($fileN);

            if (isset($request -> $fileN)) {

                $file = new FileManager();
                $file->filename = 'picSlide'.$x;
                $file->user_id = $user_id;
                $file->description = $subject;
                $file->save();

                $filename = $file->id.'.'.$request->file($fileN)->getClientOriginalExtension();
                $pathAdress = "uploads/" . date("Y", $mytime) . "/slide/user_" . $user_id;
                $request->file($fileN)->move(public_path($pathAdress), $filename);
                $filePath = $pathAdress . '/' . $filename;

                /*DB::table('file_managers')->insert([
                    'filename' => $subject.$request->$text ,
                    'user_id' => $user_id ,
                    'description' => $request->$text ,
                    'path' =>  $pathAdress . '/' . $filename,
                ]);*/

                $newPicSlid = new PicsSlideshow();
                $newPicSlid->slideshow_id = $newSlide->id;
                $newPicSlid->text = $request->$text;
                $newPicSlid->urlpic = $filePath;
                $newPicSlid->link = $request->$link;
                $newPicSlid->save();



                $count = $count + 1;
            } else {
                $x = false;
            }
        }


        $newSlide->urlpic = $filePath;
        $newSlide->save();

        return redirect('/dashboard/slideshow/edit/' . $newSlide->id);
    }

    public function delete(Slideshow $id)
    {
        $slide_id = $id->id;
        $slide = Slideshow::find($slide_id);
        $slide->delete();
        return back();
    }

    public function edit(Slideshow $id)
    {
        $picsSlide = PicsSlideshow::where('slideshow_id', $id->id)->get();
        $editor = true;
        $dropzone = true;
        $titlePage = 'ویرایش اسلاید';
        $XEditable = true;

        return view('user.slideshow.editSlide', compact('id', 'picsSlide' , 'editor' , 'dropzone', 'titlePage','XEditable'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $user_id = Auth::id();
        $mytime = time();
        $slideShow_id = $request->slideShow_id;
        $subject = $request-> subject ;

        $count = 0;
        $x = true;
        while ($x) {
            $text = 'text_' . $count;
            $fileN = 'file_' . $count;
            $link = 'link_' . $count;

            if (isset($request->$fileN)) {
                $file = new FileManager();
                $file->filename = $x;
                $file->user_id = $user_id;
                $file->description = $subject;
                $file->save();

                $filename = $file->id . '.' . $request->file($fileN)->getClientOriginalExtension();
                $pathAdress = "uploads/" . date("Y", $mytime) . "/slide/user_" . $user_id;
                $request->file($fileN)->move(public_path($pathAdress), $filename);
                $file->path = $pathAdress . '/' . $filename;

                $newPicSlid = new PicsSlideshow();
                $newPicSlid->slideshow_id = $slideShow_id;
                $newPicSlid->text = $request->$text;
                $newPicSlid->urlpic = $file->path;
                $newPicSlid->link = $request->$link;
                $newPicSlid->save();

                $file->save();

                $count = $count + 1;
            } else {
                $x = false;
            }

        }

        return redirect('dashboard/slideshow/edit/'.$slideShow_id);
    }

    public function removePicSlide()
    {
        $pic_id = $_REQUEST['pic_id'];
        $picSlide = PicsSlideshow::find($pic_id);
        $slideShow_id = $picSlide -> slideshow_id;
        /*return $slideShow_id ;
        dd($slideShow_id);*/
        $picSlide->delete();

        $result = '';
        $picSlides = PicsSlideshow::where('slideshow_id', $slideShow_id)->get();
        foreach ($picSlides as $slid) {
            $result = '
            <div class="boxPicSlid" id="boxPicSlid">
                                    <img src="' . asset($slid->urlpic) . '" alt="">
                                    <input type="text" value="' . $slid->text . '" class="form-control">
                                    <a onclick="removePicOfSlide(' . $slid->id . ')" class="removeBtn" name="remove">حذف</a>
                                </div>
            ';
        }
        return $result;
    }
}
