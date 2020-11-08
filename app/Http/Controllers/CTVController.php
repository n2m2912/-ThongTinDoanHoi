<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Type;
use App\File;
use App\Library;
use App\User;

class CTVController extends Controller
{
    public function userPage(){
        return view('user-index');
    }

    public function editInfoForm(){
        $data = User::where('id', auth()->user()->id)->get();
        return view('user-editinfo',['data' => $data]);
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
        return redirect('/user/info/edit')->with('message1', 'Thay đổi thành công');
    }

    public function getListNew(){
        $data = News::getNewsByUserId(auth()->user()->id);
        return view('user-listnew',['data' => $data]);
    }

    public function addNewForm(){
        $data = Type::get();
        return view('user-addnew',['data' => $data]);
    }

    public function addNew(Request $request){

        $rules = [
            'newtitle' => 'required|max:255',
            'content' => 'required',
            'type' => 'required',
            'upFile' => 'required',
        ];
    
        $messages = [
            'required' => ':attribute không được bỏ trống!!!',
        ];
    
        $this->validate($request, $rules, $messages);


        $new = new News;
        $new->new_title = $request->newtitle;
        $new->content = $request->content;
        $new->type = $request->type;
        $new->author = auth()->user()->id;
        $new->viewed = 0;
        $new->censored = 0;
        $new->save();

        if ($request->hasFile('upFile') && ($request->upFile->getMimeType() == 'image/jpeg' || $request->upFile->getMimeType() == 'image/png')) {
            $file = new File;
            $upFile = $request->upFile;
            $file->file_name =  str_random(8).'-'.$upFile->getClientOriginalName();
            $file->file_type =  $upFile->getClientOriginalExtension();
            $file->user_upload_id = auth()->user()->id;
            $file->new = $new->id;
            $file->file_path = '/images';
            $path = 'files/images';
            $upFile->move($path, $file->file_name);
            $file->save();
            
        }
        return \redirect('/user/news');
    }

    public function editNewForm($id){
        $data['new'] = News::getNewByID($id);
        $data['type'] = Type::get();
        return view('user-editnew', compact('data'));
    }

    public function editNew(Request $request){
        $rules = [
            'newtitle' => 'required|max:255',
            'content' => 'required',
        ];
    
        $messages = [
            'required' => ':attribute không được bỏ trống!!!',
        ];
    
        $this->validate($request, $rules, $messages);


        $new = News::find($request->id);
        $new->new_title = $request->newtitle;
        $new->content = $request->content;
        $new->type = $request->type;
        $new->save();
        
        if ($request->hasFile('upFile') && ($request->upFile->getMimeType() == 'image/jpeg' || $request->upFile->getMimeType() == 'image/png')) {
            $file = File::find($request->image_id);
            $upFile = $request->upFile;
            $file->file_name =  str_random(8).'-'.$upFile->getClientOriginalName();
            $file->file_type =  $upFile->getClientOriginalExtension();
            $file->user_upload_id = auth()->user()->id;
            $file->new = $new->id;
            $file->file_path = '/images';
            $path = 'files/images';
            $upFile->move($path, $file->file_name);
            $file->save();
        }
        return \redirect('/user/news');
    }

    public function deleteNew($id){
        \DB::table('news')->where('id',$id)->delete();
        return \redirect('/user/news');
    }

    public function getListFile(){
        $data['file'] = File::getFilesByUserId(auth()->user()->id);
        $data['new'] = News::getNameAndId();
        $data['library'] = Library::getNameAndId();
        return view('user-listfile',compact('data'));
    }

    public function addFileForm(){
        $data['library'] = Library::get();
        return view('user-addfile',compact('data'));
    }

    public function addFile(Request $request){

        $rules = [
            'upFile' => 'required',
        ];
    
        $messages = [
            'required' => ':attribute không được bỏ trống!!!',
        ];
    
        $this->validate($request, $rules, $messages);

        if ($request->hasFile('upFile')) {
            $file = new File;
            $upFile = $request->upFile;
            $file->file_name =  str_random(8).'-'.$upFile->getClientOriginalName();
            $file->file_type =  $upFile->getClientOriginalExtension();
            $file->library = $request->library;
            $file->user_upload_id = auth()->user()->id;
            if($upFile->getMimeType() == 'image/jpeg' || $upFile->getMimeType() == 'image/png'){
                $file->file_path = '/images';
                $path = 'files/images';
                $upFile->move($path, $file->file_name);
                $file->save();
            } else if($upFile->getMimeType() == 'application/pdf' || $upFile->getMimeType() == 'application/msword' || $upFile->getMimeType() == 'application/vnd.ms-excel' || $upFile->getMimeType() == 'application/vnd.ms-powerpoint' || $upFile->getMimeType() == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                $file->file_path = '/docs';
                $path = 'files/docs';
                $upFile->move($path, $file->file_name);
                $file->save();
            }
            
        }
        return \redirect('/user/files');
    }

    public function editFileForm($id){
        $data['file'] = File::getFileById($id);
        $data['library'] = Library::get();
        return view('user-editfile', compact('data'));
    }

    public function editFile(Request $request){

        if ($request->hasFile('upFile')) {
            $file = File::find($request->id);
            $upFile = $request->upFile;
            $file->file_name =  str_random(8).'-'.$upFile->getClientOriginalName();
            $file->file_type =  $upFile->getClientOriginalExtension();
            $file->library = $request->library;
            if($upFile->getMimeType() == 'image/jpeg' || $upFile->getMimeType() == 'image/png'){
                $file->file_path = '/images';
                $path = 'files/images';
                $upFile->move($path, $file->file_name);
                $file->save();
            } else if($upFile->getMimeType() == 'application/pdf' || $upFile->getMimeType() == 'application/msword' || $upFile->getMimeType() == 'application/vnd.ms-excel' || $upFile->getMimeType() == 'application/vnd.ms-powerpoint' || $upFile->getMimeType() == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                $file->file_path = '/docs';
                $path = 'files/docs';
                $upFile->move($path, $file->file_name);
                $file->save();
            }
            
        } else {
            $file = File::find($request->id);
            $file->library = $request->library;
            $file->save();
        }
        return \redirect('/user/files');
    }

    public function deleteFile($id){
        \DB::table('files')->where('id',$id)->delete();
        return \redirect('/user/files');
    }
}
