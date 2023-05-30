@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
  <div class="col-md-5">
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