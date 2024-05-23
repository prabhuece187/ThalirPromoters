<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Abo;
use App\User;
use DB;
use Auth;

class AboController extends Controller
{
    public function index(Request $request)
    {
        $RoleId = Auth::user()->RoleId;

        $data = Abo::select('*')
        ->get();

         $id = Auth::id();  

        return response(['data' => $data , 'role' => $RoleId ,'id' => $id]);
    }

    public function store(Request $request)
    {
        $spec = $request->all();
        // $spec['id'] = Auth::id();
        $spec = Abo::create($spec);
        
        return response($spec);
    }

    public function update(Request $request, $AboId)
    {
        $spec = Abo::where('tbl_abo.AboId',$AboId)->first();
        $input = $request->all();
        // $input['id']=Auth::id();
        $spec->update($input);

        return response($spec);       
    }

    public function destroy(Request $request, $id)
    {
        $spec = Abo::where('tbl_abo.id',Auth::id())->find($id);
        $spec->delete();

        return response($spec);
    }

}