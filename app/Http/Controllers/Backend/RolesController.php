<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function AllPermission(){
        $permission = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permission'));
    }
    public function AddPermission(){
      
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request){
        $role = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Added Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.permission')->with($notification);
    } 

    public function EditPermission($id){
      $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));
    }

    public function UpdatePermission(Request $request){
        $id = $request->id;

        Permission::findOrFail($id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id){
           Permission::findOrFail($id)->delete();
           $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'info'

        );
        return redirect()->back()->with($notification);
    }

    public function AllRole(){
        $role = Role::all();
        return view('backend.pages.role.all_role',compact('role'));
    }

    public function AddRole(){
        return view('backend.pages.role.add_role');
    }

    public function StoreRole(Request $request){
        Role::create([
            'name' => $request->name
        ]);
        $notification = array(
            'message' => 'Role Added Successfully',
            'alert-type' => 'info'

        );
        return redirect()->route('all.role')->with($notification);
    }
    public function EditRole($id){
        $role = Role::findOrFail($id);
        return view('backend.pages.role.edit_role',compact('role'));
    }

    public function UpdateRole(Request $request){
        $id = $request->id;

        Role::findOrFail($id)->update([
           'name'=> $request->name
        ]);
        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'info'

        );
        return redirect()->route('all.role')->with($notification);
    }

    public function DeleteRole($id){
        Role::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'info'

        );
        return redirect()->route('all.role')->with($notification);
    }

    // Add Role For Permission

    public function AddRolesPermission(){
    $roles = Role::all();
    $permission = Permission::all();
    $permission_group = User::getPermissionGroup();

    return view('backend.pages.role.add_roles_permission',compact('roles','permission','permission_group'));
    }

    public function StoreRolesPermission(Request $request){
        $data = array();
        $permissions = $request->permission;
        
        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'info'

        );
        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function AllRolesPermission(){
        $roles = Role::all();
        return view('backend.pages.role.all_roles_permission',compact('roles'));
    }


}
