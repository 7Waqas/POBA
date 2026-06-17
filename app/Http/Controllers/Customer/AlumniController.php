<?php
// FILE: app/Http/Controllers/Customer/AlumniController.php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\AlumniUser;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    // ── Alumni Directory ──────────────────────────────────────────────────────
    public function index(Request $request)
    {
        $query = AlumniUser::where('status', 'approved')
                           ->where('is_active', true)
                           ->where('is_star_alumni', false);

        if ($request->filled('search')) {
            $query->where('full_name', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('class_year')) {
            $query->where('class_year', $request->class_year);
        }
        if ($request->filled('field_work')) {
            $query->where('field_of_work', $request->field_work);
        }
        if ($request->filled('city')) {
            $query->where('current_city', $request->city);
        }

        $alumni = $query->orderByDesc('created_at')->paginate(8);
        return view('customer.alumni.index', compact('alumni'));
    }

    // ── Alumni Profile Detail ─────────────────────────────────────────────────
    public function show($id)
    {
        $alumni = AlumniUser::where('status', 'approved')
                            ->where('is_active', true)
                            ->findOrFail($id);

        return view('customer.alumni.show', compact('alumni'));
    }

    // ── Star Alumni Listing ───────────────────────────────────────────────────
    public function starAlumni(Request $request)
    {
        $query = AlumniUser::where('status', 'approved')
                           ->where('is_active', true)
                           ->where('is_star_alumni', true);

        if ($request->filled('search')) {
            $query->where('full_name', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('class_year')) {
            $query->where('class_year', $request->class_year);
        }
        if ($request->filled('field_work')) {
            $query->where('field_of_work', $request->field_work);
        }
        if ($request->filled('city')) {
            $query->where('current_city', $request->city);
        }

        $alumni = $query->orderByDesc('created_at')->paginate(8);
        return view('customer.star-alumni.index', compact('alumni'));
    }
}
