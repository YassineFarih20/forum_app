<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;
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
Route::get('/login', [StagiaireController::class, 'loginIndex'])->name('login');
Route::post('/login', [StagiaireController::class, 'login'])->name('login.action');
Route::post('/logout', [StagiaireController::class, 'logout'])->name('logout');
Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/', [StagiaireController::class, 'profile'])->name('index');
    Route::get('/invitation', [StagiaireController::class, 'invitation'])->name('invitation');
    Route::get('/cv', [StagiaireController::class, 'cvIndex'])->name('cvIndex');
    Route::post('/cvupload', [StagiaireController::class, 'cvUpload'])->name('cvUpload');
});


// Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, "index"])->name('index');
    Route::get('/dashboard', [AdminController::class, "dashboard"])->name('dashboard');
    Route::post('/auth', [AdminController::class, "handleLogin"])->name('handleLogin');
    Route::post('/logout', [AdminController::class, "logout"])->name('logout');

    Route::group(['prefix' => 'backup', 'as' => 'backup.'], function () {
        Route::get('/', [StagiaireBackupController::class, "index"]);
        Route::post('/import', [StagiaireBackupController::class, "import"])->middleware('role:1')->name('import');
        Route::get('/export', [StagiaireBackupController::class, "export"])->middleware('role:1')->name('export');
    });
});
