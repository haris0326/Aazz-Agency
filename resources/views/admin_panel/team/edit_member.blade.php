@extends('layouts.panel_layout')

@section('title', 'Edit Member')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Team Member</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('team.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $member->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="position">Position</label>
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" id="position" value="{{ old('position', $member->position) }}" required>
                            @error('position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="bio">Bio</label>
                            <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" id="bio" rows="3" required>{{ old('bio', $member->bio) }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Skills Section with Tags -->
                        <div class="form-group mb-3">
                            <label for="skills">Skills</label>
                            <div id="skills-container" class="d-flex flex-wrap mb-2">
                                <!-- Existing skills will be shown here as tags -->
                                @if (old('skills', $member->skills))
                                    @foreach (explode(',', old('skills', $member->skills)) as $skill)
                                        <span class="badge bg-secondary me-1 mb-1">{{ $skill }}
                                            <button type="button" class="btn-close btn-close-white btn-sm ms-2"></button>
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                            <input type="text" id="skills-input" class="form-control @error('skills') is-invalid @enderror" placeholder="Add a skill...">
                            <input type="hidden" name="skills" id="skills" value="{{ old('skills', $member->skills) }}">
                            @error('skills')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image upload and preview -->
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($member->image)
                                <div class="mt-2">
                                    <strong>Current Image:</strong>
                                    <img src="{{ asset( $member->image ) }}" alt="Current Image" class="mt-2" style="max-width: 150px;">
                                </div>
                            @endif
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const skillsContainer = document.getElementById('skills-container');
    const skillsInput = document.getElementById('skills-input');
    const hiddenSkillsInput = document.getElementById('skills');

    // Add event listener to handle adding skills
    skillsInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' && this.value) {
            event.preventDefault();
            const skill = this.value.trim();
            addSkillTag(skill);
            this.value = ''; // Clear input
        }
    });

    // Function to add skill tag
    function addSkillTag(skill) {
        const skillTag = document.createElement('span');
        skillTag.className = 'badge bg-secondary me-1 mb-1 d-flex align-items-center'; // Aligns close button and text
        skillTag.innerHTML = `${skill} <button type="button" class="btn-close btn-close-white btn-sm ms-2"></button>`;

        const removeBtn = skillTag.querySelector('.btn-close');
        removeBtn.onclick = function() {
            skillsContainer.removeChild(skillTag);
            updateHiddenInput();
        };

        skillsContainer.appendChild(skillTag);
        updateHiddenInput();
    }

    // Function to update hidden input
    function updateHiddenInput() {
        const tags = Array.from(skillsContainer.getElementsByTagName('span')).map(tag => {
            // Extract the skill text only (ignoring the close button)
            return tag.firstChild.textContent.trim();
        });
        hiddenSkillsInput.value = tags.join(','); // Update hidden input with comma-separated skills
    }

    // Bind the remove function to existing skill tags on page load
    const existingSkills = skillsContainer.getElementsByClassName('badge');
    Array.from(existingSkills).forEach(function(skillTag) {
        const removeBtn = skillTag.querySelector('.btn-close');
        removeBtn.onclick = function() {
            skillsContainer.removeChild(skillTag);
            updateHiddenInput();
        };
    });

    // Optional: Image preview functionality
    document.getElementById('image').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgPreview = document.createElement('img');
                imgPreview.src = e.target.result;
                imgPreview.style.maxWidth = '150px';
                imgPreview.classList.add('mt-2');
                const currentImageDiv = document.querySelector('.form-group img');
                if (currentImageDiv) {
                    currentImageDiv.replaceWith(imgPreview);
                } else {
                    document.querySelector('.form-group').appendChild(imgPreview);
                }
            }
            reader.readAsDataURL(file);
        }
    });
});

</script>
@endsection
