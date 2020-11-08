<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Auth;
use App\Slide;
use App\News;
use App\File;
class HomeController extends Controller
{
    public function index(){
        $data = array();
        $data['ThongBao'] = News::getNewsByTypeLimit(1);
        $data['NhipSong'] = News::getNewsByTypeLimit(2);
        $data['Slide'] = Slide::orderBy('id','desc')->limit(3)->get();
        return view('index',compact("data"));
    }

    public function detail($id){
        $data['new'] = DB::table('news')->where('id', $id)->get();
        $data['author'] = DB::table('users')->where('id',$data['new'][0]->author)->get();
        $data['image'] = DB::table('files')->where('new',$data['new'][0]->id)->get();
        if($data['new'] == null){
            echo "Page Not Found!!";
        }
        else{
            $new = News::find($id);
            $new->viewed +=1;
            $new->save();
            $data['view'] = $new->viewed;
            return view('new-detail',compact("data"));
        }
    }

    public function newsType($id){
        if($id != 4){
            $data['news'] = News::getNewByType($id);
            $data['type'] = DB::table('types')->where('id',$id)->get();
        } else {
            $data['news'] = DB::table('news')->where('type',$id)->paginate(10);
            $data['type'] = DB::table('types')->where('id',$id)->get();
        }
        if($data == null){
            echo "Page Not Found!!";
        }
        else{
            return view('news-type',compact("data"));
            // return view('news-type', ['data' => $data]);
        }
    }

    public function login(){
        return view('login');
    }

    public function postLogin(Request $request) {
        $messages = [
            'required' => ':attribute không được bỏ trống!!!',
        ];
        
        $this->validate($request,[
            'username' => 'required',
            'password' =>  'required',
        ],$messages);


        $user =array(
            'username' => $request->get('username'),
            'password' => $request->get('password'),
        );

        if( Auth::attempt($user) && Auth::user()->role == 1) {
            return redirect()->intended('/admin');
        }else if(Auth::attempt($user) && Auth::user()->role == 2){
            return redirect()->intended('/user');
        }else {
            $errors = new MessageBag(['errorlogin' => 'Tên tài khoản hoặc mật khẩu không đúng']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    	
    }
    
    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }

    public function imageLibrary(){
        $data = File::where('library',1)->get();
        return view('libraryimage', ['data'=>$data]);
    }

    public function fileLibrary(){
        $data = File::where('library',3)->get();
        return view('libraryfile', ['data'=>$data]);
    }

    public function videoLibrary(){
        $data = File::where('library',2)->get();
        return view('libraryvideo', ['data'=>$data]);
    }

    
    public function search(Request $request){
        $data = News::search($request->search);
        return view('search',  ['data' => $data]);
    }
}
