@extends('layouts.app')

@section('content')
    @foreach ($apartments as $elem)
        <a href=" {{ route('admin.apartments.show', $elem['id']) }}">
            <h1>{{ $elem->name }}</h1>
        </a>

        <button class="btn btn-warning">
            <a href="{{ route('admin.apartments.edit', $elem->id) }}">Edit</a>
        </button>

        <form method="POST" action="{{ route('admin.apartments.destroy', $elem['id']) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Destroy</button>
        </form>

    @endforeach
@endsection
