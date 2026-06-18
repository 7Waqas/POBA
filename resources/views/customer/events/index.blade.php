{{-- FILE: resources/views/customer/events/index.blade.php --}}
@extends('layouts.app')
@section('title','Events - POBA')
@section('content')

<section class="section-pad" style="padding-top: 40px;">
    <div class="container">
        
        {{-- Clean & Centered Page Title with Full Text Underline --}}
        <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-size: 2.5rem; font-weight: 700; color: #086666; display: inline-block; padding-bottom: 8px; border-bottom: 4px solid var(--orange); line-height: 1.2;">
                Events
            </h1>
        </div>

        <div class="tab-btns">
            <button class="tab-btn active" id="btnUpcoming" onclick="showTab('upcoming')">Upcoming</button>
            <button class="tab-btn" id="btnPrevious" onclick="showTab('previous')">Previous</button>
        </div>

        {{-- Upcoming Events --}}
        <div id="tabUpcoming">
            @forelse($upcoming as $event)
            <div class="event-card" id="event-{{ $event->id }}">
                <div class="event-date">
                    <div class="day">{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</div>
                    <div class="month-year">{{ \Carbon\Carbon::parse($event->start_date)->format('M Y') }}</div>
                </div>
                <img class="event-thumb" src="{{ $event->logo ? asset('storage/'.$event->logo) : 'https://placehold.co/100x80/1a7a7a/fff?text=Event' }}" alt="{{ $event->title }}">
                <div class="event-info">
                    <h4>{{ $event->title }}</h4>
                    <div class="event-meta">
                        <span>📍 {{ $event->location }}</span>
                        <span>📅 {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}</span>
                        <span>🕐 {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}</span>
                    </div>
                    <div class="event-focal">
                        <strong>Focal Person</strong><br>{{ $event->focal_person_name }} - {{ $event->focal_person_number }}
                    </div>
                    <div class="event-desc" id="desc-{{ $event->id }}" style="display:none">
                        @if($event->entry_batches)<p><strong>Entry:</strong> {{ implode(', ', $event->entry_batches) }}</p>@endif
                        <p>{{ $event->description }}</p>
                    </div>
                    <a href="#" onclick="toggleDesc({{ $event->id }}); return false;" style="font-size:13px;color:var(--orange);font-weight:600;margin-top:8px;display:inline-block" id="seeMore-{{ $event->id }}">See More</a>
                </div>
                <div class="event-actions">
                    @auth('alumni')
                        @if(in_array($event->id, $myEventIds))
                            <form method="POST" action="{{ route('events.cancel', $event->id) }}">@csrf
                                <button type="submit" class="btn-outline-orange" style="font-size:13px;padding:8px 16px">Cancel Registration</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('events.register', $event->id) }}">@csrf
                                <button type="submit" class="btn-teal" style="font-size:13px;padding:8px 16px">Register Now</button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn-teal" style="font-size:13px;padding:8px 16px">Register Now</a>
                    @endauth
                </div>
            </div>
            @empty
            <div style="text-align:center;padding:60px;color:var(--text-muted)">No upcoming events at the moment.</div>
            @endforelse
        </div>

        {{-- Previous Events --}}
        <div id="tabPrevious" style="display:none">
            @forelse($previous as $event)
            <div class="event-card">
                <div class="event-date">
                    <div class="day">{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</div>
                    <div class="month-year">{{ \Carbon\Carbon::parse($event->start_date)->format('M Y') }}</div>
                </div>
                <img class="event-thumb" src="{{ $event->logo ? asset('storage/'.$event->logo) : 'https://placehold.co/100x80/1a7a7a/fff?text=Event' }}" alt="{{ $event->title }}">
                <div class="event-info">
                    <h4>{{ $event->title }}</h4>
                    <div class="event-meta">
                        <span>📍 {{ $event->location }}</span>
                        <span>📅 {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}</span>
                        <span>🕐 {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}</span>
                    </div>
                    <div class="event-focal">
                        <strong>Focal Person</strong><br>{{ $event->focal_person_name }} - {{ $event->focal_person_number }}
                    </div>
                    <a href="#" onclick="toggleDesc({{ $event->id }}); return false;" style="font-size:13px;color:var(--orange);font-weight:600;margin-top:8px;display:inline-block">See More</a>
                </div>
                <div class="event-actions">
                    <a href="{{ route('gallery.index') }}" class="btn-outline-teal" style="font-size:13px;padding:8px 16px">View Gallery</a>
                </div>
            </div>
            @empty
            <div style="text-align:center;padding:60px;color:var(--text-muted)">No previous events.</div>
            @endforelse
        </div>
    </div>
</section>

@push('scripts')
<script>
function showTab(tab) {
    document.getElementById('tabUpcoming').style.display = tab==='upcoming' ? 'block' : 'none';
    document.getElementById('tabPrevious').style.display = tab==='previous' ? 'block' : 'none';
    document.getElementById('btnUpcoming').classList.toggle('active', tab==='upcoming');
    document.getElementById('btnPrevious').classList.toggle('active', tab==='previous');
}
function toggleDesc(id) {
    const d = document.getElementById('desc-'+id);
    const s = document.getElementById('seeMore-'+id);
    if (d.style.display==='none') { d.style.display='block'; s.textContent='See Less'; }
    else { d.style.display='none'; s.textContent='See More'; }
}
</script>
@endpush
@endsection