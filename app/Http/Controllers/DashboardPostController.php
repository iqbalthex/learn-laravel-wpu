<?php

namespace App\Http\Controllers;

use App\Models\ { Post, Category };
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\ { JsonResponse, Request };
use Illuminate\Support\Str;
use Illuminate\View\View;

class DashboardPostController extends Controller {
  private array $alert = [];

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
    $data = array_merge($request->validate([
      'title' => 'required|max:255',
      'slug' => 'required|unique:posts',
      'body' => 'required',
      'category_id' => 'required',
    ]), [
      'user_id' => auth()->user()->id,
      'excerpt' => Str::limit(strip_tags($request->body), 100),
    ]);

    if (Post::create($data)) {
      $this->setAlert('success', 'Post have been added.');
      return to_route('posts.index')->with('alert', $this->alert);
    }

    $this->setAlert('danger', 'Create post failed.');
    return back()->with('alert', $this->alert);
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

  /**
   * Generating slug from title.
   */
  public function generateSlug(Request $request): JsonResponse {
    $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
    return response()->json([ 'slug' => $slug ]);
  }

  /**
   * Set alert.
   *
   * @param string $color
   * @param string $message
   */
  private function setAlert($color, $message): void {
    $this->alert = compact('color', 'message');
  }
}
