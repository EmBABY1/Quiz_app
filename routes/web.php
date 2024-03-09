<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuizController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/user', function () {
  $result1= DB::select('select answer ,a1,a2,a3,a4,a.id,question,a.qid from answers a,quizzes q WHERE q.id=qid');
    return view('user',['quizzes'=>$result1]);
});
Route::get('/quizzes/create', [QuizController::class, 'create']);
Route::post('/quizzes', [QuizController::class, 'store']);
Route::get('/quizzes/{id}', [QuizController::class, 'show']);
Route::post('/checkanswer', [QuizController::class, 'checkanswer']);