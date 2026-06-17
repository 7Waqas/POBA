{{-- FILE: resources/views/admin/events/index.blade.php --}}
@extends('layouts.admin')
@section('title','Events - Admin')
@section('page-title','Events')
@section('content')
<div class="admin-table-wrap">
    <div class="admin-table-toolbar">
        <form method="GET" action="{{ route('admin.events.index') }}">
            <input type="text" name="search" class="search-input" placeholder="Search" value="{{ request('search') }}" style="width:260px">
        </form>
        <div style="display:flex;gap:10px">
            <a href="{{ route('admin.events.create') }}" class="btn-teal" style="font-size:13px;padding:9px 20px">+ Add Event</a>
        </div>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Title <span class="sort-icon">⇅</span></th>
                <th>Location <span class="sort-icon">⇅</span></th>
                <th>Start Date <span class="sort-icon">⇅</span></th>
                <th>End Date <span class="sort-icon">⇅</span></th>
                <th>Start Time <span class="sort-icon">⇅</span></th>
                <th>End Time <span class="sort-icon">⇅</span></th>
                <th>Entry <span class="sort-icon">⇅</span></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $ev)
            <tr>
                <td>{{ $ev->title }}</td>
                <td>{{ $ev->location }}</td>
                <td>{{ $ev->start_date }}</td>
                <td>{{ $ev->end_date }}</td>
                <td>{{ $ev->start_time }}</td>
                <td>{{ $ev->end_time }}</td>
                <td>{{ $ev->entry_batches ? implode(', ', $ev->entry_batches) : '-' }}</td>
                <td>
                    <div class="action-icons">
                        <a href="{{ route('admin.events.participants', $ev->id) }}" class="btn-view" title="Participants">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                        </a>
                        <a href="{{ route('admin.events.edit', $ev->id) }}" class="btn-edit" title="Edit">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        </a>
                        <form method="POST" action="{{ route('admin.events.destroy', $ev->id) }}" onsubmit="return confirm('Delete this event?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete" title="Delete">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="8" style="text-align:center;padding:40px;color:var(--text-muted)">No events found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="admin-table-footer">
        <div>{{ $events->links('vendor.pagination.simple-default') }}</div>
        <div>{{ $events->firstItem() ?? 0 }}-{{ $events->lastItem() ?? 0 }} of {{ $events->total() }}</div>
    </div>
</div>
@endsection
