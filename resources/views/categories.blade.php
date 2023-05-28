@extends('layouts.main')

@section('container')

<h1 class="mb-3">Post Categories</h1>

@if ($categories->count())
  <div class="container">
    <div class="row">
      @foreach ($categories as $category)
        <div class="col-md-4">
          <a href="{{ route('categories.posts', $category->slug) }}">
            <div class="card text-bg-dark">
              <img src="https://source.unsplash.com/400x300?{{ $category->name }}"
                alt="{{ $category->name }}"
                class="card-img">
              <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class="card-title text-center flex-fill fs-3 py-2"
                  style="background-color: rgba(0, 0, 0, .6)">
                  {{ $category->name }}
                </h5>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
</div>
@else
  <p class="text-center fs-4">No category found.</p>
@endif

@endsection
