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

<!-- Success and Error Messages -->
@if (session('status') == 'success')
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@elseif (session('status') == 'error')
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif

<!-- Success Message (For JavaScript use) -->
<div id="success-message" class="alert alert-success" style="display: none;">
    Content updated successfully!
</div>



    <!-- Home Page Content Fields -->
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <h3 class="mb-0"><i class="fas fa-plus-circle"></i> Edit Home Page Content</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('home-page.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="card mb-4 custom-specializing-card">
                    <div class="card-body custom-specializing-body">
                        <h4 class="card-title custom-specializing-title">
                            <i class="bi bi-building-check"></i> Company Specializing
                        </h4>
                        <div id="specializing-fields">
                            @foreach ($specializingItems as $index => $item)
                            <div class="specializing-item mb-3">
                                <div class="form-group specializing-title-group">
                                    <label class="specializing-label">Specializing Title - <strong>(3 words max)</strong></label>
                                    <input type="text" name="specializing_title[]" class="form-control specializing-input-title" placeholder="Enter Feature Title" value="{{ old('title.' . $index, $item->title) }}" required>
                                    @error('title.*')
                                        <span class="text-danger specializing-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group specializing-description-group">
                                    <label class="specializing-label">Specializing Description - <strong>(160 characters max)</strong></label>
                                    <textarea name="specializing_description[]" class="form-control specializing-input-description" placeholder="Enter Feature Description" required>{{ old('description.' . $index, $item->description) }}</textarea>
                                    @error('description.*')
                                        <span class="text-danger specializing-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group specializing-icon-group">
                                    <label class="specializing-label">Specializing Icon Class (e.g., fas fa-check)</label>
                                    <input type="text" name="specializing_icon_class[]" class="form-control specializing-input-icon" placeholder="Enter Icon Class" value="{{ old('icon_class.' . $index, $item->icon_class) }}" required>
                                    @error('icon_class.*')
                                        <span class="text-danger specializing-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group specializing-button-group">
                                    <label class="specializing-label">Button Link</label>
                                    <input type="url" name="specializing_button_link[]" class="form-control specializing-input-link" placeholder="Enter Button Link" value="{{ old('button_link.' . $index, $item->button_link) }}" required>
                                    @error('button_link.*')
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
                            @foreach ($whyChooseUs as $index => $item)
                            <div class="why-choose-us-item mb-3">
                                <!-- Hidden field for the ID -->
                                <input type="hidden" name="why_choose_ids[]" value="{{ $item->id }}">

                                <!-- Feature Title -->
                                <div class="form-group">
                                    <label for="title">Feature Title - <strong>(3 words max)</strong></label>
                                    <input type="text" name="why_choose_title[]" class="form-control" placeholder="Enter Feature Title"
                                        value="{{ old('why_choose_title.' . $index, $item->title) }}" required>
                                    @error('why_choose_title.' . $index)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Feature Description -->
                                <div class="form-group">
                                    <label for="description">Feature Description - <strong>(160 characters max)</strong></label>
                                    <textarea name="why_choose_description[]" class="form-control" placeholder="Enter Feature Description" required>{{ old('why_choose_description.' . $index, $item->description) }}</textarea>
                                    @error('why_choose_description.' . $index)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Icon Class -->
                                <div class="form-group">
                                    <label for="icon_class">Icon Class (e.g., fas fa-check)</label>
                                    <input type="text" name="why_choose_icon_class[]" class="form-control" placeholder="Enter Icon Class"
                                        value="{{ old('why_choose_icon_class.' . $index, $item->icon) }}" required>
                                    @error('why_choose_icon_class.' . $index)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Remove Button -->
                                <button type="button" class="btn btn-danger remove-btn" style="margin-top: 10px;">
                                    <i class="bi bi-dash-circle-fill"></i> Remove
                                </button>
                            </div>
                            @endforeach
                        </div>

                        <!-- Add More Button -->
                        <button type="button" class="btn btn-primary" id="addWhyChooseBtn">
                            <i class="bi bi-plus-circle-fill"></i> Add More Features
                        </button>
                    </div>
                </div>

                <!-- End: Why Choose Us Section -->


            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="bi bi-sliders"></i> Slider Content</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="slider_title" class="form-label">
                            <i class="fas fa-heading me-2"></i>Slider Title <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="slider_title" id="slider_title" class="form-control @error('slider_title') is-invalid @enderror"
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
                        <textarea name="slider_description" id="slider_description" class="form-control @error('slider_description') is-invalid @enderror"
                                  rows="4" placeholder="Enter description">{{ old('slider_description', $sliderContent->description ?? '') }}</textarea>
                        @error('slider_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="slider_button_label" class="form-label">
                                <i class="fas fa-tag me-2"></i>Button Label
                            </label>
                            <input type="text" name="slider_button_label" id="slider_button_label" class="form-control"
                                   placeholder="Enter Button Label"
                                   value="{{ old('slider_button_label', $sliderContent->button_label ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slider_button_link" class="form-label">
                                <i class="fas fa-link me-2"></i>Button Link
                            </label>
                            <input type="url" name="slider_button_link" id="slider_button_link" class="form-control"
                                   placeholder="Enter Button Link"
                                   value="{{ old('slider_button_link', $sliderContent->button_link ?? '') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="slider_image_urls" class="form-label">
                            <i class="fas fa-image me-2"></i>Slider Image URLs <small>(Separate multiple URLs with commas)</small>
                        </label>
                        <input type="text" name="slider_image_urls" id="slider_image_urls" class="form-control"
                            placeholder="Enter Image URLs (comma-separated)"
                            value="{{ old('slider_image_urls', implode(',', $sliderContent->image_urls ?? [])) }}">



                    </div>

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
                                    <label for="content_title" class="form-label">
                                        <i class="fas fa-heading"></i> Content Title
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control @error('content_title') is-invalid @enderror"
                                        id="content_title"
                                        name="content_title"
                                        placeholder="Enter content title"
                                        value="{{ old('content_title', $content->title ?? '') }}"
                                        required
                                    >
                                    @error('content_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="content_description" class="form-label">
                                        <i class="fas fa-align-left"></i> Content Description
                                    </label>
                                    <textarea
                                        class="form-control @error('content_description') is-invalid @enderror"
                                        id="content_description"
                                        name="content_description"
                                        rows="4"
                                        placeholder="Enter a brief description"
                                        required
                                    >{{ old('content_description', $content->description ?? '') }}</textarea>
                                    @error('content_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="content_2" class="form-label">
                                        <i class="fas fa-paragraph"></i> Additional Content 1
                                    </label>
                                    <textarea
                                        class="form-control @error('content_2') is-invalid @enderror"
                                        id="content_2"
                                        name="content_2"
                                        rows="3"
                                        placeholder="Enter additional content"
                                    >{{ old('content_2', $content->content_2 ?? '') }}</textarea>
                                    @error('content_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="content_3" class="form-label">
                                        <i class="fas fa-paragraph"></i> Additional Content 2
                                    </label>
                                    <textarea
                                        class="form-control @error('content_3') is-invalid @enderror"
                                        id="content_3"
                                        name="content_3"
                                        rows="3"
                                        placeholder="Enter additional content"
                                    >{{ old('content_3', $content->content_3 ?? '') }}</textarea>
                                    @error('content_3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="card-title"><i class="fas fa-cogs"></i> Tab Content Section</h4>

                                <div id="tab-content-fields">
                                    @foreach($tabContent as $index => $tab)
                                        <div class="tab-item mb-3" data-id="{{ $tab->id }}">
                                            <div class="form-group">
                                                <label for="tab_title_{{ $index }}">Tab Title <span class="text-danger">*</span></label>
                                                <input
                                                    type="text"
                                                    id="tab_title_{{ $index }}"
                                                    name="tab_title[]"
                                                    class="form-control"
                                                    placeholder="Enter Tab Title"
                                                    required
                                                    value="{{ $tab->title }}"
                                                >
                                            </div>
                                            <div class="form-group">
                                                <label for="tab_description_{{ $index }}">Tab Description</label>
                                                <textarea
                                                    id="tab_description_{{ $index }}"
                                                    name="tab_description[]"
                                                    rows="3"
                                                    class="form-control"
                                                    placeholder="Enter Tab Description"
                                                    required
                                                >{{ $tab->description }}</textarea>
                                            </div>
                                            <input type="hidden" name="tab_ids[]" value="{{ $tab->id }}">
                                            <button type="button" class="btn btn-danger btn-sm remove-tab">
                                                <i class="fas fa-minus-circle"></i> Remove
                                            </button>
                                        </div>
                                    @endforeach
                                </div>

                                <input type="hidden" name="tab_ids[]" value=""> <!-- Set value to empty string instead of "null" -->

                                <button type="button" class="btn btn-success btn-sm" id="add-tab-content">
                                    <i class="fas fa-plus-circle"></i> Add Tab Content
                                </button>
                            </div>
                        </div>





              <!-- FAQ Section -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-question-circle"></i> FAQ Section</h4>

                    <div id="faq-fields">
                        @php
                            // Retrieve old input values on validation failure or default to existing data
                            $faqQuestions = old('faq_question', $faqContent->pluck('question')->toArray() ?? ['']);
                            $faqAnswers = old('faq_answer', $faqContent->pluck('answer')->toArray() ?? ['']);
                        @endphp

                        @foreach($faqQuestions as $index => $question)
                        <div class="faq-item mb-3">
                            <div class="form-group">
                                <label for="faq_question">FAQ Question <span class="text-danger">*</span></label>
                                <input
                                    type="text"
                                    name="faq_question[]"
                                    class="form-control @error("faq_question.$index") is-invalid @enderror"
                                    placeholder="Enter FAQ Question"
                                    required
                                    value="{{ $question }}"
                                >
                                @error("faq_question.$index")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="faq_answer">FAQ Answer</label>
                                <textarea
                                    name="faq_answer[]"
                                    rows="3"
                                    class="form-control @error("faq_answer.$index") is-invalid @enderror"
                                    placeholder="Enter FAQ Answer"
                                >{{ $faqAnswers[$index] ?? '' }}</textarea>
                                @error("faq_answer.$index")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Hidden input for FAQ ID (Only for existing FAQs) -->
                            <input type="hidden" name="faq_ids[]" value="{{ $faqContent[$index]->id }}">

                            <button type="button" class="btn btn-danger btn-sm remove-faq"><i class="fas fa-minus-circle"></i> Remove</button>
                        </div>
                        @endforeach

                    </div>

                    <button type="button" class="btn btn-success btn-sm" id="add-faq"><i class="fas fa-plus-circle"></i> Add FAQ</button>
                </div>
            </div>




                <!-- SEO Meta Information -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fas fa-edit"></i> SEO Meta Information
                        </h4>
                        <p class="card-text text-muted">
                            <i class="fas fa-lightbulb"></i> Provide the meta title and description for better search engine optimization.
                        </p>

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
                                value="{{ old('meta_title', $meta->meta_title ?? '') }}">
                            <small class="form-text text-muted">
                                Keep the title concise and relevant, ideally under 60 characters.
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="meta_desc">
                                <i class="fas fa-align-left"></i> Meta Description
                            </label>
                            <textarea
                                name="meta_desc"
                                rows="4"
                                class="form-control"
                                placeholder="Enter Meta Description">{{ old('meta_desc', $meta->meta_desc ?? '') }}</textarea>
                            <small class="form-text text-muted">
                                Write a brief and compelling description, ideally under 160 characters.
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success w-25 mb-3">Update Changes</button>
                </div>
            </form>

        </div>
    </div>

</div>

<script>
      document.addEventListener('DOMContentLoaded', () => {
        // Add "Why Choose Us" feature
        const addWhyChooseBtn = document.getElementById('addWhyChooseBtn');
        const whyChooseFields = document.getElementById('why-choose-us-fields');

    addWhyChooseBtn.addEventListener('click', () => {
        const newFeatureHTML = `
            <div class="why-choose-us-item mb-3">
                <input type="hidden" name="why_choose_ids[]" value="">
                <div class="form-group">
                    <label>Feature Title - <strong>(3 words max)</strong></label>
                    <input type="text" name="why_choose_title[]" class="form-control" placeholder="Enter Feature Title" required>
                </div>
                <div class="form-group">
                    <label>Feature Description - <strong>(160 characters max)</strong></label>
                    <textarea name="why_choose_description[]" class="form-control" placeholder="Enter Feature Description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Icon Class (e.g., fas fa-check)</label>
                    <input type="text" name="why_choose_icon_class[]" class="form-control" placeholder="Enter Icon Class" required>
                </div>
                <button type="button" class="btn btn-danger remove-btn">
                    <i class="bi bi-dash-circle-fill"></i> Remove
                </button>
            </div>`;
        whyChooseFields.insertAdjacentHTML('beforeend', newFeatureHTML);
    });

    // Remove "Why Choose Us" feature
    whyChooseFields.addEventListener('click', (e) => {
        if (e.target.closest('.remove-btn')) {
            e.target.closest('.why-choose-us-item').remove();
        }
    });

        document.getElementById('addSpecializingBtn').addEventListener('click', function () {
        const fieldHTML = `
            <div class="specializing-item mb-3">
                <div class="form-group specializing-title-group">
                    <label class="specializing-label">Specializing Title - <strong>(3 words max)</strong></label>
                    <input type="text" name="specializing_title[]" class="form-control specializing-input-title" placeholder="Enter Feature Title" required>
                </div>
                <div class="form-group specializing-description-group">
                    <label class="specializing-label">Specializing Description - <strong>(160 characters max)</strong></label>
                    <textarea name="specializing_description[]" class="form-control specializing-input-description" placeholder="Enter Feature Description" required></textarea>
                </div>
                <div class="form-group specializing-icon-group">
                    <label class="specializing-label">Specializing Icon Class (e.g., fas fa-check)</label>
                    <input type="text" name="specializing_icon_class[]" class="form-control specializing-input-icon" placeholder="Enter Icon Class" required>
                </div>
                <div class="form-group specializing-button-group">
                    <label class="specializing-label">Button Link</label>
                    <input type="url" name="specializing_button_link[]" class="form-control specializing-input-link" placeholder="Enter Button Link" required>
                </div>
                <button type="button" class="btn btn-danger specializing-remove-btn" style="margin-top: 10px;">
                    <i class="bi bi-dash-circle-fill"></i> Remove
                </button>
            </div>`;
        document.getElementById('specializing-fields').insertAdjacentHTML('beforeend', fieldHTML);
    });

    document.getElementById('specializing-fields').addEventListener('click', function (e) {
        if (e.target.classList.contains('specializing-remove-btn') || e.target.closest('.specializing-remove-btn')) {
            e.target.closest('.specializing-item').remove();
        }
    });



    // Add FAQ
    const addFaqBtn = document.getElementById('add-faq');
    const faqFields = document.getElementById('faq-fields');

    addFaqBtn.addEventListener('click', () => {
        const newFaqHTML = `
            <div class="faq-item mb-3">
                <div class="form-group">
                    <label>FAQ Question <span class="text-danger">*</span></label>
                    <input type="text" name="faq_question[]" class="form-control" placeholder="Enter FAQ Question" required>
                </div>
                <div class="form-group">
                    <label>FAQ Answer</label>
                    <textarea name="faq_answer[]" class="form-control" rows="3" placeholder="Enter FAQ Answer" required></textarea>
                </div>
                <button type="button" class="btn btn-danger remove-faq">
                    <i class="fas fa-minus-circle"></i> Remove
                </button>
            </div>`;
        faqFields.insertAdjacentHTML('beforeend', newFaqHTML);
    });

    // Remove FAQ
    faqFields.addEventListener('click', (e) => {
        if (e.target.closest('.remove-faq')) {
            e.target.closest('.faq-item').remove();
        }
    });


    const addTabBtn = document.getElementById('add-tab-content');
        const tabContentFields = document.getElementById('tab-content-fields');

        let tabIndex = Math.max(...Array.from(document.querySelectorAll('.tab-item input[id^="tab_title_"]'))
            .map(input => parseInt(input.id.replace('tab_title_', '')))) + 1 || 0;

            addTabBtn.addEventListener('click', () => {
            tabIndex++;
            const newTabHTML = `
                <div class="tab-item mb-3">
                    <input type="hidden" name="tab_ids[]" value=""> <!-- Empty string for new tab IDs -->
                    <div class="form-group">
                        <label for="tab_title_${tabIndex}">Tab Title <span class="text-danger">*</span></label>
                        <input type="text" id="tab_title_${tabIndex}" name="tab_title[]" class="form-control" placeholder="Enter Tab Title" required>
                    </div>
                    <div class="form-group">
                        <label for="tab_description_${tabIndex}">Tab Description</label>
                        <textarea id="tab_description_${tabIndex}" name="tab_description[]" class="form-control" rows="3" placeholder="Enter Tab Description" required></textarea>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-tab">
                        <i class="fas fa-minus-circle"></i> Remove
                    </button>
                </div>`;

            tabContentFields.insertAdjacentHTML('beforeend', newTabHTML);
        });


        // Use document instead of tabContentFields for dynamically added elements
        document.addEventListener('click', (e) => {
            if (e.target.closest('.remove-tab')) {
                e.target.closest('.tab-item').remove();
            }
        });

});


</script>
@endsection
