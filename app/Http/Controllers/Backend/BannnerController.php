<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannnerController extends Controller
{
    public function AllBanner(){
        $banner = Banner::findOrFail(1);
        return view('backend.banner.banner_update',compact('banner'));
    }

    public function UpdateBanner(Request $request){
        $banner_id = $request->id;
        if($request->file('home_one')){
            $image1 = $request->file('home_one');
            $name_gen1 = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            Image::make($image1)->resize(600, 250)->save('upload/banner/' . $name_gen1);
            $save_url1 = 'upload/banner/' . $name_gen1;

            Banner::findOrFail($banner_id)->update([
                'home_one' => $save_url1
            ]);

            $notification = array(
                'message' =>'New Post Inserted',
                'alert-type' => 'success'
               );
    
               return redirect()->back()->with($notification);
        }

        if($request->file('home_two')){
            $image2 = $request->file('home_two');
            $name_gen2 = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            Image::make($image2)->resize(600, 250)->save('upload/banner/' . $name_gen2);
            $save_url2 = 'upload/banner/' . $name_gen2;

            Banner::findOrFail($banner_id)->update([
                'home_two' => $save_url2
            ]);

            $notification = array(
                'message' =>'New Post Inserted',
                'alert-type' => 'success'
               );
    
               return redirect()->back()->with($notification);
        }

        if($request->file('home_three')){
            $image3 = $request->file('home_three');
            $name_gen3 = hexdec(uniqid()) . '.' . $image3->getClientOriginalExtension();
            Image::make($image3)->resize(300, 300)->save('upload/banner/' . $name_gen3);
            $save_url3 = 'upload/banner/' . $name_gen3;

            Banner::findOrFail($banner_id)->update([
                'home_three' => $save_url3
            ]);

            $notification = array(
                'message' =>'Banner Inserted Successfully',
                'alert-type' => 'success'
               );
    
               return redirect()->back()->with($notification);
        }
        if($request->file('home_four')){
            $image4 = $request->file('home_four');
            $name_gen4 = hexdec(uniqid()) . '.' . $image4->getClientOriginalExtension();
            Image::make($image4)->resize(300, 300)->save('upload/banner/' . $name_gen4);
            $save_url4 = 'upload/banner/' . $name_gen4;

            Banner::findOrFail($banner_id)->update([
                'home_four' => $save_url4
            ]);

            $notification = array(
                'message' =>'Banner Inserted Successfully',
                'alert-type' => 'success'
               );
    
               return redirect()->back()->with($notification);
        }

        if($request->file('home_five')){
            $image5 = $request->file('home_five');
            $name_gen5 = hexdec(uniqid()) . '.' . $image5->getClientOriginalExtension();
            Image::make($image5)->resize(300, 300)->save('upload/banner/' . $name_gen5);
            $save_url5 = 'upload/banner/' . $name_gen5;

            Banner::findOrFail($banner_id)->update([
                'home_five' => $save_url5
            ]);

            $notification = array(
                'message' =>'Banner Inserted Successfully',
                'alert-type' => 'success'
               );
    
               return redirect()->back()->with($notification);
        }
        if($request->file('home_six')){
            $image6 = $request->file('home_six');
            $name_gen6 = hexdec(uniqid()) . '.' . $image6->getClientOriginalExtension();
            Image::make($image6)->resize(300, 300)->save('upload/banner/' . $name_gen6);
            $save_url6 = 'upload/banner/' . $name_gen6;

            Banner::findOrFail($banner_id)->update([
                'home_six' => $save_url6
            ]);

            $notification = array(
                'message' =>'Banner Inserted Successfully',
                'alert-type' => 'success'
               );
    
               return redirect()->back()->with($notification);
        }
        if($request->file('home_category_one')){
            $image7 = $request->file('home_category_one');
            $name_gen7 = hexdec(uniqid()) . '.' . $image7->getClientOriginalExtension();
            Image::make($image7)->resize(300, 300)->save('upload/banner/' . $name_gen7);
            $save_url7 = 'upload/banner/' . $name_gen7;

            Banner::findOrFail($banner_id)->update([
                'home_category_one' => $save_url7
            ]);

            $notification = array(
                'message' =>'Banner Inserted Successfully',
                'alert-type' => 'success'
               );
    
               return redirect()->back()->with($notification);
        }
        if($request->file('news_details_one')){
            $image8 = $request->file('news_details_one');
            $name_gen8 = hexdec(uniqid()) . '.' . $image8->getClientOriginalExtension();
            Image::make($image8)->resize(300, 300)->save('upload/banner/' . $name_gen8);
            $save_url8 = 'upload/banner/' . $name_gen8;

            Banner::findOrFail($banner_id)->update([
                'news_details_one' => $save_url8
            ]);

            $notification = array(
                'message' =>'Banner Inserted Successfully',
                'alert-type' => 'success'
               );
    
               return redirect()->back()->with($notification);
        }
    }
}
