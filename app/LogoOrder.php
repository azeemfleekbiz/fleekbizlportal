<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogoOrder extends Model
{
    protected $table = 'logo_orders';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','user_id','order_type','logo_name','logo_slogan','logo_cat', 'logo_web_url', 'logo_target_audience','logo_descrip','logo_competitor_url','logo_sample','logo_visual_descp','logo_visual_images','logo_type','logo_color','logo_other_color','logo_usage','logo_other_usage','logo_fonts','logo_other_fonts','logo_feel','communication_team','helpful_images'];
    protected $id = 1;
    protected $user_id;
    protected $order_type;
    protected $logo_name;
    protected $logo_slogan;
    protected $logo_cat;
    protected $logo_web_url;
    protected $logo_target_audience;
    protected $logo_descrip;
    protected $logo_competitor_url;
    protected $logo_sample;
    protected $logo_visual_descp;
    protected $logo_visual_images;
    protected $logo_type;
    protected $logo_color;
    protected $logo_other_color;
    protected $logo_usage;
    protected $logo_other_usage;
    protected $logo_fonts;
    protected $logo_other_fonts;
    protected $logo_feel;
    protected $communication_team;
    protected $helpful_images;
    protected $created_at;
    protected $updated_at;
    
    
        public function user() {
        return $this->belongsTo('App\User');
        }
}
