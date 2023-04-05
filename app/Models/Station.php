<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'station';
    protected $fillable = [
        'id',
        'name',
        'longitude',
        'latitude',
        'elevation',
    ];

    // public function scopeFilter($query, array $filters)
    // {
    //     if($filters['search'] ?? false) {
    //         $query->where('name', 'like', '%'.$request['search'].'%');
    //     }
    // }

}
