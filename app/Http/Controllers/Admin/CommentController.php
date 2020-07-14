<?php

namespace App\Http\Controllers\Admin;

use App\Comment;

use App\Http\Requests\Admin\comment\CommentReplyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($id)
    {
        $page_name = 'Comments';
        $data = Comment::with(['post'])->where('post_id', $id)->orderBy('id','DESC')->get();
        return view('admin.comment.list', compact('data','page_name'));
    }

    public function reply($id)
    {
        $page_name = 'Comment Reply';
        return view('admin.comment.reply', compact('page_name','data','id'));
    }

    public function store(CommentReplyRequest $request)
    {
        $comment = new Comment();
        $comment->name = Auth::user()->name;
        $comment->comment = $request->comment;
        $comment->status = 0;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect()->route('comment-list',['id'=>$request->post_id])->with('message','Comment Replied Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $comment = Comment::find($id);
        if($comment->status === 1){
            $comment->status = 0;
        }else{
            $comment->status = 1;
        }
        $comment->save();
        return redirect()->route('comment-list',['id'=>$comment->post_id])->with('message','Comment Status Successfully Changed.');
    }
}
