<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model, Auth;

class BuyerRent extends Model
{
        protected $table="tbl_buyer_rent";
        protected $primaryKey="BuyerRentId";
        protected $fillable = [
            'BudjetMin', 
            'NeedType', 
            'BudjetMax', 
            'TypeData',  
            'TypeDescription',  
            'Number',  
            'Area',  
            'Name',  
            'Status',  
            'PendingReason',  
            'Email',
            'ForWhere',
            'BuyerRentReferName',
            'BuyerRentReferNumber',
            'BuyerRentOwnerName',
            'BuyerRentOwnerNumber',
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}