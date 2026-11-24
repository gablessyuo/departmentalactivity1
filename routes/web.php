<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\PlantReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/reports/plants', [PlantReportController::class, 'index'])->name('reports.plants');
    Route::get('/reports/plants/print', [PlantReportController::class, 'print'])->name('reports.plants.print');
    Route::get('/reports/plants/excel', [PlantReportController::class, 'excel'])->name('reports.plants.excel');

    Route::resource('plants', PlantController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
