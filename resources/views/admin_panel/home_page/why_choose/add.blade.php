@extends(config('layout.admin_panel_layout'))
@section('title', 'Why Choose Us')

@section(config('layout.admin_pages_content'))
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Why Choose Us</h5>
            </div>
            <div class="card-body">
                @if($whyChooseUsData->isNotEmpty())
                    <form action="{{ route('whychooseus.update') }}" method="POST" id="chooseUsForm">
                        @csrf
                        @method('PUT')
                @else
                    <form action="{{ route('whychooseus.store') }}" method="POST" id="chooseUsForm">
                        @csrf
                @endif

                <div id="chooseUsFields">
                    @forelse($whyChooseUsData as $data)
                        <div class="row mb-3 choose-us-field">
                            <input type="hidden" name="ids[]" value="{{ $data->id }}">

                            <div class="col-md-4">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title[]" value="{{ $data->title }}" required>
                            </div>

                            <div class="col-md-4">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description[]" value="{{ $data->description }}" required>
                            </div>

                            <div class="col-md-3">
                                <label for="icon">Icon</label>
                                <input type="text" class="form-control" name="icon[]" value="{{ $data->icon }}" required>
                            </div>

                            <div class="col-md-12 mt-2">
                                <button type="button" class="btn btn-danger remove-field" data-id="{{ $data->id }}">Delete</button>
                            </div>
                        </div>
                    @empty
                        <div class="row mb-3 choose-us-field">
                            <div class="col-md-4">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title[]" required>
                            </div>
                            <div class="col-md-4">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description[]" required>
                            </div>
                            <div class="col-md-3">
                                <label for="icon">Icon</label>
                                <input type="text" class="form-control" name="icon[]" required>
                            </div>
                        </div>
                    @endforelse
                </div>

                <button type="button" class="btn btn-success mt-3" id="addChooseUs">Add More</button>
                <button type="submit" class="btn btn-primary mt-3">{{ $whyChooseUsData->isNotEmpty() ? 'Update' : 'Submit' }}</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#addChooseUs').click(function() {
            let newField = `
                <div class="row mb-3 choose-us-field">
                    <div class="col-md-4">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title[]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description[]" required>
                    </div>
                    <div class="col-md-3">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" name="icon[]" required>
                    </div>
                    <div class="col-md-12 mt-2">
                        <button type="button" class="btn btn-danger remove-field">Remove</button>
                    </div>
                </div>
            `;
            $('#chooseUsFields').append(newField);
        });

        $('#chooseUsFields').on('click', '.remove-field', function() {
            let field = $(this).closest('.choose-us-field');
            let id = $(this).data('id');
            if (id) {
                $.ajax({
                    url: "{{ route('whychooseus.destroy', '') }}/" + id,
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}",
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
