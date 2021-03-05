<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Users extends Controller
{
    public function signup (Request $request){

        $data = $request->validate([
            "username" => "required|min:4|max:20|alpha_num",
            "email" => "required|email|unique:users",
            "password" => "min:8|required_with:confirmPassword",
            "confirmPassword" => "required|same:password"
        ]);

        $hashedPassword = $data["password"];
        User::hashPassword($hashedPassword);
        $user = [
            "username" => $data["username"],
            "email" => $data["email"],
            "password" => $hashedPassword,
        ];
        
        $userCreated = User::create($user);
        
        if($userCreated != null){
            $verificationToken = sha1(time());
            EmailVerificationController::sendVerificationEmail($user["email"],$user["username"],$verificationToken);
            return response()->json(["msg" => "Account was created, and a verification email has been sent to your email."]);
        }
        

        return response()->json(["success" => "true"]);
    }
}
