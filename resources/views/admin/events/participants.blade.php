{{-- FILE: resources/views/admin/events/participants.blade.php --}}
@extends('layouts.admin')
@section('title','Participants - Admin')
@section('page-title','Event Participants')
@section('content')

<div style="margin-bottom:16px">
    <a href="{{ route('admin.events.index') }}" style="color:var(--text-muted);font-size:14px;text-decoration:none">← Back</a>
</div>

<div class="admin-table-wrap">
    <div style="padding:20px 24px 16px">
        <h2 style="font-size:22px;font-weight:700">{{ $event->title }} Participants</h2>
        <p style="font-size:14px;color:var(--text-muted)">{{ $event->start_date }} - {{ $event->end_date }}</p>
    </div>

    <div class="admin-table-toolbar">
        <input type="text" class="search-input" placeholder="Search" style="width:260px" oninput="filterTable(this.value)">
        <a href="{{ route('admin.events.index') }}" class="btn-outline-teal" style="font-size:13px;padding:8px 18px">⬆ Export</a>
    </div>

    <table class="admin-table" id="partTable">
        <thead>
            <tr>
                <th>Name <span class="sort-icon">⇅</span></th>
                <th>Email <span class="sort-icon">⇅</span></th>
                <th>Entry <span class="sort-icon">⇅</span></th>
                <th>Phone Number <span class="sort-icon">⇅</span></th>
                <th>CCP No. <span class="sort-icon">⇅</span></th>
                <th>City <span class="sort-icon">⇅</span></th>
                <th>Status <span class="sort-icon">⇅</span></th>
            </tr>
        </thead>
        <tbody>
            @forelse($participants as $p)
            <tr>
                <td>{{ $p->alumniUser->full_name ?? 'N/A' }}</td>
                <td>{{ $p->alumniUser->email ?? 'N/A' }}</td>
                <td>{{ $p->alumniUser->entry ?? '-' }}</td>
                <td>{{ $p->alumniUser->phone_number ?? '-' }}</td>
                <td>{{ $p->alumniUser->ccp_no ?? '-' }}</td>
                <td>{{ $p->alumniUser->current_city ?? '-' }}</td>
                <td>
                    <span class="badge {{ $p->status === 'confirmed' ? 'badge-success' : ($p->status === 'pending' ? 'badge-warning' : 'badge-danger') }}">
                        {{ ucfirst($p->status) }}
                    </span>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;padding:40px;color:var(--text-muted)">No participants yet.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="admin-table-footer">
        <div>{{ $participants->links('vendor.pagination.simple-default') }}</div>
        <div>{{ $participants->firstItem() ?? 0 }}-{{ $participants->lastItem() ?? 0 }} of {{ $participants->total() }}</div>
    </div>
</div>

@push('scripts')
<script>
function filterTable(val) {
    const rows = document.querySelectorAll('#partTable tbody tr');
    val = val.toLowerCase();
    rows.forEach(r => {
        r.style.display = r.textContent.toLowerCase().includes(val) ? '' : 'none';
    });
}
</script>
@endpush
@endsection
