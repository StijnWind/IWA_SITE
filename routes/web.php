<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CustomRouteController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\StationController;
use App\Http\Controllers\WeerDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// STARTPAGINA
Route::get('/', function () {return redirect(url('login'));});

// INLOGGEN EN REGISTREREN
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login')->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::post('custom-edit', [CustomAuthController::class, 'customEdit'])->name('edit.custom');
Route::post('delete-user', [CustomAuthController::class, 'deleteUser'])->name('deleteuser');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout')->name('signout');

// DEFAULT ROUTING

Route::get('/weerdata', [CustomRouteController::class, 'weerdata'])->name('weerdata');
Route::get('/klanten', [CustomRouteController::class, 'klanten'])->name('klanten');
Route::get('/team', [CustomRouteController::class, 'team'])->name('team');
Route::get('/user/{id}', [CustomRouteController::class, 'werknemer'])->name('werknemer');

Route::post('/postWeatherData', function(Request $request)
{
    $json = json_decode($request->getContent());
    if($json === null)
    {
        return response()->json([
            'success' => false
        ]);
    }

    $list = $json->WEATHERDATA;

    foreach($list as $data)
    {
        //{"STN":106350,"DATE":"2023-04-03", "TIME":"13:57:30", "TEMP":0.4, "DEWP":-2.0, "STP":985.2, "SLP":987.4, "VISIB":11.5, "WDSP":21.5, "PRCP":0.17, "SNDP":15.4, "FRSHTT":"111000", "CLDC":51.8, "WNDDIR":203}
        $weerdataraw = new \App\Models\WeerDataRaw();
//      Log::info(var_dump_ret($data));
        $weerdataraw->stn = $data->STN;
        $weerdataraw->date = $data->DATE;
        $weerdataraw->time = $data->TIME;
        $weerdataraw->temp = $data->TEMP;
        $weerdataraw->dewp = $data->DEWP;
        $weerdataraw->stp = $data->STP;
        $weerdataraw->slp = $data->SLP;
        $weerdataraw->visib = $data->VISIB;
        $weerdataraw->wdsp = $data->WDSP;
        $weerdataraw->prcp = $data->PRCP;
        $weerdataraw->sndp = $data->SNDP;
        $weerdataraw->frshtt = $data->FRSHTT;
        $weerdataraw->cldc = $data->CLDC;
        $weerdataraw->wnddir = $data->WNDDIR;
    //  $weerdataraw->date = Carbon\Carbon::now();
        $weerdataraw->uuid = Str::uuid();
        $weerdataraw->save();
        //{"STN":106350,"DATE":"2023-04-03", "TIME":"13:57:30", "TEMP":0.4, "DEWP":-2.0, "STP":985.2, "SLP":987.4, "VISIB":11.5, "WDSP":21.5, "PRCP":0.17, "SNDP":15.4, "FRSHTT":"111000", "CLDC":51.8, "WNDDIR":203}
        $weerdata = new \App\Models\WeerData();
//      Log::info(var_dump_ret($data));
        function get30rec($stn)
        {
        $weerDataRecords = \App\Models\WeerDataRaw::where('stn', $stn)
            ->orderBy('created_at', 'desc')
            ->limit(30)
            ->get();
            return $weerDataRecords;
        }
        $last30Records = get30rec($data->STN);
        $extrapolatedTemperature = null;
        $count = $last30Records->count();
        if ($last30Records->count() > 1) {
            $temperatureDifference = $last30Records->first()->temp - $last30Records->skip(1)->first()->temp;
            $extrapolatedTemperature = $last30Records->first()->temp + ($temperatureDifference * ($count - 1));
        }

        $weerdata->stn = $data->STN;
        $weerdata->date = $data->DATE;
        $weerdata->time = $data->TIME;
        $weerdata->temp = $extrapolatedTemperature;
        $weerdata->dewp = $data->DEWP;
        $weerdata->stp = $data->STP;
        $weerdata->slp = $data->SLP;
        $weerdata->visib = $data->VISIB;
        $weerdata->wdsp = $data->WDSP;
        $weerdata->prcp = $data->PRCP;
        $weerdata->sndp = $data->SNDP;
        $weerdata->frshtt = $data->FRSHTT;
        $weerdata->cldc = $data->CLDC;
        $weerdata->wnddir = $data->WNDDIR;
        //  $weerdata->date = Carbon\Carbon::now();
        $weerdata->uuid = Str::uuid();
        $weerdata->save();
    }
Log::info($json);
    return response()->json([
        'success' => true
    ]);
});

Route::get('/test', function()
{
    $items = \App\Models\Station::all();
    return view('test', ["items" => $items]);
})->middleware('auth');


// stations lijst
Route::get('/stations/{page?}', [CustomRouteController::class, 'stations'])->name('stations.index');

// per station info
Route::get('/station/{id}', [CustomRouteController::class, 'station'])->name('station.show')->middleware('auth');

// aanmaken station
Route::get('/create/station', [StationController::class, 'create'])->name('station.create');
Route::post('/create/station', [StationController::class, 'store'])->name('station.store');

Route::get('/weerdata/{id}/edit', [WeerDataController::class, 'edit'])->name('weerdata.edit');
Route::put('/weerdata/{id}/edit', [WeerDataController::class, 'update'])->name('weerdata.update');
