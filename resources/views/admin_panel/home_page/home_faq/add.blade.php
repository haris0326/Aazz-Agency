@extends(config('layout.admin_panel_layout'))

@section('title', 'FAQ Section')

@section(config('layout.admin_pages_content'))
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"><i class="fas fa-question-circle"></i> FAQ Section</h5>
                <button type="button" class="btn btn-success" id="addFaqField"><i class="fas fa-plus-circle"></i> Add FAQ</button>
            </div>
            <div class="card-body">
                <form action="{{ $faqData->isNotEmpty() ? route('home.faq.update') : route('home.faq.store') }}" method="POST" id="faqForm">
                    @csrf
                    @if($faqData->isNotEmpty())
                        @method('PUT')
                    @endif

                    <div id="faqFields">
                        @forelse($faqData as $index => $data)
                            <div class="row mb-3 faq-field p-3 border rounded">
                                <input type="hidden" name="ids[]" value="{{ $data->id }}">
                                <div class="col-md-5">
                                    <label for="question_{{ $index }}"><i class="fas fa-question"></i> Question</label>
                                    <input type="text" class="form-control" id="question_{{ $index }}" name="question[]" value="{{ $data->question }}" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="answer_{{ $index }}"><i class="fas fa-answer"></i> Answer</label>
                                    <input type="text" class="form-control" id="answer_{{ $index }}" name="answer[]" value="{{ $data->answer }}" required>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger remove-faq-field" data-id="{{ $data->id }}"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        @empty
                            <div class="row mb-3 faq-field p-3 border rounded">
                                <div class="col-md-5">
                                    <label for="question_new"><i class="fas fa-question"></i> Question</label>
                                    <input type="text" class="form-control" id="question_new" name="question[]" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="answer_new"><i class="fas fa-answer"></i> Answer</label>
                                    <input type="text" class="form-control" id="answer_new" name="answer[]" required>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save"></i> {{ $faqData->isNotEmpty() ? 'Update' : 'Submit' }}</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#faqFields').on('click', '.remove-faq-field', function () {
                let field = $(this).closest('.faq-field');
                let id = $(this).data('id');

                if (id) {
                    if (!confirm('Are you sure you want to delete this FAQ?')) {
                        return;
                    }

                    $.ajax({
                        url: "{{ route('home.faq.destroy', '') }}/" + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            if (response.success) {
                                field.remove();  // Remove the deleted FAQ from the DOM
                                alert(response.message);
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function () {
                            alert('Error while deleting FAQ. Please try again.');
                        }
                    });

                } else {
                    field.remove();
                }
            });

            $('#addFaqField').on('click', function () {
                let index = $('.faq-field').length;
                let newField = `
                    <div class="row mb-3 faq-field p-3 border rounded">
                        <div class="col-md-5">
                            <label for="question_${index}"><i class="fas fa-question"></i> Question</label>
                            <input type="text" class="form-control" id="question_${index}" name="question[]" required>
                        </div>
                        <div class="col-md-5">
                            <label for="answer_${index}"><i class="fas fa-answer"></i> Answer</label>
                            <input type="text" class="form-control" id="answer_${index}" name="answer[]" required>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger remove-faq-field"><i class="fas fa-trash"></i> Delete</button>
                        </div>
                    </div>
                `;
                $('#faqFields').append(newField);
            });
        });
    </script>
@endsection
