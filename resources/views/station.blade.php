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

<x-flash />


@if (is_null($station))
<div class="px-4 sm:px-6 lg:px-8 mt-12">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-base text-center font-semibold leading-6 text-gray-900">Dit station bestaat niet!</h1>
      <p class="text-base text-center mt-2 text-sm text-gray-700"><a href="{{ route('stations.index') }}">Ga terug</a></p>
    </div>
  </div>
</div>
@else
<div class="px-4 sm:px-6 lg:px-8 mt-12">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-base font-semibold leading-6 text-gray-900">Station {{ $station->name }}</h1>
      <p class="mt-2 text-sm text-gray-700">{{ count($weerdata) }} gegevens gevonden</p>
    </div>
  </div>
  <div class="mt-8 flow-root">
    <div class="overflow-x-auto">
      <table class="table w-full">
        <thead>
          <tr>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Station</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Temperature</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dew Point</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Station Pressure</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sea Level Pressure</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Visibility</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Wind Speed</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precipitation</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Snow Depth</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cloud Cover</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Frshtt</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Wind Direction</th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">UUID</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($weerdata as $item)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              <a href="{{ route('weerdata.edit', $item['id']) }}" class="text-indigo-600 hover:text-indigo-900">Bewerken</a>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item['id'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $station['name'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item['date'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item['time'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $item['temp']!== null ? '' : 'bg-yellow-200' }}">{{ $item['temp'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $item['dewp']!== null ? '' : 'bg-yellow-200' }}">{{ $item['dewp'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $item['stp']!== null ? '' : 'bg-yellow-200' }}">{{ $item['stp'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $item['slp']!== null ? '' : 'bg-yellow-200' }}">{{ $item['slp'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $item['visib']!== null ? '' : 'bg-yellow-200' }}">{{ $item['visib'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $item['wdsp']!== null ? '' : 'bg-yellow-200' }}">{{ $item['wdsp'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $item['prcp']!== null ? '' : 'bg-yellow-200' }}">{{ $item['prcp'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $item['sndp']!== null ? '' : 'bg-yellow-200' }}">{{ $item['sndp'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $item['cldc']!== null ? '' : 'bg-yellow-200' }}">{{ $item['cldc'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $item['frshtt']!== null ? '' : 'bg-yellow-200' }}">{{ $item['frshtt'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $item['wnddir']!== null ? '' : 'bg-yellow-200' }}">{{ $item['wnddir'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 {{ $item['uuid']!== null ? '' : 'bg-yellow-200' }}">{{ $item['uuid'] }}</td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>
@endif


@endsection