<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        // Attempt to authenticate
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            $user = Auth::user();
            session(['name' => $user->name]);
            session(['email' => $user->email]);

            // Determine role robustly (project has id_role / roles table)
            $isAdmin = false;
            if (method_exists($user, 'isAdmin')) {
                $isAdmin = $user->isAdmin();
            } else {
                if (!empty($user->id_role) && $user->id_role == 1) {
                    $isAdmin = true;
                } elseif (!empty($user->role) && strtolower($user->role) === 'admin') {
                    $isAdmin = true;
                }
            }

            $fallback = $isAdmin ? route('admin.dashboard.index') : route('welcome');
            return redirect()->intended($fallback);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput(['email' => $request->email]);
    }



}
