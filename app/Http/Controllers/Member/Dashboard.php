<?php

declare(strict_types=1);

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('member.dashboard', []);
    }
}
