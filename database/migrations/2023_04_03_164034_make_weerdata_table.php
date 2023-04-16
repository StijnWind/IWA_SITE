<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weerdata', function (Blueprint $table) {
            $table->id();
            $table->integer('stn')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->float('temp')->nullable();
            $table->float('dewp')->nullable();
            $table->float('stp')->nullable();
            $table->float('slp')->nullable();
            $table->float('visib')->nullable();
            $table->float('wdsp')->nullable();
            $table->float('prcp')->nullable();
            $table->float('sndp')->nullable();
            $table->float('cldc')->nullable();
            $table->string('frshtt')->nullable();
            $table->integer('wnddir')->nullable();

            $table->string('uuid')->unique();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('weerdataraw', function (Blueprint $table) {
            $table->id();
            $table->integer('stn')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->float('temp')->nullable();
            $table->float('dewp')->nullable();
            $table->float('stp')->nullable();
            $table->float('slp')->nullable();
            $table->float('visib')->nullable();
            $table->float('wdsp')->nullable();
            $table->float('prcp')->nullable();
            $table->float('sndp')->nullable();
            $table->float('cldc')->nullable();
            $table->string('frshtt')->nullable();
            $table->integer('wnddir')->nullable();

            $table->string('uuid')->unique();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weerdata');
        Schema::dropIfExists('weerdataraw');
    }
};
