@extends('auth.layout')

@section('content')

  <form class="mt-5" action="{{ route('login') }}" method="POST">
    @csrf

    @if( session('error') )
    <p class="alert alert-danger">{{ session('error') }}</p>
    @endif

    <h4>Login</h4>

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">

      @error('email')
        <div class="invalid-feedback">{{ $message }}</div>  
      @enderror
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror"" placeholder="Password">

      @error('password')
        <div class="invalid-feedback">{{ $message }}</div>  
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
  </form>

@endsection