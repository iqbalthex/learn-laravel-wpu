<?php

use App\Http\Controllers\{
  CategoryController,
  // DashboardController,
  DashboardPostController,
  LoginController,
  PostController,
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

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::view('/dashboard', 'dashboard.index', [
  'title' => 'Dashboard',
  'active' => 'dashboard',
])->name('dashboard')->middleware('auth');

Route::get('/dashboard/posts/slug', [DashboardPostController::class, 'generateSlug'])
  ->name('posts.generate-slug')->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::controller(LoginController::class)
->group(function () {
  Route::get('/login', 'index')->name('login.form')->middleware('guest');
  Route::post('/login', 'login')->name('login');
  Route::any('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register.form')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
