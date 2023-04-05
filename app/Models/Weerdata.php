<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weerdata extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'weerdata';
    protected $fillable = [
        'id',
        'station_id',
        'timestamp',
        'temp',
        'dewp',
        'stp',
        'slp',
        'visib',
        'wdsp',
        'prcp',
        'sndp',
        'frshtt',
        'cldc',
        'wnddir'
    ];
}
