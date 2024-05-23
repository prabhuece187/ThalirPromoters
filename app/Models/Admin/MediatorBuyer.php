<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class MediatorBuyer extends Model
{
    protected $table="tbl_mediator_buyer";
    protected $primaryKey="MediatorBuyerId";
    protected $fillable = [
        'MediatorName', 
        'MediatorId', 
        'PropertyId', 
        'PropertyName', 
        'PersonName', 
        'PersonNumber', 
        'MediatorBuyerDate', 
        'MediatorBuyerDesc', 
        'MediatorBuyerStatus', 
        'MediatorBuyerRemarks', 
        'id'
    ];
    protected $hidden = [   
        'created_at',
        'updated_at',
    ];
}   