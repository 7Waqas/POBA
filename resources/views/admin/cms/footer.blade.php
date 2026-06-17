{{-- FILE: resources/views/admin/cms/footer.blade.php --}}
@extends('layouts.admin')
@section('title','Footer Settings - Admin')
@section('page-title','Footer Settings')
@section('content')

<div class="admin-form-page">
    <h2>Footer Settings</h2>
    <form method="POST" action="{{ route('admin.cms.footer.save') }}">
        @csrf
        <div class="admin-form-group">
            <label class="admin-form-label">Copyright Text:</label>
            <input type="text" name="copyright_text" class="admin-input" value="{{ $settings['footer_copyright'] ?? '© 2025. All rights reserved.' }}" placeholder="© 2025. All rights reserved.">
        </div>
        <div style="display:flex;gap:14px;margin-top:10px">
            <button type="submit" class="btn-teal" style="padding:12px 40px">Save</button>
            <button type="reset" class="btn-outline-red" style="padding:12px 40px">Cancel</button>
        </div>
    </form>
</div>
@endsection
