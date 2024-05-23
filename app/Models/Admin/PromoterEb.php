<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PromoterEb extends Model
{
        protected $table="tbl_pro_eb";
        protected $primaryKey="ProEbId ";
        protected $fillable = [
            'id',
            'ProEbStatus', 
            'ProEbDetail',  
            'ProSiteId',  
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}