<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Roof extends Model
{
        protected $table="tbl_roof";
        protected $primaryKey="RoofId";
        protected $fillable = [
            'id',
            'RoofName', 
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}   