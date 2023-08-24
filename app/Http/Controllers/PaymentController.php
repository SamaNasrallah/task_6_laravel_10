<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\CourseStudent;
use App\Models\Course;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $course_student_id = $request->route('course_student_id');
        $course_student = CourseStudent::where('student_id', $course_student_id)->get();
        $course_id = $request->route('course_id');
        $courseStd = CourseStudent::where('course_id', $course_id)->get();
        return view('admin.stdCor', compact( 'course_id','courseStd','course_student_id', 'course_student'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $course_student_id = $request->route('course_student_id');
        $course_student = CourseStudent::where('student_id', $course_student_id)->get();
        return view('admin.createPay', compact('course_student_id', 'course_student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'payment_date' => 'required',
        ]);
    
        $course_student_id = $request->route('course_student_id');
        $course_student = CourseStudent::findOrFail($course_student_id);
        $course_id = $course_student->course_id;
    
        $payment_amount = $request->amount;
        $new_amount_paid = $course_student->amount_paid + $payment_amount;
    
        $course = Course::findOrFail($course_id);
        $course_price = $course->course_price;
    
        if ($new_amount_paid > $course_price) {
            return redirect()->route('register.index', ['course_id' => $course_id])
                ->with('error', 'The total payment amount exceeds the course price.');
        }
    
        $remaining_amount = $course_student->remaining_amount - $payment_amount;
        $course_student->update(['remaining_amount' => $remaining_amount,
        'amount_paid' => $new_amount_paid]);
    
        Payment::create([
            "course_student_id" => $course_student_id,
            "amount" => $payment_amount,
            "payment_date" => $request->payment_date,
        ]);
    
        return redirect()->route('register.index', ['course_id' => $course_id])
            ->with('success', 'Payment Added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Payment $payment ,Request $request)
    {
        $course_student_id = $request->route('course_student_id');
        $course_student = Payment::where('course_student_id', $course_student_id)->get();
        return view('admin.viewPay', compact('course_student_id', 'course_student'));
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {

        $course_student = CourseStudent::findOrFail($payment->course_student_id);

        $new_amount_paid = $course_student->amount_paid - $payment->amount;
        $remaining_amount= $course_student->remaining_amount + $payment->amount;
        $course_student->update(['amount_paid' => $new_amount_paid,
                   'remaining_amount' => $remaining_amount
                 ]);
    
        $payment->delete();
        return redirect()->back()
            ->with('success', 'Payment Deleted successfully');
    }
}
