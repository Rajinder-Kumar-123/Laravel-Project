<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\registrationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::namespace('Auth')->group(function () {
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/register', function () {
    return view('register');
});
Route::post('registerForm', [registrationController::class, 'registerInsert']);
Route::get('loginForm/{id}', [registrationController::class, 'loginFetch']);


Route::get('/home', function () {
    return view('home');
});

});
Route::get('register_admin', function () {
    return view('register_admin');
});
Route::get('teacher', function () {
    return view('teacher');
});
Route::get('admin', function () {
    return view('admin');
});
Route::get('student', function () {
    return view('student');
});
Route::view("allQuestions", "allQuestions");
Route::view("multipleChoice", "multipleChoice");
Route::get('multipleChoice/{id}', [registrationController::class, 'multipleChoice']);
Route::view("longChoice", "longChoice");
Route::get('longChoice/{id}', [registrationController::class, 'longChoice']);
Route::view("shortChoice", "shortChoice");
Route::get('shortChoice/{id}', [registrationController::class, 'shortChoice']);
Route::post('questions' , [registrationController::class, 'questions']);

//Route::view('showQuestions', [registrationController::class,'showQuestions']);
Route::get('showQuestions', [registrationController::class, 'index']);
Route::get('destroyController/{id}', [registrationController::class, 'destroyController']); 
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/admin', [registrationController::class, 'handleAdmin'])->name('admin.route')->middleware('admin');
