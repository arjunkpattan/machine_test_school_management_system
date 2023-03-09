<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentMark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $marks = StudentMark::latest()->get();
    
        return view('admin.marks.index',compact('marks'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {
        $students = Student::all();
        return view('admin.marks.create',compact('students'));
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store(Request $request)
    {
        $customMessages = [
            'maths.numeric' => 'Mark must be a number',
            'science.numeric' => 'Mark must be a number',
            'computer.numeric' => 'Mark must be a number',
            'student_id.unique' => 'Mark has already been added for the selected student'

        ];

        $request->validate([
            'student_id' => 'required|unique:student_marks,student_id',
            'maths' => 'required|numeric',
            'science' => 'required|numeric',
            'computer' => 'required|numeric',
            'term' => 'required',
        ],$customMessages );

        StudentMark::create([
            'student_id' => $request->student_id,
            'maths' => $request->maths,
            'science' => $request->science,
            'computer' => $request->computer,
            'term' => $request->term,
            'total' => $request->maths + $request->science + $request->computer,
        ]);
        return redirect()->route('student-marks.index')
        ->with('success','Added successfully.');
    }

    public function edit(StudentMark $student_mark)
    {
        // dd('ok');
        // dd($student_mark);
        $students = Student::all();
        return view('admin.marks.edit',compact('student_mark','students'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $customMessages = [
            'maths.numeric' => 'Mark must be a number',
            'science.numeric' => 'Mark must be a number',
            'computer.numeric' => 'Mark must be a number',
            'student_id.unique' => 'Mark has already been added for the selected student'
        ];

        $request->validate([
            'student_id' => 'nullable',
            'maths' => 'required|numeric',
            'science' => 'required',
            'computer' => 'required',
            'term' => 'required',
        ],$customMessages);

        $mark = StudentMark::findOrFail($id);
        $mark->student_id = $mark->student_id;
        $mark->maths = $request->maths;
        $mark->science = $request->science;
        $mark->computer = $request->computer;
        $mark->term = $request->term;
        $mark->total = $request->maths + $request->science + $request->computer;
        $mark->save();
        return redirect()->route('student-marks.index')
        ->with('success','Updated successfully');
    }

    public function destroy(StudentMark $student_mark)
    {
        $student_mark->delete();
        return redirect()->route('student-marks.index')
        ->with('success','Data deleted successfully');
    }
}
