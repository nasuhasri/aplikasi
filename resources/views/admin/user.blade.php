@extends('layout.main')

@section('content')

<div class="row">
  <div class="col-8">
    <h1>User Information</h1>
    
    {{-- @empty( $user['name']  )
      <h2>Eh tak kenal haha</h2>
    @else
      <p><strong>Name: </strong>{{ $user['name'] }}</p>
      <p><strong>Email: </strong>{{ $user['email'] }}</p>
      <p><strong>Course: </strong>{{ $user['course'] }}</p>
    @endif --}}

    {{-- @auth
      <p><strong>Name: </strong>{{ $user['name'] }}</p>
      <p><strong>Email: </strong>{{ $user['email'] }}</p>
      <p><strong>Course: </strong>{{ $user['course'] }}</p>
    @endauth --}}

    {{-- @foreach ($users as $user)
      <p><strong>Name: </strong>{{ $user['name'] }}</p>
      <p><strong>Email: </strong>{{ $user['email'] }}</p>
      <p><strong>Course: </strong>{{ $user['course'] }}</p>

      <hr>
    @endforeach --}}

    @forelse ($users as $user)
      <p><strong>Name: </strong>{{ $user['name'] }}</p>
      <p><strong>Email: </strong>{{ $user['email'] }}</p>
      <p><strong>Course: </strong>{{ $user['course'] }}</p>
    @empty
      {{-- dapat dgn <h1> sekali --}}
      {{-- dapat text yang betul --}}
      {!! $html_content !!}
    @endforelse

    @guest
      <h1>Sila login</h1>
    @endguest
  </div>

  <div class="col-4 bg-secondary">
    @include('layout.sidebar')
  </div>
</div>

@endsection