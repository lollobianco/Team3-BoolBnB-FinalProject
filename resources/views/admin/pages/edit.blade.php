@extends('layouts.app')

@section('content')
  <div class="container ">

    <h1 class="text-center p-4">Edit Apartment</h1>

    <form method="POST" action="{{ route('admin.apartments.update', $apartment->id) }}">

      @csrf

      @method('PUT')
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" value="{{ $apartment->name }}" type="text" class="form-control ">
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ $apartment->description }}</textarea>
        @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Image</label>
        <input type="file" name="cover_image" class="form-control-file">
        @error('cover_image')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label class="form-label">Image</label>
        <textarea class="form-control w-100 mb-3" name="cover_image">{{ $apartment->cover_image }}</textarea>
        @error('cover_image')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Rooms</label>
        <input type="text" value="{{ $apartment->rooms }}" class="form-control" name="rooms">
        @error('rooms')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Beds</label>
        <input type="text" value="{{ $apartment->beds }}" class="form-control" name="beds">
        @error('beds')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Bathrooms</label>
        <input type="text" value="{{ $apartment->bathrooms }}" class="form-control" name="bathrooms">
        @error('bathrooms')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Mq</label>
        <input type="text" value="{{ $apartment->mq }}" class="form-control" name="mq">
        @error('mq')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Accomodation</label>
        <input type="text" value="{{ $apartment->accomodation }}" class="form-control" name="accomodation">
        @error('accomodation')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Lat</label>
        <input type="text" value="{{ $apartment->lat }}" class="form-control" name="lat">
        @error('lat')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Long</label>
        <input type="text" value="{{ $apartment->long }}" class="form-control" name="long">
        @error('long')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Address</label>
        <input type="text" value="{{ $apartment->address }}" class="form-control" name="address">
        @error('address')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <select name="available" class="form-control">
          <option value=1>Available</option>
          <option value=0>Not Available</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Price</label>
        <input type="text" value="{{ $apartment->price }}" class="form-control" name="price">
        @error('price')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Edit apartment</button>

    </form>

  </div>
@endsection
