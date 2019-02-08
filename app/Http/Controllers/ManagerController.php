<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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

}
