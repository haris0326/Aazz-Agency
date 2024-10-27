@extends('layouts.panel_layout')

@section('title', 'Home Hero Section')

@section('content')

<div class="container mt-5">
    <h2 class="text-center">Hero Sections</h2>

    <!-- Display Success or Error Messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('home_hero_section.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Hero Section</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Button 1</th>
                        <th>Button 2</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($heroSections as $heroSection)
                        <tr>
                            

                            <td>{{ $heroSection->title }}</td>
                            <td>{{ Str::limit($heroSection->description, 50) }}</td>
                            <td><a href="{{ $heroSection->button1_link }}" target="_blank">{{ $heroSection->button1_title }}</a></td>
                            <td><a href="{{ $heroSection->button2_link }}" target="_blank">{{ $heroSection->button2_title }}</a></td>
                            <td>
                                <a href="{{ route('home_hero_section.edit', $heroSection->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('home_hero_section.destroy', $heroSection->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this hero section?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No hero sections found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
