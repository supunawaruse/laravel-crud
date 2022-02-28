<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
});

//Contact Routes
Route::get('contact', [ContactController::class, 'index']);

//Category Routes
Route::get('/category/all', [CategoryController::class, 'AllCategory'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCategory'])->name('add.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'GetCategory'])->name('get.category');
Route::post('/category/update/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');

Route::get('/category/delete/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // with equalant orm
    $users = User::all();

    //with query builder
    //$allUsers = DB::table('users')->get();

    return view('dashboard', compact('users'));
})->name('dashboard');
