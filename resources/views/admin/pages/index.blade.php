@extends('layouts.app')

@section('content')
  @if (session('success'))
    <div class="container d-flex justify-content-center pt-5 alert-container">
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    </div>
  @endif

  <h1 class="">Your Apartments</h1>
  <div class="pb-4"> <a class="pink-color2" href="/"><i class="fa-solid mr-2 fa-house"></i>Click here to return to
      home</a> </div>
  <div class="container-fluid d-flex">
    <div class="row">
      @foreach ($apartments as $elem)
        {{-- <a href="{{ route('admin.apartments.show', $elem['id']) }}"> --}}
          <a href="{{ route('admin.apartments.show', $elem['id']) }}" class="card border-0 col-lg-2 col-md-4 img-fluid p-2 col-sm-12">
            <div class="card-relative">
              <i class="fa-regular fa-eye"></i>
              <img src="{{ asset("storage/$elem->cover_image") }}" class="card-img coverimg" alt="cover image">
            </div>
            <div class="card-body p-0">

              <h6 class="mt-2 card-element">{{ $elem->address }}</h6>
              <h6 class="mt-0 card-element"> <strong>{{ $elem->price }} € </strong> notte</h6>

            </div>
          </a>
        {{-- </a> --}}
      @endforeach
    </div>
  </div>
@endsection
