<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PromoterAmenities extends Model
{
        protected $table="tbl_pro_amenities";
        protected $primaryKey="ProAmenitId";
        protected $fillable = [
            'id',
            'ProAmenitName', 
            'ProSiteId',  
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}