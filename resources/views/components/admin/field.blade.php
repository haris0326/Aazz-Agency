{{--
    Path: resources/views/components/admin/field.blade.php

    Usage (text):
    <x-admin.field type="text" name="title" label="Service Title" icon="bi-type"
        hint="2 keywords" :value="old('title')" required />

    Usage (textarea):
    <x-admin.field type="textarea" name="description" label="Description" icon="bi-text-paragraph"
        hint="200 characters max" :value="old('description')" rows="4" required />

    Usage (select) — pass options via the default slot as normal <option> tags:
    <x-admin.field type="select" name="service_cat_id" label="Service Category" icon="bi-tag" required>
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(old('service_cat_id') == $category->id)>{{ $category->cat_title }}</option>
        @endforeach
    </x-admin.field>

    For array-named fields (e.g. name="about_title[]") whose Laravel validation error key uses
    an index (e.g. "about_title.0"), pass :error-key="'about_title.'.$index" explicitly —
    otherwise the component guesses the error key from `name` (stripping trailing []).
--}}
@props([
    'type' => 'text',
    'name',
    'label' => null,
    'icon' => null,
    'hint' => null,
    'value' => null,
    'required' => false,
    'rows' => 3,
    'placeholder' => null,
    'errorKey' => null,
])

@php
    $errorKey = $errorKey ?? \Illuminate\Support\Str::of($name)->replace('[]', '');
    $fieldId = 'field_' . \Illuminate\Support\Str::slug($name) . '_' . uniqid();
    $placeholder = $placeholder ?? ($label ? "Enter {$label}" : '');
@endphp

<div class="ap-field">
    @if($label)
        <label for="{{ $fieldId }}" class="ap-field-label">
            @if($icon)<i class="bi {{ $icon }}"></i>@endif
            {{ $label }}
            @if($required)<span class="ap-required">*</span>@endif
            @if($hint)<span class="ap-field-hint">{{ $hint }}</span>@endif
        </label>
    @endif

    @if($type === 'textarea')
        <textarea
            id="{{ $fieldId }}"
            name="{{ $name }}"
            rows="{{ $rows }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            {{ $attributes->merge(['class' => 'form-control' . ($errors->has($errorKey) ? ' is-invalid' : '')]) }}
        >{{ $value }}</textarea>
    @elseif($type === 'select')
        <select
            id="{{ $fieldId }}"
            name="{{ $name }}"
            {{ $required ? 'required' : '' }}
            {{ $attributes->merge(['class' => 'form-select' . ($errors->has($errorKey) ? ' is-invalid' : '')]) }}
        >
            {{ $slot }}
        </select>
    @else
        <input
            type="{{ $type }}"
            id="{{ $fieldId }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            {{ $attributes->merge(['class' => 'form-control' . ($errors->has($errorKey) ? ' is-invalid' : '')]) }}
        />
    @endif

    @error($errorKey)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>