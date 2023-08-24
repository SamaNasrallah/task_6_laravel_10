@extends('layouts.main')
@section('MainContent')

<div class="row form-container">
    <div class="col-md-3" >
        <form action="{{ route('payments.store', ['course_student_id' => $course_student_id]) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="course_student_id" value="{{ $course_student_id }}">

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control"style="width: 300px;" >
            </div>
   
            <div class="form-group">
                <label for="payment_date">Payment Date</label>
                <input type="date" name="payment_date" id="payment_date" class="form-control" style="width: 300px; height: 40px;">
            </div>
            <button type="submit" class="btn btn-primary" id="btn-primary">Save</button>
        </form>
    </div>
<script>
$(document).ready(function() {
    $("#btn-primary").click(function() {
        var amount = $("#amount").val();
        var payment_date = $("#payment_date").val();

        if (amount && payment_date) {
            alert("Payment Added successfully");
        } else {
            alert("Please fill in all the required fields.");
        }
    });
});
</script>

@stop
 
{{--   يعني هاد الصفحة  مش راح استخدمها  stdCor في صفحة عرض ال  create عملت  --}}
