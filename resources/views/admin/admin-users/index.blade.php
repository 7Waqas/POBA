{{-- FILE: resources/views/admin/admin-users/index.blade.php --}}
@extends('layouts.admin')
@section('title','Admin Users - POBA')
@section('page-title','Admin Users')
@section('content')

<div class="admin-table-wrap">
    <div class="admin-table-toolbar">
        <form method="GET" action="{{ route('admin.admin-users.index') }}">
            <input type="text" name="search" class="search-input"
                   placeholder="Search by name or email"
                   value="{{ request('search') }}" style="width:260px">
        </form>
        <div style="display:flex;gap:10px;align-items:center">
            <a href="{{ route('admin.admin-users.create') }}"
               class="btn-teal" style="font-size:13px;padding:9px 20px">
                + Add Admin User
            </a>
        </div>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Role</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($admins as $admin)
            <tr>
                <td>
                    <div style="display:flex;align-items:center;gap:10px">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($admin->name) }}&background=1a7a7a&color=fff&size=32"
                             style="width:32px;height:32px;border-radius:50%">
                        <span style="font-weight:600">{{ $admin->name }}</span>
                    </div>
                </td>
                <td>{{ $admin->gender ?? '-' }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    @if($admin->isSuperAdmin())
                        <span class="badge" style="background:#fff3e0;color:#e87722;border:1px solid #e87722">
                            ★ Super Admin
                        </span>
                    @else
                        <span class="badge badge-info">Admin</span>
                    @endif
                </td>
                <td>
                    @if($admin->isSuperAdmin())
                        <span style="font-size:12px;color:var(--teal);font-weight:600">All Access</span>
                    @elseif($admin->permissions && count($admin->permissions))
                        <div style="display:flex;flex-wrap:wrap;gap:4px">
                            @foreach($admin->permissions as $perm)
                                <span style="background:var(--teal-light);color:var(--teal);font-size:11px;padding:2px 8px;border-radius:10px;font-weight:600">
                                    {{ ucfirst(str_replace('_',' ',$perm)) }}
                                </span>
                            @endforeach
                        </div>
                    @else
                        <span style="font-size:12px;color:#aaa">No permissions</span>
                    @endif
                </td>
                <td>
                    <div class="action-icons">
                        <a href="{{ route('admin.admin-users.edit', $admin->id) }}"
                           class="btn-edit" title="Edit">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                            </svg>
                        </a>
                        @if($admin->id !== auth()->id())
                        <form method="POST"
                              action="{{ route('admin.admin-users.destroy', $admin->id) }}"
                              onsubmit="return confirm('Delete admin user {{ $admin->name }}?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete" title="Delete">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2">
                                    <polyline points="3 6 5 6 21 6"/>
                                    <path d="M19 6l-1 14H6L5 6"/>
                                    <path d="M10 11v6"/><path d="M14 11v6"/>
                                    <path d="M9 6V4h6v2"/>
                                </svg>
                            </button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center;padding:50px;color:var(--text-muted)">
                    No admin users found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="admin-table-footer">
        <div>
            Result per page
            <select style="border:1px solid var(--border);border-radius:6px;
                           padding:4px 8px;margin-left:8px;font-size:13px">
                <option>10</option><option>25</option><option>50</option>
            </select>
        </div>
        <div>{{ $admins->links('vendor.pagination.simple-default') }}</div>
        <div>{{ $admins->firstItem() ?? 0 }}–{{ $admins->lastItem() ?? 0 }}
             of {{ $admins->total() }}</div>
    </div>
</div>
@endsection
