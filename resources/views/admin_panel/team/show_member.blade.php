@extends('layouts.panel_layout')

@section('title', 'Team Member Details')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h2 class="mb-0">{{ $member->name }}</h2>
                    <h5 class="mt-2">{{ $member->position }}</h5>
                </div>

                <div class="card-body p-5">
                    <!-- Display the member's image -->
                    <div class="text-center mb-4">
                        @if($member->image)
                            <img src="{{ asset( $member->image ) }}" alt="{{ $member->name }}" class="img-fluid rounded-circle shadow-lg" style="max-width: 250px; border: 4px solid #ddd;">
                        @else
                            <img src="{{ asset('default-avatar.png') }}" alt="Default Image" class="img-fluid rounded-circle shadow-lg" style="max-width: 250px; border: 4px solid #ddd;">
                        @endif
                    </div>

                    <!-- Display the member's bio -->
                    <div class="mb-4">
                        <h4 class="text-primary">Bio</h4>
                        <p class="text-muted">{{ $member->bio ? $member->bio : 'No bio available.' }}</p>
                    </div>

                    <!-- Display the member's skills -->
                    <div class="mb-4">
                        <h4 class="text-primary">Skills</h4>
                        @if($member->skills)
                            <ul class="list-unstyled text-muted">
                                @foreach(explode(',', $member->skills) as $skill)
                                    <li><i class="fas fa-check-circle text-success"></i> {{ trim($skill) }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No skills listed.</p>
                        @endif
                    </div>

                    <!-- Action buttons -->
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Back to Team Members List -->
                        <a href="{{ route('team.index') }}" class="btn btn-outline-secondary btn-lg mr-3" style="min-width: 150px;">Back to Team Members</a>

                        <!-- Edit and Delete buttons -->
                        <div class="btn-group">
                            <a href="{{ route('team.edit', $member->id) }}" class="btn btn-warning btn-lg mr-2" style="min-width: 100px;">Edit</a>
                            <form action="{{ route('team.destroy', $member->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg" style="min-width: 100px;" onclick="return confirm('Are you sure you want to delete this member?');">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
