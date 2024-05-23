<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PropertyDocument extends Model
{
        protected $table="tbl_property_document";
        protected $primaryKey="PropertyDocumentId ";
        protected $fillable = [
            'id',
            'PropertyId', 
            'PropertyDocumentName',   
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}