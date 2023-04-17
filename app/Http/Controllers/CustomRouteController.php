<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomRouteController extends Controller
{
	private function checkLogin()
	{
		//Zou beter zijn om gebruik te maken van auth middleware, maar goed dit werkt ook.
		if(!Auth::check())
            return redirect(url('login'))->with('error', 'U bent niet ingelogd!');
		return null;
	}

    public function stations($page = 1)
    {
		$stations_per_page = 10;
		$offsz = ($page - 1) * $stations_per_page;
		$max_pages = ceil(\App\Models\Station::count() / $stations_per_page);
        if(Auth::check()) {

            // return view('stations', [
            //     'items' => Station::latest()->filter
            //     (request(['search']))->get()
            // ]);

            $items = \App\Models\Station::with('geolocation')->skip($offsz)->take($stations_per_page)->get();
            $count = count($items);
            return view('stations', ["items" => $items, "count" => $count, "page" => $page, "stations_per_page" => $stations_per_page, "max_pages" => $max_pages]);

        } else {
            return redirect(url('login'))->with('error', 'U bent niet ingelogd!');
        }
    }

    public function station($station_id)
    {
		$ret = $this->checkLogin();
		if($ret !== null)
				return $ret;

        $station = \App\Models\Station::with('weerdata')->where('name', $station_id)->first();
        //dd($station);
        $wd = $station->weerdata;
    	return view('station', ["station" => $station, "weerdata" => $wd]);
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
