@extends(config('layout.admin_panel_layout'))

@section('title', 'Add Project Image')

@section(config('layout.admin_pages_content'))
<div class="container mt-5">
    <h1 class="mb-4 text-center">Add Project Image</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('project-images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Image Upload with Preview -->
                <div class="form-group mb-4">
                    <label for="file_name" class="form-label fw-bold">Upload Image <i class="bi bi-image-fill ms-1"></i></label>
                    <input type="file" name="file_name" id="file_name" class="form-control" accept="image/*" required onchange="previewImage(event)">
                    <small class="text-muted d-block mt-2">Accepted formats: jpeg, png, jpg, gif (Max: 2MB)</small>

                    <!-- Image Preview -->
                    <div class="mt-3">
                        <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid rounded d-none" style="width: 200px; height: 200px; object-fit: cover;">
                    </div>
                </div>

                <!-- Alt Text -->
                <div class="form-group mb-4">
                    <label for="alt_text" class="form-label fw-bold">Alt Text <i class="bi bi-info-circle ms-1"></i></label>
                    <input type="text" name="alt_text" id="alt_text" class="form-control" placeholder="Enter image description" required value="{{ old('alt_text') }}">
                </div>

                <!-- Caption -->
                <div class="form-group mb-4">
                    <label for="caption" class="form-label fw-bold">Caption <i class="bi bi-chat-text ms-1"></i></label>
                    <textarea name="caption" id="caption" class="form-control" placeholder="Add a caption" rows="3">{{ old('caption') }}</textarea>
                </div>

                <!-- Uploaded By -->
                <div class="form-group mb-4">
                    <label for="uploaded_by" class="form-label fw-bold">Uploaded By <i class="bi bi-person ms-1"></i></label>
                    <input type="text" name="uploaded_by" id="uploaded_by" class="form-control" placeholder="Enter your name" required value="{{ old('uploaded_by') }}">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-cloud-upload-fill me-2"></i>Upload Image
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript to Preview the Selected Image -->
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.classList.add('d-none');
        }
    }
</script>
@endsection
