@extends('layout')

@section('nav')

<nav class="hidden lg:flex lg:space-x-8 lg:py-2" aria-label="Global">
    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
    <a href="{{ url('dashboard') }}" class="text-gray-300 hover:bg-black/10 hover:text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium" aria-current="page">Dashboard</a>

    <a href="{{ url('stations') }}" class="bg-black/20 text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Stations</a>

    <a href="{{ url('weerdata') }}" class="text-gray-300 hover:bg-black/10 hover:text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Weerdata</a>

    <a href="{{ url('klanten') }}" class="text-gray-300 hover:bg-black/10 hover:text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Klanten</a>

    <a href="{{ url('team') }}" class="text-gray-300 hover:bg-black/10 hover:text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Team</a>
</nav>

@endsection

@section('nav-mobile')

<div class="space-y-1 px-2 pt-2 pb-3">
    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
    <a href="{{ url('dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium" aria-current="page">Dashboard</a>

    <a href="{{ url('stations') }}" class="bg-gray-900 text-white block rounded-md py-2 px-3 text-base font-medium">Stations</a>

    <a href="{{ url('weerdata') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">Weerdata</a>

    <a href="{{ url('klanten') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">Klanten</a>

    <a href="{{ url('team') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">Team</a>
</div>

@endsection

@section('content')
<div class="container flex justify-center items-center">
    <div class="card w-1/2">
        <div class="card-header">
            <h3 class="text-left font-bold mt-10 mb-10">Weer data aanpassen</h3>
        </div>

        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-8 rounded" role="alert">
            <ul class="mt-3 list-disc list-inside">
                <li>{!! implode('', $errors->all('<div>:message</div>')) !!}</li>
            </ul>
        </div>
        @endif

        <div class="card-body">
            <form method="POST" action="{{ route('weerdata.update', ['id' => $weerdata->id]) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="date">
                        Date
                    </label>
                    <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date" name="date" value="{{ $weerdata->date }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="time">
                        Time
                    </label>
                    <input type="time" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="time" name="time" value="{{ $weerdata->time }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="temp">
                        Temperature
                    </label>
                    <input type="number" step="any" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="temp" name="temp" value="{{ $weerdata->temp }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="dewp">
                        Dew Point
                    </label>
                    <input type="number" step="any" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dewp" name="dewp" value="{{ $weerdata->dewp }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="stp">
                        Station Pressure
                    </label>
                    <input type="number" step="any" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="stp" name="stp" value="{{ $weerdata->stp }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="slp">
                        Sea Level Pressure
                    </label>
                    <input type="number" step="any" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="slp" name="slp" value="{{ $weerdata->slp }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="visib">
                        Visibility
                    </label>
                    <input type="number" step="any" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="visib" name="visib" value="{{ $weerdata->visib }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="wdsp">
                        Wind Speed
                    </label>
                    <input type="number" step="any" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="wdsp" name="wdsp" value="{{ $weerdata->wdsp }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="prcp">
                        Precipitation
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="prcp" type="number" step="any" name="prcp" value="{{ $weerdata->prcp }}">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="sndp">
                        Snow Depth
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sndp" type="number" step="any" name="sndp" value="{{ $weerdata->sndp }}">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="cldc">
                        Cloud Cover
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cldc" type="number" step="any" name="cldc" value="{{ $weerdata->cldc }}">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="frshtt">
                        Frshtt
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="frshtt" type="text" name="frshtt" value="{{ $weerdata->frshtt }}">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="wnddir">
                        Wind Direction
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="wnddir" type="number" step="any" name="wnddir" value="{{ $weerdata->wnddir }}">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="uuid">
                        UUID
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="uuid" type="text" name="uuid" value="{{ $weerdata->uuid }}">
                </div>

                <!-- Add more input fields for each column in your WeerData table -->

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Opslaan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection