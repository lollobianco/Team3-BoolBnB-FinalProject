@extends('layouts.app')

@section('content')
  <div class="border-0 right-section container d-flex flex-column p-sm-4 p-lg-5">

    {{-- Titolo --}}
    {{-- <div class="d-flex">
      <h1 class="mb-4 text-decoration-none text-black">{{ $apartment->name }}</h1>
      @if (session('success'))
        <div class="container ms-3 me-auto alert-container">
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        </div>
      @endif
      <div></div>
    </div> --}}
    <div class="d-flex pl-2 mb-4">
      <h1 class="text-decoration-none text-black">{{ $apartment->name }}</h1>
      @if (session('success'))
        <div class="alert alert-success ml-4 mb-2 alert-dismissible fade show" role="alert">
          {{ session('success') }}.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>

    {{-- Carusel --}}
    <img src="{{ asset("storage/$apartment->cover_image") }}" class="w-100 rounded-4 image-cover">

    <div class="pt-5">

      <div class="row">

        {{-- Col LEft --}}
        <div class="col-lg-8 col-sm-12">
          <h3>Description</h3>
          <p>
            {{ $apartment->description }}
          </p>
          <h3>Address</h3>
          <p>{{ $apartment->address }}</p>


          <div class="mb-4">
            <h3>Services</h3>
            @foreach ($apartment->services as $service)
              @if (is_null($service->name))
              @else
                <span class="badge bg-dark text-white"><i class="mr-2 {{ $service['icon'] }}"></i>
                  {{ $service['name'] }}</span>
              @endif
            @endforeach
          </div>

          {{-- EDIT --}}
          <div class="d-flex align-items-center mb-4">
            <a class="text-decoration-none" href="{{ route('admin.apartments.edit', $apartment->id) }}">
              <button class="btn-custom my-2">EDIT</i></button></a>

            {{-- DESTROY --}}
            <form method="POST" action="{{ route('admin.apartments.destroy', $apartment['id']) }}">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Are you sure?')" class="btn-custom ms-2">Delete
                apartment</button>
            </form>
          </div>

        </div>

        {{-- COl right --}}
        <div class="col-lg-4 col-sm-12 ">
          <h3><strong class="border border-4 border-dark rounded-5 bg-dark text-white">€{{ $apartment->price }}</strong>
            at night</h3>
          <h3 class="pt-1">Position <i class="fas fa-down-long fs-4"></i></h3>

          <div class="mt-0 pt-0">


            <input type="hidden" value="{{ $apartment->lat }}" id="lat" type="text">
            <input type="hidden" value="{{ $apartment->long }}" id="long" type="text">

            <div class="mt-0">

              <div id="map" style="width:100%; height: 350px; border-radius: 2%"></div>

            </div>

          </div>
        </div>

      </div>
      {{-- Mappa --}}

      <div>

      </div>





    </div>
  </div>
  <script>
    // Map
    var latString = document.getElementById('lat')
    var longString = document.getElementById('long')

    var latNum = +latString.value
    var longNum = +longString.value
    console.log(latNum)
    console.log(longNum)
    var POS = [longNum, latNum]


    var map = tt.map({
      key: "0HdIeR7zDtKAE4DzRGUEAamM4AA7X491",
      container: "map",
      center: POS,
      zoom: 7,
      container: 'map'
    })

    map.on('load', () => {
      new tt.Marker().setLngLat(POS).addTo(map)
    })
  </script>
@endsection
