@extends('layouts.main')
@section('MainContent')

@php
use App\Models\Category;
$categorys = Category::all();

@endphp

<div class="row form-container" style="margin-top:-30px "> 
    <div class="col-md-3" >
        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="course_title">Course Title</label>
                <input type="text" name="course_title" id="course_title" class="form-control" style="width:300px; height: 40px;">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control" style="width:300px;">
                    <option value="">Select Category</option>
                    @foreach ($categorys as $category)
                        <option value="{{ $category->id }}" >{{ $category->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" value="{{ date('Y-m-d') }}" name="start_date" id="start_date" class="form-control" style="width: 300px; height: 40px;">
            </div>
            <div class="form-group">
                <label for="teacher">Teacher</label>
                <select name="teacher" id="teacher" class="custom-select mb-3" style="width: 300px;">
                    <option>Amna</option>
                    <option>Nada</option>
                    <option>Alaa</option>
                    <option>Deema</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hours">Hours</label>
                <input type="number" name="hours" id="hours" class="form-control"style="width: 300px;" >
            </div>
            <div class="form-group">
                <label for="max_students">Max Student</label>
                <input type="number" name="max_students" id="max_students" class="form-control"style="width: 300px;" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="form-group">
                    <label for="course_price">course_price</label>
                    <input type="number" name="course_price" id="course_price" class="form-control"style="width: 300px;" >
                </div>
                <label for="details">Details</label>
                <textarea name="details" id="editor"class="form-control" style="width:400px; height: 40px;"></textarea>
            </div>
   
            <button type="submit" class="btn btn-primary" id="btn-primaryy">Save</button>
        </form>
    </div>
<script>
    $(document).ready(function() {
        $("#btn-primaryy").click(function() {
            var course_title = $("#course_title").val();
            var category = $("#category").val();
            var start_date = $("#start_date").val();
            var teacher = $("#teacher").val();
            var hours = $("#hours").val();
            var max_students = $("#max_students").val();
            var course_price = $("#course_price").val();
            var details = $("#details").val();
        
            if (course_title && category && start_date && teacher && hours &&max_students && course_price && details ) {
                alert("Added Course successfully");
        } else {
            alert("Please fill in all the required fields.");
        }
        });
    });
</script>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
 tinymce.init({
  selector: 'textarea#editor'
});
</script>

@stop
