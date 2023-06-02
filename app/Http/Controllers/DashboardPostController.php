<?php

namespace App\Http\Controllers;

use App\Models\ {
  Post,
  Category,
};
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardPostController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index(): View {
    $userId = auth()->user()->id;

    return view('dashboard.posts.index', [
      'title' => 'Posts',
      'posts' => Post::where('user_id', $userId)->get(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View {
    return view('dashboard.posts.create', [
      'title' => 'Create new post',
      'categories' => Category::all(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    return $request;
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post): View {
    return view('dashboard.posts.show', [
      'title' => 'My Post',
      'post' => $post,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post): View {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Illuminate\Http\Request $request
   * @param App\Models\Post         $post
   */
  public function update(Request $request, Post $post) {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post) {
    //
  }

  public function generateSlug(Request $request) {
    $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
    return response()->json([ 'slug' => $slug ]);
  }
}
