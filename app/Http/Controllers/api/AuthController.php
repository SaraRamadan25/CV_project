<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(UserRequest $request): JsonResponse
    {
        $user = User::create([
            'name'=>$request->name,
            'excerpt'=>$request->excerpt,
            'description'=>$request->description,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'date_of_birth'=>$request->date_of_birth,
            'expert_in'=>$request->expert_in,
            'speeches'=>$request->speeches,
            'image'=>$request->image,
            'freelance'=>$request->freelance

        ]);
        $user->educations()
            ->sync
            (request('education_id'));

        $user->experiences()
            ->sync
            (request('experience_id'));

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token'=>$token,
            'token_type'=>'token',
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'logout'
        ]);
    }

    public function login(Request $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password,$user->password)) {
            return response()->json([
                'message'=>'bad credentials'
            ], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user'=>$user,
            'access_token'=>$token,
            'token_type'=>'token',
        ]);
    }
}
