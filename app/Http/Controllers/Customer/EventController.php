<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventParticipant;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller {
    public function index() {
        $upcoming = Event::where('is_upcoming', true)->orderBy('start_date')->get();
        $previous = Event::where('is_upcoming', false)->orderByDesc('start_date')->get();
        $myEventIds = [];
        if (Auth::guard('alumni')->check()) {
            $myEventIds = EventParticipant::where('alumni_user_id', Auth::guard('alumni')->id())
                ->where('status', '!=', 'cancelled')->pluck('event_id')->toArray();
        }
        return view('customer.events.index', compact('upcoming', 'previous', 'myEventIds'));
    }

    public function register($id) {
        $alumniId = Auth::guard('alumni')->id();
        EventParticipant::firstOrCreate(
            ['event_id' => $id, 'alumni_user_id' => $alumniId],
            ['status' => 'pending']
        );
        return back()->with('success', 'Registered successfully.');
    }

    public function cancel($id) {
        $alumniId = Auth::guard('alumni')->id();
        EventParticipant::where('event_id', $id)->where('alumni_user_id', $alumniId)->update(['status' => 'cancelled']);
        return back()->with('success', 'Registration cancelled.');
    }
}
