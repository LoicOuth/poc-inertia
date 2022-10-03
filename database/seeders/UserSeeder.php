<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Loïc OUTHIER',
            'email' => 'loic.outhier.work@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => true
        ]);

        User::factory(50)->create();
    }
}
