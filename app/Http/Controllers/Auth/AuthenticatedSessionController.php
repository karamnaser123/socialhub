<?php

namespace App\Http\Controllers\Auth;

use GuzzleHttp\Client;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('g-recaptcha-response')
            ]
        ]);

        $body = json_decode((string)$response->getBody());
        if ($body->success) {
            $request->authenticate();
            
               if (session("locale") != 'en') {
                session(['locale' => 'ar']);
            }

            $request->session()->regenerate();
            if (auth()->user()->usertype_id == 2) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        } else {
            return back()->withErrors(['captcha' => 'Invalid reCAPTCHA response. Please try again.']);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Check the user's usertype
        $usertype = $request->user()->usertype_id;

        // Log the user out
        Auth::guard('web')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Determine the redirect route based on the user's usertype
        if ($usertype == 2) {
            // If the user is an admin, redirect to admin login
            return redirect('/admin/login');
        } else {
            // Otherwise, redirect to the default login page
            return redirect('/login');
        }
    }
}
