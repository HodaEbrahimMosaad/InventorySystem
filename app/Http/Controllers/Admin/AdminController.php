<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:15',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);
        $inputs = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ];
        $user = User::create($inputs);
        
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => 1
        ]);
        session()->flash('suc', 'Admin has been created suc');
        return redirect(aurl('create'));
    }
}
