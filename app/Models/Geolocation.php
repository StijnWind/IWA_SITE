<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geolocation extends Model
{
    protected $table = 'geolocation';
    protected $fillable = [
        'station_name',
        'country_code',
        'island',
        'county',
        'place',
        'hamlet',
        'town',
        'municipality',
        'state_district',
        'administrative',
        'state',
        'village',
        'region',
        'province',
        'city',
        'locality',
        'postcode',
        'country'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_code', 'country_code');
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_name', 'name');
    }
}