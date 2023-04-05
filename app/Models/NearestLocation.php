<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NearestLocation extends Model
{
    protected $table = 'nearestlocation';

    protected $fillable = [
        'station_name',
        'name',
        'administrative_region1',
        'administrative_region2',
        'country_code',
        'longitude',
        'latitude'
    ];

    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_code', 'country_code');
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_name', 'name');
    }
}