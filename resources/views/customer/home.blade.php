{{-- FILE: resources/views/customer/home.blade.php --}}
@extends('layouts.app')
@section('title','POBA - Welcome to Alumni Network')
@section('content')

@php
    $mockNews = [
        [
            'id' => '#',
            'title' => 'Team SGY representing Match Racing World Champions',
            'type' => 'NEWS | EXCLUSIVE | ALUMNI',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.",
            'image_url' => 'https://images.unsplash.com/photo-1540962351504-03099e0a754b?auto=format&fit=crop&w=400&h=250&q=80'
        ],
        [
            'id' => '#',
            'title' => 'Team SGY representing Match Racing World Champions',
            'type' => 'NEWS | EXCLUSIVE | ALUMNI',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.",
            'image_url' => 'https://images.unsplash.com/photo-1540962351504-03099e0a754b?auto=format&fit=crop&w=400&h=250&q=80'
        ],
        [
            'id' => '#',
            'title' => 'Team SGY representing Match Racing World Champions',
            'type' => 'NEWS | EXCLUSIVE | ALUMNI',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.",
            'image_url' => 'https://images.unsplash.com/photo-1540962351504-03099e0a754b?auto=format&fit=crop&w=400&h=250&q=80'
        ],
        [
            'id' => '#',
            'title' => 'Team SGY representing Match Racing World Champions',
            'type' => 'NEWS | EXCLUSIVE | ALUMNI',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.",
            'image_url' => 'https://images.unsplash.com/photo-1540962351504-03099e0a754b?auto=format&fit=crop&w=400&h=250&q=80'
        ],
    ];

    $mockAlumni = [
        [
            'id' => '#',
            'full_name' => 'Muhammad Zakaullah',
            'current_designation' => 'Admiral (Retd) Chief of Naval Staff',
            'star_description' => "Dignity is not in possessing honors, but in deserving them. Admiral Zakaullah...",
            'class_year' => '1972',
            'image_url' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=300&h=350&q=80'
        ],
        [
            'id' => '#',
            'full_name' => 'Muhammad Zakaullah',
            'current_designation' => 'Admiral (Retd) Chief of Naval Staff',
            'star_description' => "Dignity is not in possessing honors, but in deserving them. Admiral Zakaullah...",
            'class_year' => '1972',
            'image_url' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=300&h=350&q=80'
        ],
        [
            'id' => '#',
            'full_name' => 'Muhammad Zakaullah',
            'current_designation' => 'Admiral (Retd) Chief of Naval Staff',
            'star_description' => "Dignity is not in possessing honors, but in deserving them. Admiral Zakaullah...",
            'class_year' => '1972',
            'image_url' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=300&h=350&q=80'
        ],
        [
            'id' => '#',
            'full_name' => 'Muhammad Zakaullah',
            'current_designation' => 'Admiral (Retd) Chief of Naval Staff',
            'star_description' => "Dignity is not in possessing honors, but in deserving them. Admiral Zakaullah...",
            'class_year' => '1972',
            'image_url' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=300&h=350&q=80'
        ]
    ];

    $displayNews = count($news) > 0 ? $news : json_decode(json_encode($mockNews));
    $displayAlumni = count($starAlumni) > 0 ? $starAlumni : json_decode(json_encode($mockAlumni));
@endphp

{{-- Hero --}}
<section class="hero-custom" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.4)), url('{{ asset('images/hero.png') }}') center/cover no-repeat">
    <div class="container">
        <div class="hero-content-custom">
            <h1>{{ $settings['hero_title'] ?? 'Welcome to POBA Alumni Network' }}</h1>
            <p class="tagline">{{ $settings['hero_tagline'] ?? 'Serving with Valour' }}</p>
            <p class="desc">{{ $settings['hero_description'] ?? 'Join our prestigious community of Pakistan Ocean & Bay Alumni. Stay connected, share experiences, and build lasting professional relationships.' }}</p>
            <a href="{{ route('member.index') }}" class="btn-teal-capsule">Become a Member</a>
        </div>
        <div class="hero-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
</section>

