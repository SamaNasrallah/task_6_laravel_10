<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use App\Models\Course;
use App\Models\Payment;

use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {
        // $courseStd = CourseStudent::all();
         $course_id = $request->route('course_id');
         $courseStd = CourseStudent::where('course_id', $course_id)->get();
          
         $course_student_id = $request->route('course_student_id');
         $course_student = Payment::where('course_student_id', $course_student_id)->get();

        return view('admin.stdCor', compact('course_id','courseStd','course_student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $maxStudents = $course->max_students;

        $registeredStudentsCount = $course->students()->count();

        if ($registeredStudentsCount < $maxStudents) {
            $courseStd = CourseStudent::where('course_id', $course_id)->get();
            return view('admin.register', compact('course_id', 'courseStd'));
        } else {
            return redirect()->route('register.index', $course_id)
                ->with('error', 'The maximum number of students has been reached for this course.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required', 
            'amount_paid' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|date|after:start_date'
        ]);
    
        $course_id = $request->course_id;
        $course = Course::findOrFail($course_id);
        $course_price = $course->course_price;
    
        $amount_paid = $request->amount_paid;
        $remaining_amount = $course_price - $amount_paid;
    
        $is_paid = $amount_paid >= $course_price ? true : false;
    
        $courseStudent = CourseStudent::create([
            "course_id" => $course_id,
            "student_id" => $request->student_id,
            "is_paid" => $is_paid,
            "amount_paid" => $amount_paid,
            "remaining_amount" => $remaining_amount,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
        ]);
    
        $course_student_id = $courseStudent->id;
    
        $payment = Payment::create([
            'course_student_id' => $course_student_id,
            'amount' => $request["amount_paid"],
            'payment_date' => $request["start_date"],
        ]);
        
        return redirect()->route('register.index', $course_id)
            ->with('success', 'Register added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(CourseStudent $courseStudent)
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseStudent $courseStudent)
    {
        return view('admin.editCorStd', compact('courseStudent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseStudent $courseStudent)
    {
        $request->validate([
            "start_date" => 'required',
            "end_date"=>'required'
        ]);
    
        $course = Course::findOrFail($courseStudent->course_id);
    

        $input = [
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
        ];
    
        $courseStudent->update($input);
    
        return redirect()->route('register.index', ['course_id' => $courseStudent->course_id])
            ->with('success', 'Register Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseStudent $courseStudent)
    {
        $courseStudent->delete();
        return redirect()->back()
            ->with('success', 'Register Deleted successfully');
    }
}
