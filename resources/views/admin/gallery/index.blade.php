{{-- FILE: resources/views/admin/gallery/index.blade.php --}}
@extends('layouts.admin')
@section('title','Gallery - Admin')
@section('page-title','Gallery')
@section('content')

<div class="admin-table-wrap">
    <div class="admin-table-toolbar">
        <form method="GET" action="{{ route('admin.gallery.index') }}">
            <input type="text" name="search" class="search-input" placeholder="Search" value="{{ request('search') }}" style="width:260px">
        </form>
        <div style="display:flex;gap:10px">
            <a href="{{ route('admin.gallery.create') }}" class="btn-teal" style="font-size:13px;padding:9px 20px">+ Add Folder</a>
        </div>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Folder Name <span class="sort-icon">⇅</span></th>
                <th>Type <span class="sort-icon">⇅</span></th>
                <th>Class Year <span class="sort-icon">⇅</span></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($folders as $folder)
            <tr>
                <td>{{ $folder->folder_name }}</td>
                <td>{{ $folder->type }}</td>
                <td>{{ $folder->class_year }}</td>
                <td>
                    <div class="action-icons">
                        <a href="{{ route('admin.gallery.images', $folder->id) }}" class="btn-view" title="View Images">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </a>
                        <a href="{{ route('admin.gallery.edit', $folder->id) }}" class="btn-edit" title="Edit">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        </a>
                        <form method="POST" action="{{ route('admin.gallery.destroy', $folder->id) }}" onsubmit="return confirm('Delete this folder and all its images?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete" title="Delete">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align:center;padding:40px;color:var(--text-muted)">No gallery folders found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="admin-table-footer">
        <div>{{ $folders->links('vendor.pagination.simple-default') }}</div>
        <div>{{ $folders->firstItem() ?? 0 }}-{{ $folders->lastItem() ?? 0 }} of {{ $folders->total() }}</div>
    </div>
</div>
@endsection
