<?php

use App\Http\Controllers\LangController;
use App\Http\Controllers\notificationcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\authcontroller;

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

Route::get('/',[PageController::class,'mini'])->name('main');
Route::get('welcome',[PageController::class, 'welcom']);
Route::get('about',[PageController::class,'about'])->name('about');
Route::get("service",[PageController::class, 'service'])->name('service');
Route::get("project",[PageController::class, 'project'])->name('project');
Route::get("contact",[PageController::class, 'contact'])->name('contact');

Route::get('login',[authcontroller::class,'login'])->name('login');
Route::post('authenticate',[authcontroller::class,'authenticate'])->name('authenticate');
Route::post('logout',[authcontroller::class,'logout'])->name('logout');
Route::get('register',[authcontroller::class,'register'])->name('register');
Route::post('register',[authcontroller::class,'register_user'])->name('register.user');

Route::middleware('auth')->group(function (){
    Route::get('notifications/{notification}/read',[notificationcontroller::class, 'read'])->name('notification.read');

});

Route::get('language/{locale}',[LangController::class,'change_locale'])->name('locale.change');


//Route::resource('posts',PostController::class);
Route::resources([
    'posts'=>PostController::class,
    'comments'=>CommentController::class,
    "notification"=>notificationcontroller::class,
]);


