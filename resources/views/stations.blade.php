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

{{-- <form>
  <input type="text" name="search" placeholder="Zoek een station" class="outline-none w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none" />
</form> --}}

<div class="px-4 sm:px-6 lg:px-8 mt-12">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-base font-semibold leading-6 text-gray-900">Weerstations</h1>
      <p class="mt-2 text-sm text-gray-700">Een lijst met alle geregistreerde weerstations en hun betreffende informatie.</p>
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
      <button type="button" class="block rounded-md bg-cyan-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-cyan-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-700">Station toevoegen</button>
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
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Longitude</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Latitude</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Elevation</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Country</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Bekijk data</span>
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">

              @foreach($items as $item)
              <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $item['name'] }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['longitude'] }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['latitude'] }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['elevation'] }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item['geolocation']['country'] }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                  <a href="#" class="text-cyan-700 hover:text-cyan-900">Bekijk data</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>

		<div class="paginas text-center mt-8">
		    @if ($page > 1)
      <a href="{{ url('/stations/' . ($page - 1)) }}" class="float-left block w-40 rounded-md bg-slate-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-cyan-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-700">&larr; Vorige</a>
		    @endif
		    
		    Pagina {{ $page }} / {{ $max_pages }}
		    
		    @if ($count == $stations_per_page)
			
      <a href="{{ url('/stations/' . ($page + 1)) }}" class="float-right block w-40 rounded-md bg-slate-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-cyan-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-700">Volgende &rarr;</a>
		    @endif
		</div>
      </div>

    </div>
  </div>
</div>


@endsection