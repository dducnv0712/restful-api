<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_name)
    {

        $user_id = User::where('user_name',$user_name)->first();
        return Product::where('user_id',$user_id->id)->get();

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
        try {
            $user_id = User::where('user_name',$user_name)->first();
            $product = new Product([
                'image' => $request->get('image'),
                'product_name' => $request->get('product_name'),
                'price' => $request->get('price'),
                'qty' => $request->get('qty'),
                'user_id' => $user_id->id,
            ]);
            $product->save();
            return response()->json([
                'status' => 200,
                'message' => "Create Success"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_name,$id)
    {
        //
        $user_id = User::where('user_name',$user_name)->first();
        $product = Product::findOrFail($id);
        return response()->json([
            'status'=>200,
            'product'=>$product
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user_name, $id)
    {
        //
        try {
            $user_id = User::where('user_name',$user_name)->first();
            $product = Product::findOrFail($id);
            $product->update([
                'image' => $request->get('image'),
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'user_id' => $user_id->id,
            ]);
            return response()->json([
                'status' => 200,
                'message' => "Update Success"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_name,$id)
    {
        //
        try {
         $user_id = User::where('user_name',$user_name)->first();
         $product = Product::where('user_id',$user_id->id)->where('id',$id)->first();;
         $product->delete();
         return response()->json([
             'status' =>200,
             'message' => 'Delete Success',
         ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }
}
