{{-- FILE: resources/views/customer/about.blade.php --}}
@extends('layouts.app')
@section('title','About Us - POBA')
@section('content')

{{-- Mission --}}
<section class="section-pad">
    <div class="container">
        <div class="grid-2" style="align-items:center;gap:50px">
            <div>
                <img src="{{ isset($settings['mission_image']) ? asset('storage/'.$settings['mission_image']) : asset('images/mission.jpg') }}"
                     alt="Our Mission" style="border-radius:16px;width:100%;object-fit:cover;max-height:360px"
                     onerror="this.src='https://placehold.co/600x360/1a7a7a/fff?text=Our+Mission'">
            </div>
            <div>
                <h2 class="section-title" style="text-align:left">{{ $settings['mission_title'] ?? 'Our Mission' }}</h2>
                <div style="width:60px;height:3px;background:var(--orange);margin-bottom:20px;border-radius:2px"></div>
                <p style="color:var(--text-muted);font-size:15px;line-height:1.8;margin-bottom:28px">
                    {{ $settings['mission_description'] ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' }}
                </p>
                <div class="stats-row">
                    <div class="stat-item">
                        <div style="width:44px;height:44px;background:var(--teal-light);border-radius:50%;display:flex;align-items:center;justify-content:center">🏅</div>
                        <div><div class="stat-heading">Excellence</div><div class="stat-subheading">In Service &amp; Leadership</div></div>
                    </div>
                    <div class="stat-item">
                        <div style="width:44px;height:44px;background:var(--teal-light);border-radius:50%;display:flex;align-items:center;justify-content:center">🌐</div>
                        <div><div class="stat-heading">Global Reach</div><div class="stat-subheading">Worldwide Presence</div></div>
                    </div>
                    <div class="stat-item">
                        <div style="width:44px;height:44px;background:var(--teal-light);border-radius:50%;display:flex;align-items:center;justify-content:center">🤝</div>
                        <div><div class="stat-heading">Community</div><div class="stat-subheading">Strong Alumni Network</div></div>
                    </div>
                    <div class="stat-item">
                        <div style="width:44px;height:44px;background:var(--teal-light);border-radius:50%;display:flex;align-items:center;justify-content:center">⚓</div>
                        <div><div class="stat-heading">Integrity</div><div class="stat-subheading">Honor &amp; Commitment</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- History Timeline --}}
<section class="section-pad" style="background:var(--bg-light)">
    <div class="container">
        <h2 class="section-title">{{ $settings['history_title'] ?? 'Our History' }}</h2>
        <p style="text-align:center;color:var(--text-muted);margin-bottom:50px">{{ $settings['history_description'] ?? 'Milestones in POBA\'s journey of excellence' }}</p>
        <div class="timeline">
            @php $defaultTimeline = [
                ['year'=>'1947','heading'=>'Foundation Era','description'=>'Establishment of Pakistan Navy and the beginning of naval education traditions.'],
                ['year'=>'1965','heading'=>'First Alumni Network','description'=>'Formation of the first organized alumni association.'],
                ['year'=>'1980','heading'=>'Formal Constitution','description'=>'POBA officially constituted with formal structure and governance framework.'],
                ['year'=>'1995','heading'=>'Modernization Phase','description'=>'Introduction of modern communication systems.'],
                ['year'=>'2010','heading'=>'Digital Transformation','description'=>'Launch of digital platforms for better alumni connectivity.'],
                ['year'=>'2025','heading'=>'New Horizons','description'=>'Comprehensive website launch and enhanced alumni engagement initiatives.'],
            ]; @endphp
            @foreach(($timeline && count($timeline) ? $timeline : $defaultTimeline) as $item)
            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">{{ $item['year'] }}</div>
                    <div class="timeline-heading">{{ $item['heading'] }}</div>
                    <div class="timeline-desc">{{ $item['description'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Our Verticals --}}
<section class="section-pad">
    <div class="container">
        <h2 class="section-title">Our Verticals</h2>
        <div class="verticals-grid">
            <div class="vertical-card">
                <h4>Executive Committee</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <a href="#" class="btn-teal" style="font-size:13px;padding:9px 22px">View Details</a>
            </div>
            <div class="vertical-card">
                <h4>Working Committees</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <a href="#" class="btn-teal" style="font-size:13px;padding:9px 22px">View Details</a>
            </div>
        </div>
        <div style="text-align:center;margin-top:40px">
            <p style="color:var(--text-muted);margin-bottom:14px">View photos from past committees and events</p>
            <a href="{{ route('gallery.index') }}" class="btn-outline-teal">📷 Photo Gallery</a>
        </div>
    </div>
</section>

@endsection
