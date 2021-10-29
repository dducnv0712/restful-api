<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_name)
    {
        //
        $user_id = User::where('user_name',$user_name)->first();
        return Student::where('user_id',$user_id->id)->get();
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
            $student = new Student([
                'full_name' => $request->get('full_name'),
                'roll_number' => $request->get('roll_number'),
                'class_name' => $request->get('class_name'),
                'email' => $request->get('email'),
                'phone_number' => $request->get('phone_number'),
                'birthday' => $request->get('birthday'),
                'user_id' => $user_id->id,
            ]);
            $student->save();
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
        $student = Student::findOrFail($id);
        return response()->json([
            'status'=>200,
            'student'=>$student
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
            $student = Student::findOrFail($id);
            $student->update([
                'full_name' => $request->get('full_name'),
                'roll_number' => $request->get('roll_number'),
                'class_name' => $request->get('class_name'),
                'email' => $request->get('email'),
                'phone_number' => $request->get('phone_number'),
                'birthday' => $request->get('birthday'),
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
        try{
            $user_id = User::where('user_name',$user_name)->first();
            $student = Student::where('user_id',$user_id->id)->where('id',$id)->first();;
            $student->delete();
            return response()->json([
                'status' =>200,
                'message' => 'Delete Success',
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }

    }
}
