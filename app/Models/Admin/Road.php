<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Road extends Model
{
        protected $table="tbl_road";
        protected $primaryKey="RoadId";
        protected $fillable = [
            'id',
            'RoadName', 
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}   