<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function listUsers(){
        $data = User::getListUsers();
        return view('admin-listusers',['data' => $data]);
    }

    public function addUserForm(){
        $data['roles'] = Role::orderBy('id','desc')->get();
        return view('admin-adduser', ['data' => $data]);
    }

    public function addUser(Request $request){

        $rules = [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'fullname' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ];
    
        $messages = [
            'required' => ':attribute không được bỏ trống!!!',
            'unique' => ':attribute đã tồn tại!!!!',
        ];
    
        $this->validate($request, $rules, $messages);


        $user = new User;
        $user->email = $request->email;
        $user->full_name = $request->fullname;
        $user->password = \Hash::make($request->password1);
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->username = $request->username;
        $user->save();
    }

    public function editUserForm($id){
        $data['user'] = User::where('id',$id)->get();
        $data['roles'] = Role::get();
        return view('admin-edituser',compact("data"));
    }

    public function editUser(Request $request){
        $rules = [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'fullname' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ];
    
        $messages = [
            'required' => ':attribute không được bỏ trống!!!',
            'unique' => ':attribute đã tồn tại!!!!',
        ];
    
        $this->validate($request, $rules, $messages);

        $user = User::find($request->id);
        $user->email = $request->email;
        $user->full_name = $request->fullname;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->username = $request->username;
        $user->save();
        return \redirect('/admin/users');
    }

    public function resetPass($id){
        $user = User::find($id);
        $user->password = \Hash::make('password');
        $user->save();
        return \redirect('/admin/users');
    }

    public function deleteUser($id){
        \DB::table('users')->where('id',$id)->delete();
        return \redirect('/admin/users');
    }
}
