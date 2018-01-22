<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logoType extends Model
{
    protected $table = 'logo';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','title','order_types','img_path','type_of_logo','status', 'createdAt','updatedAt'];
    protected $id = 1;
    protected $title;
    protected $order_types;
    protected $img_path;
    protected $type_of_logo;
    protected $status;
    protected $createdAt;
    protected $updatedAt;
    public $timestamps = false; // for false updated_at and created_at
}
