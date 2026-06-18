<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    // ── Show profile edit page ────────────────────────────────────────────────

    public function edit()
    {
        $alumni = Auth::guard('alumni')->user();
        return view('customer.profile.edit', compact('alumni'));
    }

    // ── Update general info ───────────────────────────────────────────────────

    public function update(Request $request)
    {
        $alumni = Auth::guard('alumni')->user();

        $request->validate([
            'full_name'            => 'required|string|max:255',
            'phone_number'         => 'required|string|max:20',
            'entry'                => 'required|string|max:20',
            'ccp_no'               => 'required|string|max:50',
            'house'                => 'required|string|max:100',
            'education'            => 'required|string|max:100',
            'field_of_study'       => 'required|string|max:100',
            'field_of_work'        => 'required|string|max:100',
            'current_city'         => 'required|string|max:100',
            'current_country'      => 'required|string|max:100',
            'current_designation'  => 'nullable|string|max:150',
            'current_organization' => 'nullable|string|max:150',
            'achievements'         => 'nullable|string|max:2000',
            'profile_photo'        => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'cnic_file'            => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $data = $request->except(['_token', '_method', 'profile_photo', 'cnic_file', 'privacy_hide']);

        // Profile photo
        if ($request->hasFile('profile_photo')) {
            if ($alumni->profile_photo) {
                Storage::disk('public')->delete($alumni->profile_photo);
            }
            $ext      = $request->file('profile_photo')->getClientOriginalExtension();
            $filename = 'profile_' . $alumni->id . '_' . time() . '.' . $ext;
            $request->file('profile_photo')->storeAs('profiles', $filename, 'public');
            $data['profile_photo'] = 'profiles/' . $filename;
        }

        // CNIC file
        if ($request->hasFile('cnic_file')) {
            if ($alumni->cnic_file) {
                Storage::disk('public')->delete($alumni->cnic_file);
            }
            $ext      = $request->file('cnic_file')->getClientOriginalExtension();
            $filename = 'cnic_' . $alumni->id . '_' . time() . '.' . $ext;
            $request->file('cnic_file')->storeAs('cnics', $filename, 'public');
            $data['cnic_file'] = 'cnics/' . $filename;
        }

        // Privacy settings
        $data['privacy_settings'] = $request->privacy_hide ?? [];

        $alumni->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }

    // ── Change password ───────────────────────────────────────────────────────

    public function changePassword(Request $request)
    {
        $alumni = Auth::guard('alumni')->user();

        $request->validate([
            'current_password' => 'required',
            'password'         => ['required', 'confirmed', Password::min(8)],
        ]);

        // Verify current password
        if (!Hash::check($request->current_password, $alumni->password)) {
            return back()
                ->withErrors(['current_password' => 'Current password is incorrect.'])
                ->withInput();
        }

        $alumni->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('password_success', 'Password changed successfully.');
    }
}