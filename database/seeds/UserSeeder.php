<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $useri = [
            $mihai = [
                'name'  => 'Mihai Popa',
                'email' => 'darkdev@gmail.com',
                'password'  => '$2y$10$NsPJth4HLNr/m54noPTJdOcOZTHljtEkQKRpTRAJKwAfGLre.8Zza',
                'remember_token' => '',
            ],
            $ionut = [
                'name'  => 'Ionut Vilceanu',
                'email' => 'comenzi@cofetariavilceanu.ro',
                'password'  => '$2y$10$NsPJth4HLNr/m54noPTJdOcOZTHljtEkQKRpTRAJKwAfGLre.8Zza',
                'remember_token' => '',
            ],
        ];
        foreach ($useri as $utilizator) {
            $user = User::firstOrCreate(
                [
                    'name' => $utilizator['name'],
                    'email' => $utilizator['email'],
                    'password' => $utilizator['password'],
                    'remember_token' => '',
                ]
            );
            $user->save();
        }
    }
}
