<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Role;
use App\User;
use DB;
use Auth;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $data = Role::select('*')
        ->get();

        return response($data);
    }

    public function store(Request $request)
    {
        $spec = $request->all();
        $spec = Role::create($spec);
        
        return response($spec);
    }

    public function update(Request $request, $id)
    {
        $spec = Role::find($id);
        $input = $request->all();
        $spec->update($input);

        return response($spec);       
    }

    public function destroy(Request $request, $id)
    {
        $spec = Role::find($id);
        $spec->delete();

        return response($spec);
    }

    public function RoleGet(Request $request)
    {
        $data = Role::select('*')
        ->get();

        return response($data);
    }

    public function RoleValueGet(Request $request)
    {
        $role = Auth::user()->RoleId; 

        return response($role);
    }


}