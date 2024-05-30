<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Models\Admin\Asp;
use App\Models\Admin\AspData;
use Auth;
use DB;
use App\User;

class AspDataController extends Controller
{
	public function index(Request $request)
    {
      if(Auth::user()->RoleId == 1)
      {
            if($request->searchdata == "")
            {
                $filter = json_decode($request->filter);
                $sorting = json_decode($request->sorting);

                $data = AspData::select( 'tbl_asp_data.*')
                ->whereNotIn('tbl_asp_data.AspDataStatus', ['Completed']);

                $total = $data->count();

                $data = $data->take($request->count)
                        ->skip($request->count*($request->page-1))
                        ->orderBy(key((array)($sorting)),current((array)($sorting)))
                        ->get();
            }
            else
            {
                $filter = json_decode($request->filter);
                $sorting = json_decode($request->sorting);

                $data = AspData::select( 'tbl_asp_data.*')
                ->whereNotIn('tbl_asp_data.AspDataStatus', ['Completed'])
                ->where('tbl_asp_data.AspDataId', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_asp_data.AspDataType', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_asp_data.AspDataLead', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_asp_data.AspDataFor', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_asp_data.AspDataVal', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_asp_data.AspDataFacing', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_asp_data.AspDataName', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_asp_data.AspDataNumber', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_asp_data.AspDataSize', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_asp_data.AreaName', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_asp_data.AspDataFullDetails', 'LIKE', '%' . $request->searchdata . '%')
                ->orderBy('tbl_asp_data.AspDataId','desc');

                $total = $data->count();

                $data = $data->take($request->count)
                        ->skip($request->count*($request->page-1))
                        ->orderBy(key((array)($sorting)),current((array)($sorting)))
                        ->get();
            }
      }

       $RoleId = Auth::user()->RoleId;
       return response(['data' => $data , 'role' => $RoleId,'total' => $total ]);
    }

	public function store(Request $request)
	{
        $input = $request->all();
        $input['id'] = Auth::id();

        $data = AspData::create($input);

        return response($input);

	}

	public function AspDataUpdate(Request $request,$id)
    {
        $input = $request->all();
        $aspdata = AspData::where('tbl_asp_data.id',Auth::id())->find($id);

        $input['id'] = Auth::id();

        $data = $aspdata->update($input);

        return response($input);
    }

    public function AspDataDelete(Request $request, $id)
    {
        $aspdata = AspData::where('tbl_asp_data.id',Auth::id())->find($id);
        $aspdata->delete();

        return response($data);
    }


    public function AspDataStatusUpdate(Request $request,$id)
    {
        $status = AspData::where('tbl_asp_data.id',Auth::id())->find($id);
        $input = $request->all();
        $status->update(['AspDataStatus'=>$input['AspDataStatus']]);

        return response($status);
    }


}
