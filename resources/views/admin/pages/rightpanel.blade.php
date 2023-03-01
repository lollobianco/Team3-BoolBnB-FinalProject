@extends('layouts.dashboard')

@section('right-panel')
  <div class="row h-100">

    <div class="border-0 d-flex flex-column col-4">

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

            <div class="pb-3">
              <h3 class="m-0">Services</h3>
              @foreach ($apartment->services as $service)
                @if (is_null($service->name))
                @else
                  <span class="badge bg-dark text-white mb-4"><i class="mr-2 {{ $service['icon'] }}"></i>
                    {{ $service['name'] }}</span>
                @endif
              @endforeach
            </div>

            <h3 class="mb-1">Actions</h3>
            <div class="d-flex">
                {{-- EDIT --}}
                <a href="{{ route('admin.apartments.edit', $apartment->id) }}"><i class="fas fa-pen-clip side-ico text-dark"></i></a>
    
                {{-- DESTROY --}}
                <form method="POST" action="{{ route('admin.apartments.destroy', $apartment['id']) }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Are you sure?')" class="p-0 ml-3 btn"><i class="fas fa-trash-can side-ico text-dark"></i></button>
                </form>
            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="col-8 border-left d-flex align-items-center justify-content-center">
      <h1>Sezione grafici</h1>
    </div>
  </div>
@endsection
