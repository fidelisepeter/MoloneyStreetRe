<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Test;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Check if a user with the email 'super@email.com' already exists
        $existingUser = User::where('email', 'admin@molonystreetre.com')->first();

        if (!$existingUser) {

            $user = new User();
            $user->user_name = 'admin_molonystreetre';
            $user->first_name = 'Super John';
            $user->last_name = 'Doe';
            $user->email = 'admin@molonystreetre.com';
            $user->password = Hash::make('password');
            $user->type = 'super_admin';

            $user->phone_1 = '01011223344';
            $user->phone_2 = '03011423644';
            $user->city = 'Ikeja';
            $user->state = 'Lagos';
            $user->country = 'Nigeria';
            $user->address = '101 Magodo Street, Ikeja Lagos';
            $user->status = 'active';
            $user->save();
        }
    }
}
