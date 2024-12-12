<?php

namespace App\Http\Controllers\Api\v1\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// models
use App\Models\Admin;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function login(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $admin = Admin::where("email",$request->email)->first();

        if($admin && Hash::check($request->password,$admin->password)){

            // create jwt token
            $token = $admin->createToken("admin-login")->plainTextToken;

            return response([
                "message" => "Credentails Valid",
                "token" => $token,
                "success" => true,
            ],200);
        }

        return response([
            "message" => "Credentails Invalid",
            "success" => false
        ],400);
    }


    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
