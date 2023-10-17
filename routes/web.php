<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/invitation', function () {
    return view('invitation');
})->name('invitation');


Route::group(['prefix' => 'backup', 'as' => 'backup.', 'middleware' => ['role:1']], function () {
    Route::get('/', [StagiaireBackupController::class, "index"]);
    Route::post('/import', [StagiaireBackupController::class, "import"])->name('import');
    Route::get('/export', [StagiaireBackupController::class, "export"])->name('export');
});
