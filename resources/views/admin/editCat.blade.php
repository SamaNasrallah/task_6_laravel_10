@extends('layouts.main')
@section('MainContent')

<div class="row form-container">
    <div class="col-md-3" >
        <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @method('PUT')    
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control"  style="width: 400px; height: 40px;">
            </div>
            <button type="submit" class="btn btn-primary" id="btn-primary">Save</button>
        </form>
        <script>
            $(document).ready(function() {
               $("#btn-primary").click(function() {
                  alert("Update Category successfully");
              });
            });
         </script>
    </div>

</div>


@stop