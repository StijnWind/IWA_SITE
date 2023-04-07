<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CustomRouteController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

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

Route::get('/stations/{page?}', [CustomRouteController::class, 'stations'])->name('stations');
Route::get('/weerdata', [CustomRouteController::class, 'weerdata'])->name('weerdata');
Route::get('/klanten', [CustomRouteController::class, 'klanten'])->name('klanten');
Route::get('/team', [CustomRouteController::class, 'team'])->name('team');
Route::get('/user/{id}', [CustomRouteController::class, 'werknemer'])->name('werknemer');
 
function var_dump_ret($mixed = null)
{
		 ob_start();
		 var_dump($mixed);
		 $content = ob_get_contents();
		 ob_end_clean();
		 return $content;
}

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
        $weerdata = new \App\Models\WeerData();
//      Log::info(var_dump_ret($data));
        $weerdata->stn = $data->STN;
        $weerdata->date = $data->DATE;
        $weerdata->time = $data->TIME;
        $weerdata->temp = $data->TEMP;
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
//  Log::info($json);
    return response()->json([
        'success' => true
    ]);
});

Route::get('/test', function()
{
    $items = \App\Models\Station::all();
    return view('test', ["items" => $items]);
})->middleware('auth');
