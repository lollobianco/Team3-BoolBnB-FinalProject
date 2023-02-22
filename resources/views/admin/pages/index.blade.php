@extends('layouts.app')
@section('content')


  <div class="d-flex">
    <h1 class="">Your Apartments</h1>
    @if (session('success'))
      <div class="alert alert-success ml-5 mb-0 alert-dismissible fade show" role="alert">
        {{ session('success') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
  </div>
  <div class="pb-4"> <a class="pink-color2" href="/"><i class="fa-solid mr-2 fa-house"></i>Click here to return to
      home</a> </div>
  <div class="container-fluid d-flex">
    <div class="row">
      @foreach ($apartments as $elem)
        {{-- <a href="{{ route('admin.apartments.show', $elem['id']) }}"> --}}
        <a href="{{ route('admin.apartments.show', $elem['id']) }}"
          class="card apartment-card border-0 col-lg-2 col-md-4 img-fluid p-2 col-sm-12">
          <div class="card-relative">
            <i class="fa-regular fa-eye"></i>
            <img src="{{ asset("storage/$elem->cover_image") }}" class="card-img coverimg" alt="cover image">
          </div>
          <div class="card-body p-0">

            <h6 class="mt-2 card-element">{{ $elem->address }}</h6>
            <h6 class="mt-0 card-element"> <strong>{{ $elem->price }}€ </strong> a notte</h6>

          </div>
        </a>
        {{-- </a> --}}
      @endforeach
    </div>
  </div>
@endsection
