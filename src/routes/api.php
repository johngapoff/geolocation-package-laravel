<?php

use App\Http\Controllers\GeolocationsApi\CountryController;
use App\Http\Controllers\GeolocationsApi\DistrictController;
use App\Http\Controllers\GeolocationsApi\StateController;
use App\Http\Controllers\GeolocationsApi\CityController;
use Illuminate\Support\Facades\Route;

//ROUTES GEOLOCATIONS
Route::resource('paises',CountryController::class)->parameters(['paises' => 'country',]);
Route::resource('estados',StateController::class)->parameters(['estados' => 'state',]);
Route::resource('cidades',CityController::class)->parameters(['cidades' => 'city',]);
Route::resource('bairros',DistrictController::class)->parameters(['bairros' => 'district',]);
Route::get('/countries/{country}/states', [StateController::class, 'getStatesByCountry']);
Route::get('/state/{state}/cities', [DistrictController::class, 'getCitiesByState']);
//ROUTES GEOLOCATIONS

