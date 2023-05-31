<?php

namespace App\Http\Controllers;

use App\Models\LevelDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $cekemail = User::where('email', $data['email'])->first();
        if (!$cekemail) {
            response()->json([
                'message' => "Email belum terdaftar",
            ], 400);
        }
        if (!Hash::check($data['password'], $cekemail->password)) {
            return response([
                'message' => 'incorrect password'
            ], 401);
        }
        $token = $cekemail->createToken('apiToken')->plainTextToken;

        return response()->json([
                'message' => "success",
                'token' => $token
            ]);
    }
}
