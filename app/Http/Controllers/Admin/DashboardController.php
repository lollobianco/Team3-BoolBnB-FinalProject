<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsor;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $user_id = Auth::user()->id;

        // $user = User::find($user_id); 
        $apartments = Apartment::with('services')->whereHas('user', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        
        return view('admin.pages.dashboard', compact('apartments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user_id = Auth::user()->id;

        // $user = User::find($user_id); 
        $apartments = Apartment::with('services')->whereHas('user', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        $messages = Message::where('apartment_id', '=', $id)->get();
        
        $bronze = Sponsor::whereId(1)->first();
        $silver = Sponsor::whereId(2)->first();
        $gold = Sponsor::whereId(3)->first();
        $apartment = Apartment::with('services')->findOrFail($id);
        // dd($apartment);
        return view('admin.pages.rightpanel', compact('apartment', 'apartments', 'bronze', 'silver', 'gold', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
