@extends('dashboard.layouts.main')

@section ('container')

<link rel="stylesheet" type="text/css" href="{{ route('home') }}/css/trix@2.0.0/trix.css" />

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create new post</h1>
</div>

<div class="col-lg-8">
  <form action="{{ route('posts.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" />
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control" id="slug" name="slug" readonly />
    </div>
    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      <input type="hidden" id="body" name="body" />
      <trix-editor input="body"></trix-editor>
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select" name="category-id" id="category">
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Create post</button>
  </form>
</div>

@endsection
