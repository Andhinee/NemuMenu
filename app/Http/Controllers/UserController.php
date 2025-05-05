<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserNemumenu;

class UserController extends Controller
{
    public function index()
    {
        return UserNemumenu::all();
    }

    public function show($id)
    {
        return UserNemumenu::findOrFail($id);
    }

    public function store(Request $request)
    {
        return UserNemumenu::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $user = UserNemumenu::findOrFail($id);
        $user->update($request->all());
        return $user;
    }

    public function destroy($id)
    {
        $user = UserNemumenu::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }
}
