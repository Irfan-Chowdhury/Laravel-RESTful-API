<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\ClassName;

class ClassNameController extends Controller
{
    
    public function index()
    {
        // $class = DB::table('class_names')->get();
        $class = ClassName::all();

        return response()->json($class);
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_name' =>'required|unique:class_names|max:25'
        ]);

        $class = New ClassName();
        $class->class_name = $request->class_name;
        $class->save();

        // $data = array();
        // $data['class_name'] = $request->class_name;
        // DB::table('classes')->insert($data);
        return response('Successfully done');
    }


    public function show($id)
    {
        $class = ClassName::find($id);
        return response()->json($class);
    }

    

    public function update(Request $request, $id)
    {
        $class = ClassName::find($id);
        $class->class_name = $request->class_name;
        $class->update();
        
        return response('Updated Successfully');
    }

    
    public function destroy($id)
    {
        // DB::table('classes')->where('id',$id)->delete();
        $class = ClassName::find($id);
        $class->delete();

        return response('Class Deleted');
    }
}
