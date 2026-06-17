<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\GalleryFolder;
use Illuminate\Http\Request;

class GalleryController extends Controller {
    public function index(Request $request) {
        $query = GalleryFolder::where('type', '!=', 'Private');
        if ($request->search)     $query->where('folder_name', 'like', "%{$request->search}%");
        if ($request->class_year) $query->where('class_year', $request->class_year);
        if ($request->event_type) $query->where('type', $request->event_type);
        $folders = $query->orderByDesc('created_at')->paginate(8);
        return view('customer.gallery.index', compact('folders'));
    }

    public function show($id) {
        $folder = GalleryFolder::with('images')->findOrFail($id);
        return view('customer.gallery.show', compact('folder'));
    }
}
