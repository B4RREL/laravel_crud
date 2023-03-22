<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

// Route::get('/', function () {
//     return view('create');
// })->name("create#page");

// Route::get('/read', function () {
//     return view('read');
// })->name("read#page");

//direct Create page
Route::get('/',[CustomerController::class,"createPage"])->name('create#page');

//create
Route::post('/create',[CustomerController::class,"create"])->name('create');

//direct Read page
Route::get('/read',[CustomerController::class,"readPage"])->name('read');

//direct update page
Route::get('/updatePage/{id}',[CustomerController::class,"updatePage"])->name('update#page');

//update
Route::post('/update/{id}',[CustomerController::class,"update"])->name('update');

//delete
Route::get('/delete/{id}',[CustomerController::class,"delete"])->name('delete');
