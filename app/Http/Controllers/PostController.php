<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
  /**
   * @return Illuminate\View\View
   */
  public function index(): View {
    $data = [
      'title' => 'Posts',
      'posts' => Post::all(),
    ];

    return view('posts', $data);
  }

  /**
   * @param Post $post
   *
   * @return Illuminate\View\View
   */
  public function detail(Post $post): View {
    return view('post', [
      'title' => 'Single Post',
      'post' => $post,
      'slug' => $post->excerpt,
    ]);
  }
}
