@extends('layouts.main')

@section('container')

<h1 class="mb-3">Post Category: {{ $category }}</h1>

@foreach ($posts as $post)
  <article class="mb-4">
    <h2>
      <a href="{{ route('posts.detail', $post->slug) }}">
        {{ $post->title }}
      </a>
    </h2>
    <p>{{ $post->body }}</p>
  </article>
@endforeach

@endsection
