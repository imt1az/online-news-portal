<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index(){
        return view('frontend.index');
    }

    public function NewsDetails($id,$slug){
        $news = NewsPost::findOrFail($id);
        return view('frontend.news.news_details',compact('news'));
    }
}
