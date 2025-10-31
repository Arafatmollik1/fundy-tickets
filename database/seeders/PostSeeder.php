<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        
        if ($users->isEmpty()) {
            $this->command->info('No users found. Please run UserSeeder first.');
            return;
        }

        $posts = [
            [
                'title' => 'Help Sarah Fight Cancer',
                'description' => 'Sarah is a 28-year-old mother of two who was recently diagnosed with breast cancer. She needs financial support for her treatment, chemotherapy, and to support her family during this difficult time. Every donation, no matter how small, will make a difference in her fight against cancer.',
                'target_amount' => 50000.00,
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Emergency Surgery for Max',
                'description' => 'Our beloved dog Max needs emergency surgery to remove a tumor. The veterinary costs are overwhelming, and we need help to give Max the best chance at recovery. Max is a 7-year-old Golden Retriever who has been a loyal companion to our family.',
                'target_amount' => 8000.00,
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Community Garden Project',
                'description' => 'We want to create a community garden in our neighborhood to provide fresh vegetables to local families in need. This project will include raised beds, irrigation systems, and educational programs for children and adults.',
                'target_amount' => 15000.00,
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'School Supplies for Underprivileged Kids',
                'description' => 'Help us provide school supplies, backpacks, and educational materials to children from low-income families in our community. Every child deserves access to quality education and the tools they need to succeed.',
                'target_amount' => 12000.00,
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Local Food Bank Support',
                'description' => 'Our local food bank is running low on supplies and needs immediate support to continue serving families in need. Your donations will help us purchase fresh produce, canned goods, and essential items.',
                'target_amount' => 25000.00,
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Help John Rebuild After Fire',
                'description' => 'John lost everything in a house fire last month. He needs help to rebuild his home and replace essential belongings. John is a single father who works as a teacher and has always been there to help others in the community.',
                'target_amount' => 75000.00,
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Animal Shelter Renovation',
                'description' => 'Our local animal shelter needs major renovations to provide better care for abandoned pets. The building needs new kennels, medical equipment, and improved facilities to help more animals find loving homes.',
                'target_amount' => 30000.00,
                'user_id' => $users->random()->id,
            ],
            [
                'title' => 'Youth Sports Equipment',
                'description' => 'Help us provide sports equipment and uniforms for underprivileged youth in our community. Sports help build character, teamwork, and provide a positive outlet for young people.',
                'target_amount' => 10000.00,
                'user_id' => $users->random()->id,
            ],
        ];

        foreach ($posts as $postData) {
            Post::create($postData);
        }

        $this->command->info('Created ' . count($posts) . ' sample posts.');
    }
}
