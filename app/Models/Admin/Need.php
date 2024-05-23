<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Need extends Model
{
        protected $table="tbl_need";
        protected $primaryKey="NeedId";
        protected $fillable = [
            'id',
            'NeedName', 
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}   