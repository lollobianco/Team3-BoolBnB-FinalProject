@extends('layouts.dashboard')

@section('right-panel')
  <div class="row h-100">

    <div class="border-0 d-flex flex-column col-4 overflow-y-auto">

      {{-- Carusel --}}
      <div class="rounded-4 mb-4">

        <img src="{{ asset("storage/$apartment->cover_image") }}" class="rounded img-fluid w-100">

      </div>

      {{-- Titolo --}}
      <h1 class="mb-4 text-decoration-none text-black">{{ $apartment->name }}</h1>


      {{-- Descrizione --}}
      <div class="container-fluid">

        <div class="row">

          {{-- Col LEft --}}
          <div class="p-0">
            <h3 class="m-0">Address</h3>
            <div class="pb-3">{{ $apartment->address }}</div>
            <h3 class="m-0">Description</h3>
            <div class="pb-3">{{ $apartment->description }}</div>
            <h3 class="m-0">Address</h3>
            <div class="pb-3">{{ $apartment->price }}€ a notte</div>

            <div class="pb-0">
              <h3 class="m-0">Services</h3>
              @foreach ($apartment->services as $service)
                @if (is_null($service->name))
                @else
                  <span class="badge bg-dark text-white mb-4"><i class="mr-2 {{ $service['icon'] }}"></i>
                    {{ $service['name'] }}</span>
                @endif
              @endforeach
            </div>

            {{-- <div>
              <button class="border-0 bg-white p-0 mb-3">
                <a href="" class="btn-custom text-decoration-none">Sponsor your flat</a>
              </button>
            </div> --}}

            <h3 class="mb-1">Actions</h3>
            <div class="d-flex">
              {{-- EDIT --}}
              <a class="btn-custom text-decoration-none p-0"
                href="{{ route('admin.apartments.edit', $apartment->id) }}"><i class="fas fa-pen-clip p-2"></i></a>

              {{-- DESTROY --}}
              <form method="POST" action="{{ route('admin.apartments.destroy', $apartment['id']) }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')"
                  class="p-0 ml-2 btn-custom text-decoration-none"><i class="fas fa-trash-can p-2"></i></button>
              </form>
            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="col-8 border-left overflow-y-auto">

      <div>
        <h2 class="text-center mb-0">Sponsor Your Flat</h2>
        <p class="text-center mb-4 text-decoration-underline">Make your flat more visible <i class="fa-solid ms-2 fa-chart-line"></i></p>
        <div class="d-flex pb-4 border-bottom">
          <div class="col-4 p-2 text-center">
  
            <div class="border p-3 rounded-4 bg-light">
              <h4>{{$bronze->name}}<i class="fa-regular fa-gem fs-6" style="color: #A8845C"></i></h4>
              <p class="m-0">2,99 € | 24 hours</p>
              <a class="text-decoration-none p-0"  href="{{route('admin.sponsor.pay', ['type' => $bronze->name, 'apartment_id' => $apartment->id])}}">
                <button class="btn rounded-3 py-1 mt-2 px-2 w-75"
                  style="background-color: #A8845C">PURCHASE</button>
              </a>
            </div>
  
          </div>
          <div class="col-4 p-2 text-center">
  
            <div class="border p-3 rounded-4 bg-light">
              <h4>{{$silver->name }}<i class="fa-regular fa-gem fs-6" style="color: #CCD3D1"></i><i class="fa-regular fa-gem fs-6" style="color: #CCD3D1"></i></h4>
              <p class="m-0">5,99 € | 72 hours</p>
              <a class="text-decoration-none p-0" href="{{route('admin.sponsor.pay', ['type' => $silver->name, 'apartment_id' => $apartment->id])}}">
                <button class="btn rounded-3 py-1 mt-2 px-2 w-75"
                style="background-color: #CCD3D1">PURCHASE</button>
              </a>
              
            </div>
  
          </div>
          <div class="col-4 p-2 text-center">
  
            <div class="border p-3 rounded-4 bg-light">
              <h4>{{$gold->name }}<i class="fa-regular fa-gem fs-6" style="color: #E8BE44"></i><i class="fa-regular fa-gem fs-6" style="color: #E8BE44"></i><i class="fa-regular fa-gem fs-6" style="color: #E8BE44"></i></h4>
              <p class="m-0">9,99 € | 144 hours</p>
              <a class="text-decoration-none p-0" href="{{route('admin.sponsor.pay', ['type' => $gold->name, 'apartment_id' => $apartment->id])}}">
                <button class="btn rounded-3 py-1 mt-2 px-2 w-75"
                  style="background-color: #E8BE44;">PURCHASE</button>
              </a>
            </div>
  
          </div>
        </div>
      </div>

      <div class="d-flex h-100 align-items-center justify-content-center">
          Sezione Grafici
      </div>

    </div>

  </div>
@endsection
