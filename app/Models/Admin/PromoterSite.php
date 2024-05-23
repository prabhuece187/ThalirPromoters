<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PromoterSite extends Model
{
    protected $table="tbl_prosite";
    protected $primaryKey="ProSiteId";
    protected $fillable = [
        'id',
        'SiteMap',  
        'FlatCount',  
        'PromoterName',
        'ProTypeName',
        'ProArea',
        'ProUnit',
        'Budjet', 
        'ProGalleryVideo',
        'ProLocation',
        'ProPincode',
        'ProCity',
        'ProStreet',
        'ProAddress',
        'AreaId',
        'AreaName',
        'ProMinVal',
        'ProMinType',
        'ProMaxVal',
        'ProMaxType',
        'ProDistance',
        'ProStatus',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}