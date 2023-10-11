<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\StatsDisplay;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Traits\Ntfy;

class AuthenticatedSessionController extends Controller
{
    use Ntfy;
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $statsDisplay = StatsDisplay::first();

        $statsForAll = ($statsDisplay->nom == "all") ? true : false;

        return view('front', ['statsForAll' => $statsForAll]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        $message = auth()->user()->name." vient de se connecter 😀.";
        $this->notify($message);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
