@extends('layout')

@section('nav')

<nav class="hidden lg:flex lg:space-x-8 lg:py-2" aria-label="Global">
    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
    <a href="{{ url('dashboard') }}" class="text-gray-300 hover:bg-black/10 hover:text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium" aria-current="page">Dashboard</a>

    <a href="{{ url('stations') }}" class="text-gray-300 hover:bg-black/10 hover:text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Stations</a>

    <a href="{{ url('weerdata') }}" class="bg-black/20 text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Weerdata</a>

    <a href="{{ url('klanten') }}" class="text-gray-300 hover:bg-black/10 hover:text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Klanten</a>

    <a href="{{ url('team') }}" class="text-gray-300 hover:bg-black/10 hover:text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Team</a>
  </nav>

@endsection

@section('nav-mobile')

<div class="space-y-1 px-2 pt-2 pb-3">
    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
    <a href="{{ url('dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium" aria-current="page">Dashboard</a>

    <a href="{{ url('stations') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">Stations</a>

    <a href="{{ url('weerdata') }}" class="bg-gray-900 text-white block rounded-md py-2 px-3 text-base font-medium">Weerdata</a>

    <a href="{{ url('klanten') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">Klanten</a>

    <a href="{{ url('team') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">Team</a>
  </div>

@endsection

@section('content')

<x-flash />

<div class="px-4 sm:px-6 lg:px-8 mt-12">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-base font-semibold leading-6 text-gray-900">Weerdata</h1>
      <p class="mt-2 text-sm text-gray-700">Een lijst met alle geregistreerde weerdata.</p>
    </div>
  </div>
  <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Station_id</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Timestamp</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">TEMP</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">DEWP</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">STP</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">SLP</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">VISIB</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">WDSP</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">PRCP</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">SNDP</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">FRSHTT</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">CLDC</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">WNDDIR</th>
                {{-- <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Bekijk data</span>
                </th> --}}
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">

              @unless($count == 0)
                @foreach($items as $item)
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $item['id'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['station_id'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['timestamp'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['temp'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['dewp'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['stp'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['slp'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['visib'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['wdsp'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['prcp'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['sndp'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['frshtt'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['cldc'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['wnddir'] }}</td>
                        {{-- <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <a href="#" class="text-cyan-700 hover:text-cyan-900">Bekijk data</a>
                        </td> --}}
                    </tr>
                @endforeach
              @else
                <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">Geen data gevonden</td>
                </tr>
              @endunless

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection