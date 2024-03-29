<?php

namespace Database\Seeders;

use App\Models\SuperUsers;
use Illuminate\Database\Seeder;

class SuperUserSeeder extends Seeder
{
    public function run(): void
    {
        SuperUsers::factory()->create([
            'name' => 'Arafat Mollik',
            'email' => 'arafathossain923@gmail.com',
            'all_fund_ids' => json_encode(['e89q', 'e21b']),
        ]);
    }
}
