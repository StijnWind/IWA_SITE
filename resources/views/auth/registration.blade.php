<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IWA - Registratie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-500 to-cyan-500 h-screen min-h-full">

    <x-flash />
    <main class="bg-black/30 w-3/5 mx-auto text-center h-screen min-h-full">
        <div class="">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="">
                        <h3 class="card-header text-center py-12 text-xl font-bold">Werknemer aanmaken</h3>
                        <div class="card-body">
                            <form action="{{ route('register.custom') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Voornaam" id="voornaam" class="w-4/5 text-lg p-2 bg-black/20 outline-none text-white" name="voornaam"
                                        required autofocus>
                                    @if ($errors->has('voornaam'))
                                    <span class="text-danger">{{ $errors->first('voornaam') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Achternaam" id="achternaam" class="w-4/5 text-lg p-2 bg-black/20 outline-none text-white" name="achternaam"
                                        required>
                                    @if ($errors->has('achternaam'))
                                    <span class="text-danger">{{ $errors->first('achternaam') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="w-4/5 text-lg p-2 bg-black/20 outline-none text-white"
                                        name="email" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Wachtwoord" id="password" class="w-4/5 text-lg p-2 bg-black/20 outline-none text-white"
                                        name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <select id="rol" class="w-4/5 text-lg p-2 bg-black/20 outline-none text-white" name="rol" required>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Wetenschappelijk Medewerker">Wetenschappelijk medewerker</option>
                                        <option value="Administratief Medewerker">Administratief medewerker</option>
                                    </select>
                                    @if ($errors->has('rol'))
                                    <span class="text-danger">{{ $errors->first('rol') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="w-4/5 text-lg p-2 bg-black text-white hover:bg-gray-800">Sign up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>