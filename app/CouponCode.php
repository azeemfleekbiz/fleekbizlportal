<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponCode extends Model
{
    protected $table = 'user_coupons';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','order_type_id','coupon_code','price','descp','status', 'create_at','updated_at'];
    protected $id = 1;
    protected $order_type_id;    
    protected $coupon_code;
    protected $price;
    protected $descp;   
    protected $status;
    protected $create_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    public function usedcoupons() {
      return $this->hasOne('\App\UserusecCoupon','id');
    }
    
    public function payment() {
        return $this->hasOne('App\OrdersPayment','id');
        }
}
