{{--
    Path: resources/views/admin_panel/services/add_service.blade.php
    All field names kept 100% identical to your original file — controller/validation
    needs zero changes. Only markup + icons + reusable components changed.
--}}
@extends(config('layout.admin_panel_layout'))

@section('title', 'Add Service')
@section('topbar-title', 'Services')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    .ap-toast {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1080;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-left: 4px solid #6b7280;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        border-radius: 10px;
        padding: 10px 16px;
        font-size: 13.5px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        color: #374151;
        transition: transform .25s ease, opacity .25s ease, border-color .2s ease;
        max-width: 320px;
    }
    .ap-toast-icon { font-size: 16px; line-height: 1; flex-shrink: 0; }
    .ap-toast.ap-toast-saving  { border-left-color: #f59e0b; }
    .ap-toast.ap-toast-saving  .ap-toast-icon { color: #f59e0b; animation: ap-spin 1s linear infinite; }
    .ap-toast.ap-toast-saved   { border-left-color: #10b981; }
    .ap-toast.ap-toast-saved   .ap-toast-icon { color: #10b981; }
    .ap-toast.ap-toast-error   { border-left-color: #ef4444; }
    .ap-toast.ap-toast-error   .ap-toast-icon { color: #ef4444; }
    @keyframes ap-spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

    @media (max-width: 576px) {
        .ap-toast { left: 12px; right: 12px; top: 12px; max-width: none; }
    }
</style>
@endpush

<x-admin.page-header
    title="Add New Service"
    subtitle="Fill in all sections below — your progress saves automatically every few seconds"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Services', 'url' => route('service.index')], ['label' => 'Add New']]"
/>

<div id="draftToast" class="ap-toast" role="status" aria-live="polite">
    <span class="ap-toast-icon"><i class="bi bi-cloud-arrow-up-fill"></i></span>
    <span class="ap-toast-text">Draft saving is on — changes are kept automatically</span>
</div>

@if($resumeDraft ?? null)
<div class="alert alert-info d-flex gap-2 align-items-start mb-4">
    <i class="bi bi-info-circle-fill mt-1"></i>
    <div>
        <strong>Resuming your last draft</strong> — fields below have been restored from your
        previous unsaved session.
    </div>
</div>
@endif

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

<form id="serviceForm" action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="draft_uuid" id="draft_uuid" value="{{ $draftUuid }}">
    {{-- ================= Service Details ================= --}}
    <x-admin.form-section icon="bi-info-circle" title="Service Details" subtitle="Core information shown across the site">

        <x-admin.field type="text" name="title" label="Service Title" icon="bi-type"
            hint="2 keywords" :value="old('title')" required />

        <x-admin.field type="textarea" name="description" label="Description" icon="bi-text-paragraph"
            hint="200 characters max" :value="old('description')" rows="4" required />

        <x-admin.field type="select" name="service_cat_id" label="Service Category" icon="bi-tag" required>
            <option value="" disabled @selected(!old('service_cat_id'))>Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('service_cat_id') == $category->id)>{{ $category->cat_title }}</option>
            @endforeach
        </x-admin.field>
    </x-admin.form-section>

    {{-- ================= Hero Section ================= --}}
    <x-admin.form-section icon="bi-window-stack" title="Hero Section" subtitle="The top banner shown on the service page">
        <x-admin.field type="text" name="hero_main_title" label="Hero Main Title" icon="bi-type"
            hint="100 characters max" :value="old('hero_main_title')" />

        <x-admin.field type="textarea" name="hero_main_desc" label="Hero Description" icon="bi-text-paragraph"
            hint="200 characters max" :value="old('hero_main_desc')" rows="3" />

        <div class="row">
            <div class="col-md-6">
                <x-admin.field type="text" name="hero_button_text" label="Button Text" icon="bi-cursor"
                    hint="3 words max" :value="old('hero_button_text')" />
            </div>
            <div class="col-md-6">
                <x-admin.field type="text" name="hero_button_link" label="Button Link" icon="bi-link-45deg"
                    :value="old('hero_button_link')" />
            </div>
        </div>
    </x-admin.form-section>

    {{-- ================= About Services (repeater) ================= --}}
    <x-admin.form-section icon="bi-gear-wide-connected" title="About Services" subtitle="Feature blocks with icon + description">
        <div id="about-service-fields">
            @foreach(old('about_title', ['']) as $index => $title)
            <div class="ap-repeater-item">
                <x-admin.field type="text" name="about_title[]" label="Service Title" hint="3 words max"
                    :value="$title" :error-key="'about_title.'.$index" required />

                <x-admin.field type="textarea" name="about_description[]" label="Service Description" hint="120 characters max"
                    :value="old('about_description.'.$index)" :error-key="'about_description.'.$index" required />

                <x-admin.field type="text" name="about_icon_class[]" label="Icon Class" hint="e.g. bi bi-check-circle"
                    :value="old('about_icon_class.'.$index)" :error-key="'about_icon_class.'.$index" required />

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
    <x-admin.form-section icon="bi-clipboard-check" title="Test Order" subtitle="Sample order walkthrough shown to customers">
        <div id="test-order-fields">
            <div class="ap-repeater-item">
                <x-admin.field type="text" name="test_title[]" label="Test Order Title" hint="5 words max"
                    :value="old('test_title.0')" required />

                <x-admin.field type="textarea" name="test_description[]" label="Test Order Description" hint="250 characters max"
                    :value="old('test_description.0')" required />

                <x-admin.file-field name="test_images[]" input-id="test_images" label="Upload Test Order Images"
                    icon="bi-images" hint="Max 3 images — JPG, PNG, JPEG" multiple />

                <div class="row">
                    <div class="col-md-6">
                        <x-admin.field type="textarea" name="step_1" label="Step 1" hint="5 words max" rows="2" :value="old('step_1')" required />
                    </div>
                    <div class="col-md-6">
                        <x-admin.field type="textarea" name="step_2" label="Step 2" hint="5 words max" rows="2" :value="old('step_2')" required />
                    </div>
                    <div class="col-md-6">
                        <x-admin.field type="textarea" name="step_3" label="Step 3" hint="5 words max" rows="2" :value="old('step_3')" required />
                    </div>
                    <div class="col-md-6">
                        <x-admin.field type="textarea" name="step_4" label="Step 4" hint="5 words max" rows="2" :value="old('step_4')" required />
                    </div>
                </div>
            </div>
        </div>
    </x-admin.form-section>

    {{-- ================= Order Feature Tags ================= --}}
    <x-admin.form-section icon="bi-tags" title="Order Feature Tags" subtitle="Type a feature and press Enter or comma to add it as a tag">
        <div class="ap-tag-input-wrapper" id="order-feature-tag-wrapper">
            <div id="order-feature-tags" class="d-flex flex-wrap gap-2"></div>
            <input type="text" id="tag-input" class="ap-tag-input-field" placeholder="Type and press Enter..." />
        </div>
        <input type="hidden" name="order_feature_titles" id="order_feature_titles" value="[]">
        @error('order_feature_titles')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </x-admin.form-section>

    {{-- ================= Why Choose Us (repeater) ================= --}}
    <x-admin.form-section icon="bi-star" title="Why Choose Us" subtitle="Trust-building feature highlights">
        <div id="why-choose-us-fields">
            <div class="ap-repeater-item">
                <x-admin.field type="text" name="why_choose_title[]" label="Feature Title" hint="3 words max"
                    :value="old('why_choose_title.0')" required />
                <x-admin.field type="textarea" name="why_choose_description[]" label="Feature Description" hint="160 characters max"
                    :value="old('why_choose_description.0')" required />
                <x-admin.field type="text" name="why_choose_icon_class[]" label="Icon Class" hint="e.g. bi bi-shield-check"
                    :value="old('why_choose_icon_class.0')" required />
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>
        </div>
        <button type="button" class="ap-repeater-add-btn w-100" id="addWhyChooseBtn">
            <i class="bi bi-plus-lg"></i> Add More Features
        </button>
    </x-admin.form-section>

    {{-- ================= Content Section ================= --}}
    <x-admin.form-section icon="bi-file-earmark-text" title="Content Section" subtitle="Long-form content blocks for the service page">
        <x-admin.field type="text" name="content_title" label="Content Title" icon="bi-type" hint="100 characters max"
            :value="old('content_title')" required />
        <x-admin.field type="textarea" name="content_description" label="Content Description" icon="bi-text-paragraph"
            hint="500 characters max" :value="old('content_description')" rows="3" required />

        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-text-paragraph"></i> Content 2 <span class="ap-required">*</span>
                <span class="ap-field-hint">Rich text editor</span></label>
            <textarea name="content_2" id="content_2" rows="6" class="form-control @error('content_2') is-invalid @enderror" required>{{ old('content_2') }}</textarea>
            @error('content_2') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
        </div>

        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-text-paragraph"></i> Content 3 <span class="ap-required">*</span>
                <span class="ap-field-hint">Rich text editor</span></label>
            <textarea name="content_3" id="content_3" rows="6" class="form-control @error('content_3') is-invalid @enderror" required>{{ old('content_3') }}</textarea>
            @error('content_3') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
        </div>
    </x-admin.form-section>

    {{-- ================= Tab Content (repeater) ================= --}}
    <x-admin.form-section icon="bi-layout-text-window" title="Tab Content" subtitle="Tabbed information sections">
        <div id="tabContentContainer">
            @foreach(old('tab_title', ['']) as $index => $oldTitle)
            <div class="ap-repeater-item">
                <div class="row">
                    <div class="col-md-5">
                        <x-admin.field type="text" name="tab_title[]" label="Title" hint="2 words max"
                            :value="$oldTitle" :error-key="'tab_title.'.$index" required />
                    </div>
                    <div class="col-md-7">
                        <x-admin.field type="textarea" name="tab_description[]" label="Description" hint="1500 characters max" rows="2"
                            :value="old('tab_description.'.$index)" :error-key="'tab_description.'.$index" required />
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
    <x-admin.form-section icon="bi-question-circle" title="FAQ Section" subtitle="Frequently asked questions for this service">
        <div id="faq-fields">
            <div class="ap-repeater-item">
                <x-admin.field type="text" name="faq_question[]" label="FAQ Question" :value="old('faq_question.0')" required />
                <x-admin.field type="textarea" name="faq_answer[]" label="FAQ Answer" rows="3" :value="old('faq_answer.0')" />
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-faq">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>
        </div>
        <button type="button" class="ap-repeater-add-btn w-100" id="add-faq">
            <i class="bi bi-plus-lg"></i> Add FAQ
        </button>
    </x-admin.form-section>

    {{-- ================= SEO Meta Data ================= --}}
    <x-admin.form-section icon="bi-graph-up-arrow" title="SEO Meta Data" subtitle="Search engine metadata for this service page">
        <x-admin.field type="text" name="meta_title" label="SEO Meta Title" icon="bi-type" hint="60 characters max"
            :value="old('meta_title')" error-key="meta_title" />
        <x-admin.field type="textarea" name="meta_description" label="SEO Meta Description" icon="bi-text-paragraph"
            hint="200 characters max" :value="old('meta_description')" rows="3" error-key="meta_description" />
        <x-admin.field type="text" name="meta_slug" label="Meta Slug" icon="bi-link-45deg" hint="e.g. my-service"
            :value="old('meta_slug')" />
    </x-admin.form-section>

    {{-- ================= Submit ================= --}}
    <div class="ap-form-actions" style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);">
        <a href="{{ route('service.index') }}" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-check-lg"></i> Save Service
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
    const toast           = document.getElementById('draftToast');
    const toastText       = toast.querySelector('.ap-toast-text');

    const AUTOSAVE_URL = "{{ route('service.autosave') }}";
    const CSRF_TOKEN    = "{{ csrf_token() }}";
    const FORM_TYPE     = "create";
    const SERVICE_ID    = null;
    const RESUME_PAYLOAD = @json($resumeDraft ?? null);

    let lastSerialized = null;
    let isSaving = false;

    function syncEditors() {
        if (window.CKEDITOR) {
            ['content_2', 'content_3'].forEach(function (id) {
                if (CKEDITOR.instances[id]) CKEDITOR.instances[id].updateElement();
            });
        }
    }

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

    function setToast(state, msg) {
        toast.classList.remove('ap-toast-saving', 'ap-toast-saved', 'ap-toast-error');
        toast.classList.add('ap-toast-' + state);
        toastText.textContent = msg;
    }

    async function saveDraft() {
        if (isSaving) return;
        const payload    = collectPayload();
        const serialized = JSON.stringify(payload);
        if (serialized === lastSerialized) return;

        isSaving = true;
        setToast('saving', 'Saving draft...');

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
            setToast('saved', 'Draft saved · ' + new Date().toLocaleTimeString());
        } catch (err) {
            console.error('Draft autosave error:', err);
            setToast('error', 'Could not save draft — retrying...');
        } finally {
            isSaving = false;
        }
    }

    // ---- Resume a previously saved draft (from index "Continue editing") ----
    function restoreRepeaters(key, count) {
        const addButtonMap = {
            about_title: 'addServiceBtn',
            why_choose_title: 'addWhyChooseBtn',
            tab_title: 'addTabContentBtn',
            faq_question: 'add-faq',
        };
        const btn = document.getElementById(addButtonMap[key]);
        if (!btn) return;
        for (let i = 1; i < count; i++) btn.click(); // row 0 already exists in markup
    }

    function restoreDraftIntoForm(payload) {
        if (!payload) return;

        // Repeaters first, so the newly created inputs exist before we fill them
        if (Array.isArray(payload.about_title)) restoreRepeaters('about_title', payload.about_title.length);
        if (Array.isArray(payload.why_choose_title)) restoreRepeaters('why_choose_title', payload.why_choose_title.length);
        if (Array.isArray(payload.tab_title)) restoreRepeaters('tab_title', payload.tab_title.length);
        if (Array.isArray(payload.faq_question)) restoreRepeaters('faq_question', payload.faq_question.length);

        Object.keys(payload).forEach(function (key) {
            const value = payload[key];

            if (Array.isArray(value)) {
                const elements = form.querySelectorAll('[name="' + key + '[]"]');
                elements.forEach(function (el, idx) {
                    if (value[idx] !== undefined) el.value = value[idx];
                });
            } else {
                const el = form.querySelector('[name="' + key + '"]');
                if (el) el.value = value;
            }
        });

        // Rich text editors need their content pushed in after CKEDITOR init
        setTimeout(function () {
            if (window.CKEDITOR) {
                if (payload.content_2 && CKEDITOR.instances.content_2) CKEDITOR.instances.content_2.setData(payload.content_2);
                if (payload.content_3 && CKEDITOR.instances.content_3) CKEDITOR.instances.content_3.setData(payload.content_3);
            }
        }, 300);

        // Order feature tags (stored as a JSON string in a hidden field)
        if (payload.order_feature_titles) {
            try {
                const tags = JSON.parse(payload.order_feature_titles);
                if (Array.isArray(tags) && window.__renderOrderFeatureTags) {
                    window.__renderOrderFeatureTags(tags);
                }
            } catch (e) { /* ignore malformed value */ }
        }

        lastSerialized = JSON.stringify(collectPayload());
        setToast('saved', 'Draft restored from your last session');
    }

    if (RESUME_PAYLOAD) {
        document.addEventListener('DOMContentLoaded', function () {
            restoreDraftIntoForm(RESUME_PAYLOAD);
        });
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

    // ---- About Services ----
    document.getElementById('addServiceBtn').addEventListener('click', function () {
        addField('about-service-fields', `
            <div class="ap-repeater-item">
                <div class="ap-field">
                    <label class="ap-field-label">Service Title <span class="ap-field-hint">3 words max</span></label>
                    <input type="text" name="about_title[]" class="form-control" placeholder="Enter Service Title" required>
                </div>
                <div class="ap-field">
                    <label class="ap-field-label">Service Description <span class="ap-field-hint">120 characters max</span></label>
                    <textarea name="about_description[]" class="form-control" placeholder="Enter Service Description" required></textarea>
                </div>
                <div class="ap-field">
                    <label class="ap-field-label">Icon Class <span class="ap-field-hint">e.g. bi bi-check-circle</span></label>
                    <input type="text" name="about_icon_class[]" class="form-control" placeholder="Enter Icon Class" required>
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>`);
    });
    setupRemoveButton('about-service-fields', 'remove-btn');

    // ---- Why Choose Us ----
    document.getElementById('addWhyChooseBtn').addEventListener('click', function () {
        addField('why-choose-us-fields', `
            <div class="ap-repeater-item">
                <div class="ap-field">
                    <label class="ap-field-label">Feature Title <span class="ap-field-hint">3 words max</span></label>
                    <input type="text" name="why_choose_title[]" class="form-control" placeholder="Enter Feature Title" required>
                </div>
                <div class="ap-field">
                    <label class="ap-field-label">Feature Description <span class="ap-field-hint">160 characters max</span></label>
                    <textarea name="why_choose_description[]" class="form-control" placeholder="Enter Feature Description" required></textarea>
                </div>
                <div class="ap-field">
                    <label class="ap-field-label">Icon Class <span class="ap-field-hint">e.g. bi bi-shield-check</span></label>
                    <input type="text" name="why_choose_icon_class[]" class="form-control" placeholder="Enter Icon Class" required>
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>`);
    });
    setupRemoveButton('why-choose-us-fields', 'remove-btn');

    // ---- Tab Content ----
    document.getElementById('addTabContentBtn').addEventListener('click', function () {
        addField('tabContentContainer', `
            <div class="ap-repeater-item">
                <div class="row">
                    <div class="col-md-5">
                        <div class="ap-field">
                            <label class="ap-field-label">Title <span class="ap-field-hint">2 words max</span></label>
                            <input type="text" class="form-control" name="tab_title[]" required>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="ap-field">
                            <label class="ap-field-label">Description <span class="ap-field-hint">1500 characters max</span></label>
                            <textarea class="form-control" name="tab_description[]" rows="2" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>`);
    });
    setupRemoveButton('tabContentContainer', 'remove-btn');

    // ---- FAQ ----
    document.getElementById('add-faq').addEventListener('click', function () {
        addField('faq-fields', `
            <div class="ap-repeater-item">
                <div class="ap-field">
                    <label class="ap-field-label">FAQ Question</label>
                    <input type="text" name="faq_question[]" class="form-control" placeholder="Enter FAQ Question" required>
                </div>
                <div class="ap-field">
                    <label class="ap-field-label">FAQ Answer</label>
                    <textarea name="faq_answer[]" rows="3" class="form-control" placeholder="Enter FAQ Answer"></textarea>
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-faq">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>`);
    });
    setupRemoveButton('faq-fields', 'remove-faq');

    // ---- Image count guard ----
    var testImages = document.getElementById('test_images');
    if (testImages) {
        testImages.addEventListener('change', function () {
            if (this.files.length > 3) {
                alert('You can upload a maximum of 3 images.');
                this.value = '';
            }
        });
    }

    // ---- Order Feature Tags ----

    window.__renderOrderFeatureTags = function (restoredTags) {
        tags = restoredTags;
        renderTags();
    };

    let tags = [];

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