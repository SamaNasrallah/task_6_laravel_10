<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.veiwSt', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.createSt');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_arabic' => 'required|string',
            'name_english' => 'required|string',
            'email' => 'required|email|unique:students,email', 

        ]);
        $data = $request->all();
        if ($request->input('educational_stage') === 'University') {
            $data['major'] = $request->input('major');
        } else {
            unset($data['major']);
        }
        $data['is_active'] = $request->has('is_active') ? true : false;
        try {
            Student::create($data);
            return redirect()->route('student.index')->with('success', 'Student added successfully');
        } catch (\Exception $e) {
           
                return redirect()->back()->with('error', 'Email already exists. Please choose a different email.')->withInput();
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        if (Student::exists($student)) {
        return view('student.details', compact('student'));
    } else {
        return response('Student Not Found', 404);
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        if (Student::exists($student)) {
        return view('student.editSt',compact('student'));
    } else {
        return response('Student Not Found', 404);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name_arabic' => 'required|string',
            'name_english' => 'required|string',
        ]);
        $input = $request->all();
        $student->update($input);
      
        return redirect()->route('student.index')
        ->with('success','Student Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if (Student::exists($student)) {
            $student->delete();
            return redirect()->route('student.index')
            ->with('success','Student Deleted successfully');
            } else {
                return response('Student Not Found', 404);
            }
    }

    public function toggleActivation(Student $student)
    {
        if (Student::exists($student)) {
           $student->update([
            'is_active' => !$student->is_active, 
            ]);
            return redirect()->back(); 
        } else {
            return response('Student Not Found', 404);
    }

    }
}
