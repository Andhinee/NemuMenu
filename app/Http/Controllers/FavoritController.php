<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorit;

class FavoritController extends Controller
{
    public function index()
    {
        return Favorit::all();
    }

    public function show($id)
    {
        return Favorit::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Favorit::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $favorit = Favorit::findOrFail($id);
        $favorit->update($request->all());
        return $favorit;
    }

    public function destroy($id)
    {
        $favorit = Favorit::findOrFail($id);
        $favorit->delete();
        return response()->json(['message' => 'Favorit deleted']);
    }
}
