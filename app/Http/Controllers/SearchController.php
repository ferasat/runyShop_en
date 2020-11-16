<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function general()
    {
        $search = $_GET['search'];
        $products = Product::where('name', 'LIKE', '%' . $search . "%")->get();
        $search_in_post = Post::where('name', 'LIKE', '%' . $search . "%")->get();
        //dd($products);
        return view('customer.runy.search.searchProduct', compact('products', 'search_in_post', 'search'));
    }
}
