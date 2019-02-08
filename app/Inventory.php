<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use League\Fractal\Manager;

class Inventory extends Model
{
    use SoftDeletes;
    protected $table = 'inventories';

    protected $fillable = [
        'name', 'description', 'created_by', 'updated_by', 'deleted_by', 'manager_id'
    ];



    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
