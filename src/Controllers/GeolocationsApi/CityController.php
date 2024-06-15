<?php

namespace App\Http\Controllers\GeolocationsApi;

use App\Http\Controllers\Controller;
use App\Models\Geolocations\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::with('state.country')->get();
        return response()->json($cities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $city = City::create($request->all());
        return response()->json(['message' => 'País criado com sucesso', 'data' => $city, $request], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $city->update($request->all());
        return response()->json(['message' => 'State updated successfully', 'city' => $city, 'request' =>  $request], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return response()->json([$city,], 200);
    }

    public function show($id)
    {
        $city = City::with('state.country')->find($id);

        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }
        return response()->json($city);
    }
}
