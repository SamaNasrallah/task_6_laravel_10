@extends('layouts.main')
@section('MainContent')
<br>
@php
use App\Models\Student;
$students = Student::all();
@endphp
<a href="{{ route('student.create') }}" class="btn btn-success" style="font-size: 18px">Add Student</a>

<table id="myTable" class="table table-success table-striped" >
    <thead>
    <tr style="text-align: center;">
        <th>ID</th>
        <th>Name Arabic</th>
        <th>Name English</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Is Active</th>
        <th>Details</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    @foreach ($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name_arabic }}</td>
        <td>{{ $student->name_english }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td>{{ $student->address }}</td>
        <td>
            <div class="activation-icon">
                <form action="{{ route('student.toggleActivation', $student->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn-activation" id="btn-activation_{{ $student->id }}">
                        @if($student->is_active)
                            <i class="fas fa-check-circle" style="font-size: 20px;"></i> 
                        @else
                            <i class="fas fa-times-circle" style="font-size: 20px;"></i> 
                        @endif
                    </button>
                </form>
            </div>
        </td>
        <td>
            <a class="btn btn-secondary" href="#" data-toggle="modal" data-target="#studentModal{{$student->id}}">Details</a>
        </td>
        
        <div class="modal fade" id="studentModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel{{$student->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentModalLabel{{$student->id}}">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Name Arabic : {{$student->name_arabic}}</p>
                        <p>Nama English : {{$student->name_english}}</p>
                        <p>BOD : {{$student->birth_date}}</p>
                        <p>Educational_stage : {{$student->educational_stage}}</p>
                        <p>Major : {{$student->major}}</p>
                        <p>Phone : {{$student->phone}}</p>
                        <p>Email: {{$student->email}}</p>
                        <p>Address: {{$student->address}}</p>
                        <p>Details: {{$student->details}}</p>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <td>   
            @if ($student->is_active)
            <a class="btn btn-primary" href="{{route('student.edit',$student->id)}}">
           Edit
         </a>
         @else
         <a class="btn btn-primary">
            <span class="badge" style="background-color: gray;">Edit</span>
        </a>
      @endif
        </td>
        <td>
            <form action="{{ route('student.destroy', $student->id) }}" method="post">
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
<script>
    $(document).ready(function () {
  $('#myTable').DataTable({
    "paging": true,
    "ordering": true,
    "searching": true,
    "initComplete": function () {
        $('#myTable').css('width', '80%');
        $('#myTable_wrapper').css('margin-left', '100px');
    }
  });
});
</script>


</table>

@stop
