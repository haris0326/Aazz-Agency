@extends('layouts.panel_layout')

@section('title', 'Add Member')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add Team Member</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="position">Position</label>
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" id="position" value="{{ old('position') }}" required>
                            @error('position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="bio">Bio</label>
                            <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" id="bio" rows="3">{{ old('bio') }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="skills">Skills</label>
                            <div id="skills-container" class="d-flex flex-wrap mb-2">
                                <!-- Tags will be added here -->
                            </div>
                            <input type="text" id="skills-input" class="form-control @error('skills') is-invalid @enderror" placeholder="Add a skill..." />
                            <input type="hidden" name="skills" id="skills" value="{{ old('skills') }}">
                            @error('skills')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Add Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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

    function addSkillTag(skill) {
        // Create a new tag element
        const skillTag = document.createElement('span');
        skillTag.className = 'badge bg-secondary me-1 mb-1';
        skillTag.innerText = skill;

        // Create a remove button
        const removeBtn = document.createElement('button');
        removeBtn.className = 'btn-close btn-close-white btn-sm ms-2';
        removeBtn.onclick = function() {
            skillsContainer.removeChild(skillTag);
            updateHiddenInput();
        };
        skillTag.appendChild(removeBtn);

        skillsContainer.appendChild(skillTag);
        updateHiddenInput();
    }

    function updateHiddenInput() {
        const tags = Array.from(skillsContainer.getElementsByTagName('span')).map(tag => tag.innerText);
        hiddenSkillsInput.value = tags.join(','); // Update hidden input with comma-separated skills
    }
</script>


@endsection
