{{-- FILE: resources/views/customer/member/register.blade.php --}}
@extends('layouts.app')
@section('title','Become a Member - POBA')
@section('content')

<div class="page-header">
    <h1>Become a Member</h1>
    <div class="underline"></div>
</div>

<section class="section-pad">
    <div class="container">
        <div class="grid-2" style="gap:50px;align-items:flex-start">

            {{-- Form --}}
            <div class="form-box">
                <h2 style="font-size:22px;font-weight:700;text-align:center;margin-bottom:28px">Alumni Registration Form</h2>

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('member.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Full Name: *</label>
                        <input type="text" name="full_name" class="form-control" placeholder="Sikandar" value="{{ old('full_name') }}" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Entry: *</label>
                            <select name="entry" class="form-control" required>
                                <option value="">Select</option>
                                @foreach(range(1,30) as $e)<option value="{{ $e }}" {{ old('entry')==$e ? 'selected' : '' }}>{{ $e }}</option>@endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">CCP No.: *</label>
                            <input type="text" name="ccp_no" class="form-control" placeholder="228" value="{{ old('ccp_no') }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">House: *</label>
                            <select name="house" class="form-control" required>
                                <option value="">Select House</option>
                                @foreach(['Jinnah','Iqbal','Liaquat','Ayub','Ranjit'] as $h)
                                <option value="{{ $h }}" {{ old('house')==$h ? 'selected' : '' }}>{{ $h }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Education: *</label>
                            <select name="education" class="form-control" required>
                                <option value="">Select</option>
                                @foreach(['Matric','Intermediate','Bachelors','Masters','PhD'] as $ed)
                                <option value="{{ $ed }}" {{ old('education')==$ed ? 'selected' : '' }}>{{ $ed }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Field of Study:</label>
                            <input type="text" name="field_of_study" class="form-control" placeholder="e.g. BBA" value="{{ old('field_of_study') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Field of Work:</label>
                            <input type="text" name="field_of_work" class="form-control" placeholder="e.g. Marketing" value="{{ old('field_of_work') }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Current City</label>
                            <select name="current_city" class="form-control">
                                <option value="">Select City</option>
                                @foreach(['Karachi','Lahore','Islamabad','Rawalpindi','Peshawar','Quetta','Jeddah','Dubai','London','Other'] as $c)
                                <option value="{{ $c }}" {{ old('current_city')==$c ? 'selected' : '' }}>{{ $c }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Current Country: *</label>
                            <select name="current_country" class="form-control" required>
                                <option value="">Select Country</option>
                                @foreach(['Pakistan','Saudi Arabia','UAE','UK','USA','Canada','Australia','Other'] as $co)
                                <option value="{{ $co }}" {{ old('current_country')==$co ? 'selected' : '' }}>{{ $co }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Current Designation</label>
                            <input type="text" name="current_designation" class="form-control" placeholder="Marketing Officer" value="{{ old('current_designation') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Current Organization</label>
                            <input type="text" name="current_organization" class="form-control" placeholder="Company Name" value="{{ old('current_organization') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email ID: *</label>
                        <input type="email" name="email" class="form-control" placeholder="info@poba.com" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone Number:</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="+92 300 0000000" value="{{ old('phone_number') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Class Year:</label>
                        <select name="class_year" class="form-control">
                            <option value="">Select Year</option>
                            @foreach(range(date('Y'), 1947, -1) as $y)<option value="{{ $y }}" {{ old('class_year')==$y ? 'selected' : '' }}>{{ $y }}</option>@endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Achievements:</label>
                        <textarea name="achievements" class="form-control" rows="4" placeholder="List your achievements...">{{ old('achievements') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Profile Photo:</label>
                        <div class="file-upload" onclick="document.getElementById('profilePhoto').click()">
                            <span style="font-size:20px">➕</span>
                            <p>Drag &amp; Drop files here or click to select file(s)</p>
                        </div>
                        <input type="file" id="profilePhoto" name="profile_photo" accept="image/*" style="display:none" onchange="showFileName(this,'profileName')">
                        <p id="profileName" style="font-size:12px;color:var(--teal);margin-top:6px"></p>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Upload CNIC:</label>
                        <div class="file-upload" onclick="document.getElementById('cnicFile').click()">
                            <span style="font-size:20px">➕</span>
                            <p>Drag &amp; Drop files here or click to select file(s)</p>
                        </div>
                        <input type="file" id="cnicFile" name="cnic_file" style="display:none" onchange="showFileName(this,'cnicName')">
                        <p id="cnicName" style="font-size:12px;color:var(--teal);margin-top:6px"></p>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Privacy Settings: <small style="font-weight:400;color:var(--text-muted)">Choose which details to hide with other alumni</small></label>
                        <select name="privacy_hide[]" class="form-control" multiple style="border-radius:12px;height:80px">
                            <option value="email">Email Address</option>
                            <option value="city">City</option>
                            <option value="phone">Phone Number</option>
                        </select>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="consent_sharing" id="consent" value="1" required>
                        <label for="consent">I consent to sharing my details with other POBA alumni *<br>
                            <small style="color:var(--text-muted)">Your information will only be shared with verified POBA members according to your privacy settings above.</small>
                        </label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="agree_terms" id="terms" value="1" required>
                        <label for="terms">I agree to the <a href="#" style="color:var(--teal)">Terms &amp; Conditions</a> and <a href="#" style="color:var(--teal)">Privacy Policy</a> *</label>
                    </div>

                    <button type="submit" class="btn-teal" style="width:100%;padding:14px;font-size:16px;border-radius:10px;margin-top:10px">Submit</button>
                    <p style="text-align:center;font-size:12px;color:var(--text-muted);margin-top:12px">Your registration will be reviewed by the admin team. You'll receive a confirmation email once approved.</p>
                </form>
            </div>

            {{-- Benefits --}}
            <div>
                <h3 style="font-size:22px;font-weight:700;margin-bottom:28px">Membership Benefits</h3>
                @foreach([
                    ['icon'=>'👥','title'=>'Global Network','desc'=>'Connect with naval professionals worldwide'],
                    ['icon'=>'📚','title'=>'Resources','desc'=>'Access to maritime publications and research'],
                    ['icon'=>'🤝','title'=>'Networking','desc'=>'Build meaningful professional relationships'],
                    ['icon'=>'🎯','title'=>'Career Services','desc'=>'Exclusive career development opportunities'],
                    ['icon'=>'🏆','title'=>'Recognition','desc'=>'Celebrate achievements of fellow alumni'],
                    ['icon'=>'📢','title'=>'Events','desc'=>'Exclusive invitations to alumni events'],
                ] as $benefit)
                <div style="display:flex;align-items:flex-start;gap:18px;margin-bottom:24px">
                    <div style="width:56px;height:56px;background:var(--teal-light);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:24px;flex-shrink:0">{{ $benefit['icon'] }}</div>
                    <div>
                        <div style="font-weight:700;font-size:15px;margin-bottom:4px">{{ $benefit['title'] }}</div>
                        <div style="font-size:13px;color:var(--text-muted)">{{ $benefit['desc'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function showFileName(input, targetId) {
    const p = document.getElementById(targetId);
    p.textContent = input.files.length ? '✓ ' + input.files[0].name : '';
}
</script>
@endpush
@endsection
