<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    //
    public function index(){
        return view('home');
    }
    //Post Page
    public function post(){
        $auth_id = Auth::user()->id;
        $posts = Post::where('user_id',$auth_id)->get();
        return view('pages.post',[
            'posts'=>$posts,
        ]);
    }
    public function create_post(Request $request,$username){

        try{

            $user_id = User::where('user_name',$username)->first();
            $post = new Post([
                'image'=>$request->get('image'),
                'title'=>$request->get('title'),
                'description' => $request->get('description'),
                'user_id' => $user_id->id,
            ]);
            $post->save();
            return redirect()->to($user_id->user_name.'/posts');
        }catch (\Exception $e){

        }
    }
    public function update_post(Request $request,$id){

        try{
            $auth_id = Auth::user()->id;
            $auth_username = Auth::user()->user_name;
            $post = Post::findOrFail($id);
            $post->update([
                'image'=>$request->get('image'),
                'title'=>$request->get('title'),
                'description' => $request->get('description'),
                'user_id' => $auth_id->id,
            ]);
            return redirect()->to($auth_username.'/posts');
        }catch (\Exception $e){

        }
    }
    public function delete_post($id){
        try{
            $post = Post::findOrFail($id);
            $post->delete();
        }catch (\Exception $e){

        }

    }

    public function product(){
        return view('pages.product');
    }
    public function student(){
        return view('pages.student');
    }
}
