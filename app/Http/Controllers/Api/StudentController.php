<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Model\Student;
use DB;

class StudentController extends Controller
{
   
    public function index()
    {
        $student = DB::table('students')->get();
        // $student = Student::all(); //Elequent
        return response()->json($student);
    }

    public function store(Request $request)
    {
        // make validation
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['photo'] = $request->photo;
        DB::table('students')->insert($data);
        return response('Data Inserted Successfully');
    }

    public function show($id)
    {
        $student = Student::find($id);
        // $student = DB::table('students')->where('id',$id)->first();

        return response()->json($student);
    }


    public function update(Request $request, $id)
    {
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['photo'] = $request->photo;
        DB::table('students')->where('id',$id)->update($data);
        return response('Data Updated Successfully');
    }

    public function destroy($id)
    {
        $img = DB::table('students')->where('id',$id)->first(); //get the data
        $image_path = $img->photo; //get only image

        unlink($image_path); //image deleted from folder
        DB::table('students')->where('id',$id)->delete(); //data deleted from database
        return response("Deleted successfull");
    }
}
