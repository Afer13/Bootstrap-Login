<?php

namespace App\Services;

use App\Interfaces\AuthServiceInterface;
use App\Models\PasswordToken;
use App\Models\RegisterOtp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AuthService implements AuthServiceInterface
{
    public static function login(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public static function logout(): void
    {
        Auth::logout();
    }

    public static function createRegisterOtp($email){
        $otp=rand(100000,999999);
        $new=new RegisterOtp();
        $new->email=$email;
        $new->otp=$otp;
        $new->save();
        return $otp;
    }

    public static function createToken($email){
        $token=Str::random(60);
        $new=new PasswordToken();
        $new->email=$email;
        $new->token=$token;
        $new->save();
        return $token;
    }
    public static function checkToken($email,$token){
        $check=PasswordToken::where('email',$email)->where('token',$token)->where('is_active',1)->where('created_at','<=',now()->addDay(1))->first();
        return $check;
    }
    public static function resetPassword(User $user,$newPassword){
        $user->password=Hash::make($newPassword);
        $user->save();
    }
    public static function checkOtp($email,$otp){
        $check=RegisterOtp::where('email',$email)->where('otp',$otp)->where('is_active',1)->where('created_at','<=',now()->addDay(1))->where('limit','>',0)->orderBy('id','DESC')->first();
        $data=RegisterOtp::where('email',$email)->where('is_active',1)->where('created_at','<=',now()->addDay(1))->where('limit','>',0)->orderBy('id','DESC')->first();
        $data->limit-=1;
        if($data->limit==0){
            $data->is_active=0;
        }
        $data->save();
        return $check;
    }

}
