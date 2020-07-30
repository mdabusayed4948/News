<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class DetailsPageController extends Controller
{

	public function index($slug)
    {
        $post = Post::with(['comments','category','creator'])->where('status', 1)
        ->where('slug', $slug)->whereHas('comments',
        function ($query){
            $query->where('status', 1);
        })->first();
        $post->view_count = $post->view_count+1;
        $related_news = Post::with(['comments','category','creator'])->where('status', 1)->where('id', '!=', $post->id)->where('category_id', $post->category_id)->orderBy('id','DESC')->limit(4)->get();
        $post->save();

    	return view('front.details', compact('post','related_news'));

    }
    
}
