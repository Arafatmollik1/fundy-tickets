@extends('layouts.app')

@section('title', 'All Donations for ' . $post->title)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-users me-2"></i>All Donations for {{ $post->title }}
                    </h4>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i>Back to Post
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if($donations->count() > 0)
                    @foreach($donations as $donation)
                        <div class="donation-card p-3 mb-3 bg-light rounded">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fw-bold text-success">${{ number_format($donation->amount, 2) }}</div>
                                    <small class="text-muted">{{ $donation->donor_name }}</small>
                                </div>
                                <small class="text-muted">{{ $donation->created_at->diffForHumans() }}</small>
                            </div>
                            @if($donation->message)
                                <div class="mt-2">
                                    <small class="text-muted">"{{ $donation->message }}"</small>
                                </div>
                            @endif
                        </div>
                    @endforeach
                    
                    <div class="d-flex justify-content-center mt-4">
                        {{ $donations->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-heart-broken fa-3x text-muted mb-3"></i>
                        <p class="text-muted mb-2">No donations yet</p>
                        <small class="text-muted">Be the first to make a donation!</small>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

