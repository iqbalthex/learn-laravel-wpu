@extends('layouts.main')

@section('container')

<article class="mb-4">
  <h2>{{ $post['title'] }}</h2>
  <h5>By: {{ $post['author'] }}</h5>
  <p>{{ $post['body'] }}</p>
</article>

<a href="{{ route('posts') }}">Back to Posts</a>

@endsection
