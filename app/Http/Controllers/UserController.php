<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserProfile($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $userData = [
            'name' => $user->name,
            'nis' => $user->nis,
            'id_kelas' => $user->id_kelas,
        ];

        return response()->json($userData);
    }
}
