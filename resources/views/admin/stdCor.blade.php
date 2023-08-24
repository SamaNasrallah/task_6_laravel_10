@extends('layouts.main')
@section('MainContent')
<br>
@if(session('error'))
    <div class="alert alert-danger" style=" position: fixed;   top: 0;
              left: 50%;
              transform: translateX(-50%);
              z-index: 1000;
              width:600px;
              text-align: center;">
        {{ session('error') }}
    </div>

@endif
@if(session('success'))
    <div class="alert alert-success" style=" position: fixed;   top: 0;
              left: 50%;
              transform: translateX(-50%);
              z-index: 1000;
              width:600px;
              text-align: center;">
        {{ session('success') }}
    </div>

@endif


    <a href="{{ url('reg/create/'.$course_id) }}" class="btn btn-success" style="font-size: 18px">Register_Student</a>
<table id="myTable" class="table table-success table-striped" >

    <thead>
    <tr style="text-align: center;">
        <th>ID</th>
        <th>name_english</th>
        <th>is_paid</th>
        <th>amount_paid</th>
        <th>remaining_amount</th>
        <th>start_date</th>
        <th>end_date</th>
        <th>View Payments</th>
        <th>Payment</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    @foreach ($courseStd as $corr)
     <tr>
        <td>{{ $corr->id }}</td>
        <td>{{ $corr->student->name_english }}</td> 
        <td>
            @if($corr->is_paid == 0)
            @if($corr->amount_paid == 0)
                Payment is not made
            @elseif($corr->amount_paid < $corr->course->course_price)
                Partial payment made
            @else
                Payment was made
            @endif
              @else
              payment was made

        @endif
        </td>
        <td>{{ $corr->amount_paid }}</td>
        <td>{{ $corr->remaining_amount }}</td>
        <td>{{ $corr->start_date }}</td>
        <td>{{ $corr->end_date }}</td>
        <td>
            <a class="btn btn-warning btn-view" data-toggle="modal" data-target="#studentModall{{$corr->id}}"
               style="background-color:rgb(55, 107, 149);border-color: rgb(55, 107, 149); color:white;"
               href="#">
                View
            </a>
        </td>
        <div class="modal fade" id="studentModall{{$corr->id}}" tabindex="-1" role="dialog"
            aria-labelledby="studentModalLabell{{$corr->id}}" aria-hidden="true">
           <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="studentModalLabell{{$corr->id}}">View Payment</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <div class="modal-body">
                           <iframe src="{{ route('payments.show', $corr->id) }}" width="100%" height="400"></iframe>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   </div>
               </div>
           </div>
       </div>
       
       
        <td>
            @if($corr->amount_paid < $corr->course->course_price)
            <a class="btn btn-warning"  data-toggle="modal" data-target="#studentModal{{$corr->id}}"style="background-color:rgb(94, 141, 182);border-color: rgb(94, 141, 182); color:white;"
            href="#">
                Payment
            </a>
        @endif
        </td>
         
        <div class="modal fade" id="studentModal{{$corr->id}}" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel{{$corr->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentModalLabel{{$corr->id}}">Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('payments.store', ['course_student_id' => $corr->id]) }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="course_student_id" value="{{ $corr->id }}">
                           
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" name="amount" id="amount" class="form-control"style="width: 300px;" >
                            </div>
                   
                            <div class="form-group">
                                <label for="payment_date">Payment Date</label>
                                <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{ date('Y-m-d') }}" style="width: 300px; height: 40px;">
                            </div>
                            <button type="submit" class="btn btn-primary" id="btn-primary">Save</button>
                        </form>
                    </div>
              
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        

        <td>
            <a class="btn btn-primary" href="{{route('course-students.edit',$corr->id) }}">
                Edit
            </a>
        </td>
        <td>
            <form action="{{ route('course-students.destroy', $corr->id) }}" method="post">
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
              alert("Payment Deleted successfully");
          });
        });
     </script>

       <script>
                $(document).ready(function() {
                    $(".payment-form").submit(function (event) {
                         event.preventDefault(); 

                      var amount = $(this).find(".amount").val();
                      var payment_date = $(this).find(".payment_date").val();

                      if (amount && payment_date) {
                      if (parseFloat(amount) + parseFloat(courseStudent.amount_paid) < parseFloat(courseStudent.course.course_price)) {
                          alert("Payment Added successfully");
                            } else {
                           alert("Payment amount exceeds course price.");
                         }
                    } else {
                           alert("Please fill in all the required fields.");
                  }
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
