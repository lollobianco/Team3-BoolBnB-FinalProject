@extends('layouts.app')

@section('content')
    <div class="">

        <div class="container-fluid right-section py-3 w-100 col-lg-9 col-sm-12 p-sm-4 p-lg-5">

            <div class="d-flex pl-2">
                <h1 class="">Your Apartments</h1>
                @if (session('success'))
                    <div class="alert alert-success ml-4 mb-2 alert-dismissible fade show" role="alert">
                        {{ session('success') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="pb-4 pl-2"> <a class="pink-color2" href="/"><i class="fa-solid mr-2 fa-house"></i>Click here
                    to
                    return to
                    home</a>
            </div>
            <div class="container-fluid px-0">

                <div class="d-flex flex-wrap">

                    @foreach ($apartments as $elem)
                        <a href="{{ route('admin.apartments.show', $elem['id']) }}"
                            class="apartment-card border-0 col-xl-3 col-lg-3 col-md-4 img-fluid p-2 col-sm-12">

                            <div class="card-relative">
                                <i class="fa-regular fa-eye"></i>
                                <img src="{{ asset("storage/$elem->cover_image") }}" class="card-img coverimg rounded-4"
                                    alt="cover image">
                            </div>

                        </a>
                        
                    @endforeach

                </div>


            </div>

        </div>
    @endsection
