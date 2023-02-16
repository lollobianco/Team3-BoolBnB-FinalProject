@extends('layouts.app')

@section('content')
<div class="container ">

    <h1 class="text-center p-4">Add Apartment</h1>

    <form method="POST" action="{{ route('admin.apartments.store') }}" >

      @csrf

      <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" type="text" class="form-control ">
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control"></textarea>
        @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label class="form-label">Image</label>
        <textarea class="form-control w-100 mb-3" name="cover_image" ></textarea>
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Rooms</label>
        <input type="text" class="form-control" name="rooms">
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Beds</label>
        <input type="text" class="form-control" name="beds">
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Bathrooms</label>
        <input type="text" class="form-control" name="bathrooms">
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Mq</label>
        <input type="text" class="form-control" name="mq">
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Accomodation</label>
        <input type="text" class="form-control" name="accomodation">
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Lat</label>
        <input type="text" class="form-control" name="lat">
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Long</label>
        <input type="text" class="form-control" name="long">
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Address</label>
        <input type="text" class="form-control" name="address">
      </div>

      <div class="mb-4">
        <label class="form-label form-check-label" for="">Address</label>
        <input type="text" class="form-control" name="address">
      </div>
      
      <div class="mb-4">
        <label class="form-label form-check-label" for="">Price</label>
        <input type="text" class="form-control" name="price">
      </div>






      <button type="submit" class="btn btn-primary">Add apartment</button>

    </form>

  </div>
@endsection