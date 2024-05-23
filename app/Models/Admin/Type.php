<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Type extends Model
{
        protected $table="tbl_type";
        protected $primaryKey="TypeId";
        protected $fillable = [
            'id',
            'TypeName', 
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}   