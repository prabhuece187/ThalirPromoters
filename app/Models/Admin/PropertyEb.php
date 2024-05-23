<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PropertyEb extends Model
{
        protected $table="tbl_property_eb";
        protected $primaryKey="PropertyEbId ";
        protected $fillable = [
            'id',
            'PropertyEbStatus',  
            'PropertyEbDetail',  
            'PropertyId',  
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}