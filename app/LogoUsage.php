<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogoUsage extends Model
{
    protected $table = 'logo_usage';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','title','order_types','descp','status', 'createdAt','updatedAt'];
    protected $id = 1;
    protected $title;
    protected $order_types;
    protected $descp;   
    protected $status;
    protected $createdAt;
    protected $updatedAt;
    public $timestamps = false; // for false updated_at and created_at
}
