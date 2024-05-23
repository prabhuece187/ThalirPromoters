<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PromoterAddition extends Model
{
        protected $table="tbl_pro_additional";
        protected $primaryKey="ProAdditionalId ";
        protected $fillable = [
            'id',
            'ProSiteId', 
            'ProAdditionalName',  
            'ProAdditionalArea',  
            'ProAdditionalUnit',  
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}