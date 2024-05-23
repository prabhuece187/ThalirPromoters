<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Mediator extends Model
{
        protected $table="tbl_mediator";
        protected $primaryKey="MediatorDataId";
        protected $fillable = [
            'MediatorName', 
            'MediatorId', 
            'AboId', 
            'AboName', 
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