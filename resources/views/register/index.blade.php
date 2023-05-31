@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
  <div class="col-lg-5">
    <x-alert />

    <main class="form-signin m-auto">
      <h2 class="mb-3 text-center">Registration Form</h2>

      <form action="{{ route('register') }}" method="post">
        @csrf
        <x-form.input name="name" label="Name" />
        <x-form.input name="username" label="Username" />
        <x-form.input name="email" label="Email" type="email" />
        <x-form.input name="password" label="Password" type="password" />

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
      </form>

      <p class="text-center mt-2">
        Already have account? <a href="{{ route('login') }}">Login</a>
      </p>
    </main>
  </div>
</div>

@endsection