<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
     public function AdminDashBoard(){
        return view('admin.index');
     }

     public function AdminLogout(Request $request){
      Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
         'message' =>'Admin Log out Successfully',
         'alert-type' => 'info'
        );

        return redirect('/admin/logout/page')->with($notification);
     }

     public function AdminLogin(){
      return view('admin.admin_login');
     }
     public function AdminLogoutPage(){
      return view('admin.admin_logout');
     }
     public function AdminProfile(){
      $id = Auth::user()->id;
      $adminData = User::find($id);
      return view('admin.admin_profile_view',compact('adminData'));
     }
     public function AdminProfileStore(Request $request){
              $id = Auth::user()->id;
              $data = User::find($id);
              $data->username = $request->username;
              $data->name = $request->name;
              $data->email = $request->email;
              $data->phone = $request->phone;

              if($request->file('photo')){
               $file = $request->file('photo');
               @unlink(public_path('upload/admin_images/'.$data->photo));
               $fileName = date('YmdHi').$file->getClientOriginalName();
               $file->move(public_path('upload/admin_images'),$fileName);
               $data['photo'] = $fileName;
              }
              $data->save();
              $notification = array(
               'message' =>'Admin Profile Updated Successfully',
               'alert-type' => 'success'
              );

              return redirect()->back()->with($notification);
     }

     public function AdminChangePassword(){
      return view('admin.admin_change_password');
     }
     public function AdminUpdatePassword(Request $request){
       // Validation 
       $request->validate([
         'old_password' => 'required',
         'new_password' => 'required|confirmed', 
     ]);

     // Match The Old Password 
     if (!Hash::check($request->old_password, auth::user()->password)) {
         return back()->with('error', "Old Password Doesn't Match!!");
     }
     // Update the new password 
     User::whereId(auth()->user()->id)->update([
         'password' => Hash::make($request->new_password)
     ]);

     return back()->with('status', "Password Change Successfully");
     }

     public function AllAdmin(){
      $allAdmin = User::where('role','admin')->orderBy('id','ASC')->latest()->get();
      return view('backend.admin.all_admin',compact('allAdmin'));
     }

     public function AddAdmin(){
         return view('backend.admin.add_admin');
     }
     public function StoreAdmin(Request $request){
      $user = new User();
      $user->name = $request->name;
      $user->username = $request->username;
      $user->email  = $request->email;
      $user->password = $request->password;
      $user->phone = $request->phone;
      $user->password = Hash::make($request->password);
      $user->role = 'admin';
      $user->status = 'inactive';
      $user->save();

      $notification = array(
        'message' =>'Admin Added Successfully',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
     }

     public function EditAdmin($id){
      $admin = User::findOrFail($id);

      return view('backend.admin.edit_admin',compact('admin'));

     }

     public function UpdateAdmin(Request $request){
      $id = $request->id;
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->username = $request->username;
      $user->email  = $request->email;
      
      $user->phone = $request->phone;
      
      $user->role = 'admin';
      $user->status = 'inactive';
      $user->save();

      $notification = array(
        'message' =>'Admin Updated Successfully',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
     }

     public function DeleteAdmin($id){
      User::findOrFail($id)->delete();

      $notification = array(
        'message' =>'Admin Deleted Successfully',
        'alert-type' => 'success'
      );
      
      return redirect()->back()->with($notification);
     }

     public function InactiveAdmin($id){
        User::findOrFail($id)->update(['status' => 'inactive']);
        $notification = array(
          'message' =>'Admin Is InActive Successfully',
          'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
     }

     public function ActiveAdmin($id){
      User::findOrFail($id)->update(['status' => 'active']);
        $notification = array(
          'message' =>'Admin Is Active Successfully',
          'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
     }
}
