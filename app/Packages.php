<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    protected $table = 'packages';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','order_type_id','title','sale_price','regular_price', 'createdAt','updatedAt'];
    protected $id = 1;
    protected $order_type_id;
    protected $title;
    protected $sale_price;
    protected $regular_price;
    protected $createdAt;
    protected $updatedAt;
    public $timestamps = false; // for false updated_at and created_at
    
    public function orderpayment() {
        return $this->hasOne('\App\OrdersPayment','id');
    }
}
