<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LiveTv;
use App\Models\VideoGallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class VideoController extends Controller
{
    public function AllVideo(){
        $video = VideoGallery::latest()->get();
        return view('backend.video.all_video',compact('video'));
    }

    public function AddVideo(){
        return view('backend.video.add_video');
    }

    public function StoreVideo(Request $request){
        $image = $request->file('video_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(784, 436)->save('upload/video/' . $name_gen);
        $save_url = 'upload/video/' . $name_gen;

        $videoId = VideoGallery::insertGetId([

            'video_title' => $request->video_title,
            'video_url' => $request->video_url,
            'post_date' => bangla_date(time(), 'en'),
            
            'video_image' => $save_url,
            

        ]);

        

        $notification = array(
            'message' => 'Video Added Successfull',
            'alert-type' => 'success'
        );

        return redirect()->route('all.video.gallery')->with($notification);
    }

    public function EditVideo($id){
        $video = VideoGallery::findOrFail($id);
        return view('backend.video.editVideo',compact('video'));
    }

    public function UpdateVideo(Request $request){
        $id = $request->id;
        
        if($request->file('video_image')){
            $image = $request->file('video_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(784, 436)->save('upload/video/' . $name_gen);
        $save_url = 'upload/video/' . $name_gen;
          
          VideoGallery::findOrFail($id)->update([
            'video_title' => $request->video_title,
            'video_url' => $request->video_url,
            'post_date' => bangla_date(time(), 'en'),
            
            'video_image' => $save_url,
          ]);

          
        $notification = array(
            'message' => 'Video Added Successfull',
            'alert-type' => 'success'
        );

        return redirect()->route('all.video.gallery')->with($notification);

        }
        
        else{
            VideoGallery::findOrFail($id)->update([
                'video_title' => $request->video_title,
                'video_url' => $request->video_url,
                'post_date' => bangla_date(time(), 'en'),
              ]);
    
              
            $notification = array(
                'message' => 'Video Added Without Successfull',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.video.gallery')->with($notification);
        }
    }

    public function DeleteVideo($id){
        $video = VideoGallery::findOrFail($id);
        $img = $video->video_image;

        unlink($img);

        VideoGallery::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Video Deleted Successfull',
            'alert-type' => 'danger'
        );

        return redirect()->route('all.video.gallery')->with($notification);

    }

    public function UpdateTv(){
        $live = LiveTv::findOrFail(1);
        return view('backend.video.live',compact('live'));
    }

    public function StoreTv(Request $request){
        $id = $request->id;
        
        if($request->file('live_image')){
            $image = $request->file('live_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(784, 436)->save('upload/live/' . $name_gen);
        $save_url = 'upload/live/' . $name_gen;
          
        LiveTv::findOrFail($id)->update([
            
            'live_url' => $request->live_url,
            'post_date' => bangla_date(time(), 'en'),
            
            'live_image' => $save_url,
          ]);

          
        $notification = array(
            'message' => 'Live Tv Updated With Image Successfull',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        }
        
        else{
            LiveTv::findOrFail($id)->update([
                'live_url' => $request->live_url,
                'post_date' => bangla_date(time(), 'en'),
              ]);
    
              
              $notification = array(
                'message' => 'Live Tv Updated Without Successfull',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }
    }
}
