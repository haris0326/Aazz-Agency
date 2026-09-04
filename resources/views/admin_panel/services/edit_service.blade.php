{{--
    Path: resources/views/admin_panel/services/edit_service.blade.php
    Same structure as add_service.blade.php, values pre-filled from $service.
    Field names kept identical — controller needs zero changes.
--}}
@extends(config('layout.admin_panel_layout'))

@section('title', 'Edit Service')
@section('topbar-title', 'Services')

@section(config('layout.admin_pages_content'))

<x-admin.page-header
    title="Edit Service"
    subtitle="Update details for {{ $service->title }}"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Services', 'url' => route('service.index')], ['label' => 'Edit']]"
/>

@if ($errors->any())
<div class="alert alert-danger d-flex gap-2 align-items-start mb-4">
    <i class="bi bi-exclamation-triangle-fill mt-1"></i>
    <div>
        <strong>There were some errors with your submission:</strong>
        <ul class="mb-0 mt-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<form id="serviceForm" action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="hidden" name="draft_uuid" id="draft_uuid" value="{{ $draftUuid }}">

    {{-- ================= Service Details ================= --}}
    <x-admin.form-section icon="bi-info-circle" title="Service Details">

    <div id="draftStatusBox" class="ap-draft-status" style="display:none;">
        <i class="bi bi-cloud-arrow-up-fill"></i>
        <span id="draftStatusText">Saving draft...</span>
    </div>

        <x-admin.field type="text" name="title" label="Service Title" icon="bi-type"
            :value="old('title', $service->title)" required />

        <x-admin.field type="textarea" name="description" label="Description" icon="bi-text-paragraph"
            :value="old('description', $service->description)" rows="4" required />

        <x-admin.field type="select" name="service_cat_id" label="Service Category" icon="bi-tag" required>
            <option value="" disabled>Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('service_cat_id', $service->service_cat_id) == $category->id)>{{ $category->cat_title }}</option>
            @endforeach
        </x-admin.field>
    </x-admin.form-section>

    {{-- ================= Hero Section ================= --}}
    <x-admin.form-section icon="bi-window-stack" title="Hero Section">
        <x-admin.field type="text" name="hero_main_title" label="Hero Main Title" icon="bi-type"
            :value="old('hero_main_title', $service->heroSection->main_title)" />

        <x-admin.field type="textarea" name="hero_main_desc" label="Hero Description" icon="bi-text-paragraph"
            :value="old('hero_main_desc', $service->heroSection->main_desc)" rows="3" />

        <div class="row">
            <div class="col-md-6">
                <x-admin.field type="text" name="hero_button_text" label="Button Text" icon="bi-cursor"
                    :value="old('hero_button_text', $service->heroSection->button_text)" />
            </div>
            <div class="col-md-6">
                <x-admin.field type="text" name="hero_button_link" label="Button Link" icon="bi-link-45deg"
                    :value="old('hero_button_link', $service->heroSection->button_link)" />
            </div>
        </div>
    </x-admin.form-section>

    {{-- ================= About Services (repeater) ================= --}}
    <x-admin.form-section icon="bi-gear-wide-connected" title="About Services">
        <div id="about-service-fields">
            @foreach(old('about_title', $service->aboutServices->pluck('title')->toArray()) as $index => $title)
            <div class="ap-repeater-item">
                <x-admin.field type="text" name="about_title[]" label="Service Title" :value="$title"
                    :error-key="'about_title.'.$index" required />
                <x-admin.field type="textarea" name="about_description[]" label="Service Description"
                    :value="old('about_description.'.$index, $service->aboutServices[$index]->description ?? '')"
                    :error-key="'about_description.'.$index" required />
                <x-admin.field type="text" name="about_icon_class[]" label="Icon Class" hint="e.g. bi bi-check-circle"
                    :value="old('about_icon_class.'.$index, $service->aboutServices[$index]->icon_class ?? '')"
                    :error-key="'about_icon_class.'.$index" required />
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>
            @endforeach
        </div>
        <button type="button" class="ap-repeater-add-btn w-100" id="addServiceBtn">
            <i class="bi bi-plus-lg"></i> Add More Services
        </button>
    </x-admin.form-section>

    {{-- ================= Test Order ================= --}}
    <x-admin.form-section icon="bi-clipboard-check" title="Test Order">
        <div id="test-order-fields">
            <div class="ap-repeater-item">
                <x-admin.field type="text" name="test_title[]" label="Test Order Title"
                    :value="old('test_title.0', $service->testOrders->first()->title ?? '')" required />

                <x-admin.field type="textarea" name="test_description[]" label="Test Order Description"
                    :value="old('test_description.0', $service->testOrders->first()->description ?? '')" required />

                <x-admin.file-field name="test_images[]" input-id="test_images" label="Upload Test Order Images"
                    icon="bi-images" hint="Max 3 images — leave empty to keep existing" multiple />

                @if($existingImages)
                    <div class="ap-image-preview-grid" id="existing-images-grid">
                        @foreach($existingImages as $image)
                            <div class="ap-image-preview" id="image-{{ $loop->index }}">
                                <img src="{{ asset(str_replace('public', '', $image)) }}" alt="Existing image">
                                <button type="button" class="ap-image-remove remove-image"
                                        data-url="{{ asset(str_replace('public', '', $image)) }}"
                                        data-index="{{ $loop->index }}">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endif
                <input type="hidden" name="removed_images" id="removed_images" value="[]">

                <div class="row mt-2">
                    <div class="col-md-6">
                        <x-admin.field type="textarea" name="step_1" label="Step 1" rows="2"
                            :value="old('step_1', $service->testOrders->first()->step_1 ?? '')" required />
                    </div>
                    <div class="col-md-6">
                        <x-admin.field type="textarea" name="step_2" label="Step 2" rows="2"
                            :value="old('step_2', $service->testOrders->first()->step_2 ?? '')" required />
                    </div>
                    <div class="col-md-6">
                        <x-admin.field type="textarea" name="step_3" label="Step 3" rows="2"
                            :value="old('step_3', $service->testOrders->first()->step_3 ?? '')" required />
                    </div>
                    <div class="col-md-6">
                        <x-admin.field type="textarea" name="step_4" label="Step 4" rows="2"
                            :value="old('step_4', $service->testOrders->first()->step_4 ?? '')" required />
                    </div>
                </div>
            </div>
        </div>
    </x-admin.form-section>

    {{-- ================= Order Feature Tags ================= --}}
    @php
        $oldTags = old('order_feature_titles', $service->orderFeatures->pluck('feature_title')->toArray());
        if (is_string($oldTags)) { $oldTags = json_decode($oldTags, true) ?? []; }
    @endphp
    <x-admin.form-section icon="bi-tags" title="Order Feature Tags" subtitle="Type a feature and press Enter or comma to add it as a tag">
        <div class="ap-tag-input-wrapper" id="order-feature-tag-wrapper">
            <div id="order-feature-tags" class="d-flex flex-wrap gap-2"></div>
            <input type="text" id="tag-input" class="ap-tag-input-field" placeholder="Type and press Enter..." />
        </div>
        <input type="hidden" name="order_feature_titles" id="order_feature_titles" value="{{ json_encode($oldTags) }}">
        @error('order_feature_titles')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </x-admin.form-section>

    {{-- ================= Why Choose Us (repeater) ================= --}}
    <x-admin.form-section icon="bi-star" title="Why Choose Us">
        <div id="why-choose-us-fields">
            @foreach(old('why_choose_title', $service->whyChooseUs->pluck('title')->toArray()) as $index => $oldTitle)
            <div class="ap-repeater-item">
                <x-admin.field type="text" name="why_choose_title[]" label="Feature Title" :value="$oldTitle"
                    :error-key="'why_choose_title.'.$index" required />
                <x-admin.field type="textarea" name="why_choose_description[]" label="Feature Description"
                    :value="old('why_choose_description.'.$index, $service->whyChooseUs[$index]->description ?? '')"
                    :error-key="'why_choose_description.'.$index" required />
                <x-admin.field type="text" name="why_choose_icon_class[]" label="Icon Class" hint="e.g. bi bi-shield-check"
                    :value="old('why_choose_icon_class.'.$index, $service->whyChooseUs[$index]->icon ?? '')"
                    :error-key="'why_choose_icon_class.'.$index" required />
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>
            @endforeach
        </div>
        <button type="button" class="ap-repeater-add-btn w-100" id="addWhyChooseBtn">
            <i class="bi bi-plus-lg"></i> Add More Features
        </button>
    </x-admin.form-section>

    {{-- ================= Content Section ================= --}}
    <x-admin.form-section icon="bi-file-earmark-text" title="Content Section">
        <x-admin.field type="text" name="content_title" label="Content Title" icon="bi-type"
            :value="old('content_title', $service->content->title)" required />
        <x-admin.field type="textarea" name="content_description" label="Content Description" icon="bi-text-paragraph"
            :value="old('content_description', $service->content->description)" rows="3" required />

        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-text-paragraph"></i> Content 2 <span class="ap-required">*</span></label>
            <textarea name="content_2" id="content_2" rows="6" class="form-control @error('content_2') is-invalid @enderror" required>{{ old('content_2', $service->content->content_2) }}</textarea>
            @error('content_2') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
        </div>
        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-text-paragraph"></i> Content 3 <span class="ap-required">*</span></label>
            <textarea name="content_3" id="content_3" rows="6" class="form-control @error('content_3') is-invalid @enderror" required>{{ old('content_3', $service->content->content_3) }}</textarea>
            @error('content_3') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
        </div>
    </x-admin.form-section>

    {{-- ================= Tab Content (repeater) ================= --}}
    <x-admin.form-section icon="bi-layout-text-window" title="Tab Content">
        <div id="tabContentContainer">
            @foreach(old('tab_title', $service->tabContents->pluck('title')->toArray()) as $index => $oldTitle)
            <div class="ap-repeater-item">
                <div class="row">
                    <div class="col-md-5">
                        <x-admin.field type="text" name="tab_title[]" label="Title" :value="$oldTitle"
                            :error-key="'tab_title.'.$index" required />
                    </div>
                    <div class="col-md-7">
                        <x-admin.field type="textarea" name="tab_description[]" label="Description" rows="2"
                            :value="old('tab_description.'.$index, $service->tabContents[$index]->description ?? '')"
                            :error-key="'tab_description.'.$index" required />
                    </div>
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>
            @endforeach
        </div>
        <button type="button" class="ap-repeater-add-btn w-100" id="addTabContentBtn">
            <i class="bi bi-plus-lg"></i> Add More
        </button>
    </x-admin.form-section>

    {{-- ================= FAQ (repeater) ================= --}}
    <x-admin.form-section icon="bi-question-circle" title="FAQ Section">
        <div id="faq-fields">
            @foreach(old('faq_question', $service->faqs->pluck('question')->toArray()) as $index => $oldQuestion)
            <div class="ap-repeater-item">
                <x-admin.field type="text" name="faq_question[]" label="FAQ Question" :value="$oldQuestion" required />
                <x-admin.field type="textarea" name="faq_answer[]" label="FAQ Answer" rows="3"
                    :value="old('faq_answer.'.$index, $service->faqs[$index]->answer ?? '')" required />
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-faq">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>
            @endforeach
        </div>
        <button type="button" class="ap-repeater-add-btn w-100" id="add-faq">
            <i class="bi bi-plus-lg"></i> Add FAQ
        </button>
    </x-admin.form-section>

    {{-- ================= SEO Meta Data ================= --}}
    <x-admin.form-section icon="bi-graph-up-arrow" title="SEO Meta Data">
        <x-admin.field type="text" name="meta_title" label="SEO Meta Title" icon="bi-type"
            :value="old('meta_title', $service->serviceSEO->meta_title)" />
        <x-admin.field type="textarea" name="meta_description" label="SEO Meta Description" icon="bi-text-paragraph"
            :value="old('meta_description', $service->serviceSEO->meta_desc)" rows="3" />
        <x-admin.field type="text" name="meta_slug" label="Meta Slug" icon="bi-link-45deg"
            :value="old('meta_slug', $service->serviceSEO->meta_slug)" />
    </x-admin.form-section>

    {{-- ================= Submit ================= --}}
    <div class="ap-form-actions" style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);">
        <a href="{{ route('service.index') }}" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-check-lg"></i> Update Service
        </button>
    </div>
