<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\UserNemumenu;

class LoginController extends Controller
{
    // In LoginController
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = UserNemumenu::where('email', $request->email)
                            ->orWhere('username', $request->email)
                            ->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 401);
        }

        // Hash::check for password verification
        if (Hash::check($request->password, $user->password_user)) {
            return response()->json([
                'message' => 'Login successful',
                'user' => [
                    'user_id' => $user->user_id,
                    'username' => $user->username,
                    'email' => $user->email
                ]
            ]);
        }

        return response()->json(['message' => 'Incorrect password'], 401);
    }
}