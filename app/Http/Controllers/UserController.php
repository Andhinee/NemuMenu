<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserNemumenu;
use App\Http\Resources\UserResource; // Import UserResource untuk respons yang lebih rapi
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Menampilkan semua data pengguna
    public function index()
    {
        return UserResource::collection(UserNemumenu::all());
    }

    // Menampilkan data pengguna berdasarkan ID
    public function show($id)
    {
        $user = UserNemumenu::findOrFail($id);
        return new UserResource($user);  // Menggunakan resource untuk respons yang lebih rapi
    }

    // Menyimpan data pengguna baru
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'USERNAME' => 'required|string|max:255',
            'EMAIL' => 'required|email|unique:USER_NEMUMENU',
            'PASSWORD_USER' => 'required|string|min:6',  // Pastikan password memiliki panjang minimal
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);  // Mengembalikan error jika validasi gagal
        }

        $user = UserNemumenu::create([
            'USERNAME' => $request->USERNAME,
            'EMAIL' => $request->EMAIL,
            'PASSWORD_USER' => $request->PASSWORD_USER,
        ]);

        return new UserResource($user);  // Mengembalikan response yang lebih terstruktur
    }

    // Mengupdate data pengguna berdasarkan ID
    public function update(Request $request, $id)
    {
        $user = UserNemumenu::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'USERNAME' => 'sometimes|required|string|max:255',
            'EMAIL' => 'sometimes|required|email|unique:USER_NEMUMENU,EMAIL,' . $user->USER_ID,
            'PASSWORD_USER' => 'sometimes|required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user->update($request->only(['USERNAME', 'EMAIL', 'PASSWORD_USER'])); // Update hanya kolom yang diperlukan

        return new UserResource($user);
    }

    // Menghapus data pengguna berdasarkan ID
    public function destroy($id)
    {
        $user = UserNemumenu::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);  // Menambahkan status code 200
    }
}
