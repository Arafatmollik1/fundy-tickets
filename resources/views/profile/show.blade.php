@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-user me-2"></i>My Profile
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                        <small class="text-muted">Email cannot be changed</small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-chart-line me-2"></i>Stats
                </h5>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="text-primary h4 fw-bold">{{ $posts->count() }}</div>
                    <small class="text-muted">Fundraising Posts</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-list me-2"></i>My Fundraising Posts
                </h5>
            </div>
            <div class="card-body">
                @if($posts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Goal</th>
                                    <th>Raised</th>
                                    <th>Progress</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>
                                            <a href="{{ route('posts.show', $post) }}" class="text-decoration-none">
                                                {{ $post->title }}
                                            </a>
                                        </td>
                                        <td>${{ number_format($post->target_amount, 2) }}</td>
                                        <td>${{ number_format($post->current_amount, 2) }}</td>
                                        <td>
                                            <div class="progress" style="height: 8px; width: 100px;">
                                                <div class="progress-bar bg-success" role="progressbar" 
                                                     style="width: {{ $post->progress_percentage }}%"></div>
                                            </div>
                                            <small class="text-muted">{{ number_format($post->progress_percentage, 1) }}%</small>
                                        </td>
                                        <td>{{ $post->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-folder-open fa-2x text-muted mb-3"></i>
                        <p class="text-muted mb-0">You haven't created any fundraising posts yet.</p>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-plus me-2"></i>Create Your First Post
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
