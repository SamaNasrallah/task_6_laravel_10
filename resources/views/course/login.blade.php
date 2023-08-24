<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="{{asset('css/style.css')}}">
    <title>Courses</title>
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Course</h2>
            </div>
        </div>
        <div class="content">
            <h1>Training  <br><span>Courses </span></h1>
            <p class="par">Training courses are specialized educational programs designed to
                 develop skills or acquire <br> new knowledge in a specific field. These courses aim 
                 to provide  participants with the information <br>and expertise necessary  to meet their 
                 professional or educational goals.  Courses can vary widely <br>depending on the areas and topics they cover, 
                 such as technology, marketing, languages, <br>leadership, personal development, and more.</p>


                <form method="POST" action="{{route('login.store')}}">
                    @csrf
                    <div class="form">
                    <h2>Login Admim</h2>
                    <input type="email" name="email" placeholder="Enter Email Here">
                    <input type="password" name="password" placeholder="Enter Password Here">
                    <button class="btnn">Login</a></button>

          
                </div>
            </form>
                    </div>
    </div>
</div>
</div>
@if (isset($invalidEmPs) && $invalidEmPs)
    <script>
        alert('Invalid Email or Password');
    </script>
@endif
</body>
</html>