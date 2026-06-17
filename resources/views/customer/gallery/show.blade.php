{{-- FILE: resources/views/customer/gallery/show.blade.php --}}
@extends('layouts.app')
@section('title', $folder->folder_name . ' Gallery - POBA')
@section('content')

<section class="section-pad">
    <div class="container">
        <h1 style="font-size:2rem;font-weight:700;color:var(--teal);text-align:center;margin-bottom:6px">
            {{ $folder->folder_name }} <span style="text-decoration:underline;text-decoration-color:var(--orange)">Gallery</span>
        </h1>
        <p style="text-align:center;font-size:14px;color:var(--text-muted);margin-bottom:40px;max-width:700px;margin-left:auto;margin-right:auto">
            {{ Str::limit($folder->description, 180) }}
            @if(strlen($folder->description) > 180)
                <a href="#" onclick="document.getElementById('fullDesc').style.display='inline';this.style.display='none';return false" style="color:var(--orange)"> see more</a>
                <span id="fullDesc" style="display:none">{{ substr($folder->description, 180) }}</span>
            @endif
        </p>

        <div class="gallery-grid" id="galleryGrid">
            @forelse($folder->images->take(12) as $i => $image)
            <div class="gallery-thumb" onclick="openModal({{ $i }})">
                <img src="{{ asset('storage/'.$image->image_path) }}" alt="Gallery Image {{ $i+1 }}"
                     onerror="this.src='https://placehold.co/300x200/1a7a7a/fff?text=Image'">
            </div>
            @empty
            <div style="grid-column:1/-1;text-align:center;padding:60px;color:var(--text-muted)">No images in this album.</div>
            @endforelse
        </div>

        @if($folder->images->count() > 12)
        <div style="text-align:center;margin-top:30px">
            <button class="btn-outline-teal load-more" onclick="loadMore(this)">Load More</button>
        </div>
        @endif

        <div style="margin-top:30px">
            <a href="{{ route('gallery.index') }}" class="btn-outline-teal">← Back to Gallery</a>
        </div>
    </div>
</section>

{{-- Lightbox Modal --}}
<div class="gallery-modal" id="galleryModal">
    <button class="close-btn" onclick="closeModal()">✕</button>
    <button class="nav-btn prev" onclick="changeImage(-1)">&#8249;</button>
    <img id="modalImg" src="" alt="">
    <button class="nav-btn next" onclick="changeImage(1)">&#8250;</button>
    <a id="downloadBtn" href="#" download style="position:absolute;top:20px;right:60px;color:#fff;font-size:22px" title="Download">⬇</a>
</div>

@push('scripts')
<script>
const images = @json($folder->images->pluck('image_path'));
const baseUrl = '{{ asset('storage/') }}/';
let current = 0;

function openModal(idx) {
    current = idx;
    document.getElementById('galleryModal').classList.add('open');
    updateModal();
}
function closeModal() {
    document.getElementById('galleryModal').classList.remove('open');
}
function changeImage(dir) {
    current = (current + dir + images.length) % images.length;
    updateModal();
}
function updateModal() {
    const src = baseUrl + images[current];
    document.getElementById('modalImg').src = src;
    document.getElementById('downloadBtn').href = src;
}
document.getElementById('galleryModal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeModal();
    if (e.key === 'ArrowLeft') changeImage(-1);
    if (e.key === 'ArrowRight') changeImage(1);
});

let shown = 12;
const allImages = @json($folder->images);
function loadMore(btn) {
    const grid = document.getElementById('galleryGrid');
    const next = allImages.slice(shown, shown + 8);
    next.forEach((img, i) => {
        const div = document.createElement('div');
        div.className = 'gallery-thumb';
        div.onclick = () => openModal(shown + i);
        div.innerHTML = `<img src="${baseUrl}${img.image_path}" alt="Gallery" onerror="this.src='https://placehold.co/300x200/1a7a7a/fff?text=Image'">`;
        grid.appendChild(div);
    });
    shown += next.length;
    if (shown >= allImages.length) btn.style.display = 'none';
}
</script>
@endpush
@endsection
