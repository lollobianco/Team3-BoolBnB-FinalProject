@extends('layouts.app')

@section('content')
    
<div class="container-fluid w-75 mx-auto my-5 py-5 vh-100">

    <div class="d-flex my-5">
      <h1 class="">Your DashBoard:</h1>
      @if (session('success'))
        <div class="alert alert-success ml-4 mb-2 alert-dismissible fade show" role="alert">
          {{ session('success') }}.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>

    <div class="row d-flex justify-content-between">
      
      <div class="d-flex col-3 flex-column border rounded-4">
        @foreach ($apartments as $elem)
          
          <a href="{{ route('admin.dashboard.show', $elem['id']) }}"
            class="apartment-card border-bottom">

            <div class="d-flex justify-content-between w-100">
              
              <div>
                <h6 class="mt-2 card-element">{{ $elem->name }}</h6>
                <h6 class="mt-2 card-element">{{ $elem->address }}</h6>
              </div>

              <h6 class="mt-0 card-element align-self-end"> <strong>{{ $elem->price }}€ </strong> a notte</h6>
  
            </div>
          </a>
          
        @endforeach
      </div>

      <div class="col-9">
        <div class="border rounded-4 p-4 h-100">
          @yield('right-panel')
        </div>
      </div>
      
    </div>

  </div>

@endsection