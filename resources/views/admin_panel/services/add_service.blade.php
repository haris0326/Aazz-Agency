@extends('layouts.panel_layout')

@section('title', 'Add Service')

@section('content')
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


    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="mb-0"><i class="fas fa-plus-circle"></i> Add New Service</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Main Service Details -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Service Details</h4>

                        <!-- Title Input -->
                        <div class="form-group mb-3">
                            <label for="title"><i class="fas fa-heading"></i> Service Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter Service Title" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description Input -->
                        <div class="form-group mb-3">
                            <label for="description"><i class="fas fa-align-left"></i> Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Service Description" required>{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category Select -->
                        <div class="form-group mb-3">
                            <label for="service_cat_id"><i class="fas fa-list-alt"></i> Service Category</label>
                            <select name="service_cat_id" id="service_cat_id" class="form-control @error('service_cat_id') is-invalid @enderror" required>
                                <option value="" disabled selected>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('service_cat_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->cat_title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_cat_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- Hero Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-image"></i> Hero Section</h4>

                        <div class="form-group mb-3">
                            <label for="hero_main_title">Hero Main Title</label>
                            <input type="text" name="hero_main_title" id="hero_main_title" class="form-control @error('hero_main_title') is-invalid @enderror" value="{{ old('hero_main_title') }}" placeholder="Enter Hero Main Title">
                            @error('hero_main_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Hero Description -->
                        <div class="form-group mb-3">
                            <label for="hero_main_desc">Hero Description</label>
                            <textarea name="hero_main_desc" id="hero_main_desc" rows="3" class="form-control @error('hero_main_desc') is-invalid @enderror" placeholder="Enter Hero Description">{{ old('hero_main_desc') }}</textarea>
                            @error('hero_main_desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Hero Image -->
                        <div class="form-group mb-3">
                            <label for="hero_main_image">Hero Image</label>
                            <input type="file" name="hero_main_image" id="hero_main_image" class="form-control-file @error('hero_main_image') is-invalid @enderror">
                            @error('hero_main_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Button Text -->
                        <div class="form-group mb-3">
                            <label for="hero_button_text">Button Text</label>
                            <input type="text" name="hero_button_text" id="hero_button_text" class="form-control @error('hero_button_text') is-invalid @enderror" value="{{ old('hero_button_text') }}" placeholder="Enter Button Text">
                            @error('hero_button_text')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Button Link -->
                        <div class="form-group mb-3">
                            <label for="hero_button_link">Button Link</label>
                            <input type="text" name="hero_button_link" id="hero_button_link" class="form-control @error('hero_button_link') is-invalid @enderror" value="{{ old('hero_button_link') }}" placeholder="Enter Button Link">
                            @error('hero_button_link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- Order Features Section with Dynamic Fields -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-box"></i> Order Feature</h4>
                            <div id="order-feature-fields">
                                @foreach(old('order_feature_title', ['']) as $index => $oldTitle)
                                    <div class="order-feature-item mb-3">
                                        <div class="form-group">
                                            <label for="order_feature_title_{{ $index }}">Order Feature Title</label>
                                            <input type="text" name="order_feature_title[]"
                                            class="form-control @error("order_feature_title.$index") is-invalid @enderror"
                                            placeholder="Enter Order Feature Title"
                                            value="{{ is_array($oldTitle) ? '' : htmlspecialchars($oldTitle, ENT_QUOTES) }}" required>
                                            @if($errors->has("order_feature_title.$index"))
                                                <div class="invalid-feedback d-block">
                                                    {{ $errors->first("order_feature_title.$index") }}
                                                </div>
                                            @endif
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm remove-order-feature">
                                            <i class="fas fa-minus-circle"></i> Remove
                                        </button>
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" class="btn btn-success btn-sm" id="add-order-feature">
                                <i class="fas fa-plus-circle"></i> Add Order Feature
                            </button>
                        </div>
                    </div>



                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-list"></i> Test Order</h4>
                        <div id="test-order-fields">
                            <div class="test-order-item mb-3">
                                <div class="form-group">
                                    <label for="test_title">Test Order Title</label>
                                    <input type="text" name="test_title[]" class="form-control" placeholder="Enter Test Order Title" required>
                                </div>

                                <div class="form-group">
                                    <label for="test_description">Test Order Description</label>
                                    <textarea name="test_description[]" class="form-control" placeholder="Enter Test Order Description" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="test_image">Test Order Image</label>
                                    <input type="file" name="test_image[]" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="step_1">Step 1</label>
                                    <textarea name="step_1" class="form-control" placeholder="Step 1 Details" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="step_2">Step 2</label>
                                    <textarea name="step_2" class="form-control" placeholder="Step 2 Details" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="step_3">Step 3</label>
                                    <textarea name="step_3" class="form-control" placeholder="Step 3 Details" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="step_4">Step 4</label>
                                    <textarea name="step_4" class="form-control" placeholder="Step 4 Details" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="bi bi-question-circle"></i> Why Choose Us</h4>
                        <div id="fieldsContainer">
                            @foreach(old('why_title', ['']) as $index => $oldTitle)
                                <div class="row mb-3 mt-4">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Title" name="why_title[]" value="{{ old('why_title.' . $index, $oldTitle) }}" required>
                                        @if($errors->has("why_title.$index"))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first("why_title.$index") }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Icon (e.g., fa-user)" name="icon[]" value="{{ old('icon.' . $index) }}" required>
                                        @if($errors->has("icon.$index"))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first("icon.$index") }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <textarea class="form-control" placeholder="Description" name="why_description[]" required>{{ old('why_description.' . $index) }}</textarea>
                                        @if($errors->has("why_description.$index"))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first("why_description.$index") }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-danger remove-btn" style="margin-top: 32px;">
                                            <i class="bi bi-dash-circle-fill"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" class="btn btn-primary" id="addFieldBtn">
                            <i class="bi bi-plus-circle-fill"></i> Add More
                        </button>
                    </div>
                </div>





                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="bi bi-file-earmark-text"></i> Tab Content</h4>
                        <div id="tabContentContainer">
                            @foreach(old('tab_title', ['']) as $index => $oldTitle)
                                <div class="row mb-3 mt-4 tab-content-entry">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Title" name="tab_title[]" value="{{ $oldTitle }}" required>
                                        @if($errors->has("tab_title.$index"))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first("tab_title.$index") }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <textarea class="form-control" placeholder="Description" name="tab_description[]" required>{{ old('tab_description.' . $index) }}</textarea>
                                        @if($errors->has("tab_description.$index"))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first("tab_description.$index") }}
                                            </div>
                                        @endif
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




                <!-- Content Section (New Inputs) -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-file-alt"></i> Content Section</h4>

                        <!-- Content Title -->
                        <div class="form-group mb-3">
                            <label for="content_title"><i class="fas fa-heading"></i> Content Title</label>
                            <input type="text" name="content_title" id="content_title" class="form-control @error('content_title') is-invalid @enderror" value="{{ old('content_title') }}" placeholder="Enter Content Title" required>
                            @error('content_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content Description -->
                        <div class="form-group mb-3">
                            <label for="content_description"><i class="fas fa-align-left"></i> Content Description</label>
                            <textarea name="content_description" id="content_description" rows="3" class="form-control @error('content_description') is-invalid @enderror" placeholder="Enter Content Description" required>{{ old('content_description') }}</textarea>
                            @error('content_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content 2 -->
                        <div class="form-group mb-3">
                            <label for="content_2"><i class="fas fa-align-left"></i> Content 2</label>
                            <textarea name="content_2" id="content_2" rows="3" class="form-control @error('content_2') is-invalid @enderror" placeholder="Enter Content 2" required>{{ old('content_2') }}</textarea>
                            @error('content_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content 3 -->
                        <div class="form-group mb-3">
                            <label for="content_3"><i class="fas fa-align-left"></i> Content 3</label>
                            <textarea name="content_3" id="content_3" rows="3" class="form-control @error('content_3') is-invalid @enderror" placeholder="Enter Content 3" required>{{ old('content_3') }}</textarea>
                            @error('content_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>


                            <!-- FAQ Section with Dynamic Fields -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-question-circle"></i> FAQ Section</h4>

                                    <div id="faq-fields">
                                        <div class="faq-item mb-3">
                                            <div class="form-group">
                                                <label for="faq_question">FAQ Question <span class="text-danger">*</span></label>
                                                <input type="text" name="faq_question[]" class="form-control" placeholder="Enter FAQ Question" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="faq_answer">FAQ Answer</label>
                                                <textarea name="faq_answer[]" rows="3" class="form-control" placeholder="Enter FAQ Answer"></textarea>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm remove-faq"><i class="fas fa-minus-circle"></i> Remove</button>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-success btn-sm" id="add-faq"><i class="fas fa-plus-circle"></i> Add FAQ</button>
                                </div>
                            </div>

                                <!-- SEO Meta Data Section -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="fas fa-chart-line"></i> SEO Meta Data</h4>

                                        <!-- SEO Meta Title -->
                                        <div class="form-group mb-3">
                                            <label for="seo_meta_title"><i class="fas fa-heading"></i> SEO Meta Title</label>
                                            <input type="text" name="meta_title" id="seo_meta_title" class="form-control @error('seo_meta_title') is-invalid @enderror" value="{{ old('seo_meta_title') }}" placeholder="Enter SEO Meta Title">
                                            @error('seo_meta_title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- SEO Meta Description -->
                                        <div class="form-group mb-3">
                                            <label for="seo_meta_description"><i class="fas fa-align-left"></i> SEO Meta Description</label>
                                            <textarea name="meta_description" id="seo_meta_description" rows="3" class="form-control @error('seo_meta_description') is-invalid @enderror" placeholder="Enter SEO Meta Description">{{ old('seo_meta_description') }}</textarea>
                                            @error('seo_meta_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- SEO Meta Keywords -->
                                        <div class="form-group mb-3">
                                            <label for="seo_meta_keywords"><i class="fas fa-tags"></i>Meta Slug</label>
                                            <input type="text" name="meta_slug" id="meta_slug" class="form-control @error('meta_slug') is-invalid @enderror" value="{{ old('meta_slug') }}" placeholder="Enter Meta Slug">
                                            @error('meta_slug')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Service</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>

                    document.addEventListener('DOMContentLoaded', function () {

                        function addField(containerId, fieldHTML) {
                            const container = document.getElementById(containerId);
                            const newField = document.createElement('div');
                            newField.innerHTML = fieldHTML;
                            container.appendChild(newField);
                        }

                        function setupRemoveButton(containerId) {
                                    document.getElementById(containerId).addEventListener('click', function (e) {
                                        if (e.target.classList.contains('remove-btn')) {
                                            e.target.closest('.row').remove();
                                        }
                                    });
                                }

                                document.getElementById('addFieldBtn').addEventListener('click', function () {
                                    const fieldHTML = `
                                        <div class="row mb-3 mt-4">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Title" name="why_title[]" required>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Icon (e.g., fa-user)" name="icon[]" required>
                                            </div>
                                            <div class="col">
                                                <textarea class="form-control" placeholder="Description" name="why_description[]" required></textarea>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-danger remove-btn" style="margin-top: 32px;">
                                                    <i class="bi bi-dash-circle-fill"></i> Remove
                                                </button>
                                            </div>
                                        </div>`;
                                    addField('fieldsContainer', fieldHTML);
                                });

                                setupRemoveButton('fieldsContainer');

                        function setupRemoveButton(containerId) {
                            document.getElementById(containerId).addEventListener('click', function(e) {
                                if (e.target.classList.contains('remove-btn') || e.target.classList.contains('remove-order-feature') || e.target.classList.contains('remove-faq')) {
                                    e.target.closest('.order-feature-item, .faq-item, .row').remove();
                                }
                            });
                        }

                        document.getElementById('add-order-feature').addEventListener('click', function () {
                            const fieldHTML = `
                                <div class="order-feature-item mb-3">
                                    <div class="form-group">
                                        <label for="order_feature_title[]">Order Feature Title</label>
                                        <input type="text" name="order_feature_title[]" class="form-control" placeholder="Enter Order Feature Title" required>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm remove-order-feature">
                                        <i class="fas fa-minus-circle"></i> Remove
                                    </button>
                                </div>`;
                            document.getElementById('order-feature-fields').insertAdjacentHTML('beforeend', fieldHTML);
                        });

                        // Remove button event listener setup
                        document.getElementById('order-feature-fields').addEventListener('click', function(e) {
                            if (e.target.classList.contains('remove-order-feature')) {
                                e.target.closest('.order-feature-item').remove();
                            }
                        });


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
                                    <button type="button" class="btn btn-danger btn-sm remove-faq"><i class="fas fa-minus-circle"></i> Remove</button>
                                </div>`;
                            addField('faq-fields', faqHTML);
                        });

                        document.getElementById('addTabContentBtn').addEventListener('click', function() {
                                const tabContentHTML = `
                                    <div class="row mb-3 mt-4 tab-content-entry">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Title" name="tab_title[]" required>
                                        </div>
                                        <div class="col">
                                            <textarea class="form-control" placeholder="Description" name="tab_description[]" required></textarea>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-danger remove-btn" style="margin-top: 32px;">
                                                <i class="bi bi-dash-circle-fill"></i> Remove
                                            </button>
                                        </div>
                                    </div>`;
                                addField('tabContentContainer', tabContentHTML);
                            });


                        // Set up remove button handlers
                        setupRemoveButton('order-feature-fields');
                        setupRemoveButton('faq-fields');
                        setupRemoveButton('tabContentContainer');
                        setupRemoveButton('fieldsContainer');

                        // Form Submission
                        document.getElementById('serviceForm').addEventListener('submit', function(event) {
                            let valid = true;
                            const errorMessages = [];

                            // Reset previous errors
                            document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

                            // Validate all dynamic fields
                            const inputsToValidate = [
                                { name: 'order_feature_title', container: 'order-feature-fields' },
                                { name: 'faq_question', container: 'faq-fields' },
                                { name: 'tab_title', container: 'tabContentContainer' },
                                { name: 'title', container: 'fieldsContainer' } // Assuming this container also needs validation
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
                    });

                    </script>




@endsection
