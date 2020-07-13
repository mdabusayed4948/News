<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index($id)
    {
        $page_name = 'Comments';
        $data = Comment::with(['post'])->where('post_id', $id)->orderBy('id','DESC')->get();
        return view('admin.comment.list', compact('data','page_name'));
    }
}
