<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserNemumenu;
use App\Http\Resources\UserNemumenuResource;
use Illuminate\Support\Facades\Hash;

class UserNemumenuController extends Controller
{
    // Menampilkan semua user
    public function index()
    {
        return UserNemumenuResource::collection(UserNemumenu::all());
    }

    // Menampilkan detail user berdasarkan ID
    public function show($id)
    {
        $user = UserNemumenu::findOrFail($id);
        return new UserNemumenuResource($user);
    }

    // Menyimpan data user baru
    // In UserNemumenuController
    public function store(Request $request)
    {
        $validated = $request->validate([
            'USER_ID' => 'required|string|max:6|unique:USER_NEMUMENU,USER_ID',
            'USERNAME' => 'required|string|max:50',
            'EMAIL' => 'required|string|email|max:100|unique:USER_NEMUMENU,EMAIL',
            'PASSWORD_USER' => 'required|string|min:8|max:250',
        ]);

        // No hashing here, just store the plain password (or hashed password from signup)
        $user = UserNemumenu::create($validated);

        return new UserNemumenuResource($user);
    }


    // Mengupdate data user
    public function update(Request $request, $id)
    {
        // Cari user berdasarkan ID
        $user = UserNemumenu::findOrFail($id);

        // Validasi data input (yang akan diupdate)
        $validated = $request->validate([
            'USERNAME' => 'sometimes|string|max:50',
            'EMAIL' => 'sometimes|string|email|max:100',
            'PASSWORD_USER' => 'sometimes|string|min:8|max:250',
        ]);

        // Jika password diubah, hash password sebelum disimpan
        if (isset($validated['PASSWORD_USER'])) {
            $validated['PASSWORD_USER'] = Hash::make($validated['PASSWORD_USER']);
        }

        // Update user
        $user->update($validated);

        // Kembalikan resource user yang sudah diperbarui
        return new UserNemumenuResource($user);
    }

    // Menghapus user
    public function destroy($id)
    {
        // Cari dan hapus user berdasarkan ID
        $user = UserNemumenu::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted']);
    }
}
