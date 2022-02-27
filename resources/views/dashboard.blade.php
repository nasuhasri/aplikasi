@extends('layout.main')

@section('content')

  <div class="row mb-5 mt-5">
    <div class="col">
      <h4>Dashboard</h4>
      <h5>Selamat Kembali {{ Auth::user()->name }}</h5>
      <hr>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-primary">LOGOUT</button>
      </form>
    </div>
  </div>

@endsection