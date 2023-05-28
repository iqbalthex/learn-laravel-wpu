@extends('layouts.main')

@section('container')

<h1 class="mb-3">{{ $header }}</h1>

@if ($posts->count())
  <div class="card mb-3">
    <img src="https://source.unsplash.com/900x300?{{ $posts[0]->category->name }}"
      alt="{{ $posts[0]->category->name }}"
      class="card-img-top" />
    <div class="card-body text-center">
      <h3 class="card-title">
        <a href="{{ route('posts.detail', $posts[0]->slug) }}"
          class="text-decoration-none text-dark">
          {{ $posts[0]->title }}
        </a>
      </h3>
      <p>
        <small class="text-muted">
          By.
          <a href="{{ route('authors.posts' , $posts[0]->author->username) }}"
            class="text-decoration-none text-danger fw-bold">
            {{ $posts[0]->author->name }}
          </a>
          in
          <a href="{{ route('categories.posts', $posts[0]->category->slug) }}"
            class="text-decoration-none text-danger fw-bold">
            {{ $posts[0]->category->name }}
          </a>
          <small>{{ $posts[0]->created_at->diffForHumans() }}</small>
        </small>
      </p>
      <p class="card-text">{{ $posts[0]->excerpt }}</p>
      <a href="{{ route('posts.detail', $posts[0]->slug) }}"
        class="text-decoration-none btn btn-primary">
        Read more...
      </a>
    </div>
  </div>
@else
  <p class="text-center fs-4">No post found.</p>
@endif

<div class="container">
  <div class="row">
    @foreach ($posts->skip(1) as $post)
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="position-absolute px-3 py-2"
            style="background-color: rgba(0, 0, 0, .6)">
            <a href="{{ route('categories.posts', $post->category->slug) }}"
              class="text-decoration-none text-white fw-bold">
              {{ $post->category->name }}
            </a>
          </div>
          <img src="https://source.unsplash.com/400x300?{{ $post->category->name }}"
            alt="{{ $post->category->name }}"
            class="card-img-top" />
          <div class="card-body">
            <h5 class="card-title">
              <a href="{{ route('posts.detail', $post->slug) }}"
                class="text-decoration-none text-dark">
                {{ $post->title }}
              </a>
            </h5>
            <p>
              <small class="text-muted">
                By.
                <a href="{{ route('authors.posts' , $posts[0]->author->username) }}"
                  class="text-decoration-none text-danger fw-bold">
                  {{ $posts[0]->author->name }}
                </a>
                in
                <a href="{{ route('categories.posts', $posts[0]->category->slug) }}"
                  class="text-decoration-none text-danger fw-bold">
                  {{ $posts[0]->category->name }}
                </a>
                {{ $posts[0]->created_at->diffForHumans() }}
              </small>
            </p>
            <p class="card-text">{{ $post->excerpt }}</p>
            <a href="{{ route('posts.detail', $post->slug) }}"
              class="btn btn-primary">
              Read more...
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<?php /*
@foreach ($posts->skip(1) as $post)
  <x-article
    slug="{{ $post->slug }}"
    title="{{ $post->title }}"
    author-username="{{ $post->author->username }}"
    author-name="{{ $post->author->name }}"
    category-name="{{ $post->category->name }}"
    category-slug="{{ $post->category->slug }}"
    excerpt="{{ $post->excerpt }}" />
@endforeach
*/ ?>

@endsection
