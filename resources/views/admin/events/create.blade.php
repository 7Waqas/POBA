{{-- FILE: resources/views/admin/events/create.blade.php --}}
@extends('layouts.admin')
@section('title','Create Event - Admin')
@section('page-title','Create an Event')
@section('content')

<div style="margin-bottom:16px">
    <a href="{{ route('admin.events.index') }}" style="color:var(--text-muted);font-size:14px;text-decoration:none">← Back</a>
</div>

<div class="admin-form-page">
    <h2>Create an Event</h2>
    <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Event Title: *</label>
                <input type="text" name="title" class="admin-input" placeholder="Sailing Event" value="{{ old('title') }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Registration Required: *</label>
                <div style="display:flex;gap:24px;margin-top:10px">
                    <label style="display:flex;align-items:center;gap:8px;font-size:14px;cursor:pointer">
                        <input type="radio" name="registration_required" value="1" {{ old('registration_required')=='1' ? 'checked' : '' }}> Yes
                    </label>
                    <label style="display:flex;align-items:center;gap:8px;font-size:14px;cursor:pointer">
                        <input type="radio" name="registration_required" value="0" {{ old('registration_required','0')=='0' ? 'checked' : '' }}> No
                    </label>
                </div>
            </div>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Description: *</label>
            <textarea name="description" class="admin-input" rows="4" placeholder="Event description...">{{ old('description') }}</textarea>
        </div>

        <div class="admin-form-row" style="grid-template-columns:1fr 1fr 1fr 1fr">
            <div class="admin-form-group">
                <label class="admin-form-label">Start Date: *</label>
                <input type="date" name="start_date" class="admin-input" value="{{ old('start_date') }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">End Date: *</label>
                <input type="date" name="end_date" class="admin-input" value="{{ old('end_date') }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Start Time: *</label>
                <input type="time" name="start_time" class="admin-input" value="{{ old('start_time') }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">End Time:</label>
                <input type="time" name="end_time" class="admin-input" value="{{ old('end_time') }}">
            </div>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Location: *</label>
            <input type="text" name="location" class="admin-input" placeholder="Sailing Public Spot" value="{{ old('location') }}" required>
        </div>

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Focal Person Name: *</label>
                <input type="text" name="focal_person_name" class="admin-input" placeholder="Waleed Ahmed" value="{{ old('focal_person_name') }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Focal Person Number: *</label>
                <input type="text" name="focal_person_number" class="admin-input" placeholder="03454501450" value="{{ old('focal_person_number') }}">
            </div>
        </div>

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Entry: * <small style="color:var(--text-muted)">(from – to)</small></label>
                <div style="display:flex;gap:10px;align-items:center">
                    <input type="number" name="entry_from" class="admin-input" placeholder="1" min="1" max="30" value="{{ old('entry_from') }}" style="width:80px">
                    <span style="color:var(--text-muted)">to</span>
                    <input type="number" name="entry_to" class="admin-input" placeholder="10" min="1" max="30" value="{{ old('entry_to') }}" style="width:80px">
                </div>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Upload Event Logo: *</label>
                <div class="admin-upload" onclick="document.getElementById('logoFile').click()">
                    <span style="font-size:20px">➕</span>
                    <p>Drag &amp; Drop files here or click to select file(s)</p>
                </div>
                <input type="file" id="logoFile" name="logo" accept="image/*" style="display:none" onchange="document.getElementById('logoName').textContent='✓ '+this.files[0].name">
                <p id="logoName" style="font-size:12px;color:var(--teal);margin-top:6px"></p>
            </div>
        </div>

        <div style="display:flex;gap:14px;margin-top:10px">
            <button type="submit" class="btn-teal" style="padding:12px 40px">Publish</button>
            <a href="{{ route('admin.events.index') }}" class="btn-outline-red" style="padding:12px 40px">Cancel</a>
        </div>
    </form>
</div>
@endsection
