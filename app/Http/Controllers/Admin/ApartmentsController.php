<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all(); 
     
        return view('admin.pages.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(

            [
                'name' => 'required|max:30',
                'description' => 'required|max:500',
                'cover_image' => 'required',
                'rooms' => 'required|max:50',
                'beds' => 'required|max:50',
                'bathrooms' => 'required|max:50',
                'mq' => 'required|max:50',
                'accomodation' => 'required|max:50',
                'lat' => 'required|max:50',
                'long' => 'required|max:50',
                'address' => 'required|max:50',
                'available' => 'required|max:50',
                'price' => 'required|max:50',

            ]

        );

        $new_apartment = new Apartment();

        if(array_key_exists('cover_image', $data)){

            $cover_url = Storage::put('cover_images', $data['cover_image']);
            $data['cover_image'] = $cover_url;

        }

        $new_apartment->fill($data);

        $new_apartment->save();

        return redirect()->route('admin.apartments.index')->with('success', "You have successfully added: $new_apartment->name");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);

        return view('admin.pages.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);


        return view('admin.pages.edit', compact('apartment'));
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
        $data = $request->all();
        $apartment = Apartment::findOrFail($id);
        $apartment->update($data);

        return redirect()->route('admin.apartments.show', $apartment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Apartment::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.apartments.index');
    }
}
