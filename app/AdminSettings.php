<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminSettings extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','user_id','site_currency_code','site_currency_symbol','payment_email','payment_mood'];
    protected $id = 1;
    protected $user_id;
    protected $currency;
    protected $paypal_account;
    protected $admin_email;
    protected $created_at;
    protected $updated_at;
    

    //
}
