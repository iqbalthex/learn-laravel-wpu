@extends('layouts.main')

@section('container')

<h1 class="mb-3">Halaman Blog Posts</h1>

@foreach ($posts as $post)
  <x-article
    slug="{{ $post->slug }}"
    title="{{ $post->title }}"
    author="{{ $post->user->name }}"
    category-name="{{ $post->category->name }}"
    category-slug="{{ $post->category->slug }}"
    excerpt="{{ $post->excerpt }}" />
@endforeach

@endsection
