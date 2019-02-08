<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = User::get_managers();
//        foreach ($managers as $manager) {
//            $man = $manager->inventories;
//            foreach ($man as $mang) {
//                return $mang->name;
//            }
//        }
        return view('manager.index', compact('managers'));

    }

    public function show(User $user)
    {
        return view('manager.show', compact('user'));
    }

    public function create()
    {
        return view('manager.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:15',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);
        $inputs = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'created_by' => admin()->user()->id
        ];
        $user = User::create($inputs);

        UserRole::create([
            'user_id' => $user->id,
            'role_id' => 2
        ]);
        session()->flash('suc', 'Manager has been created suc');
        return redirect(amurl('create'));
    }

    public function edit(User $user)
    {
        return view('manager.edit')->with([
            'manager' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:3|max:15',
            'email' => 'required|unique:users,email,'.$user->id
        ]);
        $inputs = [
            'name' => $request->name,
            'email' => $request->email,
            'updated_by' => admin()->user()->id
        ];

        if (!empty($request->password))
        {
            $request->validate([
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required'
            ]);
            $inputs['password'] = Hash::make($request->password);
        }
        $user = User::find($user->id)->update($inputs);
        session()->flash('suc', 'Manager has been Updated suc');
        return redirect(amurl());
    }

    public function destroy(Request $request)
    {
        $deleted = User::find($request->deletedId);
        User::find($request->deletedId)->update([
            'deleted_by' => admin()->user()->id
        ]);
        $deleted->delete();

        session()->flash('suc', 'Manager has been Deleted suc');
        return 'done';
    }

}
