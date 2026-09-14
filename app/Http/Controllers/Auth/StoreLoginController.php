<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class StoreLoginController extends Controller
{
    public function __invoke(StoreLoginRequest $request): RedirectResponse
    {
        if ( ! Auth::attempt($request->only(['email', 'password']))) {
            return redirect()
                ->back()
                ->withErrors(['password' => 'We were unable to authenticate you using the provided credentials'])
                ->withInput();
        }

        $request->session()->regenerate();

        return redirect()->intended(route('member.dashboard'))->with('success', 'You have successfully logged in.');
    }
}
