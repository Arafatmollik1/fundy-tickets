<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SuperUserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Arafat Mollik',
            'email' => 'arafathossain923@gmail.com',
            'all_fund_ids' => json_encode(['e89q', 'e21b']),
        ]);
    }
}
