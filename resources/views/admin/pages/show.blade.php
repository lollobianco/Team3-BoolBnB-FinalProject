@extends('layouts.app')

@section('content')
<div class="p-5">

  @if (session('success'))
    <div class="container d-flex justify-content-center pt-5 alert-container">
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    </div>
  @endif

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

</div>
@endsection
