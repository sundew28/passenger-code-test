<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Add Users
         *
         */
        if (User::where('email', '=', 'admin@passenger.tech')->first() === null) {

            $newUser = User::create([
                'name' => 'Passenger',
                'email' => 'admin@passenger.tech',
                'password' => bcrypt('adminadmin'),
            ]);

        }
    }
}
