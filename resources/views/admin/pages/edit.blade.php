@extends('layouts.app')

@section('content')

  <div class="container-fluid right-section">

    <h1 class="text-center p-4">Edit Apartment</h1>

    <form class="d-flex flex-column" method="POST" action="{{ route('admin.apartments.update', $apartment->id) }}"
      enctype="multipart/form-data">

      @csrf

      @method('PUT')

      {{-- NAME --}}
      <div class="mb-4">
        <label class="form-label">Name</label>
        <input name="name" value="{{ $apartment->name }}" type="text" class="form-control " required>
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- DESCRIPTION --}}
      <div class="mb-4">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" required>{{ $apartment->description }}</textarea>
        @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- IMMAGINE --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Image</label>
        <input type="file" name="cover_image" class="form-control-file" required>
        @error('cover_image')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- ROOMS --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Rooms</label>
        <input type="number" min="1" max="50" value="{{ $apartment->rooms }}" class="form-control"
          name="rooms" required>
        @error('rooms')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- BEDS --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Beds</label>
        <input type="number" min="1" max="50" value="{{ $apartment->beds }}" class="form-control"
          name="beds" required>
        @error('beds')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- BATHROOM --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Bathrooms</label>
        <input type="number" min="1" max="50" value="{{ $apartment->bathrooms }}" class="form-control"
          name="bathrooms" required>
        @error('bathrooms')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- MQ --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Mq</label>
        <input type="number" min="1" max="1000" value="{{ $apartment->mq }}" class="form-control"
          name="mq" required>
        @error('mq')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- ACCOMODATION --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Accomodation</label>
        <input type="number" min="1" max="50" value="{{ $apartment->accomodation }}" class="form-control"
          name="accomodation" required>
        @error('accomodation')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- ADDRESS --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Address</label>
        <input type="text" value="{{ $apartment->address }}" class="form-control" name="address" required>
        @error('address')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- PRICE --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Price</label>
        <input type="number" min="1" value="{{ $apartment->price }}" class="form-control" name="price" required>
        @error('price')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- AVAILABLE --}}
      <div class="mb-4">
        <label class="form-label">Availability</label>
        <select name="available" class="form-control" required>
          <option value=1>Available</option>
          <option value=0>Not Available</option>
        </select>
      </div>

      {{-- SERVICES --}}
      <div>
        @foreach ($services as $service)
          <div class="cat action btn btn-secondary border-0 rounded-5 p-0 mr-2 mb-4">
            <label>
              <input type="checkbox" name="services[]" value="{{ $service->id }}"
                {{ $apartment->services->contains($service) ? 'checked' : '' }}>
              <span>{{ $service['name'] }}</span>
            </label>
          </div>
        @endforeach
      </div>

      <div>
        <button type="submit" class="btn btn-warning rounded-5">Edit apartment</button>
      </div>

    </form>

  </div>
@endsection
