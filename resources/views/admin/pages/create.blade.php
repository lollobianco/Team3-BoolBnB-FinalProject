@extends('layouts.app')

@section('content')

  <div class="container-fluid right-section">

    <h1 class="text-center p-4">Add Apartment</h1>

    <form class="d-flex flex-column" method="POST" action="{{ route('admin.apartments.store') }}"
      enctype="multipart/form-data">

      @csrf

      {{-- NAME --}}
      <div class="mb-4">
        <label class="form-label">Name</label>
        <input name="name" type="text" class="form-control ">
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- DESCRIPTION --}}
      <div class="mb-4">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control"></textarea>
        @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- IMMAGINE --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Image</label>
        <input type="file" name="cover_image" class="form-control-file">
        @error('cover_image')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- ROOMS --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Rooms</label>
        <input type="number" min="1" max="50" class="form-control" name="rooms">
        @error('rooms')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- BEDS --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Beds</label>
        <input type="number" min="1" max="50" class="form-control" name="beds">
        @error('beds')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- BATHROOM --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Bathrooms</label>
        <input type="number" min="1" max="50" class="form-control" name="bathrooms">
        @error('bathrooms')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- MQ --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Mq</label>
        <input type="number" min="1" max="1000" class="form-control" name="mq">
        @error('mq')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- ACCOMODATION --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Accomodation</label>
        <input type="number" min="1" max="50" class="form-control" name="accomodation">
        @error('accomodation')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      {{-- 
              LAT LONG--------------------------------------------------
            <div class="mb-4">
                <label class="form-label form-check-label" for="">Lat</label>
                <input type="number"  min="1" class="form-control" name="lat">
                @error('lat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            
            <div class="mb-4">
                <label class="form-label form-check-label" for="">Long</label>
                <input type="number"  min="1" class="form-control" name="long">
                @error('long')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> 
            LAT LONG--------------------------------------------------
            --}}

      {{-- ADDRESS --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Address</label>
        <input type="text" class="form-control" name="address">
        @error('address')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- PRICE --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Price</label>
        <input type="number" min="1" class="form-control" name="price">
        @error('price')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      {{-- AVAILABLE --}}
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Availability</label>
        <select name="available" class="form-control">
          <option value=1>Available</option>
          <option value=0>Not Available</option>
        </select>
      </div>

      {{-- SERVICES --}}
      <div>
        @foreach ($services as $service)
          <div class="cat action btn btn-secondary border-0 rounded-5 p-0 mr-2 mb-4">
            <label>
              <input type="checkbox" name="services[]" value="{{ $service->id }}"><span>{{ $service->name }}</span>
            </label>
          </div>
        @endforeach
      </div>

      {{-- INVIO --}}
      <div>
        <button type="submit" class="btn btn-primary">Add apartment</button>
      </div>

    </form>

  </div>
@endsection
