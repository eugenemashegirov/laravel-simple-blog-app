<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class SessionController extends Controller
{
    public function store(LoginRequest $request) {
        if (auth()->attempt($request->validated())) {
            $request->session()->regenerate();

            return response()->json(['success' => true], 201);
        }

        return response()->json(['message' => 'The provided credentials do not match our records.'], 404);
    }

    public function destroy(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['success' => true], 200);
    }
}
