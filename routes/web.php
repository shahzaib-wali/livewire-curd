<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Show;
use App\Http\Livewire\AddUser;
use App\Http\Livewire\EditUser;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/show-users',Show::class)->name('show');
Route::get('/add-user',AddUser::class)->name('add_user');
Route::get('/edit-user/{empid}',EditUser::class)->name('edit_user');
