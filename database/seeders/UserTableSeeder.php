<?php
// php artisan db:seed --class=UserTableSeeder
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->password = Hash::make('test');
        $user->email = 'admin@iwa.nl';
        $user->voornaam = 'Stijn';
        $user->achternaam = "Wind";
        $user->rol = 'medewerker';
        $user->actief = true;


        $user->save();
    }
}