<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    public function AllPhoto()
    {
        $photo = PhotoGallery::latest()->get();
        return view('backend.photo.all_photo', compact('photo'));
    }
    public function AddPhoto()
    {
        return view('backend.photo.add_photo');
    }
    public function StorePhoto(Request $request)
    {
        $images = $request->file('multi_image');

        foreach ($images as $image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('upload/photo/' . $name_gen);
            $save_url = 'upload/photo/' . $name_gen;

            PhotoGallery::insert([
                'photo_gallery' => $save_url,
                'post_date' => bangla_date(time(), 'en'),

            ]);
        }
        $notification = array(
            'message' => 'Photoes Added Successfull',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function EditPhoto($id)
    {
        $photo = PhotoGallery::findOrFail($id);
        return view('backend.photo.edit_photo', compact('photo'));
    }

    public function UpdatePhoto(Request $request)
    {
        $photo_id = $request->id;

        if ($request->file('multi_image')) {

            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('upload/photo/' . $name_gen);
            $save_url = 'upload/photo/' . $name_gen;

            PhotoGallery::findOrFail($photo_id)->update([
                'photo_gallery' => $save_url,
                'post_date' => bangla_date(time(), 'en'),

            ]);

            $notification = array(
                'message' => 'Photo Gallery Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('all.photo.gallery')->with($notification);

        } // End If 
    }

    public function DeletePhoto($id){
        $photo = PhotoGallery::findOrFail($id);
        $img = $photo->photo_gallery;
        unlink($img);

        PhotoGallery::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Photo Deleted Successfully',
            'alert-type' => 'danger'

        );
        return redirect()->route('all.photo.gallery')->with($notification);

    }





}