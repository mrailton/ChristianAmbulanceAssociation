<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class StoreRegistrationController extends Controller
{
    public function __invoke(StoreRegistrationRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect()->route('login')->with('success', 'You have successfully registered your account');
    }
}
