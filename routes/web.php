<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\registrationController;
use  App\Http\Controllers\adminController;
use  App\Http\Controllers\studentController;
use  App\Http\Controllers\teacherController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\phpQuestionController;
use App\Http\Controllers\javascriptQuestionController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/register', function () {
    return view('register');
});
Route::post('registerForm', [registrationController::class, 'registerInsert']);
Route::get('loginForm', [registrationController::class, 'loginFetch']);

/* 
Route::get('/home', function () {
    return view('home');
});
 */


Route::get('teacher', function () {
    return view('teacher');
});
Route::get('admin', function () {
    return view('admin');
});
/* Route::get('student', function () {
    return view('student');
}); */




//php question and Answer
Route::view("php/addPhpQuestion", "php/addPhpQuestion");
Route::view("php/phpQuestion", "php/phpQuestion");
Route::post('php/phpQuestions', [phpQuestionController::class, 'php_question']);
Route::get('php/phpQuestion', [phpQuestionController::class, 'index']);
Route::get('php/phpDestroyController/{id}', [phpQuestionController::class, 'phpDestroyController']); 
Route::get('php/phpDetailPreview/{id}', [phpQuestionController::class, 'phpDetailPreview']);
Route::get('php/phpEdit/{id}', [phpQuestionController::class, 'edit']);
Route::put('php/phpUpdate/{id}', [phpQuestionController::class, 'update']);
Route::get('php/php/question-answer', [phpQuestionController::class, 'showData']);
Route::post('php/php/result-show', [phpQuestionController::class, 'resultShow']);

//Javascript Question ans Answer
Route::view("javascript/javascriptQuestion", "javascript/javascriptQuestion");
 Route::view("javascript/addjavascriptQuestion", "javascript/addjavascriptQuestion");
Route::get('javascript/javascriptQuestion', [javascriptQuestionController::class, 'index']);
Route::post('javascript/javascriptQuestions', [javascriptQuestionController::class, 'javascript_question']);
Route::get('javascript/javascriptDestroyController/{id}', [javascriptQuestionController::class, 'javascriptDestroyController']); 
Route::get('javascript/javascriptDetailPreview/{id}', [javascriptQuestionController::class, 'javascriptDetailPreview']);
Route::get('javascript/javascriptEdit/{id}', [javascriptQuestionController::class, 'edit']);
Route::put('javascript/javascriptUpdate/{id}', [javascriptQuestionController::class, 'update']);
Route::get('javascript/question-answer', [javascriptQuestionController::class, 'showData']);
Route::post('javascript/result-show', [javascriptQuestionController::class, 'resultShow']);

Route::view("htmlQuestion", "htmlQuestion");
Route::get('shortChoice', [registrationController::class, 'shortChoice']);



//Route::view('showQuestions', [registrationController::class,'showQuestions']);

//All Question ans Answer
Route::view("allQuestions", "allQuestions");
Route::post('questions' , [registrationController::class, 'questions']);
Route::get('showQuestions', [registrationController::class, 'index']);
Route::get('question-answer', [registrationController::class, 'showData']);
Route::post('result-show', [registrationController::class, 'resultShow']);
Route::get('edit/{id}', [registrationController::class, 'edit']);
Route::put('update/{id}', [registrationController::class, 'update']);
Route::get('detailPreview/{id}', [registrationController::class, 'detailPreview']);
Route::get('destroyController/{id}', [registrationController::class, 'destroyController']); 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [adminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/student', [studentController::class, 'index'])->name('student')->middleware('student');
Route::get('/teacher', [teacherController::class, 'index'])->name('teacher')->middleware('teacher');
//Route::get('/admin', [registrationController::class, 'handleAdmin'])->name('admin.route')->middleware('admin');
/* 
Route::group(['prefix' => 'v1'], function () {
     Route::get('sendmail', [MailController::class, 'sendmail']);
     });
 */
Route::get('sendmail', [MailController::class, 'sendmail']);

Route::get('sendbasicemail',[MailController::class, 'basic_email']);