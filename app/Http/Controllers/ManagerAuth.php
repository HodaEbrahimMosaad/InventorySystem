<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerAuth extends Controller
{
    public function login()
    {
        return view('manager.login');
    }
    public function login_action(Request $request)
    {
        $rememberme = request('rememberme') == 1 ? true : false;
        if (auth()->attempt(['email' => $request->email, 'password' =>$request->password], $rememberme)) {
            return redirect(murl('home'));
        } else {
            session()->flash('error', 'Error Information');
            return redirect(murl('login'));
        }
    }

    public function signout()
    {
        auth()->logout();
        return redirect(murl('login'));
    }

    public function home()
    {
        return view('manager.home');
    }
}
