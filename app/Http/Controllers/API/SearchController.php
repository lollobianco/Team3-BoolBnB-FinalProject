<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Service;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $apartments = Apartment::With('services')->get();

        $services = Service::all();

        $apartment_service = Apartment::select('apartments.id', 'apartments.name', 'apartments.description', 'apartments.cover_image', 'apartments.rooms', 'apartments.beds', 'apartments.bathrooms', 'apartments.mq', 'apartments.accomodation', 'apartments.lat','apartments.long','apartments.address', 'apartments.available', 'apartments.price', 'apartments.user_id','apartment_service.apartment_id', 'apartment_service.service_id')
            ->join('apartment_service', 'apartments.id', '=', 'apartment_service.apartment_id')
            ->join('services', 'services.id', '=', 'apartment_service.service_id')
            ->get();

        return response()->json(compact('apartments', 'apartment_service', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
