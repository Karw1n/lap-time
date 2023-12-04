<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// When blogs don't exist user will be redirected to recent posts.
class FallbackController extends Controller
{
    public function __invoke() {
        return view('fallback.index');
    }
}
