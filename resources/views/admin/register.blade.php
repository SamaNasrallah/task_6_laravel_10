@extends('layouts.main')
@section('MainContent')

@php
use App\Models\Student;
use App\Models\Course; 
$students = Student::all();
$course = Course::findOrFail($course_id)

@endphp

<div class="row form-container">
    <div class="col-md-3" >
        <form action="{{ route('course-students.store', ['course_id' => $course_id]) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="course_id" value="{{ $course_id }}">
            
            <div class="form-group">
                <label for="student">Name Student</label>
                <select name="student_id" id="student" class="form-control" style="width:300px;">
                    <option value="">Select student</option>
                    @foreach ($students as $student)
                        @if ($student->is_active)
                    <option value="{{ $student->id }}">{{ $student->name_english }}</option>
                      @endif                 
                   @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="amount_paid">amount_paid</label>
                <input type="number" name="amount_paid" id="amount_paid" class="form-control"style="width: 300px;" >
            </div>
   
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ date($course->start_date) }}"  min="{{ $course->start_date }}" class="form-control" style="width: 300px; height: 40px;">
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date"  value="{{ date($course->start_date) }}" min="{{ $course->start_date }}"  class="form-control" style="width: 300px; height: 40px;">
                
            </div>
            <button type="submit" class="btn btn-primary" id="btn-primary">Save</button>
        </form>
    </div>
<script>
    $(document).ready(function() {
        $("#btn-primary").click(function() {
            var student = $("#student").val();
            var amount_paid = $("#amount_paid").val();
            var start_date = new Date($("#start_date").val());
            var end_date = new Date($("#end_date").val());

            if (end_date <= start_date) {
                alert("End date should be greater than start date.");
                event.preventDefault();  
            }else if (student && amount_paid && start_date && end_date  ) {
            alert("Register Added successfully");
             } else {
            alert("Please fill in all the required fields.");
        }
        });
    });
</script>
</div>

@stop
