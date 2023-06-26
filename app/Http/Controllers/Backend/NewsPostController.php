<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\SubCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class NewsPostController extends Controller
{
    public function AllNews()
    {
        $allNews = NewsPost::latest()->get();
        return view('backend.news.all_news_post', compact('allNews'));
    }
    public function AddNewsPost()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $adminUser = User::where('role', 'admin')->latest()->get();
        return view('backend.news.add_news', compact('categories', 'subcategories', 'adminUser'));
    }
    public function StoreNews(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(784, 436)->save('upload/news/' . $name_gen);
        $save_url = 'upload/news/' . $name_gen;

        NewsPost::insert([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => $request->user_id,
            'news_title' => $request->news_title,
            'news_title_slug' => strtolower(str_replace(' ', '-', $request->news_title)),

            'news_details' => $request->news_details,
            'tags' => $request->tags,

            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'first_section_three' => $request->first_section_three,
            'first_section_nine' => $request->first_section_nine,

            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'News Added Successfull',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditNews($id)
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $adminUser = User::where('role', 'admin')->latest()->get();
        $news = NewsPost::findOrFail($id);
        return view('backend.news.edit_news', compact('news', 'categories', 'subcategories', 'adminUser'));
    }

    public function UpdateNews(Request $request)
    {
        $id = $request->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('upload/news/' . $name_gen);
            $save_url = 'upload/news/' . $name_gen;

            NewsPost::findOrFail($id)->update([

                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'user_id' => $request->user_id,
                'news_title' => $request->news_title,
                'news_title_slug' => strtolower(str_replace(' ', '-', $request->news_title)),

                'news_details' => $request->news_details,
                'tags' => $request->tags,

                'breaking_news' => $request->breaking_news,
                'top_slider' => $request->top_slider,
                'first_section_three' => $request->first_section_three,
                'first_section_nine' => $request->first_section_nine,

                'post_date' => date('d-m-Y'),
                'post_month' => date('F'),
                'image' => $save_url,
                'updated_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'News Updated with image Successfull',
                'alert-type' => 'success'
            );

            return redirect()->route('all.news.post')->with($notification);
        } else {
            NewsPost::findOrFail($id)->update([

                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'user_id' => $request->user_id,
                'news_title' => $request->news_title,
                'news_title_slug' => strtolower(str_replace(' ', '-', $request->news_title)),

                'news_details' => $request->news_details,
                'tags' => $request->tags,

                'breaking_news' => $request->breaking_news,
                'top_slider' => $request->top_slider,
                'first_section_three' => $request->first_section_three,
                'first_section_nine' => $request->first_section_nine,

                'post_date' => date('d-m-Y'),
                'post_month' => date('F'),

                'updated_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'News Updated without image Successfull',
                'alert-type' => 'success'
            );

            return redirect()->route('all.news.post')->with($notification);
        }
    }

    public function DeleteNews($id)
    {
        $post_image = NewsPost::findOrFail($id);
        $img = $post_image->image;
        unlink($img);

        NewsPost::findOrFail($id)->delete();
        $notification = array(
            'message' => 'News Added Successfull',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function InactiveNews($id)
    {
        NewsPost::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'News Is Inactive',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function ActiveNews($id){
        NewsPost::findOrFail($id)->update(['status'=>1]);
        $notification = array(
            'message' => 'News Is Active',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

}