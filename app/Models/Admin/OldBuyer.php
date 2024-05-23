<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class OldBuyer extends Model
{
        protected $table="tbl_oldbuyer";
        protected $primaryKey="OldBuyerId";
        protected $fillable = [
            'id',
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