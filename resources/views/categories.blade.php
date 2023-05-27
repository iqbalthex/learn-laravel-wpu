@extends('layouts.main')

@section('container')

<h1 class="mb-3">Post Categories</h1>

@foreach ($categories as $category)
  <ul>
    <li>
      <h2>
        <a href="{{ route('categories', $category->slug) }}">
          {{ $category->name }}
        </a>
      </h2>
    </li>
  </ul>
@endforeach

@endsection
