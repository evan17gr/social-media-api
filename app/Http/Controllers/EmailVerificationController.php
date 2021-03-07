<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailVerificationController extends Controller
{
   public function verify( Request $request){
       dd($request->input("token"));
       $user = User::where($request->input("token") ,"verification_token");

       if($user){
           $user->markEmailAsVerified();
           $user->email_verified_at = now();
           return response()->json(["msg" => "Email has been verified"]);
       } 
   }

   public static function sendVerificationEmail($email,$username,$verificationToken){
       $userInfo = [
           "username" => $username,
           "verification_token" => $verificationToken,
       ];
       Mail::to($email)->send(new VerifyEmail($userInfo));
   }
}
