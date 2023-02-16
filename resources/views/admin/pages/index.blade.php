@extends('layouts.app')

@section('content')

@foreach ($apartments as $elem)
    <h1>{{$elem->name}}</h1>
    
@endforeach

@endsection
