@extends('layouts.app')

@section('content')


<h1>Pagina Show</h1>

<h2>{{$apartment->name}}</h2>

<button class="btn btn-warning">
  <a href="{{route('admin.apartments.edit', $apartment->id)}}">Edit</a> 
</button>


@endsection