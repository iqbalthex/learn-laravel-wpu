<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
  /**
   * @return Illuminate\View\View
   */
  public function index(): View {
    $data = [
      'title' => 'Post Category',
      'categories' => Category::all(),
    ];

    return view('categories', $data);
  }

  /**
   * @param Post $post
   *
   * @return Illuminate\View\View
   */
  public function posts(Category $category): View {
    $data = [
      'title' => $category->name,
      'title_heading' => "Post by Category: {$category->name}",
      'posts' => $category->posts->load('category', 'author'),
      'category' => $category->name,
    ];

    return view('posts', $data);
  }
}
