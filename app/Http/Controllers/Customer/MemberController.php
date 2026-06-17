<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\AlumniUser;
use App\Models\User;
use App\Notifications\AlumniRegistrationReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class MemberController extends Controller
{
    public function index()
    {
        return view('customer.member.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name'       => 'required|string|max:255',
            'email'           => 'required|email|unique:alumni_users,email',
            'phone_number'    => 'required|string|max:20',
            'entry'           => 'required|string|max:20',
            'ccp_no'          => 'required|string|max:50',
            'house'           => 'required|string|max:100',
            'education'       => 'required|string|max:100',
            'field_of_study'  => 'required|string|max:100',
            'field_of_work'   => 'required|string|max:100',
            'current_city'    => 'required|string|max:100',
            'current_country' => 'required|string|max:100',
            'cnic_file'       => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'profile_photo'   => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'consent_sharing' => 'accepted',
            'agree_terms'     => 'accepted',
        ]);

        $data             = $request->except(['_token', 'profile_photo', 'cnic_file', 'privacy_hide']);
        $data['password'] = \Illuminate\Support\Str::random(10); // placeholder; real one set on approval
        $data['status']   = 'pending';
        $data['is_active'] = false;

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profiles', 'public');
        }

        if ($request->hasFile('cnic_file')) {
            $data['cnic_file'] = $request->file('cnic_file')->store('cnics', 'public');
        }

        if ($request->privacy_hide) {
            $data['privacy_settings'] = $request->privacy_hide;
        }

        $alumni = AlumniUser::create($data);

        // Notify all Super Admins about new registration
        $superAdmins = User::where('role', 'superadmin')->get();
        Notification::send($superAdmins, new AlumniRegistrationReceived($alumni));

        return back()->with('success', 'Your application has been submitted successfully! You will receive an email once your account is approved.');
    }
}