<h1>hello, Teacher portal</h1>
<h1><button><a href="showQuestions">Show all Questions</a></button></h1>
<h1><button><a href= "allQuestions" >add teacher Questions</a></button><h1>
<button><a href="multipleChoice">Multiple choice Questions</button>
<button><a href="longChoice">Long Choice Questions</button>
<button><a href="shortChoice">Short Choice Questions</button>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

