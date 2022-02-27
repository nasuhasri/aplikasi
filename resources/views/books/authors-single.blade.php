@extends('layout.main')

@section('content')

<div class="row">
  <div class="col">
    <table class="table table-striped">
      <h4>{{ $author->name }}</h4>
      <tbody>       
        <tr>
          <td colspan="2"><strong>Books by {{ $author->name }}</strong></td>
        </tr>
        <tr>
          <td width="5%"></td>
          <td>
            @if($author->books->count() < 1)
              <em>Author does not have any books listed here.</em>
            @else
              {{-- refer pada model author.php --}}
              <ol>
                @foreach ($author->books as $book)
                  <li><a href="{{ route('book-single', $book->id) }}">{{ $book->title }}</a></li> 
                @endforeach
              </ol>
            @endif
          </td>
        </tr>       
      </tbody>
    </table>
  </div>
</div>

@endsection