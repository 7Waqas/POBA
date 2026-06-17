{{-- FILE: resources/views/admin/events/edit.blade.php --}}
@extends('layouts.admin')
@section('title','Edit Event - Admin')
@section('page-title','Edit Event')
@section('content')

<div style="margin-bottom:16px">
    <a href="{{ route('admin.events.index') }}" style="color:var(--text-muted);font-size:14px;text-decoration:none">← Back</a>
</div>

<div class="admin-form-page">
    <h2>Edit Event</h2>
    <form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Event Title: *</label>
                <input type="text" name="title" class="admin-input" value="{{ old('title', $event->title) }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Registration Required: *</label>
                <div style="display:flex;gap:24px;margin-top:10px">
                    <label style="display:flex;align-items:center;gap:8px;font-size:14px;cursor:pointer">
                        <input type="radio" name="registration_required" value="1" {{ $event->registration_required ? 'checked' : '' }}> Yes
                    </label>
                    <label style="display:flex;align-items:center;gap:8px;font-size:14px;cursor:pointer">
                        <input type="radio" name="registration_required" value="0" {{ !$event->registration_required ? 'checked' : '' }}> No
                    </label>
                </div>
            </div>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Description: *</label>
            <textarea name="description" class="admin-input" rows="4">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="admin-form-row" style="grid-template-columns:1fr 1fr 1fr 1fr">
            <div class="admin-form-group">
                <label class="admin-form-label">Start Date: *</label>
                <input type="date" name="start_date" class="admin-input" value="{{ old('start_date', $event->start_date) }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">End Date: *</label>
                <input type="date" name="end_date" class="admin-input" value="{{ old('end_date', $event->end_date) }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Start Time: *</label>
                <input type="time" name="start_time" class="admin-input" value="{{ old('start_time', $event->start_time) }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">End Time:</label>
                <input type="time" name="end_time" class="admin-input" value="{{ old('end_time', $event->end_time) }}">
            </div>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Location: *</label>
            <input type="text" name="location" class="admin-input" value="{{ old('location', $event->location) }}" required>
        </div>

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Focal Person Name: *</label>
                <input type="text" name="focal_person_name" class="admin-input" value="{{ old('focal_person_name', $event->focal_person_name) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Focal Person Number: *</label>
                <input type="text" name="focal_person_number" class="admin-input" value="{{ old('focal_person_number', $event->focal_person_number) }}">
            </div>
        </div>

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Entry Range:</label>
                <div style="display:flex;gap:10px;align-items:center">
                    <input type="number" name="entry_from" class="admin-input" placeholder="from" min="1" max="30"
                           value="{{ old('entry_from', $event->entry_batches ? min($event->entry_batches) : '') }}" style="width:80px">
                    <span>to</span>
                    <input type="number" name="entry_to" class="admin-input" placeholder="to" min="1" max="30"
                           value="{{ old('entry_to', $event->entry_batches ? max($event->entry_batches) : '') }}" style="width:80px">
                </div>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Upload Event Logo:</label>
                @if($event->logo)
                    <img src="{{ asset('storage/'.$event->logo) }}" alt="logo" style="height:50px;border-radius:6px;margin-bottom:8px;display:block">
                @endif
                <div class="admin-upload" onclick="document.getElementById('logoFile').click()">
                    <span style="font-size:20px">➕</span>
                    <p>Replace logo (optional)</p>
                </div>
                <input type="file" id="logoFile" name="logo" accept="image/*" style="display:none" onchange="document.getElementById('logoName').textContent='✓ '+this.files[0].name">
                <p id="logoName" style="font-size:12px;color:var(--teal);margin-top:6px"></p>
            </div>
        </div>

        <div style="display:flex;gap:14px;margin-top:10px">
            <button type="submit" class="btn-teal" style="padding:12px 40px">Update</button>
            <a href="{{ route('admin.events.index') }}" class="btn-outline-red" style="padding:12px 40px">Cancel</a>
        </div>
    </form>
</div>
@endsection
