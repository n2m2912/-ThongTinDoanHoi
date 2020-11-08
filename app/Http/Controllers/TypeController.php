<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    // Thể loại tin.
    public function getListType(){ 
        $data = Type::getListType();
        return view('admin-listtype',['data' => $data]);
    }
    // thêm mới loại tin
    public function addTypeForm(){ 
        return view('admin-addtype');
    }
    public function addTypeNew(Request $request){ 
        $rules = [ 
            'type_name' => 'required', 
        ]; 
        $messages = [
            'required' => ':attribute không được bỏ trống!!!', 
        ]; 
        $this->validate($request, $rules, $messages); 
        $type = new Type;
        $type->type_name = $request->type_name; 
        $type->save();
        return \redirect('/admin/type');
    }

    public function editTypeForm($id){
        $type = Type::getTypeById($id);
        return view('admin-edittype', ['data' => $type]);
    }

    public function editType(Request $request){

        $rules = [
            'type' => 'required',
        ];
    
        $messages = [
            'required' => ':attribute không được bỏ trống!!!',
        ];
    
        $this->validate($request, $rules, $messages);

        $type = Type::find($request->id);
        $type->type_name = $request->type;
        $type->save();
        return \redirect('/admin/type');
    }

    public function deleteType($id){
        \DB::table('types')->where('id',$id)->delete();
        return \redirect('/admin/type');
    }
}
