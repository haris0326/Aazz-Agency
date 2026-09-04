{{--
    Path: resources/views/components/admin/file-field.blade.php
    Usage:
    <x-admin.file-field name="test_images[]" label="Upload Test Order Images" icon="bi-images"
        hint="Max 3 images — JPG, PNG, JPEG" multiple accept="image/*" input-id="test_images" />
--}}
@props(['name', 'label' => null, 'icon' => 'bi-cloud-upload', 'hint' => null, 'multiple' => false, 'accept' => 'image/*', 'inputId' => null])

@php $inputId = $inputId ?? 'file_' . \Illuminate\Support\Str::slug($name); @endphp

<div class="ap-field">
    @if($label)
        <label for="{{ $inputId }}" class="ap-field-label">
            <i class="bi {{ $icon }}"></i> {{ $label }}
            @if($hint)<span class="ap-field-hint">{{ $hint }}</span>@endif
        </label>
    @endif

    <label for="{{ $inputId }}" class="ap-file-drop d-block mb-0">
        <i class="bi bi-cloud-arrow-up"></i>
        <div class="ap-file-drop-text">Click to browse or drag files here</div>
        <input type="file" id="{{ $inputId }}" name="{{ $name }}" accept="{{ $accept }}" {{ $multiple ? 'multiple' : '' }} {{ $attributes }} />
    </label>

    <div class="ap-image-preview-grid" id="{{ $inputId }}_preview"></div>
</div>