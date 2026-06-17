{{-- FILE: resources/views/admin/gallery/edit.blade.php --}}
@extends('layouts.admin')
@section('title','Edit Gallery Folder - Admin')
@section('page-title','Gallery')
@section('content')

<div style="margin-bottom:16px;display:flex;justify-content:space-between;align-items:center">
    <a href="{{ route('admin.gallery.index') }}" style="color:var(--text-muted);font-size:14px;text-decoration:none">← Back</a>
    <a href="{{ route('admin.gallery.images', $folder->id) }}" class="btn-outline-teal" style="font-size:13px;padding:9px 20px">Add Images</a>
</div>

<div class="admin-form-page">
    <h2>Edit {{ $folder->folder_name }}</h2>
    <form method="POST" action="{{ route('admin.gallery.update', $folder->id) }}">
        @csrf @method('PUT')

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Folder Name: *</label>
                <input type="text" name="folder_name" class="admin-input" value="{{ old('folder_name', $folder->folder_name) }}" required
                       oninput="updateSlug(this.value)">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Class Year: *</label>
                <select name="class_year" class="admin-input" required>
                    @foreach(range(date('Y'), 1947, -1) as $y)
                    <option value="{{ $y }}" {{ $folder->class_year==$y ? 'selected' : '' }}>{{ $y }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Description: *</label>
            <textarea name="description" class="admin-input" rows="4">{{ old('description', $folder->description) }}</textarea>
        </div>

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Type: *</label>
                <select name="type" class="admin-input" required>
                    @foreach(['Conference','Private','Public'] as $t)
                    <option value="{{ $t }}" {{ $folder->type==$t ? 'selected' : '' }}>{{ $t }}</option>
                    @endforeach
                </select>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Slug:</label>
                <input type="text" name="slug" id="slugField" class="admin-input" value="{{ old('slug', $folder->slug) }}" readonly>
                <p style="font-size:12px;color:var(--text-muted);margin-top:4px" id="slugPreview">
                    {{ $folder->slug ? 'https://www.poba.socialknocks.com/'.$folder->slug.'/' : '' }}
                </p>
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
    document.getElementById('slugPreview').textContent = 'https://www.poba.socialknocks.com/'+slug+'/';
}
</script>
@endpush
@endsection
