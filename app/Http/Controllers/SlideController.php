<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    // Slide
    public function getListSlide(){ 
        $data = Slide::getListSlide();
        return view('admin-listslide',['data' => $data]);
    }

    public function addSlideForm(){
        return view('admin-addSlide');
    }

    public function addSlide(Request $request){

        $rules = [
            'upFile' => 'required',
        ];
    
        $messages = [
            'required' => ':attribute không được bỏ trống!!!',
        ];
    
        $this->validate($request, $rules, $messages);

        if ($request->hasFile('upFile') && ($request->upFile->getMimeType() == 'image/jpeg' || $request->upFile->getMimeType() == 'image/png')) {
            $slide = new Slide;
            $upFile = $request->upFile;
            $slide->imager_name =  str_random(8).'-'.$upFile->getClientOriginalName();
            $path = 'img';
            $upFile->move($path, $slide->imager_name);
            $slide->save();
            
        }
        return \redirect('/admin/slide');
    }

    public function editSlideForm($id){
        $slide = Slide::getSlideById($id);
        return view('admin-editslide', ['data' => $slide]);
    }

    public function editSlide(Request $request){

        if ($request->hasFile('upFile') && ($request->upFile->getMimeType() == 'image/jpeg' || $request->upFile->getMimeType() == 'image/png')) {
            $slide = Slide::find($request->id);
            $upFile = $request->upFile;
            $slide->imager_name =  str_random(8).'-'.$upFile->getClientOriginalName();
            $path = 'img';
            $upFile->move($path, $slide->imager_name);
            $slide->save();            
        }
        return \redirect('/admin/slide');
    }

    // delete slide
    public function deleteSlide($id){
        \DB::table('slide')->where('id',$id)->delete();
        return \redirect('/admin/slide');
    }
}
