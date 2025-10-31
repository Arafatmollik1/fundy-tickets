<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    /**
     * Show the form for creating a new donation.
     */
    public function create(Post $post)
    {
        return view('donations.create', compact('post'));
    }

    /**
     * Store a newly created donation.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'message' => 'nullable|string|max:500',
            'is_anonymous' => 'boolean',
            'donor_name' => 'nullable|string|max:255',
        ]);

        DB::transaction(function () use ($request, $post) {
            // Create the donation
            $donation = Donation::create([
                'amount' => $request->amount,
                'message' => $request->message,
                'is_anonymous' => $request->boolean('is_anonymous'),
                'donor_name' => $request->donor_name,
                'user_id' => Auth::check() ? Auth::id() : null,
                'post_id' => $post->id,
            ]);

            // Update the post's current amount
            $post->increment('current_amount', $request->amount);
        });

        return redirect()->route('posts.show', $post)
            ->with('success', 'Thank you for your donation!');
    }

    /**
     * Display the specified donation.
     */
    public function show(Donation $donation)
    {
        $this->authorize('view', $donation);

        return view('donations.show', compact('donation'));
    }

    public function index(Post $post)
    {
        $donations = $post->donations()
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('donations.index', compact('post', 'donations'));
    }
}
