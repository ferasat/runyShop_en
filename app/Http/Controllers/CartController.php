<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        //dd($cart);
        dd(Session::token());
        return view('customer.runy.cart.cart' , compact('cart'));
    }

    public function addToCart()
    {
        $id = $_REQUEST['id'] ;
        $quantity = $_REQUEST['quantity'] ;
        $product = Product::find($id);
        $order = 'order_'.$product -> id ;
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        if (!$cart){
            $cart = [
                $order => [
                    "id" => $id ,
                    "name" => $product->name,
                    "quantity" => $quantity,
                    "price" => $product->price,
                    "picture" => $product->picture
                ]
            ];
            session()->put('cart' , $cart);
            return redirect()->back()->with('success', ' محصول به شبد خرید اضافه شد !');
        } else {
            // اگر محصول نبود به سبد خرید اضافه می شود
            $cart[$order] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "picture" => $product->picture
            ];
        }

        // چک می کنه اگر سبد خالی نبود و از این کالا در سبد موجود بود به تعدادش اضافه می کنه
        /*        if (isset($cart[$id])){
                    $cart[$id]['quantity']++ ;
                    session()->put('cart' , $cart);
                    return redirect()->back()->with('success', ' محصول به شبد خرید اضافه شد !');
                }*/

        // اگر محصول نبود به سبد خرید اضافه می شود
       /* $cart[$id] = [
            "name" => $product->name,
            "quantity" => $quantity,
            "price" => $product->price,
            "picture" => $product->picture
        ];*/

        session()->put('cart', $cart);
        return back()->with('success', ' محصول به شبد خرید اضافه شد !');

    }

    public function saveCart(Request $request)
    {
        dd($request);
        $count = $request -> count - 1 ;
        for ($x = 1 ; $x < $count ; $x++){

        }
        $newCart = new Cart();
    }

    public function saveOrder(Request $request)
    {

    }
}
