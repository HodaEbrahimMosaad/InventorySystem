<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';
    protected $fillable = [
        'name', 'description', 'created_by', 'updated_by', 'deleted_by'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
