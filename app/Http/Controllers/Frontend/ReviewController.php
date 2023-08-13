<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function StoreReview(Request $request){
        $news = $request->id;
        $request->validate([
            'commnet'=>'required'
        ]);

        Review::insert([
             'news_id' => $news,
             'comment'=> $request->commnet,
             
             'created_at' => Carbon::now()
        ]);

        return back()->with('status','Review Will Approve By Admin');
    }

    public function AllReview(){
        return view('backend.review.allReview');
    }
}
