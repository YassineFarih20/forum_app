<?php

use App\Http\Controllers\StagiaireController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireActionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StagiaireBackupController;
use App\Http\Controllers\StaticController;


Route::get('/', [StaticController::class, 'index'])->name('index');
Route::get('/about', [StaticController::class, 'about'])->name('about');
Route::get('/contact', [StaticController::class, 'contact'])->name('contact');



Route::get('/inscription', function () {
    return view('inscription');
})->name('inscription');

Route::get('/reservationrdv', function () {
    return view('reservationrdv');
})->name('reservationrdv');


// Stagiaire Routes
Route::get('/login', [StagiaireActionController::class, 'loginIndex'])->name('login');
Route::post('/login', [StagiaireActionController::class, 'login'])->name('login.action');
Route::post('/logout', [StagiaireActionController::class, 'logout'])->name('logout');
Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/', [StagiaireActionController::class, 'profile'])->name('index');
    Route::get('/invitation', [StagiaireActionController::class, 'invitation'])->name('invitation');
    Route::get('/cv', [StagiaireActionController::class, 'cvIndex'])->name('cvIndex');
    Route::post('/cvupload', [StagiaireActionController::class, 'cvUpload'])->name('cvUpload');
});


// Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, "index"])->name('index');
    Route::get('/dashboard', [AdminController::class, "dashboard"])->name('dashboard');
    Route::post('/auth', [AdminController::class, "handleLogin"])->name('handleLogin');
    Route::post('/logout', [AdminController::class, "logout"])->name('logout');
    Route::group(['prefix' => 'backup', 'as' => 'backup.'], function () {
        Route::get('/', [StagiaireBackupController::class, "index"])->name('index');
        Route::post('/import', [StagiaireBackupController::class, "import"])->name('import');
        Route::get('/export', [StagiaireBackupController::class, "export"])->name('export');
    });
});


// Stagiaires list
Route::resource('stagiaires', StagiaireController::class);
Route::post('/cv/download', [AdminController::class, 'downloadCv'])->name('downloadCV');
Route::post('/cv/view', [AdminController::class, 'viewCv'])->name('viewCV');
