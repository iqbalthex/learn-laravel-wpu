<?php

namespace App\Http\Controllers;

use App\Models\{
  Category,
  Post,
  User
};
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
  /**
   * @param  Illuminate\Http\Request $request
   * @return Illuminate\View\View
   */
  public function index(Request $request): View {
    $title = '';
    if (request('category')) {
      $category = Category::firstWhere('slug', request('category'));
      $title = "in $category->name";
    }

    if (request('author')) {
      $author = User::firstWhere('username', request('author'));
      $title = "by $author->name";
    }

    $data = [
      'title' => "All Posts $title",
      'active' => 'posts',
    ];

    $data['posts'] = Post::latest()
      ->filter(request(['search', 'category', 'author']))
      ->paginate(7)
      ->withQueryString();

    if ($data['posts']->count()) {
      $data['p'] = $data['posts'][0];
    }    

    return view('posts', $data);
  }

  /**
   * @param  App\Models\Post      $post
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
