<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryManager extends Model
{
    protected $table = 'inventory_manager';
    protected $fillable = ['user_id', 'inventory_id'];
}
