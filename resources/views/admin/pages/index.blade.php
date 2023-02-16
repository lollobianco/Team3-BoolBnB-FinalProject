@extends('layouts.app')

@section('content')
  @foreach ($apartments as $elem)
    <a href=" {{ route('admin.apartments.show', $elem['id']) }}">
      <h1>{{ $elem->name }}</h1>
    </a>

    <button class="btn btn-warning">
      <a href="{{ route('admin.apartments.edit', $elem->id) }}">Edit</a>
    </button>
  @endforeach
@endsection
