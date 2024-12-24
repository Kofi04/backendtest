<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
Route::get('/',[homecontroller::class,'vue'])->name('dashboard')->middleware(['auth', 'verified']);

Route::post('/pproduit',[homecontroller::class,'store'])->name('pproduit')->middleware(['auth', 'verified']);

Route::put('/modifier/{id}', [homecontroller::class, 'modifier'])->name('modifier')->middleware(['auth', 'verified']);

Route::delete('/delete/{id}', [homecontroller::class, 'destroy'])->name('delete')->middleware(['auth', 'verified']);

Route::get('/vuecommande', [homecontroller::class, 'vuecommande'])->name('vuecommande')->middleware(['auth', 'verified']);
Route::post('/commande', [homecontroller::class, 'commande'])->name('commande')->middleware(['auth', 'verified']);
Route::post('/kkiapay', [homecontroller::class, 'kkiapay'])->name('kkiapay');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
