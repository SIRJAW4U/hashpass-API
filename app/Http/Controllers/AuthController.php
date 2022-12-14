<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function signUp(Request $request){
      $fields = $request->validate([
        'name' => 'required|string',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string|confirmed',
      ]);

      $user = User::create([
        'name' => $fields['name'],
        'email' => $fields['email'],
        'password' => bcrypt($fields['password'])
      ]);

      $token = $user->createToken('apitoken')->plainTextToken;

      $response = [
        'user' => $user,
        'token' =>$token
      ];

      return response($response, Response::HTTP_CREATED);
    }
}
