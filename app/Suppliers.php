<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table = 'suppliers';
    protected $fillable = [
        'name', 'phone', 'email', 'additional_information' , 'created_by', 'updated_by', 'deleted_by'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}