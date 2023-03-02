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
        <img src="{{ asset("storage/$apartment->cover_image") }}" class="w-100 rounded-4" style="height: 500px; object-fit: cover; object-position: center;">


      {{-- Descrizione --}}
      <div class="container-fluid pt-5">
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
              <button type="submit" onclick="return confirm('Are you sure?')" class="p-2 my-1 btn btn-danger">Delete
                apartment</button>
            </form>

          </div>

          {{-- COl right --}}
          <div class="col-4">
            <h3>€{{ $apartment->price }} at night</h3>

            <div class="mt-2 p-0">

              <h2 class="mb-3">Location:</h2>
              <input type="hidden" value="{{ $apartment->lat }}" id="lat" type="text">
              <input type="hidden" value="{{ $apartment->long }}" id="long" type="text">
  
              <div id="map" class="map rounded-4" style="width: 100%; height: 300px;"></div>
  
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
          zoom: 3,
        })

        map.on('load', () => {
          new tt.Marker().setLngLat(POS).addTo(map)
        })
      </script>
  </div>
@endsection
