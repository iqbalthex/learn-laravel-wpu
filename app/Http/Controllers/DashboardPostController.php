<?php

namespace App\Http\Controllers;

use App\Models\ { Post, Category };
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\ { JsonResponse, Request };
use Illuminate\Support\Str;
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
      'isSelected' => old('category_id') ? 'selected' : '',
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    $data = $request->validate([
      'title' => 'required|max:255',
      'slug' => 'required|unique:posts',
      'body' => 'required',
      'category_id' => 'required',
    ]);

    dd($request->file('image')->store('post-images'));

    $data['user_id'] = auth()->user()->id;
    $data['excerpt'] = Str::limit(strip_tags($request->body), 100);

    if (Post::create($data)) {
      $this->setAlert('success', 'Create post success.');
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
    return view('dashboard.posts.edit', [
      'title' => 'Edit post',
      'post' => $post,
      'categories' => Category::all(),
      'isSelected' => old('category_id', $post->category->id) ? 'selected' : '',
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Post $post) {
    $rules = [
      'title' => 'required|max:255',
      'body' => 'required',
      'category_id' => 'required',
    ];

    if ($request->slug != $post->slug) {
      $rules['slug'] = 'required|unique:posts';
    }

    $data = $request->validate($rules);

    $data['user_id'] = auth()->user()->id;
    $data['excerpt'] = Str::limit(strip_tags($request->body), 100);

    $updated = Post::where('id', $post->id)->update($data);
    if ($updated) {
      $this->setAlert('success', 'Edit post success.');
      return to_route('posts.index')->with('alert', $this->alert);
    }

    $this->setAlert('danger', 'Edit post failed.');
    return back()->with('alert', $this->alert);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post) {
    if (Post::destroy($post->id)) {
      $this->setAlert('success', 'Post have been deleted.');
      return to_route('posts.index')->with('alert', $this->alert);
    }

    $this->setAlert('danger', 'Delete post failed.');
    return back()->with('alert', $this->alert);
  }

  /**
   * Generating slug from title.
   *
   * @param string $title
   */
  public function generateSlug(string $title=''): JsonResponse {
    $slug = SlugService::createSlug(Post::class, 'slug', $title);
    return response()->json([ 'slug' => $slug ]);
  }
}
