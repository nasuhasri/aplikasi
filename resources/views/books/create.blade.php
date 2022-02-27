@extends('layout.main')

@section('content')

<div class="row mt-5 mb-5">

  @if( $errors->any() )
    <p class="alert alert-danger">Please check your input!</p>
  @endif

  <form action="{{ route('book-store') }}" method="POST">
    @csrf

    <div class="col">
      <a href="{{ route('book-listing') }}">Back to Book Listing</a>
      <h4>Add New Book</h4>

      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">

        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">

        @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="synopsis" class="form-label">Synopsis</label>
        <textarea name="synopsis" id="synopsis" rows="10" class="form-control @error('synopsis') is-invalid
        @enderror">{{ old('synopsis') }}</textarea>

        @error('synopsis')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
    
    <button class="btn btn-primary">SAVE</button>
  </form>
</div>

@endsection