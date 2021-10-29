<?php

namespace App\Http\Controllers;

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
    public function post(){
        $auth_id = Auth::user()->id;
        $posts = Post::where('user_id',$auth_id)->get();
        return view('pages.post',[
            'posts'=>$posts,
        ]);
    }
    public function product(){
        return view('pages.product');
    }
    public function student(){
        return view('pages.student');
    }
}
