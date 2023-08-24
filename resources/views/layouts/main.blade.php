<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="{{asset('css/styleAd.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
     
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <script>
      tinymce.init({
        selector: 'textarea#editor',
      });
    </script>
    <title>Document</title>
    @include('includes.pagStyle')
          
</head>
<body>

    <h1 class="nav nav-tabs" >
        <a href="{{route('course.index')}}" >  Admin  </a> 
    </h1>

    <div class="wrapper">
    <div class="sidebar">
        <ul>
            <li><a href="{{url('home')}}">Home</a></li>
            <li><a href="{{ route('student.index') }}">Student</a></li>
            <li><a href="{{ route('course.index') }}"> Course</a></li>
            <li><a href="{{ route('category.create') }}">Category</a></li>
            <li><a href="{{ url('/') }}">logout</a></li>
        </ul>
    </div>
</div>

         <!--   الجزء المتغير   -->
    <div class="container">
        @yield('MainContent')   
  </div>     
  
    
</body>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>let table = new DataTable('#myTable');</script>
<!-- JS Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@include('includes.pagjS')
</html>