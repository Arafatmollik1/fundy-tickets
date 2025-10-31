@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            @if($post->image)
                <img src="{{ Storage::url($post->image) }}" class="card-img-top" style="height: 400px; object-fit: cover;" alt="{{ $post->title }}">
            @endif
            
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h1 class="card-title h2">{{ $post->title }}</h1>
                    @auth
                        @if(Auth::id() === $post->user_id)
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('posts.edit', $post) }}"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this post?')">
                                                <i class="fas fa-trash me-2"></i>Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @endauth
                </div>
                
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Progress</span>
                        <span class="text-muted">{{ number_format($post->progress_percentage, 1) }}%</span>
                    </div>
                    <div class="progress mb-2" style="height: 12px;">
                        <div class="progress-bar bg-success" role="progressbar" 
                             style="width: {{ $post->progress_percentage }}%"></div>
                    </div>
                    
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="text-success h4 fw-bold">${{ number_format($post->current_amount, 2) }}</div>
                            <small class="text-muted">Raised</small>
                        </div>
                        <div class="col-4">
                            <div class="text-primary h4 fw-bold">${{ number_format($post->target_amount, 2) }}</div>
                            <small class="text-muted">Goal</small>
                        </div>
                        <div class="col-4">
                            <div class="text-info h4 fw-bold">${{ number_format($post->remaining_amount, 2) }}</div>
                            <small class="text-muted">Remaining</small>
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h5>Description</h5>
                    <p class="text-muted">{{ $post->description }}</p>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <small class="text-muted">
                            <i class="fas fa-user me-1"></i>Created by {{ $post->user->name }}
                        </small>
                        <br>
                        <small class="text-muted">
                            <i class="fas fa-clock me-1"></i>{{ $post->created_at->format('M d, Y') }}
                        </small>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-share-alt me-2"></i>Share
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#" onclick="copyToClipboard('{{ route('posts.show', $post) }}')">
                                        <i class="fas fa-copy me-2"></i>Copy Link
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="https://wa.me/?text={{ urlencode('Check out this fundraising post: ' . route('posts.show', $post)) }}" target="_blank">
                                        <i class="fab fa-whatsapp me-2"></i>WhatsApp
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('posts.show', $post)) }}" target="_blank">
                                        <i class="fab fa-facebook me-2"></i>Facebook
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="https://twitter.com/intent/tweet?text={{ urlencode('Check out this fundraising post: ' . route('posts.show', $post)) }}" target="_blank">
                                        <i class="fab fa-twitter me-2"></i>Twitter
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="mailto:?subject={{ 'Check out this fundraising post' }}&body={{ route('posts.show', $post)}}">
                                        <i class="fas fa-envelope me-2"></i>Email
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                        <a href="{{ route('donations.create', $post) }}" class="btn btn-success btn-lg">
                            <i class="fas fa-heart me-2"></i>Donate Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card shadow-sm mt-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-users me-2"></i>Recent Donations
                </h5>
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
                    
                    @if($totalDonationsCount > 3)
                        <div class="text-center">
                            <a href="{{ route('donations.index', $post) }}" class="btn btn-outline-primary btn-sm">View All Donations</a>
                        </div>
                    @endif
                @else
                    <div class="text-center py-3">
                        <i class="fas fa-heart-broken fa-2x text-muted mb-2"></i>
                        <p class="text-muted mb-0">No donations yet</p>
                        <small class="text-muted">Be the first to donate!</small>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            // Show success message
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show position-fixed';
            alert.style.top = '20px';
            alert.style.right = '20px';
            alert.style.zIndex = '1050';
            alert.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>Link copied to clipboard!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.body.appendChild(alert);
            
            // Auto dismiss after 3 seconds
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.parentNode.removeChild(alert);
                }
            }, 3000);
        }).catch(function(err) {
            console.error('Failed to copy: ', err);
            alert('Failed to copy link to clipboard');
        });
    }
</script>
@endsection
