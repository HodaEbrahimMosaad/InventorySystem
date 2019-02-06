<?php

namespace App\Http\Controllers\Admin;
use App\Admin;
use App\Http\Controllers\Controller;

use App\Mail\AdminResetPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminAuth extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function login_action(Request $request)
    {
        $rememberme = $request->rememberme == 1 ? true : false ;
        if(admin()->attempt(['email' => $request->email , 'password'=> $request->password], $rememberme)){
            return redirect(aurl());
        } else {
            session()->flash('error' , 'Log in was unsuccessful.');
            return redirect(aurl('login'));
        }
    }
    public function logout()
    {
        admin()->logout();
        return redirect(aurl('login'));
    }

    public function reset_password()
    {
        return view('admin.reset_password');
    }
    public function reset_password_action(Request $request)
    {
        $admin = Admin::where('email' , $request->email)->first();
        if (!$admin){
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email' => $admin->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin , 'token'=>$token]));
            session()->flash('suc' , 'Reset link has been sent to your email');
            return back();
        }
        return back();
    }
}