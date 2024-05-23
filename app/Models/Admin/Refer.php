<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class Refer extends Model
{
    protected $table="tbl_refer";
    protected $primaryKey="ReferId";
    protected $fillable = [
        'id',
        'ReferDate',  
        'ReferLead',  
        'ReferStatus',
        'ReferFor',
        'ReferType',
        'ReferSize',
        'ReferVideo', 
        'ReferFacing',
        'AreaId',
        'AreaName',
        'ReferVal',
        'ReferFullDetails',
        'ReferName',
        'ReferNumber',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}