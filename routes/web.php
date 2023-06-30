<?php

use App\Http\Controllers\ProfileController;
// use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
  return Inertia::render('Welcome', [
    'title' => 'Welcome',
    'tes' => 'yow',
  ]);
})->name('home');

Route::get('/dashboard', function () {
  return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->controller(ProfileController::class)
  ->prefix('/profile')->name('profile')->group(function () {
  Route::get('/', 'edit')->name('.edit');
  Route::patch('/', 'update')->name('.update');
  Route::delete('/', 'destroy')->name('.destroy');
});
