@extends('layouts.app')

@section('content')

@foreach ($apartments as $elem)
    

    <a href=" {{ route('admin.apartments.show', $elem['id']) }}">
        <h1>{{$elem->name}}</h1>
    </a>
    
@endforeach

@endsection


