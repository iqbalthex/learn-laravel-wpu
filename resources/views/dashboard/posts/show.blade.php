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
        <a class="btn btn-secondary" href="{{ route('posts.index') }}">
          Back to My Posts
        </a>
        <div>
          <a class="btn btn-warning" href="{{ route('posts.edit', $post->slug) }}" >
            Edit
          </a>
          <form action="{{ route('posts.destroy', $post->slug) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"
              onclick="return confirm('Are you sure?')">
              Delete
            </button>
          </form>
        </div>
      </div>

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
        Back to My Posts
      </a>
    </div>
  </div>
</div>

@endsection
