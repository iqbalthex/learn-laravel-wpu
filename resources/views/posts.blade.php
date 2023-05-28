@extends('layouts.main')

@section('container')

<h1 class="mb-3">{{ $header }}</h1>

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
      @foreach ($posts->skip(1) as $post)
        <x-post
          category-name="{{ $post->category->name }}"
          category-slug="{{ $post->category->name }}"
          slug="{{ $post->slug }}"
          title="{{ $post->title }}"
          excerpt="{{ $post->excerpt }}"
          author-name="{{ $post->author->name }}"
          author-username="{{ $post->author->username }}"
          created-at="{{ $post->created_at->diffForHumans() }}" />
      @endforeach
    </div>
  </div>
@else
  <p class="text-center fs-4">No post found.</p>
@endif

@endsection
