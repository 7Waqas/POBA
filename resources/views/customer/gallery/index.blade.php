{{-- FILE: resources/views/customer/gallery/index.blade.php --}}
@extends('layouts.app')
@section('title','Gallery - POBA')
@section('content')

<div class="page-header">
    <h1>Gallery</h1>
    <div class="underline"></div>
</div>

<section class="section-pad">
    <div class="container">
        <form method="GET" action="{{ route('gallery.index') }}">
            <div class="search-bar">
                <input type="text" name="search" class="search-input" placeholder="Search by Name" value="{{ request('search') }}">
                <select name="class_year" class="filter-select">
                    <option value="">Class Year</option>
                    @foreach(range(date('Y'), 1947, -1) as $y)<option value="{{ $y }}" {{ request('class_year')==$y ? 'selected' : '' }}>{{ $y }}</option>@endforeach
                </select>
                <select name="event_type" class="filter-select">
                    <option value="">Event Type</option>
                    <option value="Conference" {{ request('event_type')=='Conference' ? 'selected' : '' }}>Conference</option>
                    <option value="Public" {{ request('event_type')=='Public' ? 'selected' : '' }}>Public</option>
                </select>
                <button type="submit" class="btn-teal" style="padding:10px 24px">Search</button>
            </div>
        </form>

        <div class="grid-4">
            @forelse($folders as $folder)
            <a href="{{ route('gallery.show', $folder->id) }}" style="text-decoration:none;color:inherit">
                <div class="card">
                    <img class="card-img"
                         src="{{ $folder->images->first() ? asset('storage/'.$folder->images->first()->image_path) : 'https://placehold.co/400x200/1a7a7a/fff?text=Gallery' }}"
                         alt="{{ $folder->folder_name }}">
                    <div class="card-body">
                        <div class="card-title" style="color:var(--teal)">{{ $folder->folder_name }}</div>
                        <p class="card-text">{{ Str::limit($folder->description, 100) }}</p>
                    </div>
                </div>
            </a>
            @empty
            <div style="grid-column:1/-1;text-align:center;padding:60px;color:var(--text-muted)">No gallery albums found.</div>
            @endforelse
        </div>

        <div style="text-align:center;margin-top:40px">{{ $folders->appends(request()->query())->links('vendor.pagination.simple-default') }}</div>
    </div>
</section>
@endsection
