<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model, Auth;

class PropertyPerson extends Model
{
        protected $table="tbl_property_person";
        protected $primaryKey="PersonId";
        protected $fillable = [
            'id',
            'PropertyName', 
            'PropertyId', 
            'PersonName',  
            'PersonNumber',  
            'PersonDetail',  
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}