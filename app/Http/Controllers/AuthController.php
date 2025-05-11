<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserNemumenu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Method untuk Signup
    public function signup(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:USER_NEMUMENU,email',
            'password' => 'required|min:8',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()->first(),
            ], 400);
        }

        try {
            // Buat pengguna baru dengan semua kolom yang diperlukan
            $user = new UserNemumenu();
            $user->user_id = $this->generateUserId(); // Generate a unique user ID
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password_user = $request->password;
            // Tambahkan kolom wajib lainnya jika ada
            $user->save();

            // Kembalikan response sukses
            return response()->json([
                'success' => true,
                'message' => 'Akun berhasil dibuat!',
                'user' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Generate a unique user ID
     * You may need to adjust this based on your specific requirements
     */
    private function generateUserId()
    {
        // Option 1: Simple UUID
        return (string) Str::uuid();
        
        // Option 2: Or if you need a numeric ID
        // return 'USR' . time() . rand(1000, 9999);
        
        // Option 3: Or check your DB for the next available ID
        // $lastUser = UserNemumenu::orderBy('USER_ID', 'desc')->first();
        // return $lastUser ? $lastUser->USER_ID + 1 : 1;
    }
}