<?php
// FILE: app/Http/Controllers/Customer/ProfileController.php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\AlumniUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // ── Show profile page ─────────────────────────────────────────────────────
    public function index()
    {
        $alumni        = Auth::guard('alumni')->user();
        $hidableFields = AlumniUser::hidableFields();
        return view('customer.profile.index', compact('alumni', 'hidableFields'));
    }

    // ── Update basic info ─────────────────────────────────────────────────────
    public function updateInfo(Request $request)
    {
        /** @var \App\Models\AlumniUser $alumni */
        $alumni = Auth::guard('alumni')->user();

        $request->validate([
            'full_name'            => 'required|string|max:255',
            'phone_number'         => 'nullable|string|max:20',
            'current_designation'  => 'nullable|string|max:255',
            'current_organization' => 'nullable|string|max:255',
            'current_city'         => 'nullable|string|max:100',
            'current_country'      => 'nullable|string|max:100',
            'field_of_study'       => 'nullable|string|max:100',
            'field_of_work'        => 'nullable|string|max:100',
            'achievements'         => 'nullable|string|max:2000',
            'profile_photo'        => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $data = $request->only([
            'full_name', 'phone_number', 'current_designation',
            'current_organization', 'current_city', 'current_country',
            'field_of_study', 'field_of_work', 'achievements',
        ]);

        // Handle profile photo
        if ($request->hasFile('profile_photo')) {
            if ($alumni->profile_photo) {
                Storage::disk('public')->delete($alumni->profile_photo);
            }
            $data['profile_photo'] = $request->file('profile_photo')
                                             ->store('profiles', 'public');
        }

        // Handle privacy settings
        $data['privacy_settings'] = $request->filled('privacy_hide')
            ? (array) $request->privacy_hide
            : [];

        $alumni->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }

    // ── Change password ───────────────────────────────────────────────────────
    public function changePassword(Request $request)
    {
        /** @var \App\Models\AlumniUser $alumni */
        $alumni = Auth::guard('alumni')->user();

        $request->validate([
            'current_password'      => 'required|string',
            'new_password'          => 'required|string|min:8|confirmed',
            'new_password_confirmation' => 'required',
        ], [
            'new_password.min'       => 'New password must be at least 8 characters.',
            'new_password.confirmed' => 'New password confirmation does not match.',
        ]);

        // Verify current password
        if (!Hash::check($request->current_password, $alumni->password)) {
            return back()
                ->withErrors(['current_password' => 'The current password you entered is incorrect.'])
                ->withInput();
        }

        // Check new != current
        if (Hash::check($request->new_password, $alumni->password)) {
            return back()
                ->withErrors(['new_password' => 'New password must be different from your current password.'])
                ->withInput();
        }

        $alumni->update(['password' => Hash::make($request->new_password)]);

        return back()->with('password_success', 'Password changed successfully.');
    }

    // ── Update email ──────────────────────────────────────────────────────────
    public function changeEmail(Request $request)
    {
        /** @var \App\Models\AlumniUser $alumni */
        $alumni = Auth::guard('alumni')->user();

        $request->validate([
            'email'    => 'required|email|unique:alumni_users,email,' . $alumni->id,
            'password' => 'required|string',
        ], [
            'email.unique' => 'This email address is already in use.',
        ]);

        if (!Hash::check($request->password, $alumni->password)) {
            return back()
                ->withErrors(['password' => 'Incorrect password. Please try again.'])
                ->withInput();
        }

        $alumni->update(['email' => $request->email]);

        return back()->with('success', 'Email address updated successfully.');
    }
}
