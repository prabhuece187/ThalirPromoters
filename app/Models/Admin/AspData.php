<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class AspData extends Model
{
    protected $table="tbl_asp_data";
    protected $primaryKey="AspDataId";
    protected $fillable = [
        'id',
        'AspDataDate',
        'AspDataLead',
        'AspDataStatus',
        'AspDataFor',
        'AspDataType',
        'AspDataSize',
        'AspDataFacing',
        'AreaId',
        'AreaName',
        'AspDataVal',
        'AspDataFullDetails',
        'AspDataName',
        'AspDataNumber',
        'AspStatus',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
