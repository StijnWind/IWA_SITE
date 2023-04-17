<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'station';
    protected $primaryKey = 'name';
    protected $fillable = [
        'name',
        'longitude',
        'latitude',
        'elevation',
    ];
	
	public function weerdata()
	{
		   return $this->hasMany('App\Models\WeerData', 'stn', 'name');
	}
	
	public function geolocation()
	{
		   return $this->belongsTo(Geolocation::class, 'name', 'station_name');
	}

    // public function scopeFilter($query, array $filters)
    // {
    //     if($filters['search'] ?? false) {
    //         $query->where('name', 'like', '%'.$request['search'].'%');
    //     }
    // }

}
