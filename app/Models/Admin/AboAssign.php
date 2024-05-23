<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class AboAssign extends Model
{
    protected $table="tbl_abo_assign";
    protected $primaryKey="AboAssignedId";
    protected $fillable = [
        'AboName', 
        'AboId', 
        'PropertyId', 
        'PropertyName', 
        'AboAssignDate', 
        'AboAssignDesc', 
        'AboAssignRemarks', 
        'AboAssignStatus', 
        'AboAssignAccess', 
        'id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}   