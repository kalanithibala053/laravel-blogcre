<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
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
    if(session()->has('username')){
        return redirect("vie");
    }else{
    return view('welcome');}
});
Route::get('/login', function () {
    if(session()->has('username')){
        return redirect("vie");
    }else{
    return view('login');}
});
Route::view('/register', 'register');

Route::view('/header','header');
Route::view('/cblog','cblog');
Route::get('/logout', function () {
    if(session()->has('username'))
    {
        session()->pull('username');
    }
    return redirect('login');
});
Route::post('/login', [AuthController::class, 'login']); 
Route::post('/register', [AuthController::class, 'register']);
Route::get('/profile',[AuthController::class,'Profile']);
Route::post('/editprofile',[AuthController::class,'editprofile']);
Route::post('/changepass',[AuthController::class,'changepass']);
Route::view('/forgetpass','forgetpass');
Route::post('/forgetpass',[AuthController::class,'forget']);
Route::post('/changepass',[AuthController::class,'changepass']);
Route::get('/global',[BlogController::class,'All']);
Route::post('/cblog', [BlogController::class, 'Insert']);
Route::post('/vietitle', [BlogController::class, 'searchuser']);
Route::view('/edit','edit');
Route::get('/vie',[BlogController::class,'viewucon']);
Route::view('/vietitle','vietitle');
Route::post('/like', 'BlogController@like');
Route::post('/like', [BlogController::class, 'like'])->name('like.post');


Route::get('/ed',[BlogController::class,'ed']);
Route::post('/edit',[BlogController::class,'edit']);



Route::get('/delete',[BlogController::class,'delete']);
Route::post('/global1', [BlogController::class, 'search']);
Route::view('/global1','global1');
