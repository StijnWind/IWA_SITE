<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IWA - Login</title>
    <link rel="icon" href="{{ URL('images/iwa-logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="antialiased bg-gradient-to-br from-purple-500 to-cyan-500 min-h-screen h-full">
  
    <x-flash />

    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8 bg-">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
          <img class="mx-auto h-28 w-auto" src="{{ URL('images/iwa-logo.png') }}" alt="IWA Logo">
        </div>
      
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
          <div class="drop-shadow backdrop-blur-xl bg-black/30 py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="{{ route('login.custom') }}" method="POST">
              @csrf
              <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-100">E-mailadres:</label>
                <div class="mt-2">
                  <input id="email" name="email" type="email" autocomplete="email" required class="p-2 backdrop-blur-2xl bg-black/30 block w-full rounded-md border-0 py-1.5 text-gray-200 shadow-sm placeholder:text-gray-400 sm:text-sm sm:leading-6 focus:outline-none">
                </div>
                @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
              </div>
      
              <div>
                <label for="password" class="block text-sm font-medium leading-6 text-gray-100">Wachtwoord</label>
                <div class="mt-2">
                  <input id="password" name="password" type="password" autocomplete="current-password" required class="p-2 backdrop-blur-2xl bg-black/30 block w-full rounded-md border-0 py-1.5 text-gray-200 shadow-sm placeholder:text-gray-400 sm:text-sm sm:leading-6 focus:outline-none">
                </div>
                @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div>
      
              <div class="flex items-center justify-between">
                {{-- <div class="flex items-center">
                  <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                  <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div> --}}
      
                <div class="text-sm">
                  <a href="#" class="font-medium text-blue-300 hover:text-blue-500">Wachtwoord vergeten?</a>
                </div>
              </div>
      
              <div>
                <button type="submit" class="duration-100 flex w-full justify-center rounded-md bg-black/30 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-black/10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">Inloggen</button>
              </div>
            </form>
          </div>
        </div>
      </div>
</body>
</html>