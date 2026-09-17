<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('auth.forgot-password');
    }
}
