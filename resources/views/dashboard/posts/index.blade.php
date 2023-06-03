@extends('dashboard.layouts.main')

@section ('container')

@if (session()->has('alert'))
  <div class="alert alert-success" role="alert">
    Post added.
  </div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Posts</h1>
</div>

<div class="table-responsive col-lg-8">
  <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2">
    Create new post
  </a>
  <table class="table table-striped table-sm">
    <thead>
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr class="text-center">
          <td>{{ $loop->iteration }}</td>
          <td class="text-start">{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td>
            <a href="{{ route('posts.show', $post->slug) }}" class="badge bg-primary">
              Detail
            </a>
            <a href="{{ route('posts.edit', $post->slug) }}" class="badge bg-warning">
              Edit
            </a>            
            <form action="{{ route('posts.destroy', $post->slug) }}" method="post" class="d-inline">
              @csrf
              <input type="hidden" name="_method" value="delete" />
              <button class="badge bg-danger border-0" type="submit">Delete</button>
            </form>
          </td>
          <!--td>
            <span class="badge rounded-pill text-bg-secondary">...</span>
          </td-->
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
