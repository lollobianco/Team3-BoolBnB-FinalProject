@extends('layouts.app')

@section('content')
<div class="container d-flex">
    @foreach ($apartments as $elem)
   
        <div class="card p-2 mt-5 ms-5" style="width: 22rem;">
            <img src="{{ $elem->cover_image }}" class="card-img-top">
            <div class="card-body">
                <a class="text-decoration-none text-black card-title"
                    href=" {{ route('admin.apartments.show', $elem['id']) }}">
                    <h2>{{ $elem->name }}</h2>
                </a>
                <p class="card-text my-3">{{ $elem->description }}</p>
                <a href="#" class="bg-white text-black">
                    <form method="POST" action="{{ route('admin.apartments.destroy', $elem['id']) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 my-1 border border-white">Delete apartment</button>
                    </form>
                </a>
                <button class="p-2 border border-white rounded">
                    <a class="text-decoration-none text-black" href="{{ route('admin.apartments.edit', $elem->id) }}">Edit apartment info</a>
                </button>
            </div>
        </div>
    @endforeach
</div>
@endsection
