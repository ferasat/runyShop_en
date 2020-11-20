<?php

namespace App\Http\Controllers;

use App\CategoryPost;
use App\FileManager;
use App\Metas;
use App\Post;
use App\TagProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function index()
    {
        $allPosts = Post::all()->sortByDesc('id');
        $titlePage = 'همه پست ها';
        return view('user.post.index' , compact('allPosts' , 'titlePage'));
    }

    public function new()
    {
        $categoris = CategoryPost::all();
        $editor = true;
        $dropzone = true;
        $titlePage = 'نوشته جدید';
        return view('user.post.newpost', compact('categoris', 'editor', 'dropzone' , 'titlePage'));
    }

    public function save(Request $request)
    {
        $user_id = Auth::user()->id;
        $mytime = time();

        $allposts = Post::all();

        if (isset($request -> slug)){
            $arrySlug = explode(" ",$request -> slug);
            $slug = implode("-" , $arrySlug);
            foreach ($allposts as $post){
                if ($post -> slug == $slug ){
                    $slug = $slug.'-2';
                }
            }
        }else {
            $arrySlug = explode(" ",$request->name);
            $slug = implode("-" , $arrySlug);
        }

        $newPost = new Post();
        $newPost -> name = $request -> name ;
        $newPost -> slug = $slug ;
        $newPost -> user_id = $user_id ;
        $newPost -> texts = $request -> texts ;
        $newPost -> category_id = $request -> category_id ;
        $newPost -> titleSeo = $request -> titleSeo ;
        $newPost -> metaDescription = $request -> metaDescription ;
        $newPost -> focusKeyword = $request -> focusKeyword ;
        $newPost -> statusPublish = $request -> statusPublish ;

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

            $newPost->picture = $path_pictour;
        } else {
            $newPost->picture = null;
        }

        $x = 1;
        for ($x; $x < 4; $x++) {
            if ($request->gallery1 !== null) {
                $file = new FileManager();
                $file->filename = $request->name . '-gallery1';
                $file->user_id = $user_id;
                $file->where_id = $newPost -> id;
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
                $file->where_id = $newPost -> id;
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
                $file->where_id = $newPost -> id;
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
            $newPost -> gallery = $gallerys ;
        }

        $newPost -> save();

        /*if (isset($request->tag)) {
            $tags = explode('/', $request->tag);
            foreach ($tags as $tag) {
                $is_Tag = DB::table('tag_products')->where('name', $tag)->first();
                var_dump($is_Tag);
                if ($is_Tag == null) {
                    $tagArray = explode(' ', $tag);
                    $slugTag = implode('-' , $tagArray );

                    $newTag = new TagProduct();
                    $newTag-> name = $tag;
                    $newTag-> statusPublish = 'انتشار';
                    $newTag-> slug = $slugTag;
                    $newTag-> save();

                    $newMeta = new Metas();
                    $newMeta -> item = 'product';
                    $newMeta -> item_id = $newPost -> id ;
                    $newMeta -> key = 'tag';
                    $newMeta -> value = $tag ;
                }else {
                    $newMeta = new Metas();
                    $newMeta -> item = 'product';
                    $newMeta -> item_id = $newPost -> id ;
                    $newMeta -> key = 'tag';
                    $newMeta -> value = $tag ;
                }
            }
        }*/
        if ( isset($request -> category) ){
            $newMeta = new Metas();
            $newMeta -> item = 'post';
            $newMeta -> item_id = $newPost -> id ;
            $newMeta -> key = 'cat';
            $newMeta -> value =  $request -> category ; // ایدی دستبندی را وارد می کند
            $newMeta -> url =  '/cat-post?id='.$request -> category ;
            $newMeta -> save();

        }

        Session::flash('success', 'نوشته ثبت شد');

        return redirect('/dashboard/posts/edit/' . $newPost->id);

    }

    public function edit(Post $id)
    {
        $titlePage = 'ویرایش نوشته';
        $categoris = CategoryPost::all();
        $editor = true;
        $dropzone = true;
        return view('user.post.editpost' , compact('titlePage' , 'id' , 'categoris' , 'editor' , 'dropzone'));
    }

    public function delete(Post $id)
    {
        $delPost = Post::find($id -> id);
        $delPost -> delete();
        return redirect(route('indexPost'));
    }

    public function copy(Post $id)
    {
        $user_id = Auth::user()->id;
        $mytime = time();

        $newPost = new Post();
        $newPost -> name = $id -> name ;

        $newPost -> slug = $id -> slug.'-2' ;
        $newPost -> user_id = $user_id ;
        $newPost -> texts = $id -> texts ;
        $newPost -> category_id = $id -> category_id ;
        $newPost -> titleSeo = $id -> titleSeo ;
        $newPost -> metaDescription = $id -> metaDescription ;
        $newPost -> focusKeyword = $id -> focusKeyword ;
        $newPost -> statusPublish = $id -> statusPublish ;
        $newPost -> statusPublish = $id -> picture ;
        $newPost -> save() ;


        Session::flash('success', 'نوشته رونوشت شد');

        return redirect('/dashboard/posts/edit/' . $newPost->id);
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

        $newPost = Post::find($post_id);
        $newPost -> name = $request -> name ;
        $newPost -> slug = $slug ;
        $newPost -> texts = $request -> texts ;
        $newPost -> category_id = $request -> category_id ;
        $newPost -> titleSeo = $request -> titleSeo ;
        $newPost -> metaDescription = $request -> metaDescription ;
        $newPost -> focusKeyword = $request -> focusKeyword ;
        $newPost -> statusPublish = $request -> statusPublish ;

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

            $newPost->picture = $path_pictour;
        }

        $x = 1;
        for ($x; $x < 4; $x++) {
            if ($request->gallery1 !== null) {
                $file = new FileManager();
                $file->filename = $request->name . '-gallery1';
                $file->user_id = $user_id;
                $file->where_id = $newPost -> id;
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
                $file->where_id = $newPost -> id;
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
                $file->where_id = $newPost -> id;
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
            $newPost -> gallery = $gallerys ;
        }

        $newPost -> save();

        /*if (isset($request->tag)) {
            $tags = explode('/', $request->tag);
            foreach ($tags as $tag) {
                $is_Tag = DB::table('tag_products')->where('name', $tag)->first();

                if ($is_Tag == null) {
                    $newTag = new TagProduct();
                    $newTag-> name = $tag;
                    $newTag-> statusPublish = 'انتشار';
                    $newTag-> slug = $tag;
                    $newTag-> save();

                    $newMeta = new Metas();
                    $newMeta -> item = 'product';
                    $newMeta -> item_id = $newPost -> id ;
                    $newMeta -> key = 'tag';
                    $newMeta -> value = $tag ;
                }else {
                    $newMeta = new Metas();
                    $newMeta -> item = 'product';
                    $newMeta -> item_id = $newPost -> id ;
                    $newMeta -> key = 'tag';
                    $newMeta -> value = $tag ;
                }
            }
        }*/
        if ( isset($request -> category) ){
            $newMeta = new Metas();
            $newMeta -> item = 'post';
            $newMeta -> item_id = $newPost -> id ;
            $newMeta -> key = 'cat';
            $newMeta -> value =  $request -> category ; // ایدی دستبندی را وارد می کند
            $newMeta -> url =  '/cat/post/i/'.$request -> category ;
            $newMeta -> save();

        }

        Session::flash('success', 'نوشته ثبت شد');

        return redirect('/dashboard/posts/edit/' . $newPost->id);
    }

    public function category()
    {
        $allCategory = CategoryPost::all();
        $titlePage = 'دستبندی نوشته ها';
        return view('user.post.category.indexcatpost' , compact('allCategory' , 'titlePage'));
    }

    public function saveCat(Request $request)
    {
        $name = $request -> name ;
        if (isset($request -> slug)){
            $slug = $request ->slug ;
        }else {
            $slug = $request -> name ;
        }
        $description = $request -> description ;
        $picture = $request -> picture ;
        $Inherited = $request -> Inherited ;

        if ($Inherited == 'masterCat'){
            $statusMaster = 'yes';
        }else{
            $statusMaster = 'no';

        }
        $recat = new CategoryPost();
        $recat -> name = $name ;
        $recat -> picture = $picture ;
        $recat -> slug = $slug ;
        $recat -> description = $description ;
        $recat -> statusMaster = $statusMaster ;
        $recat -> Inherited = $Inherited ;
        $recat -> save();

        return back();
    }

    public function delCat(CategoryPost $id)
    {
        $delCat = CategoryPost::find($id -> id);
        $delCat -> delete();
        return back();
    }

    public function editCat()
    {

    }

    /// Post For Customer
    public function blog()
    {
        $allPosts = Post::all()->sortByDesc('id');
        return view('customer.stone-en.post.blog' , compact('allPosts'));
    }

    public function showId()
    {
        $post_id = $_REQUEST['id'];
        $id = Post::where('id',$post_id)->first();
        return view('customer.stone-en.post.showPost' , compact('id'));
    }

    public function showSlug(Post $post)
    {
        $id = $post;
        return view('customer.stone-en.post.showPost' , compact('id'));
    }

    public function showCat()
    {
        $cat_id = $_REQUEST['id'];
        $id = CategoryPost::where('id' , $cat_id)->first();
        $posts = Post::where('category_id' , $cat_id ) -> get();

        return view('customer.stone-en.post.archivePost' , compact('id' , 'posts'));

    }

}
