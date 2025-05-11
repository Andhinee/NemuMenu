<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restoran;

class RestoranController extends Controller
{
    /**
     * Menampilkan semua restoran (hanya untuk user).
     */
    public function index()
    {
        // Mengambil semua restoran yang ada
        $restorans = Restoran::all();
        return response()->json($restorans);
    }

    /**
     * Menampilkan detail restoran berdasarkan ID (hanya untuk user).
     */
    public function show($id)
    {
        // Mencari restoran berdasarkan ID
        $restoran = Restoran::find($id);

        // Jika restoran tidak ditemukan
        if (!$restoran) {
            return response()->json(['message' => 'Restoran tidak ditemukan'], 404);
        }

        // Mengembalikan data restoran
        return response()->json($restoran);
    }
}
