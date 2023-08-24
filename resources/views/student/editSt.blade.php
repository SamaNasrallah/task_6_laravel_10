@extends('layouts.main')
@section('MainContent')

@php
use App\Models\Student;
$students = Student::all();

@endphp

<div class="row form-container">
    <div class="col-md-3" >
        
        @if ($errors->any())
        <div class="alert alert-warning" style="height: 50px ; width: 400px; margin-left: 50px; margin-top: -100px">
        <ul style='list-style:none;'>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul></div><br />
        @endif

        <form action="{{ route('student.update',$student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')  
            <div class="form-group">
                <label for="name_arabic">Name Arabic</label>
                <input type="text" name="name_arabic" value="{{$student->name_arabic}}"  id="name_arabic" class="form-control" style="width:300px; height: 40px;">
            </div>
            <div class="form-group">
              <label for="name_english">Name English</label>
              <input type="text" name="name_english" value="{{$student->name_english}}" id="name_english" class="form-control" style="width:300px; height: 40px;">
          </div>
            <div class="form-group">
                <label for="birth_date">Birth Date</label>
                <input type="date" name="birth_date"  max="{{ date('2017-12-31') }}" value="{{$student->birth_date}}" id="birth_date" class="form-control" style="width: 300px; height: 40px;">
            </div>

            <div class="form-group">
                <label for="educational_stage">Educational Stage</label>
                <select name="educational_stage" id="educational_stage" class="form-control" style="width: 300px; height: 40px;">
                    <option value="Primary" @if (old('educational_stage', $student->educational_stage) === 'Primary') selected @endif>Primary</option>
                    <option value="Middle" @if (old('educational_stage', $student->educational_stage) === 'Middle') selected @endif>Middle</option>
                    <option value="High School" @if (old('educational_stage', $student->educational_stage) === 'High School') selected @endif>High School</option>
                    <option value="University" @if (old('educational_stage', $student->educational_stage) === 'University') selected @endif>University</option>
                </select>
            </div>
            <div class="form-group" id="major-field" @if (old('educational_stage', $student->educational_stage) !== 'University') style="display: none;" @endif>
                <label for="major">Major</label>
                <input type="text" name="major" id="major" value="{{ old('major', $student->major) }}" class="form-control" style="width: 300px; height: 40px;">
            </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{$student->email}}"  style="width:300px; height: 40px;">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" name="phone" id="phone" class="form-control"value="{{$student->phone}}" style="width:300px; height: 40px;">
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control" value="{{$student->address}}" style="width:300px; height: 40px;">
    </div>

            <div class="form-group">
                <label for="details">Details</label>
                <input type="text" name="details" id="details" class="form-control" value="{{$student->details}}" style="width:300px; height: 40px;">

                {{-- <textarea name="details" id="editor"class="form-control" style="width:400px; height: 60px;"></textarea> --}}
            </div>

            <button type="submit" class="btn btn-primary" id="btn-update">Save</button>
        </form>
    </div>
<script>
    $(document).ready(function() {
        $("#btn-update").click(function() {
            alert("Update Student successfully");
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

<script>
    document.getElementById('educational_stage').addEventListener('change', function() {
        const majorField = document.getElementById('major-field');
        if (this.value === 'University') {
            majorField.style.display = 'block';
        } else {
            majorField.style.display = 'none';
        }
    });
    </script>


@stop
