<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\WeerData;

class WeerDataController extends Controller
{
    public function edit($id)
    {
        $weerdata = \App\Models\WeerData::findOrFail($id);
        return view('weerdata.edit', compact('weerdata'));
    }

    public function update(Request $request, $id)
    {
        $weerdata = WeerData::find($id);

        if (!$weerdata)
        {
            return response()->json(['error' => 'Invalid id.'], 404);
        }

        $weerdata->date = $request->input('date');
        $weerdata->time = $request->input('time');
        $weerdata->temp = $request->input('temp');
        $weerdata->dewp = $request->input('dewp');
        $weerdata->stp = $request->input('stp');
        $weerdata->slp = $request->input('slp');
        $weerdata->visib = $request->input('visib');
        $weerdata->wdsp = $request->input('wdsp');
        $weerdata->prcp = $request->input('prcp');
        $weerdata->sndp = $request->input('sndp');
        $weerdata->cldc = $request->input('cldc');
        $weerdata->frshtt = $request->input('frshtt');
        $weerdata->wnddir = $request->input('wnddir');
        $weerdata->uuid = $request->input('uuid');

        $weerdata->save();

        // Redirect the user back to the index page with a success message
        return redirect()->route('station.show', ['id' => $weerdata->stn])->with('success', 'De weer data is opgeslagen.');
    }
}
