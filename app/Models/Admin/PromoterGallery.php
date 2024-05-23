<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PromoterGallery extends Model
{
        protected $table="tbl_pro_gallery";
        protected $primaryKey="ProGalleryId";
        protected $fillable = [
            'id',
            'ProGalleryImage', 
            'ProSiteId',
            'ProTypeName',
            'PromoterName'
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}