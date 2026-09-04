@extends(config('layout.admin_panel_layout'))
@section('title', 'Admin Panel For Web Home Page Fields')

@section(config('layout.admin_pages_content'))

<div class="container mt-5">

    <!-- Error Alert for Form Submission -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>There were some errors with your submission:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <h3 class="mb-0"><i class="fas fa-plus-circle"></i> Add Home Page Content</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('home-page.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="card mb-4 custom-specializing-card">
                    <div class="card-body custom-specializing-body">
                        <h4 class="card-title custom-specializing-title"><i class="bi bi-building-check"></i> Company Specializing</h4>
                        <div id="specializing-fields">
                            @foreach ($specializings as $key => $specializing)


                            <input type="hidden" name="specializing_id[]" value="{{ $specializing->id }}">

                                <div class="specializing-item mb-3">
                                    <div class="form-group specializing-title-group">
                                        <label class="specializing-label">Specializing Title - <strong>(3 words max)</strong></label>
                                        <input type="text" name="specializing_title[]" class="form-control specializing-input-title"
                                               placeholder="Enter Feature Title" value="{{ old("specializing_title.$key", $specializing->title) }}" required>
                                        @error("specializing_title.$key")
                                            <span class="text-danger specializing-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group specializing-description-group">
                                        <label class="specializing-label">Specializing Description - <strong>(160 characters max)</strong></label>
                                        <textarea name="specializing_description[]" class="form-control specializing-input-description"
                                                  placeholder="Enter Feature Description" required>{{ old("specializing_description.$key", $specializing->description) }}</textarea>
                                        @error("specializing_description.$key")
                                            <span class="text-danger specializing-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group specializing-icon-group">
                                        <label class="specializing-label">Specializing Icon Class (e.g., fas fa-check)</label>
                                        <input type="text" name="specializing_icon_class[]" class="form-control specializing-input-icon"
                                               placeholder="Enter Icon Class" value="{{ old("specializing_icon_class.$key", $specializing->icon_class) }}" required>
                                        @error("specializing_icon_class.$key")
                                            <span class="text-danger specializing-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group specializing-button-group">
                                        <label class="specializing-label">Button Link</label>
                                        <input type="url" name="specializing_button_link[]" class="form-control specializing-input-link"
                                               placeholder="Enter Button Link" value="{{ old("specializing_button_link.$key", $specializing->button_link) }}" required>
                                        @error("specializing_button_link.$key")
                                            <span class="text-danger specializing-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="button" class="btn btn-danger specializing-remove-btn" style="margin-top: 10px;">
                                        <i class="bi bi-dash-circle-fill"></i> Remove
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" class="btn btn-primary specializing-add-btn" id="addSpecializingBtn">
                            <i class="bi bi-plus-circle-fill"></i> Add More Specializing
                        </button>
                    </div>
                </div>



                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-star"></i> Why Choose Us</h4>
                        <div id="why-choose-us-fields">
                            @foreach ($whyChooseUs as $key => $choose)
                                <div class="why-choose-us-item mb-3">
                                    <div class="form-group">
                                        <label for="title">Feature Title - <strong>(3 words max)</strong></label>
                                        <input type="text" name="why_choose_title[]" class="form-control"
                                               placeholder="Enter Feature Title"
                                               value="{{ old("why_choose_title.$key", $choose->title) }}" required>
                                        @error("why_choose_title.$key")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Feature Description - <strong>(160 characters max)</strong></label>
                                        <textarea name="why_choose_description[]" class="form-control"
                                                  placeholder="Enter Feature Description" required>{{ old("why_choose_description.$key", $choose->description) }}</textarea>
                                        @error("why_choose_description.$key")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="icon_class">Icon Class (e.g., fas fa-check)</label>
                                        <input type="text" name="why_choose_icon_class[]" class="form-control"
                                               placeholder="Enter Icon Class"
                                               value="{{ old("why_choose_icon_class.$key", $choose->icon) }}" required>
                                        @error("why_choose_icon_class.$key")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="button" class="btn btn-danger remove-btn" style="margin-top: 10px;">
                                        <i class="bi bi-dash-circle-fill"></i> Remove
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" class="btn btn-primary" id="addWhyChooseBtn">
                            <i class="bi bi-plus-circle-fill"></i> Add More Features
                        </button>
                    </div>
                </div>





                <!-- Slider Content -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5><i class="bi bi-sliders"></i> Slider Content</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="slider_title" class="form-label">
                                <i class="fas fa-heading me-2"></i>Slider Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="slider_title" id="slider_title"
                                class="form-control @error('slider_title') is-invalid @enderror"
                                placeholder="Enter title"
                                value="{{ old('slider_title', $sliderContent->title ?? '') }}" required>
                            @error('slider_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slider_description" class="form-label">
                                <i class="fas fa-align-left me-2"></i>Description
                            </label>
                            <textarea name="slider_description" id="slider_description"
                                    class="form-control @error('slider_description') is-invalid @enderror"
                                    rows="4" placeholder="Enter description">{{ old('slider_description', $sliderContent->description ?? '') }}</textarea>
                            @error('slider_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Button Inputs -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="slider_button_label" class="form-label">
                                    <i class="fas fa-tag me-2"></i>Button Label
                                </label>
                                <input type="text" name="slider_button_label" id="slider_button_label"
                                    class="form-control" placeholder="Enter Button Label"
                                    value="{{ old('slider_button_label', $sliderContent->button_label ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="slider_button_link" class="form-label">
                                    <i class="fas fa-link me-2"></i>Button Link
                                </label>
                                <input type="url" name="slider_button_link" id="slider_button_link"
                                    class="form-control" placeholder="Enter Button Link"
                                    value="{{ old('slider_button_link', $sliderContent->button_link ?? '') }}">
                            </div>
                        </div>

                        <!-- Image URLs -->
                        <div class="mb-3">
                            <label for="slider_image_urls" class="form-label">
                                <i class="fas fa-image me-2"></i>Slider Image URLs
                                <small>(Separate multiple URLs with commas)</small>
                            </label>
                            <input type="text" name="slider_image_urls" id="slider_image_urls"
                                class="form-control" placeholder="Enter Image URLs (comma-separated)"
                                value="{{ old('slider_image_urls', is_array($sliderContent->image_urls ?? '') ? implode(',', $sliderContent->image_urls) : $sliderContent->image_urls ?? '') }}">

                        </div>
                    </div>
                </div>



                <!-- Content Management -->

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5><i class="fas fa-edit"></i> Content Management</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="content_title" class="form-label"><i class="fas fa-heading"></i> Content Title</label>
                                <input type="text" class="form-control @error('content_title') is-invalid @enderror" id="content_title" name="content_title"
                                    placeholder="Enter content title" value="{{ old('content_title', $homeContent->title ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="content_description" class="form-label"><i class="fas fa-align-left"></i> Content Description</label>
                                <textarea class="form-control @error('content_description') is-invalid @enderror" id="content_description" name="content_description" rows="4"
                                        placeholder="Enter a brief description" required>{{ old('content_description', $homeContent->description ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="content_2" class="form-label"><i class="fas fa-paragraph"></i> Additional Content 1</label>
                                <textarea class="form-control @error('content_2') is-invalid @enderror" id="content_2" name="content_2" rows="3"
                                        placeholder="Enter additional content">{{ old('content_2', $homeContent->content_2 ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="content_3" class="form-label"><i class="fas fa-paragraph"></i> Additional Content 2</label>
                                <textarea class="form-control @error('content_3') is-invalid @enderror" id="content_3" name="content_3" rows="3"
                                        placeholder="Enter additional content">{{ old('content_3', $homeContent->content_3 ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>



              <!-- Tab Content Management -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="bi bi-file-earmark-text"></i> Tab Content</h4>
                        <div id="tabContentContainer">
                            @php
                                // Agar form submit ho chuka ho, toh old values le lo, warna database values
                                $tabTitles = old('tab_title', $tabs->pluck('title')->toArray() ?? ['']);
                                $tabDescriptions = old('tab_description', $tabs->pluck('description')->toArray() ?? ['']);
                            @endphp

                            @foreach($tabTitles as $index => $title)
                                <div class="row mb-3 mt-4 tab-content-entry">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Title - (2 words max)"
                                            name="tab_title[]" value="{{ $title }}" required>
                                    </div>
                                    <div class="col">
                                        <textarea class="form-control" placeholder="Description - (1500 characters max)"
                                                name="tab_description[]" required>{{ $tabDescriptions[$index] ?? '' }}</textarea>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-danger remove-btn" style="margin-top: 32px;">
                                            <i class="bi bi-dash-circle-fill"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" class="btn btn-primary" id="addTabContentBtn">
                            <i class="bi bi-plus-circle-fill"></i> Add More
                        </button>
                    </div>
                </div>



                <!-- FAQ Section -->



                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-question-circle"></i> FAQ Section</h4>

                        <div id="faq-fields">
                            @php
                                // Agar form submit ho chuka hai, toh old values le lo, warna database values
                                $faqQuestions = old('faq_question', $faqs->pluck('question')->toArray() ?? ['']);
                                $faqAnswers = old('faq_answer', $faqs->pluck('answer')->toArray() ?? ['']);
                            @endphp

                            @foreach($faqQuestions as $index => $question)
                                <div class="faq-item mb-3">
                                    <div class="form-group">
                                        <label for="faq_question">FAQ Question <span class="text-danger">*</span></label>
                                        <input type="text" name="faq_question[]" class="form-control"
                                               placeholder="Enter FAQ Question" required value="{{ $question }}">
                                        @if($errors->has("faq_question.$index"))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first("faq_question.$index") }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="faq_answer">FAQ Answer</label>
                                        <textarea name="faq_answer[]" rows="3" class="form-control"
                                                  placeholder="Enter FAQ Answer">{{ $faqAnswers[$index] ?? '' }}</textarea>
                                        @if($errors->has("faq_answer.$index"))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first("faq_answer.$index") }}
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm remove-faq">
                                        <i class="fas fa-minus-circle"></i> Remove
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" class="btn btn-success btn-sm" id="add-faq">
                            <i class="fas fa-plus-circle"></i> Add FAQ
                        </button>
                    </div>
                </div>


                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fas fa-edit"></i> SEO Meta Information
                        </h4>
                        <p class="card-text text-muted">
                            <i class="fas fa-lightbulb"></i> Provide the meta title and description for better search engine optimization.
                        </p>

                        @php
                            // Agar form submit ho chuka hai toh old values le lo, warna database values
                            $metaTitle = old('meta_title', $homeMeta->meta_title ?? '');
                            $metaDesc = old('meta_desc', $homeMeta->meta_desc ?? '');
                        @endphp

                        <!-- Meta Title Field -->
                        <div class="form-group">
                            <label for="meta_title">
                                <i class="fas fa-heading"></i> Meta Title <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                name="meta_title"
                                class="form-control"
                                placeholder="Enter Meta Title"
                                required
                                value="{{ $metaTitle }}">
                            <small class="form-text text-muted">
                                Keep the title concise and relevant, ideally under 60 characters.
                            </small>
                            @if($errors->has('meta_title'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->first('meta_title') }}
                                </div>
                            @endif
                        </div>

                        <!-- Meta Description Field -->
                        <div class="form-group">
                            <label for="meta_desc">
                                <i class="fas fa-align-left"></i> Meta Description
                            </label>
                            <textarea
                                name="meta_desc"
                                rows="4"
                                class="form-control"
                                placeholder="Enter Meta Description">{{ $metaDesc }}</textarea>
                            <small class="form-text text-muted">
                                Write a brief and compelling description, ideally under 160 characters.
                            </small>
                            @if($errors->has('meta_desc'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->first('meta_desc') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>



                </div>

                <!-- Submit Button -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success mb-5 w-25"><b>Save</b></button>
                </div>
            </form>

        </div>
    </div>

</div>

    <script>
        // Apply CKEditor to Content 2 and Content 3
        CKEDITOR.replace('content_2');
        CKEDITOR.replace('content_3');
    </script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
                    // Function to add a new "Why Choose Us" feature
                    document.getElementById('addWhyChooseBtn').addEventListener('click', function () {
                        const fieldHTML = `
                            <div class="why-choose-us-item mb-3">
                                <div class="form-group">
                                    <label for="title">Feature Title - <strong>(3 words max)</strong> </label>
                                    <input type="text" name="why_choose_title[]" class="form-control" placeholder="Enter Feature Title" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Feature Description - <strong>(160 characters max)</strong></label>
                                    <textarea name="why_choose_description[]" class="form-control" placeholder="Enter Feature Description" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="icon_class">Icon Class (e.g., fas fa-check)</label>
                                    <input type="text" name="why_choose_icon_class[]" class="form-control" placeholder="Enter Icon Class" required>
                                </div>
                                <button type="button" class="btn btn-danger remove-btn" style="margin-top: 10px;">
                                    <i class="bi bi-dash-circle-fill"></i> Remove
                                </button>
                            </div>`;
                        document.getElementById('why-choose-us-fields').insertAdjacentHTML('beforeend', fieldHTML);
                    });

                    // Event delegation for removing feature fields
                    document.getElementById('why-choose-us-fields').addEventListener('click', function (e) {
                        if (e.target.classList.contains('remove-btn')) {
                            e.target.closest('.why-choose-us-item').remove();
                        }
                    });
                });

                            // Function to add a new "Company Specializing" feature
            document.getElementById('addSpecializingBtn').addEventListener('click', function () {
                const fieldHTML = `
                    <div class="specializing-item mb-3">
                        <div class="form-group specializing-title-group">
                            <label for="title" class="specializing-label">Specializing Title - <strong>(3 words max)</strong></label>
                            <input type="text" name="specializing_title[]" class="form-control specializing-input-title" placeholder="Enter Feature Title" required>
                        </div>
                        <div class="form-group specializing-description-group">
                            <label for="description" class="specializing-label">Specializing Description - <strong>(160 characters max)</strong></label>
                            <textarea name="specializing_description[]" class="form-control specializing-input-description" placeholder="Enter Feature Description" required></textarea>
                        </div>
                        <div class="form-group specializing-icon-group">
                            <label for="icon_class" class="specializing-label">Specializing Icon Class (e.g., fas fa-check)</label>
                            <input type="text" name="specializing_icon_class[]" class="form-control specializing-input-icon" placeholder="Enter Icon Class" required>
                        </div>
                        <div class="form-group specializing-button-group">
                            <label for="button_link" class="specializing-label">Button Link</label>
                            <input type="url" name="specializing_button_link[]" class="form-control specializing-input-link" placeholder="Enter Button Link" required>
                        </div>
                        <button type="button" class="btn btn-danger specializing-remove-btn" style="margin-top: 10px;">
                            <i class="bi bi-dash-circle-fill"></i> Remove
                        </button>
                    </div>`;
                document.getElementById('specializing-fields').insertAdjacentHTML('beforeend', fieldHTML);
            });

            // Event delegation for removing feature fields
            document.getElementById('specializing-fields').addEventListener('click', function (e) {
                if (e.target.classList.contains('specializing-remove-btn') || e.target.closest('.specializing-remove-btn')) {
                    e.target.closest('.specializing-item').remove();
                }
            });



           // Helper function to add new dynamic fields
            function addField(containerId, newFieldHTML) {
                const container = document.getElementById(containerId);
                container.insertAdjacentHTML('beforeend', newFieldHTML);
            }

            // Helper function to set up remove button functionality
            function setupRemoveButton(containerId) {
                const container = document.getElementById(containerId);
                container.addEventListener('click', function(event) {
                    if (event.target.classList.contains('remove-btn')) {
                        const item = event.target.closest('.faq-item, .tab-content-entry');
                        if (item) {
                            item.remove();
                        }
                    }
                });
            }

            // Add FAQ functionality
            document.getElementById('add-faq').addEventListener('click', function () {
                const faqHTML = `
                    <div class="faq-item mb-3">
                        <div class="form-group">
                            <label for="faq_question">FAQ Question</label>
                            <input type="text" name="faq_question[]" class="form-control" placeholder="Enter FAQ Question" required>
                        </div>
                        <div class="form-group">
                            <label for="faq_answer">FAQ Answer</label>
                            <textarea name="faq_answer[]" rows="3" class="form-control" placeholder="Enter FAQ Answer" required></textarea>
                        </div>
                        <button type="button" class="btn btn-danger remove-btn"><i class="fas fa-minus-circle"></i> Remove</button>
                    </div>`;
                addField('faq-fields', faqHTML);
            });
            setupRemoveButton('faq-fields');

            // Add Tab Content functionality
            document.getElementById('addTabContentBtn').addEventListener('click', function() {
                const tabContentHTML = `
                    <div class="row mb-3 mt-4 tab-content-entry">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Title - (2 words max)" name="tab_title[]" required>
                        </div>
                        <div class="col">
                            <textarea class="form-control" placeholder="Description - (1500 characters max)" name="tab_description[]" required></textarea>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-danger remove-btn" style="margin-top: 32px;">
                                <i class="bi bi-dash-circle-fill"></i> Remove
                            </button>
                        </div>
                    </div>`;
                addField('tabContentContainer', tabContentHTML);
            });
            setupRemoveButton('tabContentContainer');

            // Form Submission validation
            document.getElementById('serviceForm').addEventListener('submit', function(event) {
                let valid = true;
                const errorMessages = [];

                // Reset previous errors
                document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

                // Validate all dynamic fields
                const inputsToValidate = [
                    { name: 'faq_question', container: 'faq-fields' },
                    { name: 'tab_title', container: 'tabContentContainer' },
                ];

                inputsToValidate.forEach(({ name, container }) => {
                    const inputs = document.querySelectorAll(`input[name^="${name}"], textarea[name^="${name}"]`);
                    inputs.forEach(input => {
                        if (!input.value) {
                            errorMessages.push(`${input.placeholder || name} is required.`);
                            valid = false;
                        }
                    });
                });

                if (!valid) {
                    event.preventDefault(); // Prevent form submission if invalid
                    alert(errorMessages.join('\n')); // Display error messages
                }
            });


</script>
@endsection
