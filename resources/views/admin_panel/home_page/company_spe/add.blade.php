@extends(config('layout.admin_panel_layout'))

@section('title', 'Company Specializing')

@section(config('layout.admin_pages_content'))
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Company Specializing</h5>
            </div>
            <div class="card-body">
                @if($specializingData->isNotEmpty())
                    <form action="{{ route('company.specializing.update') }}" method="POST" id="specializingForm">
                        @csrf
                        @method('PUT')
                @else
                    <form action="{{ route('company.specializing.store') }}" method="POST" id="specializingForm">
                        @csrf
                @endif

                <div id="specializingFields">
                    @forelse($specializingData as $data)
                        <div class="row mb-3 specializing-field">
                            <input type="hidden" name="ids[]" value="{{ $data->id }}">
                            <div class="col-md-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title[]" value="{{ $data->title }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description[]" value="{{ $data->description }}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="icon_class">Icon Class</label>
                                <input type="text" class="form-control" name="icon_class[]" value="{{ $data->icon_class }}" required>
                            </div>
                            <div class="col-md-2">
                                <label for="button_link">Button Link</label>
                                <input type="text" class="form-control" name="button_link[]" value="{{ $data->button_link }}" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <button type="button" class="btn btn-danger remove-field" data-id="{{ $data->id }}">Delete</button>
                            </div>
                        </div>
                    @empty
                        <div class="row mb-3 specializing-field">
                            <div class="col-md-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title[]" required>
                            </div>
                            <div class="col-md-4">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description[]" required>
                            </div>
                            <div class="col-md-3">
                                <label for="icon_class">Icon Class</label>
                                <input type="text" class="form-control" name="icon_class[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="button_link">Button Link</label>
                                <input type="text" class="form-control" name="button_link[]" required>
                            </div>
                        </div>
                    @endforelse
                </div>

                <button type="button" class="btn btn-success mt-3" id="addSpecializing">Add More</button>
                <button type="submit" class="btn btn-primary mt-3">{{ $specializingData->isNotEmpty() ? 'Update' : 'Submit' }}</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#addSpecializing').click(function() {
            let newField = `
                <div class="row mb-3 specializing-field">
                    <div class="col-md-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title[]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description[]" required>
                    </div>
                    <div class="col-md-3">
                        <label for="icon_class">Icon Class</label>
                        <input type="text" class="form-control" name="icon_class[]" required>
                    </div>
                    <div class="col-md-2">
                        <label for="button_link">Button Link</label>
                        <input type="text" class="form-control" name="button_link[]" required>
                    </div>
                    <div class="col-md-12 mt-2">
                        <button type="button" class="btn btn-danger remove-field">Remove</button>
                    </div>
                </div>
            `;
            $('#specializingFields').append(newField);
        });

        $('#specializingFields').on('click', '.remove-field', function() {
            let field = $(this).closest('.specializing-field');
            let id = $(this).data('id');
            if (id) {
                $.ajax({
                    url: "{{ route('company.specializing.destroy', '') }}/" + id,
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        field.remove();
                    }
                });
            } else {
                field.remove();
            }
        });
    </script>
@endsection
