<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index() {
    return view('posts', [
      'title' => 'Posts',
      'posts' => Post::all(),
    ]);
  }

  public function detail($slug) {
    $post = Post::find($slug);

    return view('post', [
      'title' => 'Single Post',
      'post' => $post,
      'slug' => $post['slug'],
    ]);
  }
}
