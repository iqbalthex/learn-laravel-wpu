<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
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

Route::get('/categories', function () {
  return view('categories', [
    'title' => 'Post Category',
    'categories' => Category::all(),
  ]);
})->name('categories');

Route::get('/categories/{category:slug}', function (Category $category) {
  return view('category', [
    'title' => $category->name,
    'posts' => $category->posts,
    'category' => $category->name,
  ]);
})->name('categories.posts');
