<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weerdata', function (Blueprint $table) {
            $table->id();
            $table->integer('station_id');
            $table->datetime('timestamp');
            $table->float('temp');
            $table->float('dewp');
            $table->float('stp');
            $table->float('slp');
            $table->float('visib');
            $table->float('wdsp');
            $table->float('prcp');
            $table->float('sndp');
            $table->float('frshtt');
            $table->float('cldc');
            $table->float('wnddir');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
