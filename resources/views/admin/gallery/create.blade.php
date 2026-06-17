{{-- FILE: resources/views/admin/gallery/create.blade.php --}}
@extends('layouts.admin')
@section('title','Create Gallery Folder - Admin')
@section('page-title','Gallery')
@section('content')

<div style="margin-bottom:16px">
    <a href="{{ route('admin.gallery.index') }}" style="color:var(--text-muted);font-size:14px;text-decoration:none">← Back</a>
</div>

<div class="admin-form-page">
    <h2>Create a Gallery Folder</h2>
    <form method="POST" action="{{ route('admin.gallery.store') }}">
        @csrf

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Folder Name: *</label>
                <input type="text" name="folder_name" class="admin-input" placeholder="Event 1 Alumni Reunion" value="{{ old('folder_name') }}" required
                       oninput="updateSlug(this.value)">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Class Year: *</label>
                <select name="class_year" class="admin-input" required>
                    <option value="">Select Year</option>
                    @foreach(range(date('Y'), 1947, -1) as $y)
                    <option value="{{ $y }}" {{ old('class_year')==$y ? 'selected' : '' }}>{{ $y }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Description: *</label>
            <textarea name="description" class="admin-input" rows="4" placeholder="Describe this gallery folder...">{{ old('description') }}</textarea>
        </div>

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Type: *</label>
                <select name="type" class="admin-input" required>
                    <option value="">Select Type</option>
                    <option value="Conference" {{ old('type')=='Conference' ? 'selected' : '' }}>Conference</option>
                    <option value="Private" {{ old('type')=='Private' ? 'selected' : '' }}>Private</option>
                    <option value="Public" {{ old('type')=='Public' ? 'selected' : '' }}>Public</option>
                </select>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Slug:</label>
                <input type="text" name="slug" class="admin-input" id="slugField" placeholder="auto-generated" value="{{ old('slug') }}" readonly>
                <p style="font-size:12px;color:var(--text-muted);margin-top:4px" id="slugPreview"></p>
            </div>
        </div>

        <div style="display:flex;gap:14px;margin-top:10px">
            <button type="submit" class="btn-teal" style="padding:12px 40px">Save</button>
            <a href="{{ route('admin.gallery.index') }}" class="btn-outline-red" style="padding:12px 40px">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
function updateSlug(val) {
    const slug = val.toLowerCase().replace(/[^a-z0-9]+/g,'-').replace(/^-|-$/g,'');
    document.getElementById('slugField').value = slug;
    document.getElementById('slugPreview').textContent = slug ? 'https://www.poba.socialknocks.com/'+slug+'/' : '';
}
</script>
@endpush
@endsection
