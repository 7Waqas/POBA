<?php
// FILE: app/Http/Controllers/Admin/DashboardController.php
// REPLACE entire file

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlumniUser;
use App\Models\Event;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Only load stats for sections the user can access
        $totalAlumni    = $user->hasPermission('alumni_users') ? AlumniUser::where('status', 'approved')->count() : null;
        $pendingAlumni  = $user->hasPermission('alumni_users') ? AlumniUser::where('status', 'pending')->count() : null;
        $totalEvents    = $user->hasPermission('events') ? Event::count() : null;
        $upcomingEvents = $user->hasPermission('events') ? Event::where('is_upcoming', true)->count() : null;
        $totalNews      = $user->hasPermission('news') ? News::count() : null;

        return view('admin.dashboard', compact(
            'totalAlumni', 'pendingAlumni', 'totalEvents', 'upcomingEvents', 'totalNews'
        ));
    }
}
