<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller {
    public function index() {
        $news = News::orderByDesc('published_at')->paginate(12);
        return view('customer.news.index', compact('news'));
    }

    public function show($id) {
        $item = News::findOrFail($id);
        return view('customer.news.show', compact('item'));
    }
}
