<?php

use Illuminate\Support\Facades\Route;

// Route::get($path, $callback); ::view ::post ::patch ::delete etc.

Route::get('/', function () {
  return view('home');
});

Route::get('/about', function () {
  return view('about', [
    'name' => 'Iqbal Arie Maulana',
    'email' => 'iqbalariem232@gmail.com',
    'image' => 'ru.jpg',
  ]);
});

Route::get('/blog', function () {
  return view('posts');
});
