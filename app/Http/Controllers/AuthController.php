<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    //

    public function memberRegistration(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'password_confirmation' => 'required',
            'profile_image' => 'nullable|mimes:png,jpg|max: 2048'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validation->errors()
            ], 400);
        }

        $profile_image = null;
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $image_name = 'profile_image_' . time() . $image->getClientOriginalExtension();
            $image->storeAs('profile_image', $image_name);
            $profile_image = 'storage/profile_image/' . $image_name;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image' => $profile_image
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Registration Successful',
            'data' => $user,
            'token' => $token,
        ], 200);
    }

    public function login(Request $request)
    {
        $validation = validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Validation Error",
                'errors' => $validation->errors()
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Credentials not match',
                'errors' => $validation->errors()
            ], 400);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login Successful',
            'data' => $user,
            'token' => $token,
        ], 200);
    }





    public function logout()
    {
        Session::flush();
        Auth::logout();
        return response()->json(['message' => 'Logged out successfully']);
    }


}
