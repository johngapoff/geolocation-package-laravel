<?php

namespace App\Models\Geolocations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'state_id'
    ];

    public function State()
    {
        return $this->belongsTo(State::class);
    }
}
