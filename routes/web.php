<?php

use App\Http\Controllers\CreateBook;
use App\Http\Controllers\DeleteBookController;
use App\Http\Controllers\DisplayMessagesController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\UpdateDescriptionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainPageController::class, 'index']);
Route::post('/create',[CreateBook::class, 'create']);
Route::get('/', [DisplayMessagesController::class,'index']);
Route::post('/update',[UpdateDescriptionController::class, 'update']);
Route::post('/delete',[DeleteBookController::class, 'delete']);