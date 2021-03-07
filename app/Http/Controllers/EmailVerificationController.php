<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailVerificationController extends Controller
{
   public function verify( Request $request){
       $user = User::where("verification_token",$request->input("token"))->first();

       if($user->is_verified != true){
           $tokenIssueTime = strtotime($user->verification_token_issued_at);
           if(strtotime(now())-14400 <= $tokenIssueTime ){
                $user->is_verified = true;
                $user->email_verified_at = now();
                $user->save();
                return response()->json(["msg" => "Your email has been verified!","status" => "success"]);
           }
           return response()->json(["msg" => "Token has expired","status" => "fail"]);
       } 
       return response()->json(["status" => "success"]); 
   }

   public static function sendVerificationEmail($email,$username,$verificationToken){
       $userInfo = [
           "username" => $username,
           "verification_token" => $verificationToken,
       ];
       Mail::to($email)->send(new VerifyEmail($userInfo));
   }

   public function resendEmail(Request $request){
        $user = User::where("verification_token",$request->input("token"))->first();

        $verificationToken = sha1(time());
        $user->verification_token = $verificationToken;
        $user->verification_token_issued_at = now();
        $user->save();
        EmailVerificationController::sendVerificationEmail($user->email,$user->username,$verificationToken);
        return response()->json(["msg" => "A new email verification link has been sent to you!"]);
   }
}
