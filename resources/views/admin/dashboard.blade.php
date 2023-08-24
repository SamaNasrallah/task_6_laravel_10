@extends('layouts.main')
@section('MainContent')
<br>
@php
use App\Models\Course;
$courses = Course::all();

@endphp
<a href="{{ route('course.create') }}" class="btn btn-success" style="font-size: 18px">Add Course</a>

<table class="table table-success table-striped" >
    <thead>
    <tr style="text-align: center;">
        <th>ID</th>
        <th>Course Title</th>
        <th>Category</th>
        <th>Hours</th>
        <th>Start Date</th>
        <th>Teacher</th>
        <th>Max Student</th>
        <th>Details</th>
        <th>Student</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    @foreach ($courses as $course)
    <tr>
        <td>{{ $course->id }}</td>
        <td>{{ $course->course_title }}</td>
        <td>{{ $course->category->name }}</td>
        <td>{{ $course->hours }}</td>
        <td>{{ $course->start_date }}</td>
        <td>{{ $course->teacher }}</td>
        <td>{{$course->max_students}}</td>
        <td>
            <a class="btn btn-secondary" href="#" data-toggle="modal" data-target="#studentModal{{$course->id}}">Details</a>
        </td>
        
        <div class="modal fade" id="studentModal{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel{{$course->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentModalLabel{{$course->id}}">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Course Title : {{$course->course_title}}</p>
                        <p>Category Nama : {{$course->category->name}}</p>
                        <p>Hours : {{$course->hours}}</p>
                        <p>Start Date : {{$course->start_date}}</p>
                        <p>Teacher : {{$course->teacher}}</p>
                        <p>max_students : {{$course->max_students}}</p>
                        <p>course_price : {{$course->course_price}}</p>
                        <p>Details :{!! $course->details !!}</p>
                     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <td>
            <a class="btn btn-info" href="{{route('register.index',$course->id)}}">
                Student
              </a>
        </td>
        <td>   <a class="btn btn-primary" href="{{route('course.edit',$course->id)}}">
           Edit
         </a>
        </td>
        <td>
            <form action="{{ route('course.destroy', $course->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" id="btn-delete-co">
                   Delete
                </button>
             </form>
        </td>

    </tr>
    @endforeach
    <script>
        $(document).ready(function() {
           $("#btn-delete-co").click(function() {
              alert("Delete Course successfully");
          });
        });
     </script>
</tbody>
</table>

@stop
