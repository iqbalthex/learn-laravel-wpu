<?php

namespace App\Models;

class Post
{
  private static $posts = [
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

  public static function all() {
    return collect(self::$posts);
  }

  public static function find($slug) {
    return collect(self::all())->firstWhere('slug', $slug);
  }
}
