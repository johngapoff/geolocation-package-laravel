<?php

namespace App\Http\Controllers\GeolocationsApi;

use App\Http\Controllers\Controller;
use App\Models\Geolocations\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

        /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return response()->json($country);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $country = Country::create($request->all());

        return response()->json(['message' => 'País criado com sucesso', 'data' => $country, $request], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $country->update($request->all());
        return response()->json(['message' => 'Country updated successfully', 'country' => $country, 'request' =>  $request], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(  Country $country)
    {
        $country->delete();
        return response()->json([$country,], 200);
    }
}
