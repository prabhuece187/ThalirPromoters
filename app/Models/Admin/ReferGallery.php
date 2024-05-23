<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class ReferGallery extends Model
{
        protected $table="tbl_refer_gallery";
        protected $primaryKey="ReferGalleryId";
        protected $fillable = [
            'id',
            'ReferGalleryImage', 
            'ReferId',
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}