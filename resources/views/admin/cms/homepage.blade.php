{{-- FILE: resources/views/admin/cms/homepage.blade.php --}}
@extends('layouts.admin')
@section('title','CMS Homepage - Admin')
@section('page-title','Content Management')
@section('content')

@include('admin.cms._tabs', ['active' => 'homepage'])

<form method="POST" action="{{ route('admin.cms.homepage.save') }}" enctype="multipart/form-data">
    @csrf

    {{-- Hero Image --}}
    <div style="background:#fff;border-radius:var(--radius);padding:28px;margin-bottom:24px;box-shadow:var(--shadow)">
        <div class="cms-section-title">Hero Image</div>

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Title: *</label>
                <input type="text" name="hero_title" class="admin-input" value="{{ $settings['hero_title'] ?? 'Welcome to POBA Alumni Network' }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Tagline: *</label>
                <input type="text" name="hero_tagline" class="admin-input" value="{{ $settings['hero_tagline'] ?? 'Serving With Valour' }}" required>
            </div>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Description: *</label>
            <textarea name="hero_description" class="admin-input" rows="3">{{ $settings['hero_description'] ?? '' }}</textarea>
        </div>

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Button Text:</label>
                <input type="text" name="hero_btn_text" class="admin-input" value="{{ $settings['hero_btn_text'] ?? 'Become a Member' }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Button URL:</label>
                <input type="url" name="hero_btn_url" class="admin-input" value="{{ $settings['hero_btn_url'] ?? '' }}" placeholder="https://...">
            </div>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Upload Image: *</label>
            @if(!empty($settings['hero_image']))
                <img src="{{ asset('storage/'.$settings['hero_image']) }}" alt="Hero" style="height:80px;border-radius:8px;display:block;margin-bottom:8px">
            @endif
            <div class="admin-upload" onclick="document.getElementById('heroImg').click()">
                <span style="font-size:20px">➕</span>
                <p>Drag &amp; Drop files here or click to select file(s)</p>
            </div>
            <input type="file" id="heroImg" name="hero_image" accept="image/*" style="display:none" onchange="document.getElementById('heroName').textContent='✓ '+this.files[0].name">
            <p id="heroName" style="font-size:12px;color:var(--teal);margin-top:4px"></p>
        </div>

        <a href="#" onclick="return false" style="font-size:13px;color:var(--teal);font-weight:600">+ Add slide</a>
    </div>

    {{-- About Section --}}
    <div style="background:#fff;border-radius:var(--radius);padding:28px;margin-bottom:24px;box-shadow:var(--shadow)">
        <div class="cms-section-title">About Section</div>

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Title: *</label>
                <input type="text" name="about_title" class="admin-input" value="{{ $settings['about_title'] ?? 'About POBA' }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Upload Image: *</label>
                @if(!empty($settings['about_image']))
                    <img src="{{ asset('storage/'.$settings['about_image']) }}" alt="About" style="height:50px;border-radius:6px;display:block;margin-bottom:6px">
                @endif
                <div class="admin-upload" onclick="document.getElementById('aboutImg').click()">
                    <span style="font-size:18px">➕</span>
                    <p style="font-size:12px">Click to upload</p>
                </div>
                <input type="file" id="aboutImg" name="about_image" accept="image/*" style="display:none" onchange="document.getElementById('aboutName').textContent='✓ '+this.files[0].name">
                <p id="aboutName" style="font-size:12px;color:var(--teal);margin-top:4px"></p>
            </div>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Description: *</label>
            <textarea name="about_description" class="admin-input" rows="4">{{ $settings['about_description'] ?? '' }}</textarea>
        </div>

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Button Text:</label>
                <input type="text" name="about_btn_text" class="admin-input" value="{{ $settings['about_btn_text'] ?? 'Become a Member' }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Button URL:</label>
                <input type="url" name="about_btn_url" class="admin-input" value="{{ $settings['about_btn_url'] ?? '' }}" placeholder="https://...">
            </div>
        </div>
    </div>

    <div style="display:flex;gap:14px">
        <button type="submit" class="btn-teal" style="padding:12px 40px">Save</button>
        <button type="reset" class="btn-outline-red" style="padding:12px 40px">Cancel</button>
    </div>
</form>
@endsection
