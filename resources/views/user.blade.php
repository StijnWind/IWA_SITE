@extends('layout')

@section('nav')

<nav class="hidden lg:flex lg:space-x-8 lg:py-2" aria-label="Global">
    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
    <a href="{{ url('dashboard') }}" class="text-gray-300 hover:bg-black/10 hover:text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium" aria-current="page">Dashboard</a>

    <a href="{{ url('stations') }}" class="text-gray-300 hover:bg-black/10 hover:text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Stations</a>

    <a href="{{ url('weerdata') }}" class="text-gray-300 hover:bg-black/10 hover:text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Weerdata</a>

    <a href="{{ url('klanten') }}" class="text-gray-300 hover:bg-black/10 hover:text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Klanten</a>

    <a href="{{ url('team') }}" class="bg-black/20 text-white inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Team</a>
  </nav>

@endsection

@section('nav-mobile')

<div class="space-y-1 px-2 pt-2 pb-3">
    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
    <a href="{{ url('dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium" aria-current="page">Dashboard</a>

    <a href="{{ url('stations') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">Stations</a>

    <a href="{{ url('weerdata') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">Weerdata</a>

    <a href="{{ url('klanten') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">Klanten</a>

    <a href="{{ url('team') }}" class="bg-gray-900 text-white block rounded-md py-2 px-3 text-base font-medium">Team</a>
  </div>

@endsection

@section('content')

<x-flash />

<div x-data="{ open : false}" class="overflow-hidden bg-white shadow sm:rounded-lg">
  <form action="{{ route('edit.custom') }}" method="POST">
  @csrf
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $user['voornaam'] }} {{ $user['achternaam'] }}</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">Persoonlijke informatie over {{ $user['voornaam'] }}.</p>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
      <dl class="sm:divide-y sm:divide-gray-200">
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
            <dt class="text-sm font-medium text-gray-500">ID</dt>
            <input name="id" id="id" value="{{ $user['id'] }}" class="cursor-default mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 text-md outline-none" required readonly> 
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
          <dt class="text-sm font-medium text-gray-500">Voornaam</dt>
          <input name="voornaam" id="voornaam" value="{{ $user['voornaam'] }}" class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 text-md outline-none" required> 
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
          <dt class="text-sm font-medium text-gray-500">Achternaam</dt>
          <input name="achternaam" id="achternaam" value="{{ $user['achternaam'] }}" class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 text-md outline-none" required> 
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
          <dt class="text-sm font-medium text-gray-500">Email</dt>
          <input name="email" id="email" value="{{ $user['email'] }}" class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 text-md outline-none" required> 
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
          <dt class="text-sm font-medium text-gray-500">Rol</dt>
          @if($user['id'] != $me['id'])
            <select id="rol" name="rol">
              @if($user['rol'] == 'Administrator')
                <option value="Administrator" selected>Administrator</option>
                <option value="Wetenschappelijk Medewerker">Wetenschappelijk Medewerker</option>
                <option value="Administratief Medewerker">Administratief Medewerker</option>
              @elseif ($user['rol'] == 'Wetenschappelijk Medewerker')
                <option value="Administrator">Administrator</option>
                <option value="Wetenschappelijk Medewerker" selected>Wetenschappelijk Medewerker</option>
                <option value="Administratief Medewerker">Administratief Medewerker</option>
              @else 
                <option value="Administrator">Administrator</option>
                <option value="Wetenschappelijk Medewerker">Wetenschappelijk Medewerker</option>
                <option value="Administratief Medewerker" selected>Administratief Medewerker</option>
              @endif
            </select>
          @else
            <input name="rol" id="rol" value="{{ $user['rol'] }}" class="cursor-default mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 text-md outline-none" required readonly>
          @endif
        </div>
        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
          <dt class="text-sm font-medium text-gray-500">Status</dt>
          @if($user['id'] != $me['id'])
            <select id="actief" name="actief">
              @if($user['actief'] == 1)
                <option value="1" selected>Actief</option>
                <option value="0">Non-Actief</option>
              @else 
                <option value="1">Actief</option>
                <option value="0" selected>Non-Actief</option>
              @endif
            </select>
          @else
          @if($user['actief'] == 1)
            <input name="actief" id="actief" value="Actief" class="cursor-default mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 text-md outline-none" required readonly>
          @else 
            <input name="actief" id="actief" value="Non-Actief" class="cursor-default mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 text-md outline-none" required readonly>
          @endif
          @endif
        </div>

        <input type="submit" value="Opslaan" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded m-8 mr-2 cursor-pointer">
        @if($user['id'] != $me['id'])
          <a @click.on="open = true" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded m-8 cursor-pointer ml-2">Verwijderen</a>
        @endif

      </form>

      <div x-show="open" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!--
          Background backdrop, show/hide based on modal state.
      
          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
      
        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!--
              Modal panel, show/hide based on modal state.
      
              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div @click.away="open = false" class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
              <div class="sm:flex sm:items-start">
                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                  <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                  </svg>
                </div>
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Werknemer verwijderen?</h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">Weet je zeker dat je deze werknemer wil verwijderen? Alle data van deze gebruiker zal permanent verwijderd worden. Dit kan niet ongedaan gemaakt worden.</p>
                  </div>
                </div>
              </div>
              <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <form action="{{ route('deleteuser') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $user['id'] }}">
                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Ja, verwijderen</button>
                <a @click.on="open = false" class="cursor-pointer mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Nee, terug</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
            

      </dl>
    </div>
  </div>
  

@endsection