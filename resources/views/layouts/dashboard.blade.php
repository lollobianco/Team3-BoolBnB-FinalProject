@extends('layouts.app')

@section('content')
    
<div class="container-fluid w-75  mx-auto container-minus-nav p-3" id="width100mobile">



    <div class="row d-flex py-3 justify-content-between h-100">
      
      <div class="d-flex col-lg-3 col-sm-12 flex-column border rounded-4">
        @foreach ($apartments as $elem)
          
          <a href="{{ route('admin.dashboard.show', $elem['id']) }}"
            class="apartment-card border-bottom">

            <div class="d-lg-flex justify-content-between w-100">
              
              <div>
                <h6 class="mt-2 card-element">{{ $elem->name }}</h6>
                <h6 class="mt-2 card-element">{{ $elem->address }}</h6>
              </div>

              <h6 id="sm-none" class="mt-0 align-self-end"> <span class=" card-element">{{ $elem->price }}€ </span> night</h6>
  
            </div>
          </a>
          
        @endforeach
      </div>

      <div class="col-lg-9 col-sm-12 mt-mobile p-2 border rounded-4">
        <div class="container-fluid h-100" id="width100mobile">
          @yield('right-panel')
        </div>
      </div>
      
    </div>

  </div>

@endsection