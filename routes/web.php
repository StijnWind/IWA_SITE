<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CustomRouteController;

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

Route::get('/stations', [CustomRouteController::class, 'stations'])->name('stations');
Route::get('/weerdata', [CustomRouteController::class, 'weerdata'])->name('weerdata');
Route::get('/klanten', [CustomRouteController::class, 'klanten'])->name('klanten');
Route::get('/team', [CustomRouteController::class, 'team'])->name('team');
Route::get('/user/{id}', [CustomRouteController::class, 'werknemer'])->name('werknemer');


