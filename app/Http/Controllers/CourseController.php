<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Payment;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.dashboard', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_title' => 'required',
            'category_id' => 'required', 
            'details' =>'required',
            'hours' =>'required',
            'start_date' =>'required',
            'teacher' =>'required',
            'max_students'=>'required|integer|min:1',
            'course_price'=>'required'
        ]);
       

        $course = Course::create([
            "course_title" => request("course_title"),
            "category_id" => request('category_id'),
            "details" => request("details"),
            "hours" => request("hours"),
            "start_date" => request("start_date"),
            "teacher" => request("teacher"),
            "max_students"=>request("max_students") ,
            "course_price"=>request("course_price")
        ]);
       
        return redirect()->route('course.index')
        ->with('success','Course added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.edit',compact('course'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_title' => 'required',
        ]);
    
        $course_price = $request->course_price;
    
        $input = $request->all();
        $course->update($input);
    
        foreach ($course->students as $student) {
            $amount_paid = $student->pivot->amount_paid; 
            $new_remaining_amount = $course_price - $amount_paid; 
            $student->pivot->update(['remaining_amount' => $new_remaining_amount]);
        }
    
        return redirect()->route('course.index')
            ->with('success', 'Course Updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if (Course::exists($course)) {
        $course->delete();
        return redirect()->route('course.index')
        ->with('success','Course Deleted successfully');
        } else {
            return response('Course Not Found', 404);
        }
        
    }
}
