@extends('layouts.panel_layout')

@section('title', 'Add Home Hero Section')

@section('content')

<div class="container mt-5">
    <h2 class="text-center">Add Hero Section</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('home_hero_section.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter title" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <h5 class="mt-4">Buttons</h5>

                <div class="form-group mb-3">
                    <label for="button1_title">Button 1 Title</label>
                    <input type="text" class="form-control @error('button1_title') is-invalid @enderror" id="button1_title" name="button1_title" placeholder="Enter button 1 title" required>
                    @error('button1_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="button1_link">Button 1 Link</label>
                    <input type="url" class="form-control @error('button1_link') is-invalid @enderror" id="button1_link" name="button1_link" placeholder="Enter button 1 link" required>
                    @error('button1_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="button2_title">Button 2 Title</label>
                    <input type="text" class="form-control @error('button2_title') is-invalid @enderror" id="button2_title" name="button2_title" placeholder="Enter button 2 title" required>
                    @error('button2_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="button2_link">Button 2 Link</label>
                    <input type="url" class="form-control @error('button2_link') is-invalid @enderror" id="button2_link" name="button2_link" placeholder="Enter button 2 link" required>
                    @error('button2_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary me-2"><i class="fas fa-save"></i> Save Hero Section</button>
                    <a href="{{ route('home_hero_section.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
