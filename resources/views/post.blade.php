@extends('layouts.main')

@section('container')

<h1>{{ $post->title }}</h1>
<p>By. Iqbal in
  <a href="{{ route('categories.posts', $post->category->slug) }}">
    {{ $post->category->name }}
  </a>
</p>
{!! $post->body !!}

<br>

<a href="{{ route('posts') }}">Back to Posts</a>

@endsection
