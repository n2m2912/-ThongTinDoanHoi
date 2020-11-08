<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Type;

use App\File;
class NewController extends Controller
{
    public function getListNew(){
        $data = News::getNews();
        return view('admin-listnew',['data' => $data]);
    }

    public function addNewForm(){
        $data = Type::get();
        return view('admin-addnew',['data' => $data]);
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
        return \redirect('/admin/news');
    }

    public function editNewForm($id){
        $data['new'] = News::getNewByID($id);
        $data['type'] = Type::get();
        return view('admin-editnew', compact('data'));
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
        $new->censored = $request->censored;
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
        return \redirect('/admin/news');
    }

    public function deleteNew($id){
        \DB::table('news')->where('id',$id)->delete();
        return \redirect('/admin/news');
    }
}
