<?php

use App\Http\Controllers\{
  PostController,
  CategoryController,
  LoginController,
  RegisterController,
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  $data = [
    'title' => 'Home',
    'active' => 'home',
  ];

  return view('home', $data);
})->name('home');

Route::get('/about', function () {
  return view('about', [
    'name' => 'Iqbal Arie Maulana',
    'email' => 'iqbalariem232@gmail.com',
    'image' => 'ru.jpg',
    'title' => 'About',
    'active' => 'about',
  ]);
})->name('about');

Route::controller(PostController::class)
  ->prefix('/posts')->name('posts')
  ->group(function () {
  Route::get('/', 'index');
  Route::get('/{post:slug}', 'detail')->name('.detail');
});

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

Route::get('/login', [LoginController::class, 'index'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
