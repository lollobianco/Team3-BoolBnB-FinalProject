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
      @foreach ($apartments as $elem)
        <a class="col-2  m-1 text-decoration-none text-black" href=" {{ route('admin.apartments.show', $elem['id']) }}">

          <div class="card border-0">
            <img src="{{ asset("storage/$elem->cover_image") }}" class="rounded">
            <div class="card-body">

              <h2 class="fs-5 text-center">{{ $elem->name }}</h2>

            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
@endsection
