<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  $data['title'] = 'Home';

  return view('home', $data);
})->name('home');

Route::get('/about', function () {
  return view('about', [
    'name' => 'Iqbal Arie Maulana',
    'email' => 'iqbalariem232@gmail.com',
    'image' => 'ru.jpg',
    'title' => 'About',
  ]);
})->name('about');

Route::controller(PostController::class)
  ->prefix('/posts')->name('posts')
  ->group(function () {
  Route::get('/', 'index');
  Route::get('/{post:slug}', 'detail')->name('.detail');
});

Route::controller(CategoryController::class)
  ->prefix('/categories')->name('categories')
  ->group(function () {
    Route::get('/', 'index');
    Route::get('/{category:slug}', 'posts')->name('.posts');
});

Route::get('/authors/{user:username}', function (User $user) {
  return view('posts', [
    'title' => 'User Posts',
    'title_heading' => "Post by: {$user->name}",
    'posts' => $user->posts,
  ]);
})->name('authors.posts');
