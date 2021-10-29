<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_name)
    {
        //
        try{
        $user_id = User::where('user_name',$user_name)->first();
        return Post::where('user_id',$user_id->id)->get();
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$user_name)
    {
        //
        try{
            $user_id = User::where('user_name',$user_name)->first();
            $post = new Post([
                'image'=>$request->get('image'),
                'title'=>$request->get('title'),
                'description' => $request->get('description'),
                'user_id' => $user_id->id,
            ]);
            $post->save();
            return response()->json([
                'status' => 200,
                'message' => "Create Success"
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *  @param  string  $user_name
     * @return \Illuminate\Http\Response
     */
    public function show($user_name,$id)
    {
        //
        try{
        $user_id = User::where('user_name',$user_name)->first();
        $post = Post::where('user_id',$user_id->id)->where('id',$id)->first();
        return response()->json([
            'status'=>200,
            'post'=>$post
        ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $user_name
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user_name, $id)
    {
        //

        try{
            $user_id = User::where('user_name',$user_name)->first();
            $post = Post::findOrFail($id);
            $post->update([
                'image'=>$request->get('image'),
                'title'=>$request->get('title'),
                'description' => $request->get('description'),
                'user_id' => $user_id->id,
            ]);
            return response()->json([
                'status' => 200,
                'message' => "Update Success"
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  string $user_name
     * @return \Illuminate\Http\Response
     */

    public function destroy($user_name, $id)
    {
        //
        try{
            $user_id = User::where('user_name',$user_name)->first();
            $post = Post::where('user_id',$user_id->id)->where('id',$id)->first();
            $post->delete();
            return response()->json([
                'status' => 200,
                'message' => "Delete Success"
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        };
    }
}