{{-- About Section --}}
<section class="section-pad" style="background:#fff">
    <div class="container">
        <div class="grid-2" style="align-items:center;gap:50px">
            <div>
                <img src="{{ asset('images/about.png') }}"
                     alt="About POBA" style="border-radius:24px;width:100%;object-fit:cover;max-height:380px;box-shadow: 0 15px 35px rgba(0,0,0,0.1)">
            </div>
            <div>
                <h2 class="section-title-left">{{ $settings['about_title'] ?? 'About POBA' }}</h2>
                <p style="color:var(--text-muted);font-size:15px;line-height:1.7;margin-bottom:28px">
                    {{ $settings['about_description'] ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.' }}
                </p>
                <div class="stats-grid-custom">
                    <div class="stat-item-custom">
                        <div class="stat-icon-custom">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 12L7 22L12 19L17 22L15 12" fill="#E74C3C" />
                                <path d="M10.5 12L9.5 22L12 20.5L14.5 22L13.5 12" fill="#C0392B" />
                                <circle cx="12" cy="10" r="6" fill="#F1C40F" stroke="#F39C12" stroke-width="1.5" />
                                <path d="M12 7.5L13.2 10.3L16.2 10.5L13.8 12.3L14.6 15.2L12 13.6L9.4 15.2L10.2 12.3L7.8 10.5L10.8 10.3L12 7.5Z" fill="#F39C12" />
                            </svg>
                        </div>
                        <div>
                            <div class="stat-heading-custom">Excellence</div>
                            <div class="stat-subheading-custom">In Service &amp; Leadership</div>
                        </div>
                    </div>
                    <div class="stat-item-custom">
                        <div class="stat-icon-custom">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 12L7 22L12 19L17 22L15 12" fill="#E74C3C" />
                                <path d="M10.5 12L9.5 22L12 20.5L14.5 22L13.5 12" fill="#C0392B" />
                                <circle cx="12" cy="10" r="6" fill="#F1C40F" stroke="#F39C12" stroke-width="1.5" />
                                <path d="M12 7.5L13.2 10.3L16.2 10.5L13.8 12.3L14.6 15.2L12 13.6L9.4 15.2L10.2 12.3L7.8 10.5L10.8 10.3L12 7.5Z" fill="#F39C12" />
                            </svg>
                        </div>
                        <div>
                            <div class="stat-heading-custom">Community</div>
                            <div class="stat-subheading-custom">Strong Alumni Network</div>
                        </div>
                    </div>
                    <div class="stat-item-custom">
                        <div class="stat-icon-custom">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 12L7 22L12 19L17 22L15 12" fill="#E74C3C" />
                                <path d="M10.5 12L9.5 22L12 20.5L14.5 22L13.5 12" fill="#C0392B" />
                                <circle cx="12" cy="10" r="6" fill="#F1C40F" stroke="#F39C12" stroke-width="1.5" />
                                <path d="M12 7.5L13.2 10.3L16.2 10.5L13.8 12.3L14.6 15.2L12 13.6L9.4 15.2L10.2 12.3L7.8 10.5L10.8 10.3L12 7.5Z" fill="#F39C12" />
                            </svg>
                        </div>
                        <div>
                            <div class="stat-heading-custom">Global Reach</div>
                            <div class="stat-subheading-custom">Worldwide Presence</div>
                        </div>
                    </div>
                    <div class="stat-item-custom">
                        <div class="stat-icon-custom">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 12L7 22L12 19L17 22L15 12" fill="#E74C3C" />
                                <path d="M10.5 12L9.5 22L12 20.5L14.5 22L13.5 12" fill="#C0392B" />
                                <circle cx="12" cy="10" r="6" fill="#F1C40F" stroke="#F39C12" stroke-width="1.5" />
                                <path d="M12 7.5L13.2 10.3L16.2 10.5L13.8 12.3L14.6 15.2L12 13.6L9.4 15.2L10.2 12.3L7.8 10.5L10.8 10.3L12 7.5Z" fill="#F39C12" />
                            </svg>
                        </div>
                        <div>
                            <div class="stat-heading-custom">Integrity</div>
                            <div class="stat-subheading-custom">Honor &amp; Commitment</div>
                        </div>
                    </div>
                </div>
                <div style="margin-top:35px">
                    <a href="{{ route('member.index') }}" class="btn-outline-orange-capsule">Become a Member</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Latest News --}}
<section class="section-pad" style="background:var(--bg-light)">
    <div class="container">
        <h2 class="section-title-center">Latest News</h2>
        <div class="grid-4" style="margin-top:40px">
            @foreach($displayNews as $item)
            <div class="card-news">
                <div class="card-news-img-container">
                    <img class="card-news-img" src="{{ isset($item->image_url) ? $item->image_url : ($item->image ? asset('storage/'.$item->image) : 'https://images.unsplash.com/photo-1540962351504-03099e0a754b?auto=format&fit=crop&w=400&h=250&q=80') }}" alt="{{ $item->title }}">
                </div>
                <div class="card-news-body">
                    <div class="card-news-type">{{ isset($item->type) ? $item->type : 'NEWS | EXCLUSIVE | ALUMNI' }}</div>
                    <h3 class="card-news-title">{{ $item->title }}</h3>
                    <p class="card-news-text">{{ Str::limit(strip_tags($item->description), 110) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;margin-top:45px">
            <a href="{{ route('news.index') }}" class="btn-teal-news-view">View all News</a>
        </div>
    </div>
</section>

{{-- Star Alumni --}}
<section class="section-pad" style="background:#eaf4f4">
    <div class="container">
        <h2 class="section-title-center">Star Alumni</h2>
        <div class="grid-4" style="margin-top:40px">
            @foreach($displayAlumni as $alumni)
            <div class="alumni-card-custom">
                <div class="alumni-img-container">
                    <img src="{{ isset($alumni->image_url) ? $alumni->image_url : ($alumni->profile_photo ? asset('storage/'.$alumni->profile_photo) : 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=300&h=350&q=80') }}" alt="{{ $alumni->full_name }}">
                </div>
                <div class="alumni-info-custom">
                    <h4>{{ $alumni->full_name }}</h4>
                    <div class="position-custom">{{ $alumni->current_designation }}</div>
                    <div class="desc-custom">{{ Str::limit($alumni->star_description ?? ($alumni->achievements ?? ''), 80) }}</div>
                    <div class="class-year-custom">Class of {{ $alumni->class_year }}</div>
                    <div style="text-align:center;margin-top:15px">
                        <a href="{{ $alumni->id === '#' ? '#' : route('alumni.show', $alumni->id) }}" class="btn-teal-alumni-details">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;margin-top:45px">
            <a href="{{ route('star.alumni') }}" class="btn-outline-teal-view">View All</a>
        </div>
    </div>
</section>

@endsection
