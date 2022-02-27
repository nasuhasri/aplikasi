@extends('auth.layout')

@section('content')

  <form class="mt-5" action="{{ route('register') }}" method="POST">
    @csrf

    @if( $errors->any() )
    <p class="alert alert-danger">Please check your input.</p>
    @endif

    <h4>Pendaftaran</h4>

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter name">

      @error('name')
        <div class="invalid-feedback">{{$message}}</div>  
      @enderror
    </div>

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

    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Confirm Your Password</label>
      <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror"" placeholder="Confirm your password">

      @error('password_confirmation')
        <div class="invalid-feedback">{{ $message }}</div>  
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
  </form>

@endsection