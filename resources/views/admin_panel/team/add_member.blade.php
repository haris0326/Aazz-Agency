@extends(config('layout.admin_panel_layout'))
@section('title', 'Add Member')

@section(config('layout.admin_pages_content'))


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
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="position">Position</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fas fa-briefcase"></i></div>
                                    <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" id="position" value="{{ old('position') }}" required>
                                </div>
                                @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="bio">Bio</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fas fa-pencil-alt"></i></div>
                                    <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" id="bio" rows="3">{{ old('bio') }}</textarea>
                                </div>
                                @error('bio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="skills">Skills</label>
                                <div id="skills-container" class="d-flex flex-wrap mb-2">
                                    <!-- Tags will be added here -->
                                </div>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fas fa-tools"></i></div>
                                    <input type="text" id="skills-input" class="form-control @error('skills') is-invalid @enderror" placeholder="Add a skill..." />
                                    <input type="hidden" name="skills" id="skills" value="{{ old('skills') }}">
                                </div>
                                @error('skills')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="image">Image <strong>Maximum Size (2MB)</strong></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fas fa-image"></i></div>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*">
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="facebook">Facebook Link</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fab fa-facebook"></i></div>
                                    <input type="url" name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="facebook" value="{{ old('facebook') }}">
                                </div>
                                @error('facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="twitter">Twitter Link</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fab fa-twitter"></i></div>
                                    <input type="url" name="twitter" class="form-control @error('twitter') is-invalid @enderror" id="twitter" value="{{ old('twitter') }}">
                                </div>
                                @error('twitter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="linkedin">LinkedIn Link</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fab fa-linkedin"></i></div>
                                    <input type="url" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" value="{{ old('linkedin') }}">
                                </div>
                                @error('linkedin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="instagram">Instagram Link</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fab fa-instagram"></i></div>
                                    <input type="url" name="instagram" class="form-control @error('instagram') is-invalid @enderror" id="instagram" value="{{ old('instagram') }}">
                                </div>
                                @error('instagram')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="role">Role</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fas fa-user-tag"></i></div>
                                    <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" id="role" value="{{ old('role') }}" required>
                                </div>
                                @error('role')
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
