<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model, Auth;

class ClientData extends Model
{
    protected $table="tbl_client_data";
    protected $primaryKey="ClientDataId";
    protected $fillable = [
        'clientname', 
        'clientemail', 
        'clientmobile',  
        'need',  
        'Status',  
        'id',  
        'created_at',
    ];
    protected $hidden = [
        
        'updated_at',
    ];

}