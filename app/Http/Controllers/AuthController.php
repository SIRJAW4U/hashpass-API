<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

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

    public function signIn(Request $request){
			$fields = $request->validate([
					'email' => 'required|string',
					'password' => 'required|string',
			]);

			$user = User::where('email', $fields['email'])->first();
            if(!$user || !Hash::check($fields['password'], $user->password)){
                return response([
                    'message' => 'bad credentials'
                ], Response::HTTP_UNAUTHORIZED);
            }

			$token = $user->createToken('apitoken')->plainTextToken;

			$response = [
					'user' => $user,
					'token' =>$token
			];

			return response($response, Response::HTTP_CREATED);
		}

    public function signOut(Request $request){
        auth()->user()->tokens()->delete();

        return ['message' => 'Signed out'];
    }
}
