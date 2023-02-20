<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('api')->prefix('/apartments')->group(function(){
    
    Route::get('/', 'ApartmentsController@index'); // -> Genera: localhost:8080/api/posts
    Route::get('/{id}', 'ApartmentsController@show');

});