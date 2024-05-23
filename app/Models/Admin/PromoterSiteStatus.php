<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PromoterSiteStatus extends Model
{
    protected $table="tbl_prosite_status";
    protected $primaryKey="ProSiteStatusId"; 	 	
    protected $fillable = [
        'id',
        'ProSiteId',   
        'FlatNo',  
        'Status',  
        'PromoterSingle',
        'PromoterFree',
        'PromoterThree',
        'PromoterEbNill',
        'PromoterPerSq',
        'PromoterLandUnit',
        'PromoterWidth',
        'PromoterHeight',
        'PromoterLandTotal',
        'PromoterWell',
        'PromoterCorporation',
        'PromoterBore',
        'PromoterWaterNill',
        'PromoterDetailName',
        'PromoterDescription',
        'PromoterTotalAmount',
        'PromoterNorth',
        'PromoterSouth',
        'PromoterEast',
        'PromoterWest',
        'PromoterCorner',
        'PromoterFlatUnit',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}