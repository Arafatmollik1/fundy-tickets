<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $users = User::all();
        
        if ($posts->isEmpty()) {
            $this->command->info('No posts found. Please run PostSeeder first.');
            return;
        }

        $donationMessages = [
            'Keep fighting! You\'ve got this!',
            'Sending love and support your way.',
            'Every little bit helps. Stay strong!',
            'You\'re in my thoughts and prayers.',
            'Wishing you all the best.',
            'Hope this helps in some small way.',
            'You\'re not alone in this fight.',
            'Sending positive vibes your way.',
            'Keep your head up!',
            'You\'re stronger than you know.',
            'This too shall pass. Stay strong!',
            'You\'re an inspiration to many.',
            'Sending healing thoughts.',
            'You\'ve got a whole community behind you.',
            'Keep pushing forward!',
        ];

        $donorNames = [
            'Anonymous Supporter',
            'Community Helper',
            'Kind Stranger',
            'Local Neighbor',
            'Concerned Citizen',
            'Good Samaritan',
            'Caring Friend',
            'Supportive Family',
        ];

        foreach ($posts as $post) {
            // Create 3-8 donations per post
            $donationCount = rand(3, 8);
            
            for ($i = 0; $i < $donationCount; $i++) {
                $isAnonymous = rand(0, 1);
                $user = $users->random();
                
                $donationData = [
                    'amount' => rand(10, 500) + (rand(0, 99) / 100), // Random amount between $10-$500
                    'message' => $donationMessages[array_rand($donationMessages)],
                    'is_anonymous' => $isAnonymous,
                    'post_id' => $post->id,
                ];

                if ($isAnonymous) {
                    $donationData['donor_name'] = $donorNames[array_rand($donorNames)];
                    $donationData['user_id'] = null;
                } else {
                    $donationData['user_id'] = $user->id;
                    $donationData['donor_name'] = $user->name;
                }

                Donation::create($donationData);
            }
        }

        // Update post current amounts
        foreach ($posts as $post) {
            $totalDonations = $post->donations()->sum('amount');
            $post->update(['current_amount' => $totalDonations]);
        }

        $this->command->info('Created sample donations for all posts.');
    }
}
