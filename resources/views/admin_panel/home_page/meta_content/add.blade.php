@extends(config('layout.admin_panel_layout'))
@section('title', 'Home Meta Information')

@section(config('layout.admin_pages_content'))
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Home Meta Information</h5>
            </div>
            <div class="card-body">
                {{-- Display success or error messages --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($homeMeta)
                    <form action="{{ route('homeMeta.update', $homeMeta->id) }}" method="POST" id="homeMetaForm">
                        @csrf
                        @method('PUT')
                @else
                    <form action="{{ route('homeMeta.store') }}" method="POST" id="homeMetaForm">
                        @csrf
                @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title', $homeMeta->meta_title ?? '') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="meta_desc">Meta Description</label>
                        <input type="text" class="form-control" name="meta_desc" value="{{ old('meta_desc', $homeMeta->meta_desc ?? '') }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">{{ $homeMeta ? 'Update' : 'Submit' }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
