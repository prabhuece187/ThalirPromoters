<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Mediator;
use App\User;
use DB;
use Auth;

class MediatorController extends Controller
{
    public function index(Request $request)
    {
        $RoleId = Auth::user()->RoleId;

        $data = Mediator::select('*')
        ->get();

         $id = Auth::id();  

        return response(['data' => $data , 'role' => $RoleId ,'id' => $id]);
    }

    public function store(Request $request)
    {
        $spec = $request->all();
        // $spec['id'] = Auth::id();
        $spec = Mediator::create($spec);
        
        return response($spec);
    }

    public function update(Request $request, $MediatorId)
    {
        $spec = Mediator::where('tbl_mediator.MediatorId',$MediatorId)->first();
        $input = $request->all();
        // $input['id']=Auth::id();
        $spec->update($input);

        return response($spec);       
    }

    public function destroy(Request $request, $id)
    {
        $spec = Mediator::where('tbl_mediator.id',Auth::id())->find($id);
        $spec->delete();

        return response($spec);
    }

}