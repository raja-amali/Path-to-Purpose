<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Exception;

class GoogleController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
        
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where([
                'email' => $user->email,
                'login_type' => 'google'
            ])->first();
         
            if($finduser){
                Auth::login($finduser);
                return redirect()->route('home');
         
            }else{
                    $newUser = User::create(
                        [
                            'name' => $user->name,
                            'email' => $user->email,
                            'email_verified_at' => now(),
                            'password' => Hash::make('Password@123'),
                            'role' => 'user',
                            'login_type' => 'google',
                            'is_blocked' => '0',
                            'remember_token' => Str::random(10),
                        ]
                    );
         
                Auth::login($newUser);
                return redirect()->route('home');
            }
        
        } catch (Exception $e) {
            Log::error('An error occurred: ' . $e->getMessage());
            return redirect()->route('home');
        }

    }
}
