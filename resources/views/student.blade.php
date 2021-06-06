
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-center card-header"><h2>{{ __('Dashboard') }}</h2> You  have only to select only one out of four choice Best of luck :)
                </div><br>
               <button><a href="question-answer"> ALL Multiple Choice Question </a><button> 
               <button><a href="php/question-answer">PHP Question </a><button>
               <button><a href="javascript/question-answer">Javascript Question </a><button>
               <button><a href="question-answer">HTML Question </a><button> 
               <button><a href="question-answer">CSS Question </a><button> 
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
