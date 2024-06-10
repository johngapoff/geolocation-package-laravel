<?php

namespace App\Http\Controllers\PlacesApi;

use App\Http\Controllers\Controller;
use App\Models\Places\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::all();
        return response()->json($states);
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        return response()->json($state);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $state = State::create($request->all());
        return response()->json(['message' => 'País criado com sucesso', 'data' => $state, $request], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $state->update($request->all());
        return response()->json(['message' => 'State updated successfully', 'state' => $state, 'request' =>  $request], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();
        return response()->json([$state,], 200);
    }

    public function getStatesByCountry($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }


}
