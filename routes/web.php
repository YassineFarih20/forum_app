<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('index');
})->name('acceuil');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/inscription', function () {
    return view('inscription');
})->name('inscription');

Route::get('/reservationrdv', function () {
    return view('reservationrdv');
})->name('reservationrdv');

Route::get('/invitation', function () {
    return view('invitation');
})->name('invitation');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/import', [StagiaireController::class, "index"]);
Route::post('/import', [StagiaireController::class, "import"])->name('importCSV');
