<?php

namespace App\Models\Geolocations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'city_id'
    ];

    public function City()
    {
        return $this->belongsTo(City::class);
    }
}
