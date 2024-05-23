<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class MediatorAssign extends Model
{
    protected $table="tbl_mediator_assign";
    protected $primaryKey="MediatorAssignId";
    protected $fillable = [
        'MediatorName', 
        'MediatorId', 
        'PropertyId', 
        'PropertyName', 
        'AboAssignedId',
        'MediatorAssignDate', 
        'MediatorAssignDesc', 
        'MediatorAssignRemarks', 
        'MediatorAssignStatus', 
        'MediatorAssignAccess', 
        'id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}   