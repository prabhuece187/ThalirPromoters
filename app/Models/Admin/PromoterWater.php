<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PromoterWater extends Model
{
    protected $table="tbl_pro_water";
    protected $primaryKey="ProWaterId ";
    protected $fillable = [
        'id',
        'ProWaterSource', 
        'ProSiteId',  
        'ProWaterDetail',  
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}