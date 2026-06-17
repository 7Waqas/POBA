{{-- FILE: resources/views/customer/star-alumni/index.blade.php --}}
@extends('layouts.app')
@section('title','Star Alumni - POBA')
@section('content')

<div class="page-header">
    <h1>Star Alumni</h1>
    <div class="underline"></div>
</div>

<section class="section-pad">
    <div class="container">
        <form method="GET" action="{{ route('star.alumni') }}">
            <div class="search-bar">
                <input type="text" name="search" class="search-input" placeholder="Search by Name" value="{{ request('search') }}">
                <select name="class_year" class="filter-select">
                    <option value="">Class Year</option>
                    @foreach(range(date('Y'), 1947, -1) as $y)<option value="{{ $y }}" {{ request('class_year')==$y ? 'selected' : '' }}>{{ $y }}</option>@endforeach
                </select>
                <select name="field_work" class="filter-select">
                    <option value="">Field of Work</option>
                    @foreach(['Navy','Engineering','Medicine','Law','Business','Education','IT','Other'] as $f)
                    <option value="{{ $f }}" {{ request('field_work')==$f ? 'selected' : '' }}>{{ $f }}</option>
                    @endforeach
                </select>
                <select name="city" class="filter-select">
                    <option value="">City</option>
                    @foreach(['Karachi','Lahore','Islamabad','Rawalpindi','Peshawar','Quetta','Jeddah','Dubai','London'] as $c)
                    <option value="{{ $c }}" {{ request('city')==$c ? 'selected' : '' }}>{{ $c }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn-teal" style="padding:10px 24px">Search</button>
            </div>
        </form>

        <div class="grid-4">
            @forelse($alumni as $a)
            <div class="alumni-card">
                <img src="{{ $a->profile_photo ? asset('storage/'.$a->profile_photo) : 'https://placehold.co/120x120/1a7a7a/fff?text='.urlencode(substr($a->full_name,0,1)) }}" alt="{{ $a->full_name }}">
                <h4>{{ $a->full_name }}</h4>
                <div class="position">{{ $a->current_designation }}</div>
                <div class="desc">{{ Str::limit($a->star_description ?? $a->achievements, 80) }}</div>
                <div class="class-year">Class of {{ $a->class_year }}</div>
                <a href="{{ route('alumni.show', $a->id) }}" class="btn-teal" style="font-size:13px;padding:8px 20px">View Details</a>
            </div>
            @empty
            <div style="grid-column:1/-1;text-align:center;padding:60px;color:var(--text-muted)">No star alumni yet.</div>
            @endforelse
        </div>

        <div style="text-align:center;margin-top:40px">{{ $alumni->appends(request()->query())->links('vendor.pagination.simple-default') }}</div>
    </div>
</section>
@endsection
