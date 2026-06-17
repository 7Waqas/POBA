{{-- FILE: resources/views/customer/alumni/show.blade.php --}}
@extends('layouts.app')
@section('title', $alumni->full_name . ' - POBA')
@section('content')

<section class="section-pad">
    <div class="container">
        <div style="display:flex;gap:40px;align-items:flex-start;flex-wrap:wrap">
            {{-- Sidebar --}}
            <div style="min-width:200px;text-align:center">
                <img src="{{ $alumni->profile_photo ? asset('storage/'.$alumni->profile_photo) : 'https://placehold.co/160x160/1a7a7a/fff?text='.urlencode(substr($alumni->full_name,0,1)) }}"
                     alt="{{ $alumni->full_name }}" style="width:160px;height:160px;border-radius:12px;object-fit:cover;margin-bottom:14px">
            </div>

            {{-- Main Info --}}
            <div style="flex:1;min-width:300px">
                <h1 style="font-size:2rem;font-weight:700;color:var(--teal);margin-bottom:4px">{{ $alumni->full_name }}</h1>
                <p style="font-weight:700;font-size:16px;margin-bottom:4px">{{ $alumni->current_designation }} - {{ $alumni->current_organization }}</p>
                <p style="color:var(--text-muted);margin-bottom:14px">Class of {{ $alumni->class_year }}</p>

                <div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:10px;margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border)">
                    @if(!in_array('phone', $alumni->privacy_settings ?? []))
                    <span style="font-size:14px;display:flex;align-items:center;gap:6px">📞 {{ $alumni->phone_number }}</span>
                    @endif
                    @if(!in_array('email', $alumni->privacy_settings ?? []))
                    <span style="font-size:14px;display:flex;align-items:center;gap:6px">✉️ {{ $alumni->email }}</span>
                    @endif
                </div>

                @if($alumni->featured_text)
                <div style="margin-bottom:20px">
                    <h3 style="font-size:15px;font-weight:700;margin-bottom:8px">Featured Text</h3>
                    <p style="font-size:14px;color:var(--text-muted);line-height:1.8">{{ $alumni->featured_text }}</p>
                </div>
                @endif

                <div class="grid-4" style="gap:20px;margin-bottom:20px">
                    <div><p style="font-size:12px;color:var(--text-muted);margin-bottom:2px">Entry</p><p style="font-weight:600">{{ $alumni->entry }}</p></div>
                    <div><p style="font-size:12px;color:var(--text-muted);margin-bottom:2px">CCP No.</p><p style="font-weight:600">{{ $alumni->ccp_no }}</p></div>
                    <div><p style="font-size:12px;color:var(--text-muted);margin-bottom:2px">House</p><p style="font-weight:600">{{ $alumni->house }}</p></div>
                    <div><p style="font-size:12px;color:var(--text-muted);margin-bottom:2px">Education</p><p style="font-weight:600">{{ $alumni->education }}</p></div>
                    <div><p style="font-size:12px;color:var(--text-muted);margin-bottom:2px">Field of Study</p><p style="font-weight:600">{{ $alumni->field_of_study }}</p></div>
                    <div><p style="font-size:12px;color:var(--text-muted);margin-bottom:2px">Field of Work</p><p style="font-weight:600">{{ $alumni->field_of_work }}</p></div>
                    @if(!in_array('city', $alumni->privacy_settings ?? []))
                    <div><p style="font-size:12px;color:var(--text-muted);margin-bottom:2px">Current City</p><p style="font-weight:600">{{ $alumni->current_city }}</p></div>
                    @endif
                    <div><p style="font-size:12px;color:var(--text-muted);margin-bottom:2px">Current Country</p><p style="font-weight:600">{{ $alumni->current_country }}</p></div>
                </div>

                @if($alumni->achievements)
                <div>
                    <h3 style="font-size:15px;font-weight:700;margin-bottom:8px">Achievements</h3>
                    <p style="font-size:14px;color:var(--text-muted);line-height:1.8">{{ $alumni->achievements }}</p>
                </div>
                @endif
            </div>
        </div>

        <div style="margin-top:30px">
            <a href="{{ url()->previous() }}" class="btn-outline-teal">← Back</a>
        </div>
    </div>
</section>
@endsection
