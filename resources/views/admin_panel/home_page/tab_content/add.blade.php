@extends(config('layout.admin_panel_layout'))
@section('title', 'Home Tab Content')

@section(config('layout.admin_pages_content'))
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"><i class="fas fa-table"></i> Home Tab Content</h5>
                <button type="button" class="btn btn-success" id="addHomeTabContent"><i class="fas fa-plus-circle"></i> Add More</button>
            </div>
            <div class="card-body">
                <form action="{{ $homeTabContentData->isNotEmpty() ? route('home.tab.content.update') : route('home.tab.content.store') }}"
                      method="POST" id="homeTabContentForm">
                    @csrf
                    @if($homeTabContentData->isNotEmpty())
                        @method('PUT')
                    @endif

                    <div id="homeTabContentFields">
                        @forelse($homeTabContentData as $index => $data)
                            <div class="row mb-3 home-tab-content-field p-3 border rounded">
                                <input type="hidden" name="ids[]" value="{{ $data->id }}">
                                <div class="col-md-4">
                                    <label for="title_{{ $index }}"><i class="fas fa-heading"></i> Title</label>
                                    <input type="text" class="form-control" id="title_{{ $index }}" name="title[]" value="{{ $data->title }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="description_{{ $index }}"><i class="fas fa-align-left"></i> Description</label>
                                    <input type="text" class="form-control" id="description_{{ $index }}" name="description[]" value="{{ $data->description }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="order_index_{{ $index }}"><i class="fas fa-sort"></i> Order Index</label>
                                    <input type="number" class="form-control" id="order_index_{{ $index }}" name="order_index[]" value="{{ $data->order_index }}" required>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger remove-field" data-id="{{ $data->id }}"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        @empty
                            <div class="row mb-3 home-tab-content-field p-3 border rounded">
                                <div class="col-md-4">
                                    <label for="title_new"><i class="fas fa-heading"></i> Title</label>
                                    <input type="text" class="form-control" id="title_new" name="title[]" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="description_new"><i class="fas fa-align-left"></i> Description</label>
                                    <input type="text" class="form-control" id="description_new" name="description[]" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="order_index_new"><i class="fas fa-sort"></i> Order Index</label>
                                    <input type="number" class="form-control" id="order_index_new" name="order_index[]" required>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save"></i> {{ $homeTabContentData->isNotEmpty() ? 'Update' : 'Submit' }}</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#homeTabContentFields').on('click', '.remove-field', function () {
                let field = $(this).closest('.home-tab-content-field');
                let id = $(this).data('id');

                if (id) {
                    if (!confirm('Are you sure you want to delete this item?')) {
                        return;
                    }

                    $.ajax({
                    url: "{{ route('home.tab.content.destroy', '') }}/" + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.success) {
                            field.remove();  // Remove the deleted field from the DOM
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert('Error while deleting home tab content. Please try again.');
                    }
                });

                } else {
                    field.remove();
                }
            });

            $('#addHomeTabContent').on('click', function () {
                let index = $('.home-tab-content-field').length;
                let newField = `
                    <div class="row mb-3 home-tab-content-field p-3 border rounded">
                        <div class="col-md-4">
                            <label for="title_${index}"><i class="fas fa-heading"></i> Title</label>
                            <input type="text" class="form-control" id="title_${index}" name="title[]" required>
                        </div>
                        <div class="col-md-4">
                            <label for="description_${index}"><i class="fas fa-align-left"></i> Description</label>
                            <input type="text" class="form-control" id="description_${index}" name="description[]" required>
                        </div>
                        <div class="col-md-2">
                            <label for="order_index_${index}"><i class="fas fa-sort"></i> Order Index</label>
                            <input type="number" class="form-control" id="order_index_${index}" name="order_index[]" required>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-trash"></i> Delete</button>
                        </div>
                    </div>
                `;
                $('#homeTabContentFields').append(newField);
            });
        });
    </script>
@endsection
