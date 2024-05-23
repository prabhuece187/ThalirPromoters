<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Type;
use App\User;
use DB;
use Auth;

class TypeController extends Controller
{
     public function index(Request $request)
    {

       $data = Type::select('*')
        ->get();
        // $id = Auth::user()->RoleId;
        // $data = DB::select(DB::raw("SELECT * FROM tbl_type as tbt  JOIN users as us ON tbt.id = us.id  and  us.RoleId = COALESCE(NULL, 1)"));

        return response($data);
    }

    public function store(Request $request)
    {
        $type = $request->all();
        
        $type['id'] = Auth::id();
        $type = Type::create($type);
        
        return response($type);
    }

    public function update(Request $request, $id)
    {
        $type = Type::where('tbl_type.id',Auth::id())->find($id);
        $input = $request->all();
        $input['id']=Auth::id();
        $type->update($input);

        return response($type);       
    }

    public function destroy(Request $request, $id)
    {
        $type = Type::where('tbl_type.id',Auth::id())->find($id);
        $type->delete();

        return response($type);
    }

}