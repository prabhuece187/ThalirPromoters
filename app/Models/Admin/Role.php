<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Role extends Model
{
        protected $table="tbl_role";
        protected $primaryKey="RoleId";
        protected $fillable = [
            'id',
            'RoleName', 
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}   