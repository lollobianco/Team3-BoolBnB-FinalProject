@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="container d-flex justify-content-center pt-5 alert-container">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="container-fluid w-75 mt-5 py-5">


        <div class=" row border-0 d-flex flex-column">

            {{-- Titolo --}}
            <h1 class="mb-4 w-75 m-auto text-decoration-none text-black">{{ $apartment->name }}</h1>

            {{-- Carusel --}}
            <div id="carouselExampleRide" class="carousel m-auto slide rounded-4 w-75" data-bs-ride="true">

                {{-- Carusel --}}
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset("storage/$apartment->cover_image") }}" class="rounded img-fluid d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                </div>

                {{-- Bottoni --}}
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                {{-- Bottoni --}}
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            {{-- Descrizione --}}
            <div class="container-fluid w-75 m-auto pt-5">
                <div class="row">

                    {{-- Col LEft --}}
                    <div class="col-8">
                        <span>Description</span>
                        <h3>
                            {{ $apartment->description }}
                        </h3>
                        <span>Address</span>
                        <h3>{{ $apartment->address }}</h3>


                        <div>
                            <div>Services</div>
                            @foreach ($apartment->services as $service)
                                @if (is_null($service->name))
                                @else
                                    <span class="badge bg-dark text-white mb-4"><i class="mr-2 {{ $service['icon'] }}"></i>
                                        {{ $service['name'] }}</span>
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
                                class="p-2 my-1 btn btn-danger">Delete
                                apartment</button>
                        </form>

                    </div>

                    {{-- COl right --}}
                    <div class="col-4">
                        <h3>€{{ $apartment->price }}</h3>
                    </div>

                </div>
                <div>

                </div>





            </div>
        </div>
    </div>
@endsection
