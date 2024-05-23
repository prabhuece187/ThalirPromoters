<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Abo extends Model
{
        protected $table="tbl_abo";
        protected $primaryKey="AboDataId";
        protected $fillable = [
            'AboName', 
            'AboId', 
            'AreaId', 
            'AreaName', 
            'MobileNo', 
            'SubArea', 
            'Address', 
            'id'
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];
}   