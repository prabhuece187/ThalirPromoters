<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model, Auth;

class Buyer extends Model
{
        protected $table="tbl_buyer";
        protected $primaryKey="BuyerId";
        protected $fillable = [
            'Budjet', 
            'TypeData', 
            'Area',  
            'Name',  
            'Number',  
            'VisitedArea',  
            'NeedToShow',  
            'Status',  
            'PendingReason',  
            'Desc',
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}