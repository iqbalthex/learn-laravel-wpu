@extends('layouts.main')

@section('container')

@foreach($posts as $post)
  <article class="mb-4">
    <h2>
      <a href="{{ route('post.detail', $post['slug']) }}">{{ $post['title'] }}</a>
    </h2>
    <h5>By: {{ $post['author'] }}</h5>
    <p>{{ $post['body'] }}</p>
  </article>
@endforeach

@endsection
