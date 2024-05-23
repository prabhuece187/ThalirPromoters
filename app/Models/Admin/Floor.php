<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Floor extends Model
{
        protected $table="tbl_floor";
        protected $primaryKey="FloorId";
        protected $fillable = [
            'id',
            'FloorName', 
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}   