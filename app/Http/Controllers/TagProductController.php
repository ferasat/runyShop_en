<?php

namespace App\Http\Controllers;

use App\Metas;
use App\Product;
use App\TagProduct;
use Illuminate\Http\Request;

class TagProductController extends Controller
{
    public function show($url)
    {
        dd($url);
        $products  = Metas::where()->get();
    }

    public function showId(TagProduct $id)
    {
        dd($id);
        $meta = Metas::where([
            ['item' => 'product'],
            [ 'key' => 'tag'],
            ['value' => $id -> id ]
        ])->get();
    }
}
