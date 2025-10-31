@extends('layouts.app')

@section('title', 'Donate to ' . $post->title)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="fas fa-heart me-2"></i>Make a Donation
                </h4>
            </div>
            <div class="card-body">
                <!-- Post Summary -->
                <div class="card bg-light mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($post->description, 150) }}</p>
                        
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="text-success h5 fw-bold">${{ number_format($post->current_amount, 2) }}</div>
                                <small class="text-muted">Raised</small>
                            </div>
                            <div class="col-4">
                                <div class="text-primary h5 fw-bold">${{ number_format($post->target_amount, 2) }}</div>
                                <small class="text-muted">Goal</small>
                            </div>
                            <div class="col-4">
                                <div class="text-info h5 fw-bold">{{ number_format($post->progress_percentage, 1) }}%</div>
                                <small class="text-muted">Progress</small>
                            </div>
                        </div>
                        
                        <div class="progress mt-2" style="height: 8px;">
                            <div class="progress-bar bg-success" role="progressbar" 
                                 style="width: {{ $post->progress_percentage }}%"></div>
                        </div>
                    </div>
                </div>
                
                <form action="{{ route('donations.store', $post) }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="amount" class="form-label">Donation Amount ($) *</label>
                        <input type="number" class="form-control @error('amount') is-invalid @enderror" 
                               id="amount" name="amount" value="{{ old('amount') }}" 
                               min="1" step="0.01" required>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="message" class="form-label">Message (Optional)</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" 
                                  id="message" name="message" rows="3" 
                                  placeholder="Leave a message of support...">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_anonymous" name="is_anonymous" 
                                   value="1" {{ old('is_anonymous') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_anonymous">
                                Donate anonymously
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-3" id="donor_name_field" style="display: none;">
                        <label for="donor_name" class="form-label">Your Name</label>
                        <input type="text" class="form-control @error('donor_name') is-invalid @enderror" 
                               id="donor_name" name="donor_name" value="{{ old('donor_name') }}">
                        @error('donor_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Note:</strong> This is a demo application. No real payment processing will occur.
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Post
                        </a>
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fas fa-heart me-2"></i>Donate Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('is_anonymous').addEventListener('change', function() {
    const donorNameField = document.getElementById('donor_name_field');
    const donorNameInput = document.getElementById('donor_name');
    
    if (this.checked) {
        donorNameField.style.display = 'none';
        donorNameInput.value = '';
    } else {
        donorNameField.style.display = 'block';
    }
});
</script>
@endsection
