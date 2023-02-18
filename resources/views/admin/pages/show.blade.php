@extends('layouts.loginregister')

@section('content')
  <h1>Pagina Show</h1>

  <h2>{{ $apartment->name }}</h2>

  <p>{{ $apartment->description }}</p>

  <p>{{ $apartment->address }}</p>

  <p>{{ $apartment->price }}</p>

  <button class="btn btn-warning">
    <a href="{{ route('admin.apartments.edit', $apartment->id) }}">Edit</a>
  </button>

  <form method="POST" action="{{ route('admin.apartments.destroy', $apartment['id']) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="p-2 my-1 btn btn-danger">Delete apartment</button>
  </form>
@endsection
