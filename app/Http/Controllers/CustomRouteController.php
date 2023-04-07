<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomRouteController extends Controller
{
    public function stations()
    {
        if(Auth::check()) {

            // return view('stations', [
            //     'items' => Station::latest()->filter
            //     (request(['search']))->get()
            // ]);

            $items = \App\Models\Station::all();
            $count = count($items);
            return view('stations', ["items" => $items, "count" => $count]);

        } else {
            return redirect(url('login'))->with('error', 'U bent niet ingelogd!');
        }
    }

    public function weerdata()
    {
        if(Auth::check()) {
            $items = \App\Models\WeerData::all();
            $count = count($items);
            return view('weerdata', ["items" => $items, "count" => $count]);
        } else {
            return redirect(url('login'))->with('error', 'U bent niet ingelogd!');
        }
    }

    public function klanten()
    {
        if(Auth::check()) {
            return view('klanten');
        } else {
            return redirect(url('login'))->with('error', 'U bent niet ingelogd!');
        }
    }

    public function team()
    {
        if(Auth::check()) {
            $users = \App\Models\User::all();
            return view('team', ["users" => $users]);
        } else {
            return redirect(url('login'))->with('error', 'U bent niet ingelogd!');
        }
    }

    public function werknemer($id)
    {
        if(Auth::check()) {
            if(Auth::user()->rol == 'Administrator' || Auth::user()->id == $id) {
                $user = \App\Models\User::find($id);
                $me = Auth::user();
                return view('user', ["user" => $user, "me" => $me]);
            } else {
                return back()->with('error', 'Je hebt geen toegang tot deze pagina');
            }
        } else {
            return redirect(url('login'))->with('error', 'U bent niet ingelogd!');
        }
    }

}
