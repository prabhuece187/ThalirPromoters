<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Purpose extends Model
{
        protected $table="tbl_purpose";
        protected $primaryKey="PurposeId";
        protected $fillable = [
            'id',
            'PurposeName', 
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}   