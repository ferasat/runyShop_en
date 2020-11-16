<?php

namespace App\Http\Controllers;

use App\Filemanager;
use App\Page;
use App\Post;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function home()
    {
        $spPosts = Post::where('specialPin' , 1)->get()->sortByDesc('id')->take('4');
        $recentPosts = Post::get()->sortByDesc('id')->take('4');
        //dd($recentPosts);

        return view('customer.runyblog.home', compact('spPosts' ,'recentPosts'));
    }

    public function index()
    {
        $allPages = Page::all()->sortByDesc('id');
        $titlePage = 'همه برگه ها';
        return view('user.page.index' , compact('allPages' , 'titlePage'));
    }

    public function newPage()
    {
        $editor = true;
        $dropzone = true;
        $titlePage = 'برگه جدید';
        return view('user.page.newpage', compact('editor', 'dropzone' , 'titlePage'));
    }

    public function save(Request $request)
    {
        $user_id = Auth::user()->id;
        $mytime = time();

        $allpages = Page::all();

        if (isset($request -> slug)){
            $arrySlug = explode(" ",$request -> slug);
            $slug = implode("-" , $arrySlug);
            foreach ($allpages as $post){
                if ($post -> slug == $slug ){
                    $slug = $slug.'-2';
                }
            }
        }else {
            $arrySlug = explode(" ",$request->name);
            $slug = implode("-" , $arrySlug);
            foreach ($allpages as $post){
                if ($post -> slug == $slug ){
                    $slug = $slug.'-2';
                }
            }
        }

        $newPage = new Page();
        $newPage -> name = $request -> name ;
        $newPage -> slug = $slug ;
        $newPage -> user_id = $user_id ;
        $newPage -> texts = $request -> texts ;
        $newPage -> titleSeo = $request -> titleSeo ;
        $newPage -> metaDescription = $request -> metaDescription ;
        $newPage -> focusKeyword = $request -> focusKeyword ;
        $newPage -> statusPublish = $request -> statusPublish ;

        if ($request->picture !== null) {
            $file = new FileManager();
            $file->filename = $request->name;
            $file->user_id = $user_id;
            $file->description = $request->metaDescription;
            $file->save();
            $filename = $request->uniqid . $file->id . '.' . $request->file('picture')->getClientOriginalExtension();
            $pathAdress = "uploads/pages/" . date("Y", $mytime) . "/picture/user_" . $user_id;
            $request->file('picture')->move(public_path($pathAdress), $filename);
            $file->path = $pathAdress . '/' . $filename;
            $path_pictour = $pathAdress . '/' . $filename;
            $file->save();

            $newPage->picture = $path_pictour;
        } else {
            $newPage->picture = 'themes/customer/runy-agency/img/sample.jpg';
        }

        $x = 1;
        for ($x; $x < 4; $x++) {
            if ($request->gallery1 !== null) {
                $file = new FileManager();
                $file->filename = $request->name . '-gallery1';
                $file->user_id = $user_id;
                $file->where_id = $newPage -> id;
                $file->description = $request->metaDescription;
                $file->save();
                $filename = $request->uniqid . '-1-' . $file->id . '.' . $request->file('gallery1')->getClientOriginalExtension();
                $pathAdress = "uploads/" . date("Y", $mytime) . "/picture/user_" . $user_id . "/gallery";
                $request->file('gallery1')->move(public_path($pathAdress), $filename);
                $file->path = $pathAdress . '/' . $filename;
                $path_gallery1 = $pathAdress . '/' . $filename;
                $file->save();

                $gallery[$x] = $path_gallery1;
                $x++;
            }

            if ($request->gallery2 !== null) {
                $file = new FileManager();
                $file->filename = $request->name . '-gallery2';
                $file->user_id = $user_id;
                $file->where_id = $newPage -> id;
                $file->description = $request->metaDescription;
                $file->save();
                $filename = $request->uniqid . '-2-' . $file->id . '.' . $request->file('gallery2')->getClientOriginalExtension();
                $pathAdress = "uploads/" . date("Y", $mytime) . "/picture/user_" . $user_id . "/gallery";
                $request->file('gallery2')->move(public_path($pathAdress), $filename);
                $file->path = $pathAdress . '/' . $filename;
                $path_gallery2 = $pathAdress . '/' . $filename;
                $file->save();

                $gallery[$x] = $path_gallery2;
                $x++;
            }

            if ($request->gallery3 !== null) {
                $file = new FileManager();
                $file->filename = $request->name . '-gallery3';
                $file->user_id = $user_id;
                $file->where_id = $newPage -> id;
                $file->description = $request->metaDescription;
                $file->save();
                $filename = $request->uniqid . '-3-' . $file->id . '.' . $request->file('gallery3')->getClientOriginalExtension();
                $pathAdress = "uploads/" . date("Y", $mytime) . "/picture/user_" . $user_id . "/gallery";
                $request->file('gallery3')->move(public_path($pathAdress), $filename);
                $file->path = $pathAdress . '/' . $filename;
                $path_gallery3 = $pathAdress . '/' . $filename;
                $file->save();

                $gallery[$x] = $path_gallery3;
                $x++;
            }

        } // End Gallery

        if ($request->gallery1 !== null) {
            $gallerys = serialize($gallery);
            $newPage -> gallery = $gallerys ;
        }

        $newPage -> save();



        Session::flash('success', 'برگه ذخیره شد');

        return redirect('/dashboard/pages/edit/' . $newPage->id);

    }

    public function edit(Page $id)
    {
        $titlePage = 'ویرایش برگه';
        $editor = true;
        $dropzone = true;
        return view('user.page.editpage' , compact('titlePage' , 'id' ,  'editor' , 'dropzone'));
    }

    public function delete(Page $id)
    {
        $delPge = Page::find($id -> id);
        $delPge -> delete();
        return redirect(route('indexPage'));
    }

    public function copy(Post $id)
    {
        $user_id = Auth::user()->id;
        $mytime = time();

        $newPage = new Post();
        $newPage -> name = $id -> name ;
        $newPage -> slug = $id -> slug.'-2' ;
        $newPage -> user_id = $user_id ;
        $newPage -> texts = $id -> texts ;
        $newPage -> category_id = $id -> category_id ;
        $newPage -> titleSeo = $id -> titleSeo ;
        $newPage -> metaDescription = $id -> metaDescription ;
        $newPage -> focusKeyword = $id -> focusKeyword ;
        $newPage -> statusPublish = 'پیش نویس' ;
        $newPage -> picture = $id -> picture ;
        $newPage -> save() ;


        Session::flash('success', 'نوشته رونوشت شد');

        return redirect('/dashboard/pages/edit/' . $newPage->id);
    }

    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $mytime = time();
        $post_id = $request -> id ;

        if ($request -> slug == null){
            $sulugArray = explode(' ',$request -> name);
            $slug = implode('-',$sulugArray);
        }else{
            $sulugArray = explode(' ',$request -> slug);
            $slug = implode('-',$sulugArray);
        }

        $newPage = Page::find($post_id);
        $newPage -> name = $request -> name ;
        $newPage -> slug = $slug ;
        $newPage -> texts = $request -> texts ;
        $newPage -> titleSeo = $request -> titleSeo ;
        $newPage -> metaDescription = $request -> metaDescription ;
        $newPage -> focusKeyword = $request -> focusKeyword ;
        $newPage -> statusPublish = $request -> statusPublish ;

        if ($request->picture !== null) {
            $file = new FileManager();
            $file->filename = $request->name;
            $file->user_id = $user_id;
            $file->description = $request->metaDescription;
            $file->save();
            $filename = $request->uniqid . $file->id . '.' . $request->file('picture')->getClientOriginalExtension();
            $pathAdress = "uploads/posts/" . date("Y", $mytime) . "/picture/user_" . $user_id;
            $request->file('picture')->move(public_path($pathAdress), $filename);
            $file->path = $pathAdress . '/' . $filename;
            $path_pictour = $pathAdress . '/' . $filename;
            $file->save();

            $newPage->picture = $path_pictour;
        }

        $x = 1;
        for ($x; $x < 4; $x++) {
            if ($request->gallery1 !== null) {
                $file = new FileManager();
                $file->filename = $request->name . '-gallery1';
                $file->user_id = $user_id;
                $file->where_id = $newPage -> id;
                $file->description = $request->metaDescription;
                $file->save();
                $filename = $request->uniqid . '-1-' . $file->id . '.' . $request->file('gallery1')->getClientOriginalExtension();
                $pathAdress = "uploads/" . date("Y", $mytime) . "/picture/user_" . $user_id . "/gallery";
                $request->file('gallery1')->move(public_path($pathAdress), $filename);
                $file->path = $pathAdress . '/' . $filename;
                $path_gallery1 = $pathAdress . '/' . $filename;
                $file->save();

                $gallery[$x] = $path_gallery1;
                $x++;
            }

            if ($request->gallery2 !== null) {
                $file = new FileManager();
                $file->filename = $request->name . '-gallery2';
                $file->user_id = $user_id;
                $file->where_id = $newPage -> id;
                $file->description = $request->metaDescription;
                $file->save();
                $filename = $request->uniqid . '-2-' . $file->id . '.' . $request->file('gallery2')->getClientOriginalExtension();
                $pathAdress = "uploads/" . date("Y", $mytime) . "/picture/user_" . $user_id . "/gallery";
                $request->file('gallery2')->move(public_path($pathAdress), $filename);
                $file->path = $pathAdress . '/' . $filename;
                $path_gallery2 = $pathAdress . '/' . $filename;
                $file->save();

                $gallery[$x] = $path_gallery2;
                $x++;
            }

            if ($request->gallery3 !== null) {
                $file = new FileManager();
                $file->filename = $request->name . '-gallery3';
                $file->user_id = $user_id;
                $file->where_id = $newPage -> id;
                $file->description = $request->metaDescription;
                $file->save();
                $filename = $request->uniqid . '-3-' . $file->id . '.' . $request->file('gallery3')->getClientOriginalExtension();
                $pathAdress = "uploads/" . date("Y", $mytime) . "/picture/user_" . $user_id . "/gallery";
                $request->file('gallery3')->move(public_path($pathAdress), $filename);
                $file->path = $pathAdress . '/' . $filename;
                $path_gallery3 = $pathAdress . '/' . $filename;
                $file->save();

                $gallery[$x] = $path_gallery3;
                $x++;
            }

        } // End Gallery

        if ($request->gallery1 !== null) {
            $gallerys = serialize($gallery);
            $newPage -> gallery = $gallerys ;
        }

        $newPage -> save();


        Session::flash('success', 'نوشته ثبت شد');

        return redirect('/dashboard/pages/edit/' . $newPage->id);
    }


    /// Page For Customer

    public function homePage(){
        $spPosts = Post::where('specialPin' , 1)->get()->sortByDesc('id')->take('4');
        $recentPosts = Post::where('statusPublish' , 'publish')->get()->sortByDesc('id')->take('6');
        $homePage = true ;
        $myHomeSett = Setting::where('type' , 'HomePage')->get();
        foreach ($myHomeSett as $setting){
            if ($setting -> settingName == 'postsSlide'){
                $postsSlideId = $setting -> value ; // پست های اسلایدی
            }elseif ($setting -> settingName == 'videoHome'){
                $videoHome = $setting -> value ; // ویدئو
            }elseif ($setting -> settingName == 'catIdPosts'){
                $catIdPosts = $setting -> value ; // تازه ها
            }elseif ($setting -> settingName == 'homePageSlide2'){
                $homePageSlide2 = $setting -> value ; // تصویر دوم اسلایدشو
            }elseif ($setting -> settingName == 'homePageSlide1'){
                $homePageSlide1 = $setting -> value ; // تصویر اول اسلایدشو
            }
        }

        //dd(Post::where('category_id' , $catIdPosts ) -> get());
        if(Post::where('category_id' , $catIdPosts ) -> get()){
            $catPosts = Post::where('category_id' , $postsSlideId)->get() ;
        }

        //dd($postsSlideId);


        return view('customer.personal-y.home', compact('spPosts' ,'recentPosts' , 'homePage' , 'myHomeSett' ,'postsSlideId'
            , 'videoHome', 'catIdPosts' , 'homePageSlide1', 'homePageSlide2' , 'catPosts'));
    }

    public function showId()
    {
        $page_id = $_REQUEST['id'];
        $id = Page::where('id',$page_id)->first();
        return view('customer.personal-y.page.showPage' , compact('id'));
    }

    public function showSlug(Page $page)
    {
        $id = $page;
        return view('customer.personal-y.page.showPage' , compact('id'));
    }

}
