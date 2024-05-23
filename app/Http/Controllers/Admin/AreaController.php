<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Area;
use App\User;
use DB;
use Auth;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        $data = Area::select('*')
        ->get();

        return response($data);
    }

    public function store(Request $request)
    {
        $spec = $request->all();
        $spec['id'] = Auth::id();
        $spec = Area::create($spec);
        
        return response($spec);
    }

    public function update(Request $request, $id)
    {
        $spec = Area::where('tbl_area.id',Auth::id())->find($id);
        $input = $request->all();
        $input['id']=Auth::id();
        $spec->update($input);

        return response($spec);       
    }

    public function destroy(Request $request, $id)
    {
        $spec = Area::where('tbl_area.id',Auth::id())->find($id);
        $spec->delete();

        return response($spec);
    }

}