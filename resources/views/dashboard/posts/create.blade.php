@extends('dashboard.layouts.main')

@section ('container')

<link rel="stylesheet" type="text/css" href="{{ route('home') }}/css/trix@2.0.0/trix.css" />

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create new post</h1>
</div>

<div class="col-lg-8">
  <form action="{{ route('posts.store') }}" method="post" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" id="title" name="title" value="{{ old('title') }}"
        class="form-control @error('title') is-invalid @enderror" required />
      @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" id="slug" name="slug" value="{{ old('slug') }}" readonly
        class="form-control @error('slug') is-invalid @enderror" required />
      @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select" name="category_id" id="category">
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" {{ $isSelected }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Thumbnail</label>
      <input type="file" id="image" name="image" value="{{ old('file') }}"
        class="form-control @error('image') is-invalid @enderror"
        onchange="previewImage()" />
      <div style="max-height: 300px; overflow: hidden">
        <img class="img-preview img-fluid d-block mt-2" />
      </div>
      @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      <input type="hidden" id="body" name="body" value="{{ old('body') }}" />
      <trix-editor input="body"></trix-editor>
      @error('body')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create post</button>
    <a class="btn btn-secondary" href="{{ route('posts.index') }}">
      Back to My Posts
    </a>
  </form>
</div>

<script type="text/javascript" src="{{ asset('js/prev-image.js') }}"></script>

@endsection
