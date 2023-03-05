@extends('layouts.dashboard')

@section('right-panel')
  <div class="row h-100 p-sm-2 p-lg-3">

    <div class="border-0 d-flex flex-column col-lg-4 col-sm-12 overflow-y-auto p-0">

      {{-- Carusel --}}
      <div class="rounded-4 mb-4">

        <img src="{{ asset("storage/$apartment->cover_image") }}" class="rounded-4 img-fluid w-100">

      </div>

      {{-- Titolo --}}
      <div class="d-flex align-items-center">
      <h1 class="text-decoration-none m-0 text-black">{{ $apartment->name }}</h1>
      @foreach ($apartments_sponsors as $sponsored_apartment)
        @if ($sponsored_apartment->apartment_id == $apartment->id)
          <div class="d-flex align-items-center">
            <i class="fas fa-star mx-2" style="color: #E8BE44;"></i>
            <div>{{ $sponsored_apartment->sponsor_duration }}</div>
          </div>
        @endif
      @endforeach
      </div>

      {{-- Descrizione --}}
      <div class="container-fluid mt-3" id="sm-none">

        <div class="row">

          {{-- Col LEft --}}
          <div class="p-0">
            <h3 class="m-0">Address</h3>
            <div class="pb-3">{{ $apartment->address }}</div>
            <h3 class="m-0">Description</h3>
            <div class="pb-3">{{ Str::limit($apartment->description, 100) }}</div>
            <h3 class="m-0">Address</h3>
            <div class="pb-3">{{ $apartment->price }}€ a notte</div>

            <div class="mb-4">
              <h3 class="m-0">Services</h3>
              @foreach ($apartment->services as $service)
                @if (is_null($service->name))
                @else
                  <span class="badge bg-dark text-white"><i class="mr-2 {{ $service['icon'] }}"></i>
                    {{ $service['name'] }}</span>
                @endif
              @endforeach
            </div>

            <h3 class="mb-1">Actions</h3>
            <div class="d-flex">
              {{-- EDIT --}}
              <a class="btn-custom text-decoration-none p-0" href="{{ route('admin.apartments.edit', $apartment->id) }}">
                <i class="fas fa-pen-clip p-2"></i>
              </a>

              {{-- DESTROY --}}
              <form method="POST" action="{{ route('admin.apartments.destroy', $apartment['id']) }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')"
                  class="p-0 ml-2 btn-custom text-decoration-none">
                  <i class="fas fa-trash-can p-2"></i>
                </button>
              </form>

            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="col-lg-8 col-sm-12 overflow-y-auto">

      <div class="">
        <h2 class="text-center mb-0 mt-mobile py-1">Sponsor Your Flat</h2>
        <p class="text-center mb-4 text-decoration-underline">Make your flat more visible <i
            class="fa-solid ms-2 fa-chart-line"></i></p>
        <div class="d-lg-flex pb-4 border-bottom">
          <div class="col-lg-4 col-sm-12 p-2 text-center">

            <div class="border p-3 rounded-4 bg-light">
              <h4>{{ $bronze->name }}<i class="fa-regular fa-gem fs-6" style="color: #A8845C"></i></h4>
              <p class="m-0">2,99 € | 24 hours</p>
              <a class="text-decoration-none p-0"
                href="{{ route('admin.sponsor.pay', ['type' => $bronze->name, 'apartment_id' => $apartment->id]) }}">
                <button class="btn rounded-3 py-1 mt-2 px-2 w-75" style="background-color: #A8845C">PURCHASE</button>
              </a>
            </div>

          </div>
          <div class="col-lg-4 col-sm-12 p-2 text-center">

            <div class="border p-3 rounded-4 bg-light">
              <h4>{{ $silver->name }}<i class="fa-regular fa-gem fs-6" style="color: #CCD3D1"></i><i
                  class="fa-regular fa-gem fs-6" style="color: #CCD3D1"></i></h4>
              <p class="m-0">5,99 € | 72 hours</p>
              <a class="text-decoration-none p-0"
                href="{{ route('admin.sponsor.pay', ['type' => $silver->name, 'apartment_id' => $apartment->id]) }}">
                <button class="btn rounded-3 py-1 mt-2 px-2 w-75" style="background-color: #CCD3D1">PURCHASE</button>
              </a>

            </div>

          </div>
          <div class="col-lg-4 col-sm-12 p-2 text-center">

            <div class="border p-3 rounded-4 bg-light">
              <h4>{{ $gold->name }}<i class="fa-regular fa-gem fs-6" style="color: #E8BE44"></i><i
                  class="fa-regular fa-gem fs-6" style="color: #E8BE44"></i><i class="fa-regular fa-gem fs-6"
                  style="color: #E8BE44"></i></h4>
              <p class="m-0">9,99 € | 144 hours</p>
              <a class="text-decoration-none p-0"
                href="{{ route('admin.sponsor.pay', ['type' => $gold->name, 'apartment_id' => $apartment->id]) }}">
                <button class="btn rounded-3 py-1 mt-2 px-2 w-75" style="background-color: #E8BE44;">PURCHASE</button>
              </a>
            </div>

          </div>
        </div>
      </div>

      <div class="accordion mb-4 accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Read Messages
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              @foreach ($messages as $message)
                <div class="border-bottom mb-4">
                  <div class="mb-2">
                    <div>{{ $message->name }}</div>
                    <div>{{ $message->email }}</div>
                  </div>
                  <div class="">{{ $message->text }}</div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
