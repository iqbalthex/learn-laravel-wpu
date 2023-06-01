@extends('dashboard.layouts.main')

@section ('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Posts</h1>
</div>

<div class="table-responsive col-lg-8">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
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
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