</form>

@endsection

@push('scripts')
<script>
    CKEDITOR.replace('content_2');
    CKEDITOR.replace('content_3');
</script>

<script>
(function () {
    const form            = document.getElementById('serviceForm');
    const draftUuidInput  = document.getElementById('draft_uuid');
    const statusBox       = document.getElementById('draftStatusBox');
    const statusText      = document.getElementById('draftStatusText');

    const AUTOSAVE_URL = "{{ route('service.autosave') }}";
    const CSRF_TOKEN    = "{{ csrf_token() }}";
    const FORM_TYPE  = "edit";
    const SERVICE_ID = {{ $service->id }};

    let lastSerialized = null;
    let isSaving = false;

    function syncEditors() {
        if (window.CKEDITOR) {
            ['content_2', 'content_3'].forEach(function (id) {
                if (CKEDITOR.instances[id]) {
                    CKEDITOR.instances[id].updateElement();
                }
            });
        }
    }

    // Text fields sirf collect hote hain — files kabhi autosave nahi hote
    // (har 5 second pe wahi images re-upload karna resource-wasteful hota).
    function collectPayload() {
        syncEditors();
        const payload = {};
        form.querySelectorAll('input, textarea, select').forEach(function (el) {
            if (!el.name || el.type === 'file') return;
            if ((el.type === 'checkbox' || el.type === 'radio') && !el.checked) return;

            const name = el.name;
            if (name.endsWith('[]')) {
                const key = name.slice(0, -2);
                (payload[key] = payload[key] || []).push(el.value);
            } else {
                payload[name] = el.value;
            }
        });
        return payload;
    }

    function setStatus(state, msg) {
        statusBox.style.display = 'inline-flex';
        statusText.textContent = msg;
        statusBox.classList.remove('ap-draft-saving', 'ap-draft-saved', 'ap-draft-error');
        statusBox.classList.add('ap-draft-' + state);
    }

    async function saveDraft() {
        if (isSaving) return;
        const payload   = collectPayload();
        const serialized = JSON.stringify(payload);
        if (serialized === lastSerialized) return; // kuch change nahi hua, request skip

        isSaving = true;
        setStatus('saving', 'Saving draft...');

        try {
            const res = await fetch(AUTOSAVE_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    draft_uuid: draftUuidInput.value,
                    form_type:  FORM_TYPE,
                    service_id: SERVICE_ID,
                    payload:    payload,
                }),
            });

            if (!res.ok) throw new Error('HTTP ' + res.status);

            lastSerialized = serialized;
            setStatus('saved', 'Draft saved at ' + new Date().toLocaleTimeString());
        } catch (err) {
            console.error('Draft autosave error:', err);
            setStatus('error', 'Draft save failed, retrying...');
        } finally {
            isSaving = false;
        }
    }

    setInterval(saveDraft, 5000);
})();
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {

    function addField(containerId, fieldHTML) {
        document.getElementById(containerId).insertAdjacentHTML('beforeend', fieldHTML);
    }
    function setupRemoveButton(containerId, btnClass) {
        document.getElementById(containerId).addEventListener('click', function (e) {
            if (e.target.closest('.' + btnClass)) {
                e.target.closest('.ap-repeater-item').remove();
            }
        });
    }

    document.getElementById('addServiceBtn').addEventListener('click', function () {
        addField('about-service-fields', `
            <div class="ap-repeater-item">
                <div class="ap-field"><label class="ap-field-label">Service Title</label>
                    <input type="text" name="about_title[]" class="form-control" required></div>
                <div class="ap-field"><label class="ap-field-label">Service Description</label>
                    <textarea name="about_description[]" class="form-control" required></textarea></div>
                <div class="ap-field"><label class="ap-field-label">Icon Class</label>
                    <input type="text" name="about_icon_class[]" class="form-control" required></div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn"><i class="bi bi-trash3"></i> Remove</button>
            </div>`);
    });
    setupRemoveButton('about-service-fields', 'remove-btn');

    document.getElementById('addWhyChooseBtn').addEventListener('click', function () {
        addField('why-choose-us-fields', `
            <div class="ap-repeater-item">
                <div class="ap-field"><label class="ap-field-label">Feature Title</label>
                    <input type="text" name="why_choose_title[]" class="form-control" required></div>
                <div class="ap-field"><label class="ap-field-label">Feature Description</label>
                    <textarea name="why_choose_description[]" class="form-control" required></textarea></div>
                <div class="ap-field"><label class="ap-field-label">Icon Class</label>
                    <input type="text" name="why_choose_icon_class[]" class="form-control" required></div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn"><i class="bi bi-trash3"></i> Remove</button>
            </div>`);
    });
    setupRemoveButton('why-choose-us-fields', 'remove-btn');

    document.getElementById('addTabContentBtn').addEventListener('click', function () {
        addField('tabContentContainer', `
            <div class="ap-repeater-item">
                <div class="row">
                    <div class="col-md-5"><div class="ap-field"><label class="ap-field-label">Title</label>
                        <input type="text" class="form-control" name="tab_title[]" required></div></div>
                    <div class="col-md-7"><div class="ap-field"><label class="ap-field-label">Description</label>
                        <textarea class="form-control" name="tab_description[]" rows="2" required></textarea></div></div>
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn"><i class="bi bi-trash3"></i> Remove</button>
            </div>`);
    });
    setupRemoveButton('tabContentContainer', 'remove-btn');

    document.getElementById('add-faq').addEventListener('click', function () {
        addField('faq-fields', `
            <div class="ap-repeater-item">
                <div class="ap-field"><label class="ap-field-label">FAQ Question</label>
                    <input type="text" name="faq_question[]" class="form-control" required></div>
                <div class="ap-field"><label class="ap-field-label">FAQ Answer</label>
                    <textarea name="faq_answer[]" rows="3" class="form-control"></textarea></div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-faq"><i class="bi bi-trash3"></i> Remove</button>
            </div>`);
    });
    setupRemoveButton('faq-fields', 'remove-faq');

    var testImages = document.getElementById('test_images');
    if (testImages) {
        testImages.addEventListener('change', function () {
            if (this.files.length > 3) {
                alert('You can upload a maximum of 3 images.');
                this.value = '';
            }
        });
    }

    document.querySelectorAll('.remove-image').forEach(function (button) {
        button.addEventListener('click', function () {
            var imageUrl = this.getAttribute('data-url');
            var imageIndex = this.getAttribute('data-index');
            var preview = document.getElementById('image-' + imageIndex);
            if (preview) preview.remove();
            var removed = JSON.parse(document.getElementById('removed_images').value);
            removed.push(imageUrl);
            document.getElementById('removed_images').value = JSON.stringify(removed);
        });
    });

    // ---- Order Feature Tags ----
    let tags = JSON.parse(document.getElementById('order_feature_titles').value || '[]');
    function renderTags() {
        const container = document.getElementById('order-feature-tags');
        container.innerHTML = '';
        tags.forEach(function (tag) {
            const pill = document.createElement('span');
            pill.className = 'ap-tag-pill';
            pill.innerHTML = tag.replace(/</g, '&lt;') + '<button type="button" class="remove-tag" aria-label="Remove tag">&times;</button>';
            container.appendChild(pill);
        });
        document.getElementById('order_feature_titles').value = JSON.stringify(tags);
    }
    const tagInput = document.getElementById('tag-input');
    tagInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ',') {
            e.preventDefault();
            const val = this.value.trim().replace(/,$/, '');
            if (val && !tags.includes(val)) {
                tags.push(val);
                this.value = '';
                renderTags();
            }
        }
    });
    document.getElementById('order-feature-tags').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-tag')) {
            const label = e.target.parentElement.textContent.replace('×', '').trim();
            tags = tags.filter(t => t !== label);
            renderTags();
        }
    });
    renderTags();
});
</script>
@endpush