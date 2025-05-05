<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restoran;

class RestoranController extends Controller
{
    public function index()
    {
        return Restoran::all();
    }

    public function show($id)
    {
        return Restoran::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Restoran::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $restoran = Restoran::findOrFail($id);
        $restoran->update($request->all());
        return $restoran;
    }

    public function destroy($id)
    {
        $restoran = Restoran::findOrFail($id);
        $restoran->delete();
        return response()->json(['message' => 'Restoran deleted']);
    }
}
