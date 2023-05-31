<?php

namespace App\Http\Controllers;

use App\Models\{
  Category,
  Post,
  User,
};
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
  /**
   * Show all posts.
   *
   * @param  Illuminate\Http\Request $request
   * @return Illuminate\View\View
   */
  public function index(Request $request): View {
    $title = '';

    // Set title.
    if ($category = request('category')) {
      $category = Category::firstWhere('slug', $category)->name;
      $title = "in $category";
    }

    if ($author = request('author')) {
      $author = User::firstWhere('username', $author)->name;
      $title = "by $author";
    }

    $data = [
      'active' => 'posts',
      'title' => "All Posts $title",
      'posts' => Post::latest()
        ->filter(request(['search', 'category', 'author']))
        ->paginate(7)
        ->withQueryString(),
    ];

    // Get first post.
    if ($data['posts']->count()) {
      $data['p'] = $data['posts'][0];
    }    

    return view('posts', $data);
  }

  /**
   * Show detail of post.
   *
   * @param  App\Models\Post      $post
   * @return Illuminate\View\View
   */
  public function detail(Post $post): View {
    

    return view('post', [
      'active' => 'posts',
      'title' => 'Single Post',
      'post' => $post,
      'slug' => $post->excerpt,
    ]);
  }
}
