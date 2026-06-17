{{-- FILE: resources/views/customer/news/index.blade.php --}}
@extends('layouts.app')
@section('title','Latest News - POBA')
@section('content')

<div class="page-header">
    <h1>Latest News</h1>
    <div class="underline"></div>
</div>

<section class="section-pad">
    <div class="container">
        <div class="grid-4">
            @forelse($news as $item)
            <div class="card">
                <img class="card-img" src="{{ $item->image ? asset('storage/'.$item->image) : 'https://placehold.co/400x200/1a7a7a/fff?text=News' }}" alt="{{ $item->title }}">
                <div class="card-body">
                    <div class="card-type">{{ strtoupper($item->type ?? 'NEWS') }}</div>
                    <div class="card-title">{{ $item->title }}</div>
                    @if($loop->first)<div class="card-date">Posted On {{ $item->published_at ? $item->published_at->format('d-m-Y') : '' }}</div>@endif
                    <p class="card-text">{{ Str::limit(strip_tags($item->description), 100) }}</p>
                    <a href="{{ route('news.show', $item->id) }}" style="font-size:13px;color:var(--teal);font-weight:600;margin-top:8px;display:inline-block">Read More →</a>
                </div>
            </div>
            @empty
            <div style="grid-column:1/-1;text-align:center;padding:60px;color:var(--text-muted)">No news available yet.</div>
            @endforelse
        </div>

        <div style="text-align:center;margin-top:40px">
            {{ $news->links('vendor.pagination.simple-default') }}
        </div>
    </div>
</section>
@endsection
