<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 'ADMIN';
    const MANAGER = 'MANAGER';

    public function users() {
        return $this->belongsTo(User::class, 'role_user', 'role_id', 'user_id');
    }

}
