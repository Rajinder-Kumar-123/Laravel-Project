@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Dashboard') }}</div>
                <button><a href="allQuestions">add teacher Questions</a></button>
                <button><a href="showQuestions">Show all Questions</a></button>
                <button><a href="phpQuestion">PHP Questions View</button>
                <button><a href="javascript/javascriptQuestion">Javascript Questions View</button>
                <button><a href="shortChoice">HTML Questions View</button>
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