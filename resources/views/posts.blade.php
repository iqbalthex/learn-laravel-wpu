@extends('layouts.main')

@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="{{ route('posts') }}">
      @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}" />
      @endif

      @if (request('author'))
        <input type="hidden" name="author" value="{{ request('author') }}" />
      @endif

      <div class="input-group mb-3">
        <input type="text" class="form-control"
          placeholder="Enter keyword..."
          name="search"
          value="{{ request('search') }}" />
        <button class="btn btn-primary bg-gradient" type="button">Search</button>
      </div>
    </form>
  </div>
</div>

<div class="d-flex justify-content-center">
  {{ $posts->links() }}
</div>

@isset ($p)
  <x-post-hero
    category-name="{{ $p->category->name }}"
    category-slug="{{ $p->category->slug }}"
    slug="{{ $p->slug }}"
    title="{{ $p->title }}"
    excerpt="{{ $p->excerpt }}"
    author-name="{{ $p->author->name }}"
    author-username="{{ $p->author->username }}"
    created-at="{{ $p->created_at->diffForHumans() }}" />

  <div class="container">
    <div class="row">
      @each('components.post', $posts->skip(1), 'post')
    </div>
  </div>
@else
  <p class="text-center fs-4">No post found.</p>
@endif

@endsection
