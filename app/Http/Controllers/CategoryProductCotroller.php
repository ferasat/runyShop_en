<?php

namespace App\Http\Controllers;

use App\CategoryPost;
use App\CategoryProduct;
use App\Metas;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryProductCotroller extends Controller
{
    public function index()
    {
        if (!Auth::check()){
            return redirect('/login');
        }
        $titlePage = 'دستبندی های محصولات';
        $allCategory = CategoryProduct::all();
        return view('user.product.category.index' , compact('allCategory' , 'titlePage'));
    }

    public function save(Request $request)
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

        if ($Inherited == 'سردسته'){
            $statusMaster = 'yes';
        }else{
            $statusMaster = 'no';

        }

        $recat = new CategoryProduct();
        $recat -> name = $name ;
        $recat -> picture = $picture ;
        $recat -> slug = $slug ;
        $recat -> description = $description ;
        $recat -> statusMaster = $statusMaster ;
        $recat -> Inherited = $Inherited ;
        $recat -> save();

        return back();
    }

    public function delete(CategoryProduct $id)
    {
        $delCat = CategoryProduct::find($id -> id);
        $delCat -> delete();
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
        $id = CategoryProduct::where('id' , $cat_id)->first();

        $products = Product::where('category' , $cat_id )->get()->sortByDesc('id');

        return view('customer.runy.products.archiveProduct', compact('id' , 'products'));
    }
}
