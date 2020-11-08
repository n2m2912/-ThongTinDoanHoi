<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;
class LibraryController extends Controller
{
    public function getListLibrary(){
        $data = Library::getListLibrary();
        return view('admin-listlibrary',['data' => $data] );
    }

    public function addLibraryForm(){
        return view('admin-addlibrary');
    }

    public function addLibrary(Request $request){

        $rules = [
            'library' => 'required',
        ];
    
        $messages = [
            'required' => ':attribute không được bỏ trống!!!',
        ];
    
        $this->validate($request, $rules, $messages);

        $lib = new Library;
        $lib->library_title = $request->library;
        $lib->user_create_id = auth()->user()->id;
        $lib->save();
        return \redirect('/admin/libraries');
    }

    public function editLibraryForm($id){
        $lib = Library::getLibraryById($id);
        return view('admin-editlibrary', ['data' => $lib]);
    }

    public function editLibrary(Request $request){

        $rules = [
            'library' => 'required',
        ];
    
        $messages = [
            'required' => ':attribute không được bỏ trống!!!',
        ];
    
        $this->validate($request, $rules, $messages);

        $lib = Library::find($request->id);
        $lib->library_title = $request->library;
        $lib->save();
        return \redirect('/admin/libraries');
    }

    public function deleteLibrary($id){
        \DB::table('libraries')->where('id',$id)->delete();
        return \redirect('/admin/libraries');
    }
}
