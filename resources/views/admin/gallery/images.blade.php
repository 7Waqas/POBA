{{-- FILE: resources/views/admin/gallery/images.blade.php --}}
@extends('layouts.admin')
@section('title','Add Images - Admin')
@section('page-title','Gallery')
@section('content')

<div style="margin-bottom:16px">
    <a href="{{ route('admin.gallery.edit', $folder->id) }}" style="color:var(--text-muted);font-size:14px;text-decoration:none">← Back</a>
</div>

<div class="admin-form-page" style="max-width:100%">
    <h2>Add Images to "{{ $folder->folder_name }}"</h2>

    <form method="POST" action="{{ route('admin.gallery.addImages', $folder->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="admin-form-group">
            <div class="admin-upload" id="dropZone" onclick="document.getElementById('imgFiles').click()"
                 ondragover="event.preventDefault();this.style.borderColor='var(--teal)'"
                 ondragleave="this.style.borderColor='#e87722'"
                 ondrop="handleDrop(event)">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#e87722" stroke-width="1.5"><polyline points="16 16 12 12 8 16"/><line x1="12" y1="12" x2="12" y2="21"/><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"/></svg>
                <p style="font-size:15px;font-weight:600;margin-top:10px">Choose a file or drag &amp; drop it here</p>
                <p style="font-size:12px;color:var(--text-muted)">JPEG, JPG, and PNG formats, up to 5MB</p>
                <button type="button" class="btn-orange" style="margin-top:12px;font-size:13px;padding:8px 24px">Browse File</button>
            </div>
            <input type="file" id="imgFiles" name="images[]" accept="image/jpeg,image/jpg,image/png" multiple style="display:none"
                   onchange="previewImages(this.files)">
        </div>

        {{-- Preview table --}}
        <div id="previewSection" style="display:none;margin-top:20px">
            <table class="admin-table">
                <thead><tr><th>#</th><th>Image</th><th>Action</th></tr></thead>
                <tbody id="previewBody"></tbody>
            </table>
            <div style="margin-top:20px;display:flex;gap:14px">
                <button type="submit" class="btn-teal" style="padding:12px 40px">Save</button>
                <a href="{{ route('admin.gallery.index') }}" class="btn-outline-red" style="padding:12px 40px">Cancel</a>
            </div>
        </div>
    </form>

    {{-- Existing images --}}
    @if($folder->images->count())
    <div style="margin-top:40px">
        <h3 style="font-size:18px;font-weight:700;margin-bottom:16px">Existing Images ({{ $folder->images->count() }})</h3>
        <div class="gallery-grid">
            @foreach($folder->images as $img)
            <div class="gallery-thumb" style="position:relative">
                <img src="{{ asset('storage/'.$img->image_path) }}" alt="Image" onerror="this.src='https://placehold.co/200x150/eee/999?text=No+Image'">
                <form method="POST" action="{{ route('admin.gallery.deleteImage', $img->id) }}"
                      onsubmit="return confirm('Delete this image?')"
                      style="position:absolute;top:6px;right:6px">
                    @csrf @method('DELETE')
                    <button type="submit" style="background:rgba(231,76,60,.85);border:none;color:#fff;border-radius:50%;width:26px;height:26px;font-size:16px;cursor:pointer;display:flex;align-items:center;justify-content:center">✕</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
let selectedFiles = [];

function previewImages(files) {
    selectedFiles = Array.from(files);
    const body = document.getElementById('previewBody');
    body.innerHTML = '';
    selectedFiles.forEach((f, i) => {
        const reader = new FileReader();
        reader.onload = e => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${i+1}</td>
                <td><img src="${e.target.result}" style="height:70px;border-radius:8px;object-fit:cover"></td>
                <td><button type="button" onclick="removePreview(${i})" style="background:none;border:none;color:#e74c3c;cursor:pointer;font-size:20px">🗑</button></td>`;
            tr.id = 'prev-'+i;
            body.appendChild(tr);
        };
        reader.readAsDataURL(f);
    });
    document.getElementById('previewSection').style.display = selectedFiles.length ? 'block' : 'none';
}

function removePreview(i) {
    document.getElementById('prev-'+i).remove();
    selectedFiles.splice(i,1);
    if(!selectedFiles.length) document.getElementById('previewSection').style.display='none';
}

function handleDrop(e) {
    e.preventDefault();
    document.getElementById('dropZone').style.borderColor='#e87722';
    previewImages(e.dataTransfer.files);
}
</script>
@endpush
@endsection
