<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentAdons extends Model
{
    protected $table = 'packages_payment_addons';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','order_type_id','title','img_path','price','descp','status', 'create_at','updated_at'];
    protected $id = 1;
    protected $order_type_id;
    protected $title;
    protected $img_path;
    protected $price;
    protected $descp;   
    protected $status;
    protected $create_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
}
