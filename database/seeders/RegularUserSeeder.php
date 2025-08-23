<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegularUserSeeder extends Seeder
{
    public function run(): void
    {
        $email =  'user@example.com';

        User::query()->updateOrCreate(
            ['email' => $email],
            [
                'name' => 'sakib',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
    }
}
