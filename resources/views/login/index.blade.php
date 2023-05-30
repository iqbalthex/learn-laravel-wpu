@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
  <div class="col-md-5">
    @if (session()->has('alert'))
      <div class="alert alert-{{ session('alert')['color'] }}
        alert-dismissible fade show text-center" role="alert">
        {{ session('alert')['message'] }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <main class="form-signin m-auto">
      <h2 class="mb-3 fw-normal text-center">Sign-in Form</h2>

      <form>
        <x-form.input type="text" name="username" label="Username" />
        <x-form.input type="password" name="password" label="Password" />

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>

      <p class="text-center mt-2">
        Not registered? <a href="{{ route('register') }}">Register</a>
      </p>
    </main>
  </div>
</div>

@endsection