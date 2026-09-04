@extends(config('layout.admin_panel_layout'))

@section('title', 'Project Images')

@section(config('layout.admin_pages_content'))
<div class="container mt-5">
    <h1 class="text-center mb-4">Project Images</h1>

    <!-- Display Success or Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('project-images.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Image
        </a>
    </div>

    @if($images->isEmpty())
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> No images found. Please add a new image.
        </div>
    @else
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $image->file_name) }}" alt="{{ $image->alt_text }}" class="card-img-top img-fluid" style="height: 250px; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $image->caption ?? 'No Caption' }}</h5>
                            <p class="card-text text-muted">Uploaded by: {{ $image->uploaded_by }}</p>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('project-images.edit', $image->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('project-images.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $images->links('pagination::bootstrap-4') }}
        </div>
    @endif
</div>
@endsection
