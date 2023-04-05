<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('dashboard')->with('error', 'Je bent al ingelogd');
        }
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'Succesvol ingelogd');
        }
  
        return redirect("login")->with('error', 'Email of wachtwoord is incorrect. Probeer het opnieuw.');
    }

    public function registration()
    {
        if(Auth::check()){
            if(Auth::user()->rol == 'Administrator') {
                return view('auth.registration');
            }
            return back()->with('error', 'Je hebt geen toegang tot deze pagina');
        }
  
        return redirect("login")->with('error', 'Je hebt geen toegang tot deze pagina');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'voornaam' => 'required',
            'achternaam' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'rol' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("team")->with('success', 'Account aangemaakt');
    }

    public function customEdit(Request $request)
    {  

        $user = User::find($request['id']);
        
        $user->update([
            'voornaam' => $request['voornaam'],
            'achternaam' => $request['achternaam'],
            'email' => $request['email'],
            'rol' => $request['rol'],
            'actief' => $request['actief'],
        ]);
         
        return back()->with('success', 'Wijzigingen opgeslagen');
    }

    public function deleteUser(Request $request)
    {  

        $user = User::find($request['id']);
        $administrators = count(User::where('rol', 'Administrator')->get());

        if($administrators == 1 && $user->rol == 'Administrator') {
            return back()->with('error', 'Je kan niet de laatste administrator verwijderen');
        }
        
        $user->delete();
        return redirect('team')->with('success', 'Werknemer verwijderd');
    }

    public function create(array $data)
    {
      return User::create([
        'voornaam' => $data['voornaam'],
        'achternaam' => $data['achternaam'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'rol' => $data['rol'],
        'actief' => '1',
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            $user = Auth::user();
            $users = User::all();
            return view('dashboard', ['user'=>$user, 'onlines'=>$users]);
        }
  
        return redirect("login")->with('error', 'Je hebt geen toegang tot deze pagina');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
