<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function index()
    {
        return Ulasan::all();
    }

    public function show($id)
    {
        return Ulasan::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Ulasan::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->update($request->all());
        return $ulasan;
    }

    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();
        return response()->json(['message' => 'Ulasan deleted']);
    }
}
