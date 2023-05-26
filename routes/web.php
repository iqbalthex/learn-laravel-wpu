<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home', [
    'title' => 'Home',
  ]);
})->name('home');

Route::get('/about', function () {
  return view('about', [
    'name' => 'Iqbal Arie Maulana',
    'email' => 'iqbalariem232@gmail.com',
    'image' => 'ru.jpg',
    'title' => 'About',
  ]);
})->name('about');

Route::get('/blog', function () {
  return view('posts', [
    'title' => 'Posts',
    'posts' => [
      [
        'title' => 'Judul Post Pertama',
        'author' => 'Iqbal Arie Maulana',
        'body' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ',
        'slug' => 'judul-post-pertama',
      ],
      [
        'title' => 'Judul Post Kedua',
        'author' => 'Saya',
        'body' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ',
        'slug' => 'judul-post-kedua',
      ],
    ],
  ]);
})->name('posts');

Route::get('/posts/{slug}', function ($slug) {
  $posts = [
    [
      'title' => 'Judul Post Pertama',
      'author' => 'Iqbal Arie Maulana',
      'body' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ',
      'slug' => 'judul-post-pertama',
    ],
    [
      'title' => 'Judul Post Kedua',
      'author' => 'Saya',
      'body' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ',
      'slug' => 'judul-post-kedua',
    ],
  ];

  $post = collect(array_filter($posts, fn($data) => $data['slug'] == $slug))->first();

  return view('post', [
    'title' => 'Single Post',
    'slug' => $post['slug'],
    ...compact('post'),
  ]);
})->name('post.detail');
