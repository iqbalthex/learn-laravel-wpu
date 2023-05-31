@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
  <div class="col-lg-5">
    <main class="form-signin m-auto">
      <h2 class="mb-3 fw-normal text-center">Registration Form</h2>

      <form action="{{ route('register') }}" method="post">
        @csrf
        <x-form.input name="name" label="Name" />

        {{--<div class="form-floating">
          <input
            type="text" class="form-control
            @error('name') is-invalid @enderror"
            name="name" placeholder="Name"
            value="{{ old('name') }}" />
          <label for="floatingInput">Name</label>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>--}}

        <div class="form-floating">
          <input
            type="text" class="form-control
            @error('username') is-invalid @enderror"
            name="username" placeholder="Username"
            value="{{ old('username') }}" />
          <label for="floatingInput">Username</label>
          @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-floating">
          <input
            type="email" class="form-control
            @error('email') is-invalid @enderror"
            name="email" placeholder="Email"
            value="{{ old('email') }}" />
          <label for="floatingInput">Email</label>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-floating">
          <input
            type="password" class="form-control
            @error('password') is-invalid @enderror"
            name="password" placeholder="Password" />
          <label for="floatingInput">Password</label>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>

      <p class="text-center mt-2">
        Already have account? <a href="{{ route('login') }}">Login</a>
      </p>
    </main>
  </div>
</div>

@endsection