@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">
                <i class="fas fa-heart text-primary me-2"></i>Donation Posts
            </h1>
            @auth
                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create New Post
                </a>
            @endauth
        </div>

        @if($posts->count() > 0)
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 card-hover shadow-sm">
                            @if($post->image)
                                <img src="{{ Storage::url($post->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $post->title }}">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                            @endif
                            
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($post->description, 100) }}</p>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <small class="text-muted">Progress</small>
                                        <small class="text-muted">{{ number_format($post->progress_percentage, 1) }}%</small>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-success" role="progressbar" 
                                             style="width: {{ $post->progress_percentage }}%"></div>
                                    </div>
                                </div>
                                
                                <div class="row text-center mb-3">
                                    <div class="col-6">
                                        <div class="text-success fw-bold">${{ number_format($post->current_amount, 2) }}</div>
                                        <small class="text-muted">Raised</small>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-primary fw-bold">${{ number_format($post->target_amount, 2) }}</div>
                                        <small class="text-muted">Goal</small>
                                    </div>
                                </div>
                                
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <small class="text-muted">
                                            <i class="fas fa-user me-1"></i>by {{ $post->user->name }}
                                        </small>
                                        <small class="text-muted">
                                            <i class="fas fa-clock me-1"></i>{{ $post->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                    
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary btn-sm flex-fill">
                                            <i class="fas fa-eye me-1"></i>View
                                        </a>
                                        <a href="{{ route('donations.create', $post) }}" class="btn btn-success btn-sm flex-fill">
                                            <i class="fas fa-heart me-1"></i>Donate
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-heart-broken fa-4x text-muted mb-3"></i>
                <h3 class="text-muted">No posts found</h3>
                <p class="text-muted">Be the first to create a donation post!</p>
                @auth
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Create First Post
                    </a>
                @endauth
            </div>
        @endif
    </div>
</div>
@endsection
