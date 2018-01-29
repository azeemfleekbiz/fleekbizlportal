<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersPayment extends Model
{
    protected $table = 'orders_payments';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','order_id','user_id','order_type','package_id','total_amount'];
    protected $id = 1;
    protected $order_id;
    protected $user_id;
    protected $order_type;
    protected $package_id;
    protected $coupon_id;   
    protected $payment_addon_id;
    protected $total_amount;
    protected $status;
    protected $create_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    public function logoorder() {
        return $this->belongsTo('App\LogoOrder','order_id');
    }
}
