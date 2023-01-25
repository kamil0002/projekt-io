<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'name' => 'Admin',
                'surname' => 'Admin',
                'role' => 'admin',
                'email' => 'admin@admin.pl',
                'password' => '1234',
                'pesel' => '99922244493',
                'address' => 'Grunwaldzka 127',
                'phone' => '123123123',
            ],
            [
                'name' => 'Dawid',
                'surname' => 'Kuzminski',
                'role' => 'user',
                'email' => 'dawid@email.pl',
                'password' => '1234',
                'pesel' => '99922244493',
                'address' => 'Grunwaldzka 127',
                'phone' => '533262500',
            ],
            [
                'name' => 'Jan',
                'surname' => 'Kowalski',
                'role' => 'user',
                'email' => 'jan@email.pl',
                'password' => '1234',
                'pesel' => '3334445556',
                'address' => 'Jalowa 2',
                'phone' => '663267500',
            ],
            [
                'name' => 'Kamil',
                'surname' => 'Noga',
                'role' => 'user',
                'email' => 'kamil@email.pl',
                'password' => '1234',
                'pesel' => '44455566677',
                'address' => 'Rzeszów Piłsudskiego 32/2A',
                'phone' => '997998999',
            ],
            [
                'name' => 'Urszula',
                'surname' => 'Sekret',
                'role' => 'user',
                'email' => 'ula@email.pl',
                'password' => '1234',
                'pesel' => '33333333322',
                'address' => 'Okragla 12',
                'phone' => '444555666',
            ]
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'surname' => $user['surname'],
                'role' => $user['role'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'pesel' => $user['pesel'],
                'address' => $user['address'],
                'phone' => $user['phone']
            ]);
        }
    }
}
