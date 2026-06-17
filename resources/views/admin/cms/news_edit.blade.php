{{-- FILE: resources/views/admin/cms/news_edit.blade.php --}}
@extends('layouts.admin')
@section('title','Edit News - Admin')
@section('page-title','Content Management')
@section('content')

@include('admin.cms._tabs', ['active' => 'news'])

<div style="margin-bottom:16px">
    <a href="{{ route('admin.cms.news') }}" style="color:var(--text-muted);font-size:14px;text-decoration:none">← Back to News</a>
</div>

<div class="admin-form-page">
    <h2>Edit News</h2>
    <form method="POST" action="{{ route('admin.cms.news.update', $item->id) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Image:</label>
                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" alt="News" style="height:60px;border-radius:8px;display:block;margin-bottom:8px">
                @endif
                <div class="admin-upload" onclick="document.getElementById('newsImg').click()">
                    <span>➕</span><p style="font-size:12px">Replace Image (optional)</p>
                </div>
                <input type="file" id="newsImg" name="image" accept="image/*" style="display:none"
                       onchange="document.getElementById('imgName').textContent='✓ '+this.files[0].name">
                <p id="imgName" style="font-size:12px;color:var(--teal);margin-top:4px"></p>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Type:</label>
                <input type="text" name="type" class="admin-input" value="{{ old('type', $item->type) }}" placeholder="Para Inclusive Sailing">
            </div>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Title: *</label>
            <input type="text" name="title" class="admin-input" value="{{ old('title', $item->title) }}" required>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Description:</label>
            <textarea name="description" class="admin-input" rows="8">{{ old('description', $item->description) }}</textarea>
        </div>

        <div style="display:flex;gap:14px;margin-top:10px">
            <button type="submit" class="btn-teal" style="padding:12px 40px">Save</button>
            <a href="{{ route('admin.cms.news') }}" class="btn-outline-red" style="padding:12px 40px">Cancel</a>
        </div>
    </form>
</div>
@endsection
