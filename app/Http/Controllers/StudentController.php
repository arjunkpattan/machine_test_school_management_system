<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::all();
    
        return view('admin.student.index',compact('students'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {
        $countries =  Country::get(["name", "id"]);
        return view('admin.student.create',compact('countries'));
    }
    
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|numeric',
            'gender' => 'required',
            'number' => 'required|numeric',
            'email' => 'required|email|max:255|unique:students',
            'country_id' => 'required',
            'state_id' => 'required',

        ]);

        Student::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'number' => $request->number,
            'email' => $request->email,
            'state_id' => $request->state_id,
            'country_id' => $request->country_id,
        ]);
        return redirect()->route('students.index')
        ->with('success','Student has been created successfully.');
    }

    public function edit(Student $student)
    {
        
        $countries = Country::all();
        return view('admin.student.edit',compact('countries','student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|numeric',
            'gender' => 'required',
            'number' => 'required|numeric',
            'email' => 'required|email|max:255',
            'country_id' => 'required',
            'state_id' => 'required',
        ]);
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->number = $request->number;
        $student->email = $request->email;
        $student->country_id = $request->country_id;
        $student->state_id = $request->state_id;
        $student->save();
        return redirect()->route('students.index')
        ->with('success','Student has been updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
        ->with('success','Student has been deleted successfully');
    }
}
