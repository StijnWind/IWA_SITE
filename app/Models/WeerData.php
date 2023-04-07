<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeerData extends Model
{
    protected $table = 'weerdata';

    protected $fillable = [
        'date',
        'time',
        'temp',
        'dewp',
        'stp',
        'slp',
        'visib',
        'wdsp',
        'prcp',
        'sndp',
        'cldc',
        'frshtt',
        'wnddir',
        'uuid',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    use HasFactory;
}
