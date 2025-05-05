<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserNemumenu;
use App\Http\Resources\UserNemumenuResource;

class UserNemumenuController extends Controller
{
    public function index()
    {
        return UserNemumenuResource::collection(UserNemumenu::all());
    }

    public function show($id)
    {
        $user = UserNemumenu::findOrFail($id);
        return new UserNemumenuResource($user);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'USER_ID' => 'required|string|max:6|unique:USER_NEMUMENU,USER_ID',
            'USERNAME' => 'required|string|max:50',
            'EMAIL' => 'required|string|email|max:100',
            'PASSWORD_USER' => 'required|string|max:250',
        ]);

        $user = UserNemumenu::create($validated);
        return new UserNemumenuResource($user);
    }

    public function update(Request $request, $id)
    {
        $user = UserNemumenu::findOrFail($id);

        $validated = $request->validate([
            'USERNAME' => 'sometimes|string|max:50',
            'EMAIL' => 'sometimes|string|email|max:100',
            'PASSWORD_USER' => 'sometimes|string|max:250',
        ]);

        $user->update($validated);
        return new UserNemumenuResource($user);
    }

    public function destroy($id)
    {
        $user = UserNemumenu::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted']);
    }
}
