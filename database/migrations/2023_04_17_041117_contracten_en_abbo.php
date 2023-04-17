<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


//Contract maken met SQL erin of velden defineren, contracten aanmaken via admin?
/*
Info Technisch Gesprek
-------------------------------

Abonnementen hebben een selectie van stations (eigen tabel)
Contracten hebben één of meerdere queries met elk hun variabele selectie van stations op basis van
locatie/regio/land, en lijst van meetgegevens.
Condities voor contacten:
Landcode (station + geolocation)
Regio code (station + admin region 1 uit nearest location)
Coördinaten (>, <, tussen, en radius op basis van long/lat gegevens)
Elevation (station)
Welke meetwaarde
Optioneel, ordening en selectie (max, min, groter dan, kleiner dan).
Dit kan op meerdere manieren gerealiseerd worden. 1) Bij het aanmaken van het contract wordt de
lijst bepaald en opgeslagen in dezelfde tabel als de selectie voor abonnementen. Bij het
opvoeren/wijzigen of verwijderen van stations wordt voor alle contracten deze tabel bijgewerkt. 2)
Iedere keer als de data voor het contract wordt opgehaald wordt deze lijst berekend.
Op basis van de condities wordt een lijst met stations bepaald door middel van het maken van een
select statement. Vervolgens moet bij het opbouwen van het bericht rekening worden gehouden
met welke meetwaarde aangeleverd wordt en hoeveel. Dit laatste zou eventueel ook in de nog te
ontwikkelen app gedaan kunnen worden, maar op de backend heeft de voorkeur ivm bandbreedte.
Bij elk abonnement en contract hoort een token. De endpoint moet aangeroepen worden met het
token en levert vervolgens de data.
Endpoints:
IWA/abonnement/token(id?)
Returns station weather data
IWA/abonnement/token(id?)/stations
Returns station (list)
IWA/contracten/token/station/naam
Returns station + nearest location data
IWA/contracten/token/querynr
Returns query data
IWA/contracten/token/stations
Returns station (list)
IWA/contracten/token/station/naam
Returns station + nearest location data
*/

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the subscriptions table
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Pivot table for the subscription-station many-to-many relationship
        Schema::create('station_subscription', function (Blueprint $table) {
            $table->foreignId('station_id')->constrained();
            $table->foreignId('subscription_id')->constrained();
            $table->timestamps();
        });

        // Create the contracts table
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('token')->unique();
            $table->string('country_code');
            $table->string('region_code');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('radius');
            $table->integer('elevation');
            $table->string('measure');
            $table->string('order')->nullable();
            $table->integer('limit')->nullable();
            $table->timestamps();
        });

        // Add foreign keys to the contracts table
        Schema::table('contracts', function (Blueprint $table) {
            $table->foreign('country_code')->references('country_code')->on('countries');
        });

        // Add pivot table for the contract-station many-to-many relationship
        Schema::create('contract_station', function (Blueprint $table) {
            $table->foreignId('contract_id')->constrained();
            $table->foreignId('station_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_station');
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('station_subscription');
        Schema::dropIfExists('subscriptions');
    }
};
