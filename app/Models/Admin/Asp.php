<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Asp extends Model
{
        protected $table="tbl_asp";
        protected $primaryKey="AspDataId";
        protected $fillable = [
            'AspName',
            'AspId',
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
