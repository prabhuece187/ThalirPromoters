<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Area extends Model
{
        protected $table="tbl_area";
        protected $primaryKey="AreaId";
        protected $fillable = [
            'id',
            'AreaName', 
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}   