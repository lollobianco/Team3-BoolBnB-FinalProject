@extends('layouts.app')
@section('content')
  <div class="d-flex">
    @if (session('success'))
      <div class="alert alert-success ml-5 mb-0 alert-dismissible fade show" role="alert">
        {{ session('success') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
  </div>

  <div class="container-fluid pl-0 d-flex test">

    <div class="sidebar-container py-5 px-3">
      <div class="nav nav-flush text-center">
        <div class="nav-item d-flex flex-column">
          <a href="/" class="nav-link active p-0" aria-current="page">
            <button type="button" class="btn d-flex flex-align-center justify-content-center btn-light rounded-circle side-btn mb-3" data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right" data-mdb-content="Home" data-mdb-trigger="hover">
              <i class="fa-solid fa-house side-ico"></i>
            </button>
          </a>
          <a href="" class="nav-link active p-0">
            <button type="button" class="btn d-flex flex-align-center justify-content-center btn-light rounded-circle side-btn mb-3" data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right" data-mdb-content="My Apartment" data-mdb-trigger="hover">
              <i class="fas side-ico fa-house-user"></i>
            </button>
          </a>
          <a href="" class="nav-link active p-0">
            <button type="button" class="btn d-flex flex-align-center justify-content-center btn-light rounded-circle side-btn mb-3" data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right" data-mdb-content="Create Apartment" data-mdb-trigger="hover">
              <i class="fas fa-plus side-ico"></i>
            </button>
          </a>
          <a href="" class="nav-link active p-0">
            <button type="button" class="btn d-flex flex-align-center justify-content-center btn-light rounded-circle side-btn mb-3" data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right" data-mdb-content="Dashboard" data-mdb-trigger="hover">
              <i class="fa-solid side-ico fa-table-columns"></i>
            </button>
          </a>
          <a href="" class="nav-link active p-0 align-self-end">
            <button type="button" class="btn d-flex flex-align-center justify-content-center btn-light rounded-circle side-btn mb-3" data-mdb-container="body" data-mdb-toggle="popover" data-mdb-placement="right" data-mdb-content="Dashboard" data-mdb-trigger="hover">
              <i class="fa-solid side-ico fa-table-columns"></i>
            </button>
          </a>
        </div>
      </div>
    </div>

    <div class="d-flex right-section flex-wrap p-5">

      @foreach ($apartments as $elem)
        {{-- <a href="{{ route('admin.apartments.show', $elem['id']) }}"> --}}
        <a href="{{ route('admin.apartments.show', $elem['id']) }}"
          class="apartment-card border-0 col-lg-2 col-md-4 img-fluid p-2 col-sm-12">
          <div class="card-relative">
            <i class="fa-regular fa-eye"></i>
            <img src="{{ asset("storage/$elem->cover_image") }}" class="card-img coverimg rounded-4" alt="cover image">
          </div>
          <div class="py-3 px-0">

            <h6 class="mt-2 card-element">{{ $elem->address }}</h6>
            <h6 class="mt-0 card-element"> <strong>{{ $elem->price }}€ </strong> a notte</h6>

          </div>
        </a>
        {{-- </a> --}}
      @endforeach
    </div>
  </div>

  <script>
    $('[data-toggle="popover"]').popover({
      title: "GeeksforGeeks",
      trigger: "hover"
    });
  </script>

  </div>
@endsection
