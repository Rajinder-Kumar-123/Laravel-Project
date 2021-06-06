
@extends('layouts.app')
@section('content')

<html>
<head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
<div class="card">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-center card-header"><h2> You  have only to select only one out of four choice Best of luck :)
                </div><br>
                <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        @endif
                        </div>
                   
                <form method="post" action="result-show">
                @csrf
               
                @foreach($users as $user)
                <div class="card-header card-body">
                 
                 <ul><li>{{$user->name}}</li></ul>
                 
                    @foreach($answers as $ans)
                    @if($ans->question_id == $user->id)

                    <div class="card-body">
                    <input type="radio" name="option[{{$ans->question_id}}]" value="{{$ans->id}}">
                    {{$ans->answer}}

                        </div>
                @endif

                    @endforeach
                    </div>
                @endforeach
                <input type="submit" value="submit" name="submit" class="btn btn-success m-auto d-block">
                 </form>
                
            </div>
          </div>  
        </div>
    </div>
    
</div>
</body>

</html>
@endsection