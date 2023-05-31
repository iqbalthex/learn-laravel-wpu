@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
  <div class="col-lg-5">
    <x-alert />

    <main class="form-signin m-auto">
      <h2 class="mb-3 text-center">Sign-in Form</h2>

      <form action="{{ route('login') }}" method="post">
        @csrf
        <x-form.input name="username" label="Username" />
        <x-form.input name="password" label="Password" type="password" />

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>

      <p class="text-center mt-2">
        Not registered? <a href="{{ route('register') }}">Register</a>
      </p>
    </main>
  </div>
</div>

@endsection