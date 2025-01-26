<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\UserHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    protected $userHelper;

    public function __construct(UserHelper $userHelper)
    {
        $this->userHelper = $userHelper;
    }

    // Redirect to Google
    public function redirectToGoogle(Request $request)
    {
        // Store action (login or register) in session
        $action = $request->query('action'); // login or register
        if ($action === 'register') {
            $userType = $request->query('user_type');

            session([
                'user_type' => $userType,
                'action' => $action
            ]);
        } else {
            session([
                'action' => $action // Only store the action
            ]);
        }

        return Socialite::driver('google')->redirect();
    }

    // Handle Google callback
    public function handleGoogleCallback()
    {
        // Retrieve the user_type from the session and destroy it after use
        $action = session('action');
        $userRole = session('user_type'); // Will be null for login
        session()->forget(['user_type', 'action']); // Clear session data

        $googleUser = Socialite::driver('google')->user();

        try {
            if ($action === 'login') {
                return $this->handleGoogleLogin($googleUser);
            } else {
                return $this->handleGoogleRegister($googleUser, $userRole);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Handle Google Login
    private function handleGoogleLogin($googleUser)
    {
        try {
            $user = $this->userHelper->findUser($googleUser->email, 'google');

            // Log in the user
            Auth::login($user);
            return redirect()->route('home');
        } catch (\Exception $e) {

            return redirect()->route('login')->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Handle Google Register
    private function handleGoogleRegister($googleUser, $userRole)
    {
        try {
            // Check if the user already exists with the specified login type
            $user = $this->userHelper->findUser($googleUser->email, 'google');

            // If the user exists, log them in
            $auth_user = Auth::login($user);
            return redirect()->route('home');
        } catch (\Exception $e) {
            if ($e->getMessage() === 'Please register first to login') {
                // Register the user with Google login_type
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make(Str::random(8)),
                    'role' => $userRole,
                    'login_type' => 'google',
                    'is_blocked' => '0',
                ]);

                // Log the user in after registration
                Auth::login($user);
                return redirect()->route('home');
            }
            return redirect()->route('login')->withErrors(['error' => $e->getMessage()]);
        }
    }
}
