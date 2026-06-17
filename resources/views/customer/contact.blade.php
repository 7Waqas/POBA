{{-- FILE: resources/views/customer/contact.blade.php --}}
@extends('layouts.app')
@section('title','Contact Us - POBA')
@section('content')

<div class="page-header">
    <h1>Contact Us</h1>
    <div class="underline"></div>
</div>

<section class="section-pad">
    <div class="container">
        <p style="text-align:center;color:var(--text-muted);max-width:700px;margin:0 auto 40px;font-size:15px">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
            <a href="#" style="color:var(--orange)">see more</a>
        </p>

        <div class="grid-2" style="gap:50px;align-items:flex-start">

            {{-- Contact Form --}}
            <div class="form-box">
                <h3 style="font-size:20px;font-weight:700;text-align:center;margin-bottom:24px">Contact Form</h3>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">First Name:</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Sikandar" value="{{ old('first_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name:</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Raza" value="{{ old('last_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address:</label>
                        <input type="email" name="email_address" class="form-control" placeholder="sikandar.raza@rrr.com" value="{{ old('email_address') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone Number:</label>
                        <input type="text" name="phone" class="form-control" placeholder="+92 300 0000000" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Message:</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="Your message..." required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn-teal" style="width:100%;padding:14px;font-size:16px;border-radius:10px">Submit</button>
                </form>
            </div>

            {{-- Contact Info --}}
            <div>
                <div class="contact-info-box">
                    <h3 style="font-size:22px;font-weight:700;margin-bottom:20px">Let's talk with us</h3>
                    <p style="color:var(--text-muted);font-size:14px;margin-bottom:24px">Questions, comments, or suggestions? Simply fill in the form and we'll be in touch shortly.</p>

                    <div class="info-item">
                        <span class="info-icon">✉️</span>
                        <span style="font-size:14px">{{ $settings['contact_email'] ?? 'info@poba.com' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-icon" style="color:var(--orange)">📍</span>
                        <a href="{{ $settings['google_map_link'] ?? '#' }}" style="font-size:14px;color:var(--orange)">{{ $settings['location'] ?? 'Cadet College Palandri' }}</a>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">📞</span>
                        <span style="font-size:14px">{{ $settings['contact_number'] ?? '+92 21 123 4567' }}</span>
                    </div>

                    <div style="display:flex;gap:12px;margin:20px 0">
                        @if(!empty($settings['social_twitter']))<a href="{{ $settings['social_twitter'] }}" style="width:36px;height:36px;background:var(--teal);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px">𝕏</a>@endif
                        @if(!empty($settings['social_linkedin']))<a href="{{ $settings['social_linkedin'] }}" style="width:36px;height:36px;background:var(--teal);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:14px;font-weight:700">in</a>@endif
                        @if(!empty($settings['social_facebook']))<a href="{{ $settings['social_facebook'] }}" style="width:36px;height:36px;background:var(--teal);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px">f</a>@endif
                        @if(!empty($settings['social_instagram']))<a href="{{ $settings['social_instagram'] }}" style="width:36px;height:36px;background:var(--teal);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px">📷</a>@endif
                    </div>
                </div>

                <div class="donate-section">
                    <h4>Donate Here</h4>
                    <div class="bank-details">
                        <p><strong>Bank Title</strong><br><span>{{ $settings['bank_title'] ?? 'Bank of AJK' }}</span></p>
                        <p><strong>Account Title</strong><br><span>{{ $settings['account_title'] ?? 'Palandarians Old Boys Association' }}</span></p>
                        <p><strong>Account Number</strong><br><span>{{ $settings['account_number'] ?? '00001234657980' }}</span></p>
                        <p><strong>Branch Number</strong><br><span>{{ $settings['branch_number'] ?? '063' }}</span></p>
                    </div>
                    @if(!empty($settings['qr_code']))
                    <div style="margin-top:16px;text-align:center">
                        <p style="font-size:13px;color:var(--orange);margin-bottom:8px">Scan to Donate</p>
                        <img src="{{ asset('storage/'.$settings['qr_code']) }}" alt="QR Code" style="width:120px;border-radius:8px">
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- FAQs --}}
        @if($faqs->count())
        <div class="faq-section">
            <h2 class="section-title" style="text-align:left;margin-bottom:10px">Frequently Asked Questions</h2>
            @foreach($faqs as $faq)
            <div class="faq-item" onclick="toggleFaq(this)">
                <div class="faq-question">
                    {{ $faq->question }}
                    <span style="font-size:20px;color:var(--text-muted)">∨</span>
                </div>
                <div class="faq-answer">{!! $faq->answer !!}</div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
function toggleFaq(el) {
    el.classList.toggle('open');
}
</script>
@endpush
@endsection
