@extends('layouts.panel_layout')

@section('title', 'Edit Service')

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
            <h3 class="mb-0"><i class="fas fa-plus-circle"></i> Edit Service</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Main Service Details -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Service Details</h4>

                        <!-- Title Input -->
                        <div class="form-group mb-3">
                            <label for="title"><i class="fas fa-heading"></i> Service Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $service->title) }}" placeholder="Enter Service Title" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description Input -->
                        <div class="form-group mb-3">
                            <label for="description"><i class="fas fa-align-left"></i> Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Service Description" required>{{ old('description', $service->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category Select -->
                        <div class="form-group mb-3">
                            <label for="service_cat_id"><i class="fas fa-list-alt"></i> Service Category</label>
                            <select name="service_cat_id" id="service_cat_id" class="form-control @error('service_cat_id') is-invalid @enderror" required>
                                <option value="" disabled>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('service_cat_id', $service->service_cat_id) == $category->id ? 'selected' : '' }}>
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
                            <input type="text" name="hero_main_title" id="hero_main_title" class="form-control @error('hero_main_title') is-invalid @enderror" value="{{ old('hero_main_title', $service->hero_main_title) }}" placeholder="Enter Hero Main Title">
                            @error('hero_main_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Hero Description -->
                        <div class="form-group mb-3">
                            <label for="hero_main_desc">Hero Description</label>
                            <textarea name="hero_main_desc" id="hero_main_desc" rows="3" class="form-control @error('hero_main_desc') is-invalid @enderror" placeholder="Enter Hero Description">{{ old('hero_main_desc', $service->hero_main_desc) }}</textarea>
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
                            @if($service->hero_main_image)
                                <img src="{{ asset('path_to_hero_images/' . $service->hero_main_image) }}" alt="Current Hero Image" class="img-thumbnail mt-2" width="150">
                            @endif
                        </div>

                        <!-- Button Text -->
                        <div class="form-group mb-3">
                            <label for="hero_button_text">Button Text</label>
                            <input type="text" name="hero_button_text" id="hero_button_text" class="form-control @error('hero_button_text') is-invalid @enderror" value="{{ old('hero_button_text', $service->hero_button_text) }}" placeholder="Enter Button Text">
                            @error('hero_button_text')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Button Link -->
                        <div class="form-group mb-3">
                            <label for="hero_button_link">Button Link</label>
                            <input type="text" name="hero_button_link" id="hero_button_link" class="form-control @error('hero_button_link') is-invalid @enderror" value="{{ old('hero_button_link', $service->hero_button_link) }}" placeholder="Enter Button Link">
                            @error('hero_button_link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-box"></i> Order Feature</h4>
                        <div id="order-feature-fields">
                            @if(!empty($service->order_features) && $service->order_features->count() > 0)
                                @foreach($service->order_features as $index => $feature)
                                    <div class="order-feature-item mb-3">
                                        <div class="form-group">
                                            <label for="order_feature_title_{{ $index }}">Order Feature Title</label>
                                            <input type="text" name="order_feature_title[{{ $index }}]" class="form-control" id="order_feature_title_{{ $index }}" value="{{ old('order_feature_title.'.$index, $feature->title) }}" placeholder="Enter Order Feature Title">
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm remove-order-feature"><i class="fas fa-minus-circle"></i> Remove</button>
                                    </div>
                                @endforeach
                            @else
                                <p>No order features found. Add a new feature below.</p>
                            @endif
                        </div>

                        <button type="button" class="btn btn-success btn-sm" id="add-order-feature"><i class="fas fa-plus-circle"></i> Add Order Feature</button>
                    </div>
                </div>


            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-list"></i> Test Order</h4>
                    <div id="test-order-fields">
                        <div class="test-order-item mb-3">
                            <!-- Test Order Title -->
                            <div class="form-group">
                                <label for="test_title">Test Order Title</label>
                                <input type="text" name="test_title[]" class="form-control @error('test_title') is-invalid @enderror" placeholder="Enter Test Order Title" value="{{ old('test_title[]') }}" required>
                                @error('test_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Test Order Description -->
                            <div class="form-group">
                                <label for="test_description">Test Order Description</label>
                                <textarea name="test_description[]" class="form-control @error('test_description') is-invalid @enderror" placeholder="Enter Test Order Description" required>{{ old('test_description[]') }}</textarea>
                                @error('test_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Test Order Image -->
                            <div class="form-group">
                                <label for="test_image">Test Order Image</label>
                                <input type="file" name="test_image[]" class="form-control @error('test_image') is-invalid @enderror">
                                @error('test_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Step 1 -->
                            <div class="form-group">
                                <label for="step_1">Step 1</label>
                                <textarea name="step_1" class="form-control @error('step_1') is-invalid @enderror" placeholder="Step 1 Details" required>{{ old('step_1') }}</textarea>
                                @error('step_1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Step 2 -->
                            <div class="form-group">
                                <label for="step_2">Step 2</label>
                                <textarea name="step_2" class="form-control @error('step_2') is-invalid @enderror" placeholder="Step 2 Details" required>{{ old('step_2') }}</textarea>
                                @error('step_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Step 3 -->
                            <div class="form-group">
                                <label for="step_3">Step 3</label>
                                <textarea name="step_3" class="form-control @error('step_3') is-invalid @enderror" placeholder="Step 3 Details" required>{{ old('step_3') }}</textarea>
                                @error('step_3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Step 4 -->
                            <div class="form-group">
                                <label for="step_4">Step 4</label>
                                <textarea name="step_4" class="form-control @error('step_4') is-invalid @enderror" placeholder="Step 4 Details" required>{{ old('step_4') }}</textarea>
                                @error('step_4')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>



                <!-- Content Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-file-alt"></i> Content Section</h4>

                        <!-- Content Title -->
                        <div class="form-group mb-3">
                            <label for="content_title"><i class="fas fa-heading"></i> Content Title</label>
                            <input type="text" name="content_title" id="content_title" class="form-control @error('content_title') is-invalid @enderror" value="{{ old('content_title', $service->content_title) }}" placeholder="Enter Content Title" required>
                            @error('content_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content Description -->
                        <div class="form-group mb-3">
                            <label for="content_description"><i class="fas fa-align-left"></i> Content Description</label>
                            <textarea name="content_description" id="content_description" rows="3" class="form-control @error('content_description') is-invalid @enderror" placeholder="Enter Content Description" required>{{ old('content_description', $service->content_description) }}</textarea>
                            @error('content_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content 2 -->
                        <div class="form-group mb-3">
                            <label for="content_2"><i class="fas fa-align-left"></i> Content 2</label>
                            <textarea name="content_2" id="content_2" rows="3" class="form-control @error('content_2') is-invalid @enderror" placeholder="Enter Content 2" required>{{ old('content_2', $service->content_2) }}</textarea>
                            @error('content_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content 3 -->
                        <div class="form-group mb-3">
                            <label for="content_3"><i class="fas fa-align-left"></i> Content 3</label>
                            <textarea name="content_3" id="content_3" rows="3" class="form-control @error('content_3') is-invalid @enderror" placeholder="Enter Content 3" required>{{ old('content_3', $service->content_3) }}</textarea>
                            @error('content_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>


                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-question-circle"></i> FAQ Section</h4>
                        <div id="faq-fields">
                            @foreach($faqs as $index => $faq)
                            <div class="faq-item mb-3">
                                <div class="form-group">
                                    <label for="faq_question_{{ $index }}">FAQ Question</label>
                                    <input type="text" name="faq_question[{{ $index }}]" class="form-control" id="faq_question_{{ $index }}" value="{{ old('faq_question.'.$index, $faq->question) }}" placeholder="Enter FAQ Question">
                                </div>
                                <div class="form-group">
                                    <label for="faq_answer_{{ $index }}">FAQ Answer</label>
                                    <textarea name="faq_answer[{{ $index }}]" rows="3" class="form-control" id="faq_answer_{{ $index }}" placeholder="Enter FAQ Answer">{{ old('faq_answer.'.$index, $faq->answer) }}</textarea>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm remove-faq"><i class="fas fa-minus-circle"></i> Remove</button>
                            </div>
                            @endforeach
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
                                    <input type="text" name="meta_title" id="seo_meta_title" class="form-control @error('seo_meta_title') is-invalid @enderror" value="{{ old('meta_title', $service->meta_title) }}" placeholder="Enter SEO Meta Title">
                                    @error('meta_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- SEO Meta Description -->
                                <div class="form-group mb-3">
                                    <label for="seo_meta_description"><i class="fas fa-align-left"></i> SEO Meta Description</label>
                                    <textarea name="meta_description" id="seo_meta_description" rows="3" class="form-control @error('meta_description') is-invalid @enderror" placeholder="Enter SEO Meta Description">{{ old('meta_description', $service->meta_description) }}</textarea>
                                    @error('meta_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- SEO Meta slug -->
                                <div class="form-group mb-3">
                                    <label for="meta_slug"><i class="fas fa-tags"></i> Meta Slug</label>
                                    <input type="text" name="meta_slug" id="meta_slug" class="form-control @error('meta_slug') is-invalid @enderror" value="{{ old('meta_slug', $service->meta_slug) }}" placeholder="Enter Meta Slug">
                                    @error('meta_slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                                <!-- Submit Button -->
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Service</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>

                <!-- Scripts for Adding/Removing Dynamic Fields -->
                <script>
                   // Add Order Feature
                    let addOrderFeatureBtn = document.getElementById('add-order-feature');
                    if (addOrderFeatureBtn) {
                        addOrderFeatureBtn.addEventListener('click', function () {
                            var featureFields = `
                                <div class="order-feature-item mb-3">
                                    <div class="form-group">
                                        <label for="order_feature_title_${orderFeatureIndex}">Order Feature Title</label>
                                        <input type="text" name="order_feature_title[${orderFeatureIndex}]" id="order_feature_title_${orderFeatureIndex}" class="form-control" placeholder="Enter Order Feature Title">
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm remove-order-feature"><i class="fas fa-minus-circle"></i> Remove</button>
                                </div>`;
                            document.getElementById('order-feature-fields').insertAdjacentHTML('beforeend', featureFields);
                            orderFeatureIndex++; // Increment index
                        });
                    }

                    // Add FAQ
                    let addFaqBtn = document.getElementById('add-faq');
                    if (addFaqBtn) {
                        addFaqBtn.addEventListener('click', function () {
                            var faqFields = `
                                <div class="faq-item mb-3">
                                    <div class="form-group">
                                        <label for="faq_question_${faqIndex}">FAQ Question</label>
                                        <input type="text" name="faq_question[${faqIndex}]" class="form-control" id="faq_question_${faqIndex}" placeholder="Enter FAQ Question">
                                    </div>
                                    <div class="form-group">
                                        <label for="faq_answer_${faqIndex}">FAQ Answer</label>
                                        <textarea name="faq_answer[${faqIndex}]" rows="3" class="form-control" id="faq_answer_${faqIndex}" placeholder="Enter FAQ Answer"></textarea>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm remove-faq"><i class="fas fa-minus-circle"></i> Remove</button>
                                </div>`;
                            document.getElementById('faq-fields').insertAdjacentHTML('beforeend', faqFields);
                            faqIndex++; // Increment index
                        });
                    }

                </script>


@endsection
