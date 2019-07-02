<?php

namespace App\Http\Controllers;
use App\Comment;
use Auth;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function store(Request $request ){
      
        $comment = new Comment();
        $comment->body =$request->message;
        $comment->user_id =Auth::user()->id;
        $comment->post_id =$request->post_id;
        $comment->save();
        return redirect()->back();

    }
}
