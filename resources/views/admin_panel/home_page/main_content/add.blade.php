@extends(config('layout.admin_panel_layout'))
@section('title', 'Home Content')

@section(config('layout.admin_pages_content'))
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Home Content</h5>
            </div>
            <div class="card-body">
                @if($homeContent)
                    <form action="{{ route('homecontent.update', $homeContent->id) }}" method="POST" id="homeContentForm">
                        @csrf
                        @method('PUT')
                @else
                    <form action="{{ route('homecontent.store') }}" method="POST" id="homeContentForm">
                        @csrf
                @endif

                <div id="homeContentFields">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $homeContent->title ?? '' }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" value="{{ $homeContent->description ?? '' }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12"> <!-- Changed from col-md-6 to col-md-12 -->
                            <label for="content_2">Content 2</label>
                            <textarea class="form-control unique-content-2" id="content_2" name="content_2" required>{{ $homeContent->content_2 ?? '' }}</textarea>
                        </div>

                        <div class="col-md-12"> <!-- Changed from col-md-6 to col-md-12 -->
                            <label for="content_3">Content 3</label>
                            <textarea class="form-control unique-content-3" id="content_3" name="content_3" required>{{ $homeContent->content_3 ?? '' }}</textarea>
                        </div>
                    </div>



                </div>

                <button type="submit" class="btn btn-primary mt-3">{{ $homeContent ? 'Update' : 'Submit' }}</button>
                </form>

                @if($homeContent)
                    <!-- Delete button form with confirmation -->
                    <form action="{{ route('homecontent.destroy', $homeContent->id) }}" method="POST" style="margin-top: 20px;" onsubmit="return confirm('Are you sure you want to delete this content?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Home Content</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Apply CKEditor to Content 2 and Content 3
        CKEDITOR.replace('content_2');
        CKEDITOR.replace('content_3');
    </script>

@endsection
