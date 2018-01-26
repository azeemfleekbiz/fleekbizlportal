<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogoFonts extends Model
{
    protected $table = 'logo_font';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','title','order_types','img_path','status', 'create_at','updated_at'];
    protected $id = 1;
    protected $title;
    protected $order_types;
    protected $img_path;   
    protected $status;
    protected $create_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
}
