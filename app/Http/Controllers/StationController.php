<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;

class StationController extends Controller
{
    public function create()
    {
        return view('station.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'elevation' => 'required|numeric',
        ]);

        $existing_station = Station::where('name', $request->name)->first();
        if ($existing_station)
        {
            return redirect()->back()->withInput()->withErrors(['name' => 'Er bestaat al een station met die naam.']);
        }
    
        $station = new Station();
        $station->name = $request->name;
        $station->longitude = $request->longitude;
        $station->latitude = $request->latitude;
        $station->elevation = $request->elevation;
    
        $station->save();
    
        // Redirect to the newly created station page
        return redirect()->route('station.show', ['id' => $station->id]);
    }
}
