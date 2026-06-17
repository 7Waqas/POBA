{{-- FILE: resources/views/admin/cms/news.blade.php --}}
@extends('layouts.admin')
@section('title','CMS News - Admin')
@section('page-title','Content Management')
@section('content')

@include('admin.cms._tabs', ['active' => 'news'])

<div class="admin-table-wrap">
    <div class="admin-table-toolbar">
        <form method="GET" action="{{ route('admin.cms.news') }}" style="display:flex;gap:10px">
            <input type="text" name="search" class="search-input" placeholder="Search" value="{{ request('search') }}" style="width:220px">
            <select name="type" class="filter-select">
                <option value="">Type</option>
                @foreach(['Para Inclusive Sailing','Conference','Public','News'] as $t)
                <option value="{{ $t }}" {{ request('type')==$t ? 'selected' : '' }}>{{ $t }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn-teal" style="font-size:13px;padding:8px 16px">Filter</button>
        </form>
        <div style="display:flex;gap:10px">
            <a href="#" onclick="document.getElementById('addNewsModal').classList.add('open');return false" class="btn-teal" style="font-size:13px;padding:9px 20px">+ Add News</a>
        </div>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Title <span class="sort-icon">⇅</span></th>
                <th>Type <span class="sort-icon">⇅</span></th>
                <th>Description <span class="sort-icon">⇅</span></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ Str::limit(strip_tags($item->description), 80) }}</td>
                <td>
                    <div class="action-icons">
                        <a href="{{ route('news.show', $item->id) }}" target="_blank" class="btn-view" title="View">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </a>
                        <a href="{{ route('admin.cms.news.edit', $item->id) }}" class="btn-edit" title="Edit">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        </a>
                        <form method="POST" action="{{ route('admin.cms.news.delete', $item->id) }}" onsubmit="return confirm('Delete this news?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete" title="Delete">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align:center;padding:40px;color:var(--text-muted)">No news found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="admin-table-footer">
        <div>{{ $news->links('vendor.pagination.simple-default') }}</div>
        <div>{{ $news->firstItem() ?? 0 }}-{{ $news->lastItem() ?? 0 }} of {{ $news->total() }}</div>
    </div>
</div>

{{-- Add News Modal --}}
<div class="modal-overlay" id="addNewsModal">
    <div class="modal-box" style="max-width:700px;width:95%">
        <button class="modal-close" onclick="document.getElementById('addNewsModal').classList.remove('open')">✕</button>
        <h3>Add News</h3>
        <form method="POST" action="{{ route('admin.cms.news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="admin-form-row">
                <div class="admin-form-group">
                    <label class="admin-form-label">Image:</label>
                    <div class="admin-upload" onclick="document.getElementById('newsImg').click()">
                        <span>➕</span><p style="font-size:12px">Upload Image</p>
                    </div>
                    <input type="file" id="newsImg" name="image" accept="image/*" style="display:none">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Type:</label>
                    <input type="text" name="type" class="admin-input" placeholder="Para Inclusive Sailing">
                </div>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Title 1:</label>
                <input type="text" name="title" class="admin-input" placeholder="News title..." required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Description:</label>
                <textarea name="description" class="admin-input" rows="5" placeholder="News content..."></textarea>
            </div>
            <div style="display:flex;gap:12px;margin-top:16px">
                <button type="submit" class="btn-teal">Save</button>
                <button type="button" class="btn-outline-red" onclick="document.getElementById('addNewsModal').classList.remove('open')">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection
