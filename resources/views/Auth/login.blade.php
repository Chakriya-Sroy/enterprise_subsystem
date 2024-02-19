@extends('layouts.auth')

@section('page')
    Login
@endsection

@section('content')
<section class="login" id="login" style="width:100vw;height:100vh;">
    <div class="text-white">
      <div class="row">
        <div class="col-lg-6" style="height: 100vh; background-color: #1a2e35 ;">
          <div class="h-100 d-flex flex-column justify-content-center align-items-center">
            <h1>Daily Draft</h1>
            <p class="">Your Personal APP</p>
          </div>
        </div>
        <div class="col-lg-6 " style="height: 100vh;background-color: #1cbbb4 ;">
          <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center">
            <h1>Login</h1>
            @if (session('status'))
                <div class="alert alert-danger w-50">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('store-login') }}" method="POST" class="w-50">
              @csrf
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" id="" class="form-control">
                @error('email')
                    <span class="text-danger mt-1">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="" class="form-control">
                @error('password')
                <span class="text-danger mt-1">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <p>Haven't have an account yet ?<a href="{{ route('signup') }}" class="fw-bold"> Register</a></p>
                <input type="submit" class="btn btn-primary ms-auto me-auto px-3" value="Login">
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
@endsection