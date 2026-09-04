<x-admin.page-header
    title="Edit Post"
    subtitle="Update “{{ $blog->title }}”"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Blog', 'url' => route('blog.index')], ['label' => 'Edit']]"
/>

<form id="blogForm" action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="blog_id" id="blog_id" value="{{ $blog->id }}">