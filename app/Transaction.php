<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Transaction extends Model
{
    use SoftDeletes;
    protected $table = 'transactions';
    protected $fillable = [
        'type', 'item', 'amount','notes', 'item_id' , 'created_by', 'updated_by', 'deleted_by'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
