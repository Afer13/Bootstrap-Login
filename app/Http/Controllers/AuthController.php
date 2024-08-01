<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\VerifyEmail;
use App\Mail\VerifyOtpEmail;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }
    public function loginPost(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (AuthService::login($credentials)) {
            $user = UserService::findEmailUser($request->email);
            Auth::login($user);
            return redirect('/admin/index');
        } else {
            return back()->with('warning', 'Username or password is incorrect!');
        }
    }

    public function registerIndex()
    {
        return view('auth.register');
    }
    public function registerSendOtp(Request $request)
    {
        $filter = Validator::make($request->all(),[
            'name'=>'required|max:255',
            'surname'=>'required|max:255',
            'email'=>'email|required|max:255|unique:users',
            'password'=>'required|max:255|confirmed'
        ]);
        if($filter->fails()){
            $messages = $filter->messages();
            return response()->json(['status'=>'error',"errors" => $messages]);
        }
        $otp=AuthService::createRegisterOtp($request->email);
        //SMDP conf-u yoxdur
        // Mail::to($request->email)->send(new VerifyOtpEmail($otp,$request->email));
        return response()->json(['status'=>'success']);
    }
    public function registerPost(Request $request)
    {
        $filter = Validator::make($request->all(),[
            'name'=>'required|max:255',
            'surname'=>'required|max:255',
            'email'=>'email|required|max:255|unique:users',
            'password'=>'required|max:255|confirmed',
            'otp'=>'required',
        ]);
        if($filter->fails()){
            $messages = $filter->messages();
            return response()->json(['status'=>'error',"errors" => $messages]);
        }
        $check=AuthService::checkOtp($request->email,$request->otp);
        if(!$check){
            return response()->json(['status'=>'warning','message'=>'Otp code is wrong or limit is exceeded']);
        }
        
        $data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        $newUser = new UserService();
        $userId = $newUser->createUser($data);
        Auth::login($newUser->getUser($userId));
        return response()->json(['status'=>'success','redirectUrl'=>'/admin/index']);
    }


    public function logout()
    {
        AuthService::logout();
        return redirect('/');
    }

    public function forgetPasswordEmailIndex()
    {
        return view('auth.forget_password_email');
    }
    public function forgetPasswordSendToken(ForgetPasswordRequest $request)
    {
        if(!UserService::findEmailUser($request->email)){
            return back()->with('warning','Account not found');
        }
        $token=AuthService::createToken($request->email);

        //SMDP conf-u yoxdur
        // Mail::to($request->email)->send(new VerifyEmail($token,$request->email));
        return back()->with('success','A link to reset your password has been sent to your email!');  
    }

    public function resetPasswordIndex(Request $request)
    {
        $token=$request->token??null;
        $email=$request->email??null;
        return view('auth.reset_password', compact('token','email'));
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $tokenData=AuthService::checkToken($request->email,$request->token);
        if($tokenData){
            $tokenData->is_active=0;
            $tokenData->save();
            $user=UserService::findEmailUser($request->email);
            if($user){
                AuthService::resetPassword($user,$request->password);
                return redirect('/login')->with('success','Password changed successfully!');
            }
            else{
                return back()->with('warning','Account not found');
            }
        }
        else{
            return back()->with('warning','Invalid token');
        }
    }
}
