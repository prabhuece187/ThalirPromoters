<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PropertyFollow extends Model
{
        protected $table="tbl_property_follow";
        protected $primaryKey="FollowId";
        protected $fillable = [
            'id',
            'PropertyName', 
            'PropertyId',   
            'ViewedBuyer',   
            'FollowStatus',  
            'FollowDate',
            'FollowDescription',
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}