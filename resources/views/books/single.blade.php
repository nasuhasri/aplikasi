@extends('layout.main')

@section('content')

<div class="row mt-5">
  <div class="col">
    <h2>{{ $book->title }}</h2>
  </div>
</div>
<div class="row">
  <div class="col-4">
    <img src="https://via.placeholder.com/400x600.png" alt="" class="img-fluid">
  </div>
  <div class="col-8">

    <strong>Price: </strong>
    RM {{ $book->price }}
    <p>&nbsp;</p>

    <strong>Synopsis: </strong>
    {!! nl2br($book->synopsis) !!}
    <p>&nbsp;</p> 
      
    <strong>Authors</strong>        
    <ol>
      @foreach ($book->authors as $author)
        <li><a href="{{ route('author-single', $author->id) }}">{{ $author->name }}</a></li>
      @endforeach
    </ol>
        
  </div>
</div>

@endsection