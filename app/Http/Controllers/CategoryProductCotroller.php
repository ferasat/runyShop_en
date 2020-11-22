<?php

namespace App\Http\Controllers;

use App\CategoryPost;
use App\CategoryProduct;
use App\FileManager;
use App\Metas;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryProductCotroller extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $titlePage = 'دستبندی های محصولات';
        $allCategory = CategoryProduct::all();
        $editor = true;
        return view('user.product.category.index', compact('allCategory', 'titlePage', 'editor'));
    }

    public function save(Request $request)
    {
        $name = $request->name;
        $user_id = Auth::user()->id;
        $mytime = time();
        //dd($request->picture);
        if (isset($request->slug)) {
            $cats = CategoryProduct::all();
            foreach ($cats as $cat) {
                if ($request->slug == $cat->slug) {
                    $slug = $request->slug . '-2';
                } else {
                    $slug = $request->slug;
                }
            }
        } else {
            $cats = CategoryProduct::all();
            foreach ($cats as $cat) {
                if ($request->name == $cat->slug) {
                    $slug = $request->name . '-2';
                } else {
                    $slug = $request->name;
                }
            }

        }

        if ($request->picture !== null) {
            $file = new FileManager();
            $file->filename = $request->name;
            $file->user_id = $user_id;
            $file->description = $request->name;
            $file->save();
            $filename = $request->uniqid . $file->id . '.' . $request->file('picture')->getClientOriginalExtension();
            $pathAdress = "uploads/cats/" . date("Y", $mytime) . "/picture/user_" . $user_id;
            $request->file('picture')->move(public_path($pathAdress), $filename);
            $file->path = $pathAdress . '/' . $filename;
            $path_pictour = $pathAdress . '/' . $filename;
            $file->save();

            $picture = $path_pictour;
        } else {
            $picture = null;
        }

        $description = $request->description;

        $Inherited = $request->Inherited;

        if ($Inherited == 'masterCat') {
            $statusMaster = 'yes';
        } else {
            $statusMaster = 'no';

        }

        $recat = new CategoryProduct();
        $recat->name = $name;
        $recat->picture = $picture;
        $recat->slug = $slug;
        $recat->description = $description;
        $recat->statusMaster = $statusMaster;
        $recat->Inherited = $Inherited;
        $recat->save();

        return back();
    }

    public function delete(CategoryProduct $id)
    {
        $delCat = CategoryProduct::find($id->id);
        $delCat->delete();
        return back();
    }

    public function edit(CategoryProduct $id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $titlePage = 'دستبندی های محصولات';
        $allCategory = CategoryProduct::all();
        $editor = true;
        return view('user.product.category.editCatPro', compact('allCategory', 'titlePage', 'editor', 'id'));
    }

    public function updateCat(Request $request)
    {
        //dd($request);
        $name = $request->name;
        $user_id = Auth::user()->id;
        $mytime = time();
        $recat = CategoryProduct::find($request->id);
        if (isset($request->slug)) {
            $cats = CategoryProduct::all();
            foreach ($cats as $cat) {
                if ($request->slug == $cat->slug) {
                    $slug = $request->slug . '-2';
                } else {
                    $slug = $request->slug;
                }
            }

        } else {
            $slug = $request->name;
        }

        $Inherited = $request->Inherited;

        if ($request->picture !== null) {
            $file = new FileManager();
            $file->filename = $request->name;
            $file->user_id = $user_id;
            $file->description = $request->name;
            $file->save();
            $filename = $request->uniqid . $file->id . '.' . $request->file('picture')->getClientOriginalExtension();
            $pathAdress = "uploads/cats/" . date("Y", $mytime) . "/picture/user_" . $user_id;
            $request->file('picture')->move(public_path($pathAdress), $filename);
            $file->path = $pathAdress . '/' . $filename;
            $path_picture = $pathAdress . '/' . $filename;
            $file->save();

            $picture = $path_picture;
            $recat->picture = $picture;
        }

        if ($Inherited == 'masterCat') {
            $statusMaster = 'yes';
        } else {
            $statusMaster = 'no';

        }


        $recat->name = $name;
        $recat->slug = $slug;
        $recat->description = $request->description;
        $recat->statusMaster = $statusMaster;
        $recat->Inherited = $Inherited;
        $recat->save();

        return back();
    }

    public function show(CategoryProduct $categoryProduct)
    {
        return $categoryProduct;
    }

    public function showSlug($slug)
    {
        dd($slug);

    }

    public function showId()
    {
        $cat_id = $_REQUEST['id'];
        $id = CategoryProduct::where('id', $cat_id)->first();
        $products = Product::where('category', $cat_id)->get()->sortByDesc('id');
        $subCats = CategoryProduct::where('Inherited', $id->id)->get();

        $allProductsInCatBox = '';
        $subCatsBox = '';
        foreach ($subCats as $subCat) {
            $prosInCat = Product::where('category', $subCat->id)->get();
            $productsInCatBox = '';

            $x = 0;

            foreach ($prosInCat as $proInCat) {
                $productsInCatBox = $productsInCatBox . '
                            <a href="'.asset('/product/'.$proInCat->slug).'" data-toggle="tooltip" data-placement="top" 
                                        title="'.$proInCat->name.'">
                                <img src="'.$proInCat->picture.'" alt="'.$proInCat->name.'" class="productInCatPage">
                            </a>
                            ';

                $x = $x + 1 ;
                $allProductsInCatBox = $allProductsInCatBox.'
                <div class="col mb-4">
                    <div class="card">
                        <img src="'.asset($proInCat->picture).'" class="card-img-top" alt="'.$proInCat->name.'">
                        <div class="card-body">
                            <h5 class="card-title">'.$proInCat->name.'</h5>
                            
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">'.$proInCat->created_at.'</small>
                        </div>
                    </div>
                </div>
                ';
            }

            $subCatsBox = $subCatsBox . '
            <div class="col mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">'.$subCat->name.'</h5>
                            <div class="card-text">
                                '.$subCat->description.'
                            </div>
                        </div>
                        <div class="card-footer proBox'.$proInCat->id.'">
                            <small class="text-muted">'.$x.' colours</small>
                            '.$productsInCatBox.'
                        </div>
                    </div>
            </div>
            ';
        }
        //dd($allProductsInCatBox);
        return view('customer.stone-en.products.archiveProduct', compact('id', 'products' , 'subCatsBox'
            , 'productsInCatBox' , 'allProductsInCatBox'));
    }
}
