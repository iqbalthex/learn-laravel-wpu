<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
  /**
   * @return Illuminate\View\View
   */
  public function index(Request $request): View {
    if (request('category')) {
      $category = Category::firstWhere('slug', request('category'));
      $title = 0;
    }

    $data = [
      'title' => 'Posts',
      'active' => 'posts',
      'header' => 'All Posts',
      'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(2),
    ];

    if ($data['posts']->count()) {
      $data['p'] = $data['posts'][0];
    }

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
      'active' => 'posts',
      'post' => $post,
      'slug' => $post->excerpt,
    ]);
  }
}
