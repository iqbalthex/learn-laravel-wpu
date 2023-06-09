@extends('layouts.main')

@section('container')

<div class="container">
  <div class="row justify-content-center mb-3">
    <div class="col-md-8">
      <h1>{{ $post->title }}</h1>
      <p>
        By.
        <a href="{{ route('posts', ['author' => $post->author->username]) }}"
          class="text-decoration-none text-danger fw-bold">
          {{ $post->author->name }}
        </a>
        in
        <a href="{{ route('posts', ['category' => $post->category->slug]) }}"
          class="text-decoration-none text-danger fw-bold">
          {{ $post->category->name }}
        </a>
      </p>
      <div style="max-height: 300px; overflow: hidden">
        <img alt="{{ $post->category->name }}" class="card-img-top"
        @if ($post->image)
          src="{{ asset('storage/' . $post->image) }}"
        @else
          src="https://source.unsplash.com/900x300?{{ $post->category->name }}"
        @endif
        />
      </div>

      <article class="my-2 fs-5">
        {!! $post->body !!}
      </article>

      <a href="{{ route('posts') }}" class="d-block text-decoration-none">
        Back to Posts
      </a>
    </div>
  </div>
</div>

@endsection
