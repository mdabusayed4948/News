<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index()
    {
        $top_viewed = Post::with('creator')->withCount('comments')->where('status', 1)->orderBy('view_count','DESC')->limit(2)->get();
        $hot_news = Post::with('creator')->withCount('comments')->where('hot_news', 1)->where('status', 1)->orderBy('id','DESC')->first();
        $category_posts = Category::with('posts')->where('status', 1)->orderBy('id','DESC')->limit(5)->get();;
    	return view('front.home', compact('hot_news','top_viewed','category_posts'));
    }

}
