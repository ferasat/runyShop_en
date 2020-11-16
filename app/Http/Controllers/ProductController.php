<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\FileManager;
use App\Metas;
use App\Product;
use App\TagProduct;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status');
    }
    public function index()
    {
        $allProducts = Product::all()->sortByDesc('id');
        $dataTables = true;
        $alertify = true;
        $titlePage = 'همه محصولات';
        return view('user.product.index', compact('allProducts', 'dataTables', 'alertify' , 'titlePage'));
    }

    public function new()
    {
        $categoris = CategoryProduct::all();
        $editor = true;
        $dropzone = true;
        $titlePage = 'محصول جدید';
        return view('user.product.newproduct', compact('categoris', 'editor', 'dropzone' , 'titlePage'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $mytime = time();
        if (isset($request->titleSeo)) {
            $titleSeo = $request->titleSeo;
        } else {
            $titleSeo = $request->name;
        }
        if ($request->numStock == null) {
            $numStock = 10;
        } else {
            $numStock = $request->numStock;
        }

        if (isset($request -> slug)){
            $arrySlug = explode(" ",$request -> slug);
            $slug = implode("-" , $arrySlug);

        }else {
            $arrySlug = explode(" ",$request->name);
            $slug = implode("-" , $arrySlug);
        }


        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->customShow = $request->customShow;
        $newProduct->slug = $slug;
        $newProduct->user_id = $user_id;
        $newProduct->short = $request->short;
        $newProduct->description = $request->description;
        $newProduct->picture = $request->picture;
        $newProduct->purchasePrice = $request->purchasePrice;
        $newProduct->price = $request->price;
        $newProduct->salesPrice = $request->salesPrice;
        $newProduct->sku = $request->sku;
        $newProduct->statusStock = $request->statusStock;
        $newProduct->numStock = $numStock;
        $newProduct->realNumStock = $request->realNumStock;
        $newProduct->lowStockAmount = $request->lowStockAmount;
        $newProduct->weight = $request->weight;
        $newProduct->length = $request->length;
        $newProduct->width = $request->width;
        $newProduct->height = $request->height;
        $newProduct->source = $request->source;
        $newProduct->category = $request->category;
        $newProduct->tag = $request->tag;
        $newProduct->statusPublish = $request->statusPublish;
        $newProduct->focusKeyword = $request->focusKeyword;
        $newProduct->titleSeo = $titleSeo;
        $newProduct->metaDescription = $request->metaDescription;
        $newProduct->statusComment = $request->statusComment;

        if ($request->picture !== null) {
            $file = new FileManager();
            $file->filename = $request->name;
            $file->user_id = $user_id;
            $file->description = $request->metaDescription;
            $file->save();
            $filename = $request->uniqid . $file->id . '.' . $request->file('picture')->getClientOriginalExtension();
            $pathAdress = "uploads/" . date("Y", $mytime) . "/picture/user_" . $user_id;
            $request->file('picture')->move(public_path($pathAdress), $filename);
            $file->path = $pathAdress . '/' . $filename;
            $path_pictour = $pathAdress . '/' . $filename;
            $file->save();

            $newProduct->picture = $path_pictour;
        } else {
            $newProduct->picture = null;
        }
        $newProduct->save();

        $x = 1;
        for ($x; $x < 4; $x++) {
            if ($request->gallery1 !== null) {
                $file = new FileManager();
                $file->filename = $request->name . '-gallery1';
                $file->user_id = $user_id;
                $file->where_id = $newProduct -> id;
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
                $file->where_id = $newProduct -> id;
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
                $file->where_id = $newProduct -> id;
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
            $newProduct -> gallery = $gallerys ;
        }

        $newProduct -> save() ;

        if (isset($request->tag)) {
            $tags = explode('/', $request->tag);
            foreach ($tags as $tag) {
                $is_Tag = DB::table('tag_products')->where('name', $tag)->first();
                var_dump($is_Tag);
                if ($is_Tag == null) {
                    $arryTag = explode(" ",$tag);
                    $slugTag = implode("-" , $arryTag);

                    $newTag = new TagProduct();
                    $newTag-> name = $tag;
                    $newTag-> statusPublish = 'انتشار';
                    $newTag-> slug = $slugTag;
                    $newTag-> save();

                    $newMeta = new Metas();
                    $newMeta -> item = 'product';
                    $newMeta -> item_id = $newProduct -> id ;
                    $newMeta -> key = 'tag';
                    $newMeta -> value = $tag ;
                    $newMeta -> save();
                }else {
                    $newMeta = new Metas();
                    $newMeta -> item = 'product';
                    $newMeta -> item_id = $newProduct -> id ;
                    $newMeta -> key = 'tag';
                    $newMeta -> value = $tag ;
                    $newMeta -> save();
                }
            }
        }
        if ( isset($request -> category) ){
             $newMeta = new Metas();
             $newMeta -> item = 'product';
             $newMeta -> item_id = $newProduct -> id ;
             $newMeta -> key = 'cat';
             $newMeta -> value =  $request -> category ; // ایدی دستبندی را وارد می کند
             $newMeta -> url =  '/cat-product?id='.$request -> category ;
             $newMeta -> save();

         }

        Session::flash('success', 'محصول ثبت شد');

        return redirect('/dashboard/product/edit/' . $newProduct->id);
    }

    public function edit(Product $id)
    {
        $product_id = $id->id;
        $editor = true;
        $dropzone = true;
        $galleryPics = unserialize($id -> gallery) ;

        $titlePage = 'ویرایش محصول '.$id -> name ;
        return view('user.product.editproduct', compact('id', 'titlePage', 'editor', 'dropzone', 'product_id' , 'galleryPics'));
    }

    public function update(Request $request)
    {
        //dd($request);
        $product_id = $request->product_id;
        $galleryPics = $request->galleryPics;
        $user_id = Auth::user()->id;
        $mytime = time();
        if (isset($request->titleSeo)) {
            $titleSeo = $request->titleSeo;
        } else {
            $titleSeo = $request->name;
        }
        if (isset($request->tag)) {
            $tags = explode('/', $request->tag);
            foreach ($tags as $tag) {
                $is_Tag = DB::table('tag_products')->where('name', $tag)->first();

                if ($is_Tag == null) {
                    $tagArray = explode(" ", $tag);
                    $slugTag = implode("-" , $tagArray);

                    $newTag = new TagProduct();
                    $newTag->name = $tag;
                    $newTag->slug = $slugTag;
                    $newTag->save();
                }
            }
        }
        if (isset($request -> slug)){
            $arrySlug = explode(" ",$request -> slug);
            $slug = implode("-" , $arrySlug);

        }else {
            $arrySlug = explode(" ",$request->name);
            $slug = implode("-" , $arrySlug);
        }
        $product = Product::find($product_id);
        $oldGallery = unserialize( $product -> gallery );
        $product->name = $request->name;
        $product->customShow = $request->customShow;
        $product->short = $request->short;
        $product->description = $request->description;
        $product->gallery = $request->gallery;
        $product->purchasePrice = $request->purchasePrice;
        $product->price = $request->price;
        $product->salesPrice = $request->salesPrice;
        $product->sku = $request->sku;
        $product->statusStock = $request->statusStock;
        $product->numStock = $request->numStock;
        $product->realNumStock = $request->realNumStock;
        $product->lowStockAmount = $request->lowStockAmount;
        $product->weight = $request->weight;
        $product->length = $request->length;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->source = $request->source;
        $product->category = $request->category;
        $product->tag = $request->tag;
        $product->statusPublish = $request->statusPublish;
        $product->focusKeyword = $request->focusKeyword;
        $product->titleSeo = $titleSeo;
        $product->slug = $slug;
        $product->metaDescription = $request->metaDescription;
        $product->statusComment = $request->statusComment;
        if ( isset($request->picture)){
            $file = new FileManager();
            $file->filename = $request->name;
            $file->user_id = $user_id;
            $file->description = $request->metaDescription;
            $file->save();
            $filename = $request->uniqid . $file->id . '.' . $request->file('picture')->getClientOriginalExtension();
            $pathAdress = "uploads/" . date("Y", $mytime) . "/picture/user_" . $user_id;
            $request->file('picture')->move(public_path($pathAdress), $filename);
            $file->path = $pathAdress . '/' . $filename;
            $path_picture = $pathAdress . '/' . $filename;
            $file->save();

            $product->picture = $path_picture;
        }else{
            var_dump('No chenge');
        }

        $x = 1;
        for ($x; $x < 4; $x++) {
            if ($request->gallery1 !== null) {
                $file = new FileManager();
                $file->filename = $request->name . '-gallery1';
                $file->user_id = $user_id;
                $file->where_id = $product -> id;
                $file->description = $request->metaDescription;
                $file->save();
                $filename = $request->uniqid . '-1-' . $file->id . '.' . $request->file('gallery1')->getClientOriginalExtension();
                $pathAdress = "uploads/" . date("Y", $mytime) . "/picture/user_" . $user_id . "/gallery";
                $request->file('gallery1')->move(public_path($pathAdress), $filename);
                $file->path = $pathAdress . '/' . $filename;
                $path_gallery1 = $pathAdress . '/' . $filename;
                $file->save();

                $oldGallery[$x] = $path_gallery1;
                $x++;
            }

            if ($request->gallery2 !== null) {
                $file = new FileManager();
                $file->filename = $request->name . '-gallery2';
                $file->user_id = $user_id;
                $file->where_id = $product -> id;
                $file->description = $request->metaDescription;
                $file->save();
                $filename = $request->uniqid . '-2-' . $file->id . '.' . $request->file('gallery2')->getClientOriginalExtension();
                $pathAdress = "uploads/" . date("Y", $mytime) . "/picture/user_" . $user_id . "/gallery";
                $request->file('gallery2')->move(public_path($pathAdress), $filename);
                $file->path = $pathAdress . '/' . $filename;
                $path_gallery2 = $pathAdress . '/' . $filename;
                $file->save();

                $oldGallery[$x] = $path_gallery2;
                $x++;
            }

            if ($request->gallery3 !== null) {
                $file = new FileManager();
                $file->filename = $request->name . '-gallery3';
                $file->user_id = $user_id;
                $file->where_id = $product -> id;
                $file->description = $request->metaDescription;
                $file->save();
                $filename = $request->uniqid . '-3-' . $file->id . '.' . $request->file('gallery3')->getClientOriginalExtension();
                $pathAdress = "uploads/" . date("Y", $mytime) . "/picture/user_" . $user_id . "/gallery";
                $request->file('gallery3')->move(public_path($pathAdress), $filename);
                $file->path = $pathAdress . '/' . $filename;
                $path_gallery3 = $pathAdress . '/' . $filename;
                $file->save();

                $oldGallery[$x] = $path_gallery3;
                $x++;
            }

        } // End Gallery

        $product->gallery = serialize($oldGallery) ;
        $product->save();

        Session::flash('success', 'محصول ثبت شد');

        return redirect('/dashboard/product/edit/' . $product_id);
    }

    public function delete(Product $id)
    {
        $product_id = $id->id;
        $product = Product::find($product_id);
        $product->delete();
        return back();
    }

    public function copy(Product $id)
    {
        $user_id = Auth::user()->id;
        $mytime = time();
        $product_id = $id->id;
        $copyProduct = new Product();
        $copyProduct->name = $id->name;
        $copyProduct->customShow = $id->customShow;
        $copyProduct->user_id = $user_id;
        $copyProduct->short = $id->short;
        $copyProduct->description = $id->description;
        $copyProduct->picture = $id->picture;
        $copyProduct->gallery = $id->gallery;
        $copyProduct->purchasePrice = $id->purchasePrice;
        $copyProduct->price = $id->price;
        $copyProduct->salesPrice = $id->salesPrice;
        $copyProduct->sku = null;
        $copyProduct->statusStock = $id->statusStock;
        $copyProduct->numStock = $id->numStock;
        $copyProduct->realNumStock = $id->realNumStock;
        $copyProduct->lowStockAmount = $id->lowStockAmount;
        $copyProduct->weight = $id->weight;
        $copyProduct->length = $id->length;
        $copyProduct->width = $id->width;
        $copyProduct->height = $id->height;
        $copyProduct->source = $id->source;
        $copyProduct->category = $id->category;
        $copyProduct->tag = $id->tag;
        $copyProduct->statusPublish = 'پیش نویس';
        $copyProduct->focusKeyword = $id->focusKeyword;
        $copyProduct->titleSeo = $id->name;
        $copyProduct->slug = $id->slug.'-copy_2';
        $copyProduct->metaDescription = $id->metaDescription;
        $copyProduct->statusComment = $id->statusComment;
        $copyProduct->picture = $id->picture;
        $copyProduct->save();
        return redirect('/dashboard/product/edit/' . $copyProduct->id);
    }

    public function show(Product $id)
    {
        //dd($id -> id);

        return view('customer.runy.products.show' , compact('id'));
    }

    public function shop()
    {
        $products = Product::all()->sortByDesc('id');
        return view('customer.runy.products.shop' , compact('products'));
    }
    public function showSlug($slug)
    {
        $products = Product::where('slug' , $slug)->first();
        $id = $products ;
        return view('customer.runy.products.show' , compact('id'));
    }
    public function showIdPro()
    {
        $id_product = $_REQUEST['id'];
        $products = Product::where('id' , $id_product)->first();
        $id = $products ;
        return view('customer.runy.products.show' , compact('id'));
    }

}
