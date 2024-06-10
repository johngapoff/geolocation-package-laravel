<?php

use App\Http\Controllers\PlacesApi\CountryController;
use App\Http\Controllers\PlacesApi\DistrictController;
use App\Http\Controllers\PlacesApi\StateController;
use App\Http\Controllers\PlacesApi\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('paises',CountryController::class)->parameters(['paises' => 'country',]);
Route::resource('estados',StateController::class)->parameters(['estados' => 'state',]);
Route::resource('cidades',CityController::class)->parameters(['cidades' => 'city',]);
Route::resource('bairros',DistrictController::class)->parameters(['bairros' => 'district',]);

Route::get('/countries/{country}/states', [StateController::class, 'getStatesByCountry']);
Route::get('/state/{state}/cities', [DistrictController::class, 'getCitiesByState']);
