<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
    public function adminPage(){
        return view('admin-index');
    }

    public function editInfoForm(){
        $data = User::where('id', auth()->user()->id)->get();
        return view('admin-editinfo',['data' => $data]);
    }

    public function editInfo(Request $request){
        $rules = [
            'email' => 'required',
            'fullname' => 'required',
            'phone' => 'required',
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
        if($request->password != '')
            $user->password = \Hash::make($request->password);
        $user->save();
        return redirect('/admin/info/edit')->with('message1', 'Thay đổi thành công');
    }
}
