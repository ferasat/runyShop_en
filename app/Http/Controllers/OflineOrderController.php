<?php

namespace App\Http\Controllers;

use App\OflineOrder;
use Illuminate\Http\Request;

class OflineOrderController extends Controller
{
    public function index()
    {
        $allOrder = OflineOrder::all();
        return view('user.order.index', compact('allOrder'));
    }

    public function save()
    {
        $fname = $_REQUEST['fname'];
        $product = $_REQUEST['product'];
        $product_id = $_REQUEST['product_id'];
        $value = $_REQUEST['value'];
        $phone = $_REQUEST['cell'];

        $status = 'unread';

        $orderOff= new OflineOrder();
        $orderOff -> name = $fname ;
        $orderOff -> phone = $phone ;
        $orderOff -> value = $value ;
        $orderOff -> product = $product ;
        $orderOff -> product_id = $product_id ;
        $orderOff -> status = $status ;
        $orderOff -> note = '-' ;
        $orderOff -> save() ;


    }
}
