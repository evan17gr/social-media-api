<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailVerificationController extends Controller
{
   public function verify($user_id, Request $request){
       if(!$request->hasValidSignature()){
           return response()->json(["msg" => "Expired url"]);
       }

       $user = User::findOrFail($user_id);

       if(!$user->hasVerifiedEmail()){
           $user->markEmailAsVerified();
           return response()->json(["msg" => "Email has been verified"]);
       }

      
   }

   public static function sendVerificationEmail($email,$username,$verificationToken){
       $userInfo = [
           "email" => $email,
           "verification_token" => $verificationToken,
       ];
       Mail::to($email)->send(new VerifyEmail($userInfo));
   }
}
