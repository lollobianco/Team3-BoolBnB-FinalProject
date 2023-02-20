@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="container d-flex justify-content-center pt-5 alert-container">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row d-flex flex-wrap justify-content-center">


            <h1 class="col-2  m-1 text-decoration-none text-black">{{ $apartment->name }}</h1>
            <div class="card border-0">
                <img src="{{ asset("storage/$apartment->cover_image") }}" class="rounded">

                <div class="card-body">
                    <p>
                        {{ $apartment->description }}
                    </p>
                    <p>{{ $apartment->address }}</p>

                    <p>{{ $apartment->price }}</p>

                    <div>
                        @foreach ($apartment->services as $service)
                            @if (is_null($service->name))
                            @else
                                <span class="badge bg-dark text-white mb-4">{{ $service['name'] }}</span>
                            @endif
                        @endforeach
                    </div>

                    {{-- EDIT --}}
                    <button class="btn btn-warning">
                        <a href="{{ route('admin.apartments.edit', $apartment->id) }}">Edit</a>
                    </button>

                    {{-- DESTROY --}}
                    <form method="POST" action="{{ route('admin.apartments.destroy', $apartment['id']) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')"
                            class="p-2 my-1 btn btn-danger">Delete apartment</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
