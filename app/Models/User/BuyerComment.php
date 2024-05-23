<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model, Auth;

class BuyerComment extends Model
{
        protected $table="tbl_buyer_comment";
        protected $primaryKey="BuyerCommentId";
        protected $fillable = [
            'StarCount', 
            'CommentDate', 
            'Name',  
            'Number',  
            'CommentDesc',  
            'Email',  
            'PropertyId',  
            'PropertyName',  
            'TypeId',  
            'TypeName',  
            'PromoterName',  
            'ProSiteId',  
        ];
        protected $hidden = [
            'created_at',
            'updated_at',
        ];

}