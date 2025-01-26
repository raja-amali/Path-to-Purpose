<?php

namespace App\Helpers;

use App\Models\User;

class UserHelper
{
    public function findUser($email, $loginType)
    {
        // Query the user based on email, role, and login_type
        $user = User::where('email', $email)
            ->where('login_type', $loginType)
            ->first();

        if (!$user) {
            throw new \Exception('Please register first to login');
        }

        if ($user->is_blocked) {
            throw new \Exception('User is blocked, contact admin');
        }

        return $user;
    }
}
