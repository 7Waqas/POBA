<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CmsSetting;
use App\Models\Faq;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function index() {
        $settings = CmsSetting::pluck('value', 'key');
        $faqs     = Faq::orderBy('sort_order')->get();
        return view('customer.contact', compact('settings', 'faqs'));
    }

    public function send(Request $request) {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email_address' => 'required|email',
            'message'       => 'required',
        ]);
        return back()->with('success', 'Message sent successfully! We will get back to you shortly.');
    }
}
