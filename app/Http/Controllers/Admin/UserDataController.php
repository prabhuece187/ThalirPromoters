<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Role;
use App\Models\Admin\Mediator;
use Auth, Hash;

class UserDataController extends Controller
{
  public function UserDataGet(Request $request)
    {
        $RoleId = Auth::user()->RoleId;

        $data = User::join('tbl_role','users.RoleId','tbl_role.RoleId')->select('*')
        ->get();

         $id = Auth::id();  

        return response(['data' => $data , 'role' => $RoleId ,'id' => $id]);
    }

    public function UserDataUpdate(Request $request,$id)
    {   
        $data = User::find($id);
        $input = $request->all();
        $data->update(['Mobile'=>$input['Mobile'],'email'=>$input['email']]); 

        return response($data);
    }

}
