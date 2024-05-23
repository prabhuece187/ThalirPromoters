<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Knowus extends Model
{
        protected $table="tbl_knowus";
        protected $primaryKey="KnowusId";
        protected $fillable = [
            'id',
            'KnowusName', 
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}       