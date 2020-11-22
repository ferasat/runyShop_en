<?php

namespace App\Http\Controllers;

use App\OflineOrder;
use Illuminate\Http\Request;

class OflineOrderController extends Controller
{
    public function index()
    {
        $allOrder = OflineOrder::all()->sortByDesc('id');
        $titlePage = 'Orders Offline';
        return view('user.order.indexOffline', compact('allOrder' , 'titlePage'));
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

        return '<h1>Thank You .<br>
You will be contacted as soon as possible.</h1>';

    }

    public function calledd()
    {
        $id = $_REQUEST['id'];
        $order = OflineOrder::find($id);
        $order -> status = 'Called';
        $order -> save();
    }

    public function notcall()
    {
        $id = $_REQUEST['id'];
        $order = OflineOrder::find($id);
        $order -> status = 'Not Call';
        $order -> save();
    }
}
