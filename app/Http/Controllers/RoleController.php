<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
class RoleController extends Controller
{
    public function getListRole(){
        $data = Role::get();
        return view('admin-listrole',['data' => $data] );
    }

    public function addRoleForm(){
        return view('admin-addrole');
    }

    public function addRole(Request $request){

        $rules = [
            'role' => 'required',
        ];
    
        $messages = [
            'required' => ':attribute không được bỏ trống!!!',
        ];
    
        $this->validate($request, $rules, $messages);

        $role = new Role;
        $role->role_name = $request->role;
        $role->save();
        return \redirect('/admin/roles');
    }

    public function editRoleForm($id){
        $role = Role::getRolesById($id);
        return view('admin-editrole', ['data' => $role]);
    }

    public function editRole(Request $request){

        $rules = [
            'role' => 'required',
        ];
    
        $messages = [
            'required' => ':attribute không được bỏ trống!!!',
        ];
    
        $this->validate($request, $rules, $messages);

        $role = Role::find($request->id);
        $role->role_name = $request->role;
        $role->save();
        return \redirect('/admin/roles');
    }

    public function deleteRole($id){
        \DB::table('roles')->where('id',$id)->delete();
        return \redirect('/admin/roles');
    }
}
