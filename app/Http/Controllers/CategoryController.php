<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller {
  /**
   * Show all categories.
   */
  public function index(): View {
    $data = [
      'title' => 'Post Category',
      'active' => 'categories',
      'categories' => Category::all(),
    ];

    return view('categories', $data);
  }

  /**
   * Show all posts in selected category.
   *
   * @param  App\Models\Category $category
   */
  public function posts(Category $category): View {
    $data = [
      'title' => $category->name,
      'active' => 'categories',
      'header' => "Post by Category: {$category->name}",
      'posts' => $category->posts,
      'category' => $category->name,
    ];

    // Get first post.
    if ($data['posts']->count()) {
      $data['p'] = $data['posts'][0];
    }

    return view('posts', $data);
  }
}
