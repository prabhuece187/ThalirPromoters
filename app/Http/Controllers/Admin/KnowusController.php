<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Knowus;
use App\User;
use DB;
use Auth;

class KnowusController extends Controller
{
    public function index(Request $request)
    {
        $data = Knowus::select('*')
        ->get();

        return response($data);
    }

    public function store(Request $request)
    {
        $spec = $request->all();
        $spec['id'] = Auth::id();
        $spec = Knowus::create($spec);
        
        return response($spec);
    }

    public function update(Request $request, $id)
    {
        $spec = Knowus::where('tbl_knowus.id',Auth::id())->find($id);
        $input = $request->all();
        $input['id']=Auth::id();
        $spec->update($input);

        return response($spec);       
    }

    public function destroy(Request $request, $id)
    {
        $spec = Knowus::where('tbl_knowus.id',Auth::id())->find($id);
        $spec->delete();

        return response($spec);
    }

}