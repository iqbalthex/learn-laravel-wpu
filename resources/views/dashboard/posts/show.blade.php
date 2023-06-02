@extends('dashboard.layouts.main')

@section ('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Posts</h1>
</div>

<div class="container">
  <div class="row my-3">
    <div class="col-lg-8">
      <h1>{{ $post->title }}</h1>

      <div class="d-flex justify-content-between mb-2">
        <a class="btn btn-primary" href="{{ route('posts.index') }}">
          Back to My Posts
        </a>
        <div>
          <a class="btn btn-warning" href="{{ route('posts.edit', $post->slug) }}" >
            Edit
          </a>
          <a class="btn btn-danger ms-2" href="{{ route('posts.destroy', $post->slug) }}">
            Delete
          </a>
        </div>
      </div>

      <img src="https://source.unsplash.com/800x300?{{ $post->category->name }}"
        alt="{{ $post->category->name }}"
        class="img-fluid" />

      <article class="my-2 fs-5">
        {!! $post->body !!}
      </article>

      <a href="{{ route('posts') }}" class="d-block text-decoration-none">
        Back to My Posts
      </a>
    </div>
  </div>
</div>

@endsection
