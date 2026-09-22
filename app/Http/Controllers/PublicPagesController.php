<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PublicPagesController extends Controller
{
    public function index(): View
    {
        return view('public-pages.index');
    }

    public function about(): View
    {
        return view('public-pages.about');
    }
}
