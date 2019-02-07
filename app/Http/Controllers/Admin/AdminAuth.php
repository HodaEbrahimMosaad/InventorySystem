<?php

namespace App\Http\Controllers\Admin;
use App\User;
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
        $admin = User::where('email' , $request->email)->first();
        if ($admin){
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email' => $admin->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['admin'=>$admin , 'token'=>$token]));
            session()->flash('suc' , 'Reset link has been sent to your email');
            return redirect(aurl('login'));
        }
        return redirect(aurl('login'));
    }

    public function reset_password_by_token($token)
    {
        $admin_token = DB::table('password_resets')->where('token', $token)->first();
        if($admin_token)
        {
            return view('admin.reset_password_by_token', compact('admin_token'));
        } else {
            session()->fresh('error', 'Try Again');
            redirect(aurl('reset_password'));
        }
    }

    public function reset_password_by_token_action($token, Request $request)
    {
        $attributes = $request->validate([
            'password' => 'required|min:6|max:10|confirmed',
            'password_confirmation' => 'required'
        ], [] , [
            'password_confirmation' => 'Confirmation password'
        ]);
        $admin_token = DB::table('password_resets')->where('token', $token)->first();
        if($admin_token)
        {
            $admin = User::where('email' , $admin_token->email)->update([
                'password' => bcrypt($request->password)
            ]);
            DB::table('password_resets')->where('email', $admin_token->email)->delete();
            admin()->attempt(['email'=>$admin_token->email , 'password'=> $request->password], true);
            return redirect(aurl());

        } else {
            session()->flash('error', 'Try Again');
            redirect(aurl('reset_password'));
        }
    }
}
