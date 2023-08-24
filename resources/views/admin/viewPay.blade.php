<link rel="stylesheet"  href="{{asset('css/styleAd.css')}}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
 
<div class="course-price">
    Course Price : 
    @foreach ($course_student as $corr)
        @if (!isset($currentCoursePrice) || $currentCoursePrice !== $corr->courseStudent->course->course_price)
            {{ $corr->courseStudent->course->course_price }}
            @php
                $currentCoursePrice = $corr->courseStudent->course->course_price;
            @endphp
            @break
        @endif
    @endforeach
</div>
<div class="amount-paid">
    Amount Paid : 
    @foreach ($course_student as $corr)
        @if (!isset($currentAmountPaid) || $currentAmountPaid !== $corr->courseStudent->amount_paid)
            {{ $corr->courseStudent->amount_paid }}
            @php
                $currentAmountPaid = $corr->courseStudent->amount_paid;
            @endphp
            @break
        @endif
    @endforeach
</div>
<table  class="table table-success table-striped">

    <thead>
    <tr style="text-align: center;">
        <th>amount</th>
        <th>payment_date</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    @foreach ($course_student as $corr)
     <tr>
        <td>{{ $corr->amount }}</td>
        <td>{{ $corr->payment_date }}</td>
        <td>
            <form action="{{ route('payment.destroy', $corr->id) }}" method="post">
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
</tbody>

</table>

