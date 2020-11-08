<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\News;
use App\Library;

class FileController extends Controller
{
    public function getListFile(){
        $data['file'] = File::getFiles();
        $data['new'] = News::getNameAndId();
        $data['library'] = Library::getNameAndId();
        return view('admin-listfile',compact('data'));
    }

    public function addFileForm(){
        $data['library'] = Library::get();
        return view('admin-addfile',compact('data'));
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
        return \redirect('/admin/files');
    }

    public function editFileForm($id){
        $data['file'] = File::getFileById($id);
        $data['library'] = Library::get();
        return view('admin-editfile', compact('data'));
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
        return \redirect('/admin/files');
    }

    public function deleteFile($id){
        \DB::table('files')->where('id',$id)->delete();
        return \redirect('/admin/files');
    }
}
