<?php

namespace App\Http\Controllers\PlacesApi;

use App\Http\Controllers\Controller;
use App\Models\Places\City;
use App\Models\Places\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $districts = District::with('city.state')->get();
            return response()->json($districts);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $district = District::create($request->all());
        return response()->json(['message' => 'Bairro criado com sucesso', 'data' => $district, $request], 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        $district->update($request->all());
        return response()->json(['message' => 'State updated successfully', 'district' => $district, 'request' =>  $request], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        $district->delete();
        return response()->json([$district,], 200);
    }

    public function getCitiesByState($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }
}
