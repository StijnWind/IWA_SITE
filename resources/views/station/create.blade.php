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
            <h3 class="text-left font-bold mt-10 mb-10">Nieuw station aanmaken</h3>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-8 rounded" role="alert">
                <ul class="mt-3 list-disc list-inside">
                    <li>{!! implode('', $errors->all('<div>:message</div>')) !!}</li>
                </ul>
            </div>
        @endif

        <div class="card-body">
            <form method="POST" action="{{ route('station.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="name">Naam:</label>
                    <input type="text" name="name" id="name" class="border rounded w-full py-2 px-3" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="longitude">Longitude:</label>
                    <input type="number" name="longitude" id="longitude" class="border rounded w-full py-2 px-3" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="latitude">Latitude:</label>
                    <input type="number" name="latitude" id="latitude" class="border rounded w-full py-2 px-3" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="elevation">Elevatie:</label>
                    <input type="number" name="elevation" id="elevation" class="border rounded w-full py-2 px-3" required>
                </div>
                <div class="text-left">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Toevoegen</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

