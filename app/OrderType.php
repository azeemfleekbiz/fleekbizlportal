<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    protected $table = 'order_types';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','name', 'createdAt','updatedAt'];
    protected $id = 1;
    protected $name;
    protected $createdAt;
    protected $updatedAt;
    public $timestamps = false; // for false updated_at and created_at
    
}
