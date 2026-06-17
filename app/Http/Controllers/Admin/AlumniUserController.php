<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlumniUser;
use App\Notifications\AlumniApproved;
use App\Notifications\AlumniRejected;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AlumniUserController extends Controller
{
    // ── Approved alumni list ──────────────────────────────────────────────────

    public function index(Request $request)
    {
        $query = AlumniUser::where('status', 'approved');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('full_name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%");
            });
        }

        $users = $query->orderByDesc('created_at')->paginate(10);
        return view('admin.alumni.index', compact('users'));
    }

    // ── Pending approvals ─────────────────────────────────────────────────────

    public function approvals(Request $request)
    {
        $query = AlumniUser::where('status', 'pending');

        if ($request->search) {
            $query->where('full_name', 'like', "%{$request->search}%");
        }

        $users = $query->orderByDesc('created_at')->paginate(10);
        return view('admin.alumni.approvals', compact('users'));
    }

    // ── Show single alumni ────────────────────────────────────────────────────

    public function show($id)
    {
        $user = AlumniUser::findOrFail($id);
        return view('admin.alumni.show', compact('user'));
    }

    // ── Edit alumni profile ───────────────────────────────────────────────────

    public function update(Request $request, $id)
    {
        $user = AlumniUser::findOrFail($id);
        $data = $request->except(['_token', '_method', 'profile_photo', 'cnic_file']);

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) Storage::disk('public')->delete($user->profile_photo);
            $data['profile_photo'] = $request->file('profile_photo')->store('profiles', 'public');
        }

        if ($request->hasFile('cnic_file')) {
            if ($user->cnic_file) Storage::disk('public')->delete($user->cnic_file);
            $data['cnic_file'] = $request->file('cnic_file')->store('cnics', 'public');
        }

        $user->update($data);
        return back()->with('success', 'Alumni profile updated successfully.');
    }

    // ── Approve ───────────────────────────────────────────────────────────────

    public function approve($id)
    {
        $user = AlumniUser::findOrFail($id);

        // Generate a random password
        $plainPassword = Str::random(10);

        $user->update([
            'status'    => 'approved',
            'is_active' => true,
            'password'  => $plainPassword,   // model casts handle hashing
        ]);

        // Send approval email with credentials
        $user->notify(new AlumniApproved($plainPassword));

        return back()->with('success', "Alumni approved. Login credentials emailed to {$user->email}.");
    }

    // ── Reject ────────────────────────────────────────────────────────────────

    public function reject($id)
    {
        $user = AlumniUser::findOrFail($id);
        $user->update(['status' => 'rejected']);

        // Send rejection email
        $user->notify(new AlumniRejected());

        return back()->with('success', 'Alumni application rejected. Rejection email sent.');
    }

    // ── Toggle active/suspended ───────────────────────────────────────────────

    public function toggleStatus($id)
    {
        $user = AlumniUser::findOrFail($id);
        $user->update(['is_active' => ! $user->is_active]);
        return response()->json(['is_active' => $user->is_active]);
    }

    // ── Mark as Star Alumni ───────────────────────────────────────────────────

    public function markStar(Request $request, $id)
    {
        $request->validate([
            'star_description' => 'required|string|max:1000',
        ]);

        $user = AlumniUser::findOrFail($id);
        $user->update([
            'is_star_alumni'   => true,
            'star_description' => $request->star_description,
        ]);

        return back()->with('success', "{$user->full_name} marked as Star Alumni.");
    }

    // ── Export CSV ────────────────────────────────────────────────────────────

    public function export()
    {
        $users   = AlumniUser::where('status', 'approved')->get();
        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=alumni_users_' . now()->format('Y-m-d') . '.csv',
        ];

        $callback = function () use ($users) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Name', 'Email', 'Phone', 'CCP No', 'Entry', 'House', 'City', 'Country', 'Designation', 'Organization', 'Status', 'Star Alumni']);
            foreach ($users as $u) {
                fputcsv($file, [
                    $u->full_name, $u->email, $u->phone_number, $u->ccp_no,
                    $u->entry, $u->house, $u->current_city, $u->current_country,
                    $u->current_designation, $u->current_organization,
                    $u->status, $u->is_star_alumni ? 'Yes' : 'No',
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}