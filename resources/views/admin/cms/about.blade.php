{{-- FILE: resources/views/admin/cms/about.blade.php --}}
@extends('layouts.admin')
@section('title','CMS About Us - Admin')
@section('page-title','Content Management')
@section('content')

@include('admin.cms._tabs', ['active' => 'about'])

<form method="POST" action="{{ route('admin.cms.about.save') }}" enctype="multipart/form-data">
    @csrf

    {{-- Our Mission --}}
    <div style="background:#fff;border-radius:var(--radius);padding:28px;margin-bottom:24px;box-shadow:var(--shadow)">
        <div class="cms-section-title">Our Mission</div>

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Title: *</label>
                <input type="text" name="mission_title" class="admin-input" value="{{ $settings['mission_title'] ?? 'Our Mission' }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Upload Image: *</label>
                @if(!empty($settings['mission_image']))
                    <img src="{{ asset('storage/'.$settings['mission_image']) }}" alt="Mission" style="height:50px;border-radius:6px;display:block;margin-bottom:6px">
                @endif
                <div class="admin-upload" onclick="document.getElementById('missImg').click()">
                    <span style="font-size:18px">➕</span><p style="font-size:12px">Click to upload</p>
                </div>
                <input type="file" id="missImg" name="mission_image" accept="image/*" style="display:none">
            </div>
        </div>

        <div class="admin-form-group">
            <label class="admin-form-label">Description:</label>
            <textarea name="mission_description" class="admin-input" rows="4">{{ $settings['mission_description'] ?? '' }}</textarea>
        </div>
    </div>

    {{-- Our History / Timeline --}}
    <div style="background:#fff;border-radius:var(--radius);padding:28px;margin-bottom:24px;box-shadow:var(--shadow)">
        <div class="cms-section-title">Second Section (Our History)</div>

        <div class="admin-form-row">
            <div class="admin-form-group">
                <label class="admin-form-label">Title: *</label>
                <input type="text" name="history_title" class="admin-input" value="{{ $settings['history_title'] ?? 'Our History' }}" required>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Description:</label>
                <input type="text" name="history_description" class="admin-input" value="{{ $settings['history_description'] ?? 'Milestones in POBA\'s journey of excellence' }}">
            </div>
        </div>

        <div id="timelineRows">
            @php
            $tl = json_decode($settings['history_timeline'] ?? '[]', true);
            if(empty($tl)) $tl = [
                ['year'=>'1947','heading'=>'Foundation Era','description'=>'Establishment of Pakistan Navy and the beginning of naval education traditions.'],
                ['year'=>'1965','heading'=>'First Alumni Network','description'=>'Formation of the first organized alumni association.'],
            ];
            @endphp
            @foreach($tl as $i => $row)
            <div class="admin-form-row" id="tlRow-{{ $i }}" style="align-items:flex-start;gap:14px;margin-bottom:12px">
                <div class="admin-form-group" style="max-width:120px">
                    <label class="admin-form-label">Year:</label>
                    <input type="text" name="years[]" class="admin-input" value="{{ $row['year'] }}" placeholder="1947">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Heading:</label>
                    <input type="text" name="headings[]" class="admin-input" value="{{ $row['heading'] }}" placeholder="Foundation Era">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Description:</label>
                    <input type="text" name="descriptions[]" class="admin-input" value="{{ $row['description'] }}" placeholder="Description...">
                </div>
                <div style="padding-top:28px">
                    <button type="button" onclick="this.closest('.admin-form-row').remove()" style="background:none;border:none;color:#e74c3c;cursor:pointer;font-size:18px">🗑</button>
                </div>
            </div>
            @endforeach
        </div>

        <a href="#" onclick="addTimelineRow(); return false;" style="font-size:13px;color:var(--teal);font-weight:600">+ Add row</a>
    </div>

    <div style="display:flex;gap:14px">
        <button type="submit" class="btn-teal" style="padding:12px 40px">Save</button>
        <button type="reset" class="btn-outline-red" style="padding:12px 40px">Cancel</button>
    </div>
</form>

@push('scripts')
<script>
let tlCount = {{ count($tl) }};
function addTimelineRow() {
    const i = tlCount++;
    const html = `<div class="admin-form-row" id="tlRow-${i}" style="align-items:flex-start;gap:14px;margin-bottom:12px">
        <div class="admin-form-group" style="max-width:120px">
            <label class="admin-form-label">Year:</label>
            <input type="text" name="years[]" class="admin-input" placeholder="1947">
        </div>
        <div class="admin-form-group">
            <label class="admin-form-label">Heading:</label>
            <input type="text" name="headings[]" class="admin-input" placeholder="Era Name">
        </div>
        <div class="admin-form-group">
            <label class="admin-form-label">Description:</label>
            <input type="text" name="descriptions[]" class="admin-input" placeholder="Description...">
        </div>
        <div style="padding-top:28px">
            <button type="button" onclick="this.closest('.admin-form-row').remove()" style="background:none;border:none;color:#e74c3c;cursor:pointer;font-size:18px">🗑</button>
        </div>
    </div>`;
    document.getElementById('timelineRows').insertAdjacentHTML('beforeend', html);
}
</script>
@endpush
@endsection
