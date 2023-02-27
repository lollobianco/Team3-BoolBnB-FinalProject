<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        // $user = User::find($user_id); 
        $apartments = Apartment::with('services')->whereHas('user', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        // dd($apartments);
        return view('admin.pages.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('admin.pages.create', compact('services'));
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
                'description' => 'max:500',
                'cover_image' => 'required',
                'rooms' => 'required|max:50|min:1',
                'beds' => 'max:50|min:1',
                'bathrooms' => 'required|max:50|min:1',
                'mq' => 'required|max:1000|min:1',
                'accomodation' => 'max:50|min:1',
                'address' => 'required|max:50',
                'available' => 'required',
                'price' => 'required|min:1',
            ]

        );

        $new_apartment = new Apartment();

        if (array_key_exists('cover_image', $data)) {


            $cover_url = Storage::put('cover_images', $data['cover_image']);
            $data['cover_image'] = $cover_url;
        }

        $user_id = Auth::user()->id;
        $data['user_id'] = $user_id;

        $new_apartment->fill($data);

        $new_apartment->save();

        if (array_key_exists('services', $data)) {
            $new_apartment->services()->sync($data['services']);
        }

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
        $apartment = Apartment::with('services')->findOrFail($id);
        // dd($apartment);
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
        $apartment = Apartment::with('services')->findOrFail($id);

        $services = Service::all();

        return view('admin.pages.edit', compact('apartment', 'services'));
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

        $request->validate(

            [
                'name' => 'required|max:30',
                'description' => 'max:500',
                'cover_image' => '',
                'rooms' => 'required|max:50|min:1',
                'beds' => 'max:50|min:1',
                'bathrooms' => 'required|max:50|min:1',
                'mq' => 'required|max:1000|min:1',
                'accomodation' => 'max:50|min:1',
                'address' => 'required|max:50',
                'available' => 'required',
                'price' => 'required|min:1',

            ]

        );

        if (array_key_exists('cover_image', $data)) {


            $cover_url = Storage::put('cover_images', $data['cover_image']);
            $data['cover_image'] = $cover_url;
        }

        $apartment = Apartment::findOrFail($id);

        $apartment->update($data);

        return redirect()->route('admin.apartments.show', $apartment->id)->with('success', "You have successfully edited: $apartment->name");
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
        $data->services()->sync([]);
        $data->delete();
        return redirect()->route('admin.apartments.index');
    }
}
