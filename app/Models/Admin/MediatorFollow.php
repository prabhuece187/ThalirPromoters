<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class MediatorFollow extends Model
{
    protected $table="tbl_mediator_follow";
    protected $primaryKey="MediatorFollowId";
    protected $fillable = [
        'MediatorName',
        'MediatorId',
        'AboId',
        'PropertyId',
        'PropertyName',
        'MediatorViewedBuyer',
        'MediatorFollowDate',
        'MediatorFollowDesc',
        'MediatorFollowStatus',
        'MediatorFollowRemarks',
        'id',
        'MediatorNotifyStatus'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
