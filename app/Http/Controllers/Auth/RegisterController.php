<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request) {
        $validatedData = $request->validated();

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        if (auth()->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            $request->session()->regenerate();

            return response()->json(['user' => auth()->user()], 201);
        }

        return response()->json(['success' => false], 404);
    }
}
