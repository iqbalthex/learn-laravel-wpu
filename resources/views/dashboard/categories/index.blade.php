@extends('dashboard.layouts.main')

@section ('container')

@if (session()->has('alert'))
  <div class="alert alert-{{ session('alert')['color'] }} mt-3" role="alert" style="width: calc(6/12*100%)">
  {{ session('alert')['message'] }}
  </div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Post Categories</h1>
</div>

<div class="table-responsive col-lg-6">
  <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">
    Create new category
  </a>
  <table class="table table-striped table-sm">
    <thead>
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr class="text-center">
          <td>{{ $loop->iteration }}</td>
          <td class="text-start">{{ $category->name }}</td>
          <td>
            <a href="{{ route('categories.edit', $category->slug) }}" class="badge bg-warning">
              Edit
            </a>
            <form action="{{ route('categories.destroy', $category->slug) }}" method="post" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="badge bg-danger border-0" type="submit"
                onclick="return confirm('Are you sure?')">
                Delete
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
