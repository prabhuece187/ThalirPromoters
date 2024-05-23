<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PropertyWater extends Model
{
        protected $table="tbl_property_water";
        protected $primaryKey="PropertyWaterId ";
        protected $fillable = [
            'id',
            'PropertyWaterSource', 
            'PropertyId',  
            'PropertyWaterDetail',  
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}