<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'name', 'email', 'password', 'rememberme', 'created_by', 'updated_by', 'deleted_by'
    ];

    protected $date = ['updated_at', 'created_at', 'deleted_at'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }


    public function suppliers()
    {
        return $this->hasMany(Suppliers::class, 'created_by');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'created_by');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'created_by');
    }

//    public function inventories()
//    {
//        return $this->hasMany(Inventory::class, 'created_by');
//    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'manager_id');
    }

    static function get_managers()
    {
        $managers = UserRole::where('role_id', 2)->get();
        $manager_id = [];
        foreach ($managers as $manager)
        {
            $manager_id[] = $manager->user_id;
        }
        $managers = User::whereIn('id', $manager_id)->get();
        //return $manager_id;
        return $managers;
    }
}
