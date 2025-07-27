<?php

namespace Database\Seeders;

use App\Enums\GenderType;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_types = UserType::cases();
        foreach($user_types as $user){
            $created_user = User::create([
                'first_name'=>$user->label(),
                'last_name'=>"1",
                'gender'=> GenderType::MALE,
                'role'=> $user->value ,
                'email'=>strtolower($user->label()).'@gmail.com',
                'password'=> bcrypt('12345678'),
            ]);

            $created_user->assignRole($user->label());

        }
    }
}
