<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\ClassName;
use App\Model\Subject;

class SubjectController extends Controller
{
    
    public function index()
    {
        $subject = Subject::all();
        return response()->json($subject);
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' =>'required',
            'subject_name'=>'required|unique:subjects|max:25',
            'subject_code'=>'required|unique:subjects|max:25'
        ]);

        $subject= Subject::create($request->all());

         //return response()->json($subject);

        return response("Data Inserted Successfully");
    }

    
    public function show($id)
    {
        $subject= Subject::find($id);
        return response()->json($subject);
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findorfail($id);
        $subject->update($request->all());
        return response('Updated Successfully');
    }

    public function destroy($id)
    {
        Subject::find($id)->delete();
        return response('deleted done');
    }
}
