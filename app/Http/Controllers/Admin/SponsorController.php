<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SponsorApartment;
use App\Models\Sponsor;
use App\Models\Apartment;
use Carbon\Carbon;
// use Braintree\Gateway;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function token($type, $apartment_id)
    {

        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);


        $token = $gateway->ClientToken()->generate();
        $subscription = Sponsor::where('name', $type)->first();
        $ap_id = $apartment_id; 
        return view('admin.pages.braintree', ['token' => $token, 'type' => $subscription, 'apartment_id' => $ap_id]);

    }


     
    public function checkout(Request $request, $price, $apartment_id)
    {

        $sponsor = Sponsor::where('price', $price)->first();
        $sponsor_id = $sponsor->id;

        if ($price == 2.99) {
            $sponsor_duration = Carbon::now()->addDays(1);
        } elseif ($price == 5.99) {
            $sponsor_duration = Carbon::now()->addDays(3);
        } else {
            $sponsor_duration = Carbon::now()->addDays(6);
        }
        $pivot = new SponsorApartment;
        $pivot->apartment_id = $apartment_id;
        $pivot->sponsor_id = $sponsor_id;
        $pivot->timestamps = false;
        $pivot->sponsor_duration = $sponsor_duration;
        $pivot->save();

        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $price;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            return redirect()->route('admin.apartments.index')->with('success', "Pagamento avvenuto con successo");
        } else {
            return back()->with('error', 'Ordine rifiutato ');
        }
    }


    public function index()
    {
        //
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
        //
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
