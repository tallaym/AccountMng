<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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


Route::get('/clients',[ClientController::class,'AfficherClient'])->name('client.list');
Route::get('/clients/create',[ClientController::class,'create'])->name('client.create');
Route::post('/clients/create',[ClientController::class,'store'])->name('client.store');
Route::get('/clients/delete/{id}',[ClientController::class,'delete'])->name('client.delete');
Route::get('/clients/edit/{id}',[ClientController::class,'edit'])->name('client.edit');
Route::post('/clients/update/{id}',[ClientController::class,'update'])->name('client.update');


Route::get('/compte',[CompteController::class,'index'])->name('compte.list');
Route::get('/compte/create',[CompteController::class,'create'])->name('compte.create');
Route::post('/compte/create',[CompteController::class,'store'])->name('compte.store');
Route::get('/compte/delete/{id}',[CompteController::class,'delete'])->name('compte.delete');
Route::get('/compte/edit/{id}',[CompteController::class,'edit'])->name('compte.edit');
Route::post('/compte/update/{id}',[CompteController::class,'update'])->name('compte.update');


