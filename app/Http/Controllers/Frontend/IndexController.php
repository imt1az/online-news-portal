<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\SubCategory;
use App\Models\VideoGallery;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function Index(){
        $newNewsPost = NewsPost::orderBy('id','DESC')->limit(8)->get();
        $newsPopular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

        $skip_cat_1 = Category::skip(1)->first();
        $skip_news_1 = NewsPost::where('status',1)->where('category_id',$skip_cat_1->id)->orderBy('id','DESC')->limit(5)->get();
        $skip_cate_2 = Category::skip(2)->first();
        $skip_news_2 = NewsPost::where('status',1)->where('category_id',$skip_cate_2->id)->orderBy('id','DESC')->limit(5)->get();
        $skip_cate_5 = Category::skip(5)->first();
        $skip_news_5 = NewsPost::where('status',1)->where('category_id',$skip_cate_5->id)->orderBy('id','DESC')->limit(5)->get();

        //Sub Category
        $skip_sub_0 = SubCategory::skip(0)->first();
        $sub_news_0 = NewsPost::where('status',1)->where('subcategory_id',$skip_sub_0->id)->orderBy('id','DESC')->limit(5)->get();
        $skip_sub_2 = SubCategory::skip(2)->first(); 
        $sub_news_2 = NewsPost::where('status',1)->where('subcategory_id',$skip_sub_2->id)->orderBy('id','DESC')->limit(5)->get();
        $skip_sub_4 = SubCategory::skip(4)->first(); 
        $sub_news_4 = NewsPost::where('status',1)->where('subcategory_id',$skip_sub_4->id)->orderBy('id','DESC')->limit(5)->get();
        $skip_sub_5 = SubCategory::skip(5)->first(); 
        $sub_news_5 = NewsPost::where('status',1)->where('subcategory_id',$skip_sub_5->id)->orderBy('id','DESC')->limit(5)->get();
        $skip_sub_1 = SubCategory::skip(1)->first(); 
        $sub_news_1 = NewsPost::where('status',1)->where('subcategory_id',$skip_sub_1->id)->orderBy('id','DESC')->limit(5)->get();
        $skip_sub_3 = SubCategory::skip(3)->first(); 
        $sub_news_3 = NewsPost::where('status',1)->where('subcategory_id',$skip_sub_3->id)->orderBy('id','DESC')->limit(5)->get();
        return view('frontend.index',compact('newNewsPost','newsPopular','skip_cat_1','skip_news_1','skip_cate_2','skip_news_2','skip_cate_5','skip_news_5',
        'skip_sub_0','sub_news_0','skip_sub_2','sub_news_2','skip_sub_4','sub_news_4','skip_sub_5','sub_news_5','skip_sub_1','sub_news_1','skip_sub_3','sub_news_3'));
    }

    public function NewsDetails($id,$slug){
        $news = NewsPost::findOrFail($id);
        $catId = $news->category_id;
        $relatedNews = NewsPost::where('category_id',$catId)->where('status',1)->where('id','!=',$id)->orderBy('id','ASC')->limit(8)->get();
        $newsKey = 'blog' . $news->id;
        if(!Session::has($newsKey)){
            $news->increment('view_count');
            Session::put($newsKey,1);
        }
        $newNewsPost = NewsPost::orderBy('id','DESC')->limit(8)->get();
        $newsPopular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();
        
        return view('frontend.news.news_details',compact('news','relatedNews','newNewsPost','newsPopular'));
    }

    public function Catewise($id,$slug){
          $news = NewsPost::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
          $newsTwo = NewsPost::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->limit(2)->get();
          $breadcat = Category::where('id',$id)->first();

          $newNewsPost = NewsPost::orderBy('id','DESC')->limit(8)->get();
          $newsPopular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

          return view('frontend.news.category_news',compact('news','newsTwo','breadcat','newNewsPost','newsPopular'));

    }

    public function Subwise($id,$slug){
        $news = NewsPost::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->get();
        $newsTwo = NewsPost::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->limit(2)->get();
        $Subbreadcat = SubCategory::where('id',$id)->first();

        $newNewsPost = NewsPost::orderBy('id','DESC')->limit(8)->get();
        $newsPopular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

        return view('frontend.news.subcategory_news',compact('news','newsTwo','Subbreadcat','newNewsPost','newsPopular'));
    }

    public function SearchByDate(Request $request){
        $date = new DateTime($request->date);
        $formatDate = $date->format('d-m-Y');

        $news = NewsPost::where('post_date',$formatDate)->latest()->get();
        $newNewsPost = NewsPost::orderBy('id','DESC')->limit(8)->get();
        $newsPopular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

        return view('frontend.news.searchByDate',compact('news','formatDate','newNewsPost','newsPopular'));

    }

    public function GalleryWise(){
        $videos = VideoGallery::orderBy('id','DESC')->limit(8)->get();
        return view('frontend.news.galleryWise',compact('videos'));
    }
}
