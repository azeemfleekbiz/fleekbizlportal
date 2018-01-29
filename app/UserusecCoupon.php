<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserusecCoupon extends Model
{
    protected $table = 'user_used_coupons';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','coupon_id','order_id','user_id'];
    protected $id = 1;
    protected $coupon_id;    
    protected $order_id;
    protected $user_id;
    protected $create_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
}
