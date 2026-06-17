<?php
// FILE: app/Http/Controllers/Admin/EventController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request) {
        $query = Event::query();
        if ($request->search) {
            $query->where('title','like',"%{$request->search}%");
        }
        $events = $query->orderByDesc('start_date')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create() {
        return view('admin.events.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title'      => 'required',
            'start_date' => 'required|date',
            'location'   => 'required',
        ]);
        $data = $request->except(['_token','logo']);
        $data['registration_required'] = $request->boolean('registration_required');
        $data['is_upcoming'] = strtotime($request->start_date) >= strtotime(today());
        $data['entry_batches'] = $request->entry_from && $request->entry_to
            ? range($request->entry_from, $request->entry_to)
            : null;

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('events','public');
        }
        Event::create($data);
        return redirect()->route('admin.events.index')->with('success','Event created successfully.');
    }

    public function edit($id) {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id) {
        $event = Event::findOrFail($id);
        $data  = $request->except(['_token','_method','logo']);
        $data['registration_required'] = $request->boolean('registration_required');
        $data['is_upcoming'] = strtotime($request->start_date ?? $event->start_date) >= strtotime(today());

        if ($request->hasFile('logo')) {
            if ($event->logo) Storage::delete($event->logo);
            $data['logo'] = $request->file('logo')->store('events','public');
        }
        $event->update($data);
        return redirect()->route('admin.events.index')->with('success','Event updated successfully.');
    }

    public function destroy($id) {
        $event = Event::findOrFail($id);
        if ($event->logo) Storage::delete($event->logo);
        $event->delete();
        return back()->with('success','Event deleted.');
    }

    public function participants($id) {
        $event = Event::findOrFail($id);
        $participants = EventParticipant::with('alumniUser')
            ->where('event_id', $id)
            ->paginate(10);
        return view('admin.events.participants', compact('event','participants'));
    }
}
