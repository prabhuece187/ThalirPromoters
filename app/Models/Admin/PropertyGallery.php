<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PropertyGallery extends Model
{
        protected $table="tbl_property_gallery";
        protected $primaryKey="PropertyGalleryId";
        protected $fillable = [
            'id',
            'PropertyGalleryImage', 
            'PropertyId', 
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}