<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model, Auth;

class BuyerSeller extends Model
{
        protected $table="tbl_buyer_sell";
        protected $primaryKey="BuyerSellId";
        protected $fillable = [
            'BudjetMin', 
            'BudjetMax', 
            'NeedType', 
            'TypeData',  
            'TypeDescription',  
            'Number',  
            'Area',  
            'Name',  
            'Status',  
            'PendingReason',  
            'Email',
            'ForWhere', 
            'BuyerSellReferName',
            'BuyerSellReferNumber',
            'BuyerSellOwnerName',
            'BuyerSellOwnerNumber',
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}