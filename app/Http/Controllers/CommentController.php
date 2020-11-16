<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $allComment = Comment::all()->sortByDesc('id');

        return view('');
    }

    public function save()
    {

        $name = $_REQUEST['name'];
        $post_id = $_REQUEST['post_id'];
        $email = $_REQUEST['email'];
        $text = $_REQUEST['text'];
        $replayTo = $_REQUEST['replayTo'];

        if (Auth::id()){
            $user_id = Auth::id();
        }else{
            $user_id = 0 ;
        }

        $newComment = new Comment();
        $newComment -> name = $name ;
        $newComment -> post_id = $post_id ;
        $newComment -> email = $email ;
        $newComment -> text = $text ;
        $newComment -> replayTo = $replayTo ;
        $newComment -> user_id = $user_id ;
        $newComment -> save();
        if ($newComment -> save()){
            return ' <strong style="color: mediumseagreen;">دیدگاه شما ثبت شد</strong>';
        }else{
            return '<strong style="color: red;">مشکلی پیش آمده</strong>';
        }


    }
}
