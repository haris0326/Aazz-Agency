@extends(config('layout.admin_panel_layout'))
@section('title', 'Home Slider Content')

@section(config('layout.admin_pages_content'))
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Manage Home Slider Content</h5>
            </div>
            <div class="card-body">
                @if($homeSliderContent)
                <form action="{{ route('homeslidercontent.storeOrUpdate', $homeSliderContent->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- This is correct -->
                @else
                    <form action="{{ route('homeslidercontent.storeOrUpdate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $homeSliderContent->title ?? '') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" value="{{ old('description', $homeSliderContent->description ?? '') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="button_label" class="form-label">Button Label</label>
                        <input type="text" class="form-control" name="button_label" value="{{ old('button_label', $homeSliderContent->button_label ?? '') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="button_link" class="form-label">Button Link</label>
                        <input type="url" class="form-control" name="button_link" value="{{ old('button_link', $homeSliderContent->button_link ?? '') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image_urls" class="form-label">Upload Images (Max 3)</label>
                    <input type="file" class="form-control" name="image_urls[]" multiple accept="image/*" id="imageInput">
                    <small class="text-muted">You can upload up to 3 images.</small>
                </div>

                <div class="mb-3" id="imagePreviewContainer">
                    @if($homeSliderContent && $homeSliderContent->image_urls)
                        @php
                            // Check if image_urls is already an array
                            $images = is_array($homeSliderContent->image_urls) ? $homeSliderContent->image_urls : json_decode($homeSliderContent->image_urls, true);
                        @endphp

                        @if(is_array($images))
                            <h6>Existing Images:</h6>
                            @foreach($images as $image)
                                <div class="existing-image">
                                    <img src="{{ Storage::url($image) }}" style="width: 100px; margin-right: 10px;" class="img-thumbnail">
                                    <label>
                                        <input type="checkbox" name="existing_images[]" value="{{ $image }}" checked> Keep this image
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <p>No images found.</p>
                        @endif
                    @endif
                </div>

                <div class="mb-3">
                    <label for="sort_order" class="form-label">Sort Order</label>
                    <input type="number" class="form-control" name="sort_order" value="{{ old('sort_order', $homeSliderContent->sort_order ?? '') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">{{ $homeSliderContent ? 'Update' : 'Submit' }}</button>
                </form>

                @if($homeSliderContent)
                    <form action="{{ route('homeslidercontent.destroy', $homeSliderContent->id) }}" method="POST" style="margin-top: 20px;" onsubmit="return confirm('Are you sure you want to delete this content?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Slider Content</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            let imageContainer = document.getElementById('imagePreviewContainer');
            imageContainer.innerHTML = '';
            if (this.files.length > 3) {
                alert('You can only upload a maximum of 3 images.');
                this.value = "";
                return;
            }
            Array.from(this.files).forEach(file => {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.style.marginRight = '10px';
                    img.classList.add('img-thumbnail');
                    imageContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
