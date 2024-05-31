<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AboAssign;
use App\Models\Admin\Mediator;
use App\Models\Admin\MediatorAssign;
use App\Models\Admin\Property;
use App\User;
use DB;
use Auth;
use DateTime;

class AboAssignController extends Controller
{
   public function AboAssign(Request $request)
   {
        $RoleId = Auth::user()->RoleId;

        if(Auth::user()->RoleId == 1){

            if($request->searchdata == "nosearch")
            {

                $filter = json_decode($request->filter);
                $sorting = json_decode($request->sorting);

                $data = AboAssign::orderBy('tbl_abo_assign.AboAssignStatus','asc','processing');

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

                $datas = AboAssign::orderBy('tbl_abo_assign.AboAssignStatus','asc','processing');

                if (isset($request->propertyname))
                {
                   $datas->where('tbl_abo_assign.PropertyName','LIKE', '%' . $request->propertyname . '%');
                }

                if (isset($request->propertyid))
                {
                   $datas->where('tbl_abo_assign.PropertyId',$request->propertyid);
                }

                if (isset($request->aboname))
                {
                   $datas->where('tbl_abo_assign.AboName','LIKE', '%' . $request->aboname . '%');
                }

                if (isset($request->aboid))
                {
                   $datas->where('tbl_abo_assign.AboId',$request->aboid);
                }

                if (isset($request->status))
                {
                   $datas->where('tbl_abo_assign.AboAssignStatus',$request->status);
                }

                if (isset($request->access))
                {
                   $datas->where('tbl_abo_assign.AboAssignAccess',$request->access);
                }

                if (isset($request->description))
                {
                   $datas->where('tbl_abo_assign.AboAssignDesc', 'LIKE', '%' . $request->description . '%');
                }

                $total = $datas->count();

                $data = $datas->take($request->count)
                        ->skip($request->count*($request->page-1))
                        ->orderBy(key((array)($sorting)),current((array)($sorting)))
                        ->get();

            }

        }
        else
        {
            if($request->searchdata == "nosearch")
            {
                $filter = json_decode($request->filter);
                $sorting = json_decode($request->sorting);

                $data = AboAssign::orderBy('tbl_abo_assign.AboAssignStatus','asc','processing')->where('tbl_abo_assign.AboId',Auth::id());

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

                $datas = AboAssign::orderBy('tbl_abo_assign.AboAssignStatus','asc','processing')->where('tbl_abo_assign.AboId',Auth::id());

                if (isset($request->propertyname))
                {
                   $datas->where('tbl_abo_assign.PropertyName','LIKE', '%' . $request->propertyname . '%');
                }

                if (isset($request->propertyid))
                {
                   $datas->where('tbl_abo_assign.PropertyId',$request->propertyid);
                }

                if (isset($request->aboname))
                {
                   $datas->where('tbl_abo_assign.AboName','LIKE', '%' . $request->aboname . '%');
                }

                if (isset($request->aboid))
                {
                   $datas->where('tbl_abo_assign.AboId',$request->aboid);
                }

                if (isset($request->status))
                {
                   $datas->where('tbl_abo_assign.AboAssignStatus',$request->status);
                }

                if (isset($request->access))
                {
                   $datas->where('tbl_abo_assign.AboAssignAccess',$request->access);
                }

                if (isset($request->description))
                {
                   $datas->where('tbl_abo_assign.AboAssignDesc', 'LIKE', '%' . $request->description . '%');
                }

                $total = $datas->count();

                $data = $datas->take($request->count)
                        ->skip($request->count*($request->page-1))
                        ->orderBy(key((array)($sorting)),current((array)($sorting)))
                        ->get();

            }
        }

        $id = Auth::id();

      	return response(['data' => $data , 'role' => $RoleId ,'id' => $id,'total' => $total]);
   }

   public function AboAssignAdd(Request $request)
   {
	    $input = $request->all();
	    $input['id'] = Auth::id();
	    $assign = AboAssign::create($input);

	    return response($assign);
   }

   public function AboAssignUpdate(Request $request, $id)
   {
        $assign = AboAssign::where('tbl_abo_assign.id',Auth::id())->find($id);
        $input = $request->all();
        $data =  $assign->update($input);

        if($input['AboAssignAccess'] === 'no'){
             $mediator =  MediatorAssign::where('tbl_mediator_assign.PropertyId',$assign->PropertyId)
               ->where('tbl_mediator_assign.AboAssignedId',$assign->AboAssignedId)
               ->get();
             if($mediator !== null){
                foreach($mediator as $media){
                    $media->update(['MediatorAssignAccess'=>'no']);
                   }
             }

        }

        return response($assign);
   }



    public function AssignStatusUpdate(Request $request, $id)
    {
        $assign = AboAssign::find($id);
        $input = $request->all();
        // return response($input);
        $data =  $assign->update(['AboAssignStatus'=>$input['AboAssignStatus']]);

        return response($data);
    }

    public function AboAssignDataGet(Request $request, $data)
    {
        $RoleId = Auth::user()->RoleId;

        if(Auth::user()->RoleId == 1)
        {
           if($data === 'yes' || $data === 'no')
           {
                if($request->searchdata === "nosearch")
                {
                    $filter = json_decode($request->filter);
                    $sorting = json_decode($request->sorting);

                    $data = AboAssign::where('tbl_abo_assign.AboAssignAccess',$data)
                    ->orderBy('tbl_abo_assign.AboAssignStatus','asc','processing');

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

                    $datas = AboAssign::where('tbl_abo_assign.AboAssignAccess',$data)
                    ->orderBy('tbl_abo_assign.AboAssignStatus','asc','processing');

                    if (isset($request->propertyname))
                    {
                       $datas->where('tbl_abo_assign.PropertyName',$request->propertyname);
                    }

                    if (isset($request->propertyid))
                    {
                       $datas->where('tbl_abo_assign.PropertyId',$request->propertyid);
                    }

                    if (isset($request->mediatorname))
                    {
                       $datas->where('tbl_abo_assign.MediatorName',$request->mediatorname);
                    }

                    if (isset($request->Aboid))
                    {
                       $datas->where('tbl_abo_assign.AboId',$request->Aboid);
                    }

                    if (isset($request->status))
                    {
                       $datas->where('tbl_abo_assign.AboAssignStatus',$request->status);
                    }

                    if (isset($request->description))
                    {
                       $datas->where('tbl_abo_assign.AboAssignDesc', 'LIKE', '%' . $request->description . '%');
                    }

                    $total = $datas->count();

                    $data = $datas->take($request->count)
                            ->skip($request->count*($request->page-1))
                            ->orderBy(key((array)($sorting)),current((array)($sorting)))
                            ->get();
                }
            }
            else
            {
              if($request->searchdata === "nosearch")
                {
                    $filter = json_decode($request->filter);
                    $sorting = json_decode($request->sorting);

                    $data = AboAssign::where('tbl_abo_assign.AboAssignStatus',$data)
                    ->orderBy('tbl_abo_assign.AboAssignStatus','asc','processing');

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

                    $datas = AboAssign::where('tbl_abo_assign.AboAssignStatus',$data)
                    ->orderBy('tbl_abo_assign.AboAssignStatus','asc','processing');

                    if (isset($request->propertyname))
                    {
                       $datas->where('tbl_abo_assign.PropertyName',$request->propertyname);
                    }

                    if (isset($request->propertyid))
                    {
                       $datas->where('tbl_abo_assign.PropertyId',$request->propertyid);
                    }

                    if (isset($request->mediatorname))
                    {
                       $datas->where('tbl_abo_assign.MediatorName',$request->mediatorname);
                    }

                    if (isset($request->Aboid))
                    {
                       $datas->where('tbl_abo_assign.AboId',$request->Aboid);
                    }

                    if (isset($request->access))
                    {
                       $datas->where('tbl_abo_assign.AboAssignAccess',$request->access);
                    }

                    if (isset($request->description))
                    {
                       $datas->where('tbl_abo_assign.AboAssignDesc', 'LIKE', '%' . $request->description . '%');
                    }

                    $total = $datas->count();

                    $data = $datas->take($request->count)
                            ->skip($request->count*($request->page-1))
                            ->orderBy(key((array)($sorting)),current((array)($sorting)))
                            ->get();
                }
            }

        }
        else
        {
            if($data === 'yes' || $data === 'no')
            {
                if($request->searchdata === "nosearch")
                {
                    $filter = json_decode($request->filter);
                    $sorting = json_decode($request->sorting);

                    $data = AboAssign::where('tbl_abo_assign.AboAssignAccess',$data)
                    ->orderBy('tbl_abo_assign.AboAssignStatus','asc','processing')
                    ->where('tbl_abo_assign.AboId',Auth::id());

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

                    $datas = AboAssign::where('tbl_abo_assign.AboAssignAccess',$data)
                    ->orderBy('tbl_abo_assign.AboAssignStatus','asc','processing')
                    ->where('tbl_abo_assign.AboId',Auth::id());

                    if (isset($request->propertyname))
                    {
                       $datas->where('tbl_abo_assign.PropertyName',$request->propertyname);
                    }

                    if (isset($request->propertyid))
                    {
                       $datas->where('tbl_abo_assign.PropertyId',$request->propertyid);
                    }

                    if (isset($request->mediatorname))
                    {
                       $datas->where('tbl_abo_assign.MediatorName',$request->mediatorname);
                    }

                    if (isset($request->Aboid))
                    {
                       $datas->where('tbl_abo_assign.AboId',$request->Aboid);
                    }

                    if (isset($request->status))
                    {
                       $datas->where('tbl_abo_assign.AboAssignStatus',$request->status);
                    }

                    if (isset($request->description))
                    {
                       $datas->where('tbl_abo_assign.AboAssignDesc', 'LIKE', '%' . $request->description . '%');
                    }

                    $total = $datas->count();

                    $data = $datas->take($request->count)
                            ->skip($request->count*($request->page-1))
                            ->orderBy(key((array)($sorting)),current((array)($sorting)))
                            ->get();
                }
            }
            else
            {
                if($request->searchdata == "nosearch")
                {
                    $filter = json_decode($request->filter);
                    $sorting = json_decode($request->sorting);

                    $data = AboAssign::where('tbl_abo_assign.AboAssignStatus',$data)
                    ->orderBy('tbl_abo_assign.AboAssignStatus','asc','processing')
                    ->where('tbl_abo_assign.AboId',Auth::id());

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

                    $datas = AboAssign::where('tbl_abo_assign.AboAssignStatus',$data)
                    ->orderBy('tbl_abo_assign.AboAssignStatus','asc','processing')
                    ->where('tbl_abo_assign.AboId',Auth::id());

                    if (isset($request->propertyname))
                    {
                       $datas->where('tbl_abo_assign.PropertyName',$request->propertyname);
                    }

                    if (isset($request->propertyid))
                    {
                       $datas->where('tbl_abo_assign.PropertyId',$request->propertyid);
                    }

                    if (isset($request->mediatorname))
                    {
                       $datas->where('tbl_abo_assign.MediatorName',$request->mediatorname);
                    }

                    if (isset($request->Aboid))
                    {
                       $datas->where('tbl_abo_assign.AboId',$request->Aboid);
                    }

                    if (isset($request->status))
                    {
                       $datas->where('tbl_abo_assign.AboAssignStatus',$request->status);
                    }

                    if (isset($request->access))
                    {
                       $datas->where('tbl_abo_assign.AboAssignAccess',$request->access);
                    }

                    if (isset($request->description))
                    {
                       $datas->where('tbl_abo_assign.AboAssignDesc', 'LIKE', '%' . $request->description . '%');
                    }

                    $total = $datas->count();

                    $data = $datas->take($request->count)
                            ->skip($request->count*($request->page-1))
                            ->orderBy(key((array)($sorting)),current((array)($sorting)))
                            ->get();
                }
            }
        }

        $id = Auth::id();

        return response(['data' => $data , 'role' => $RoleId ,'id' => $id,'total' => $total]);
    }

   public function AboAssignedValuesGet(Request $request,$aid)
   {
        $assign['abo'] = AboAssign::where('tbl_abo_assign.AboId',$aid)
        ->get();

        $assign['mediator'] = Mediator::where('tbl_mediator.AboId',$aid)
        ->get();

        return response($assign);
   }

   public function AboAssignDelete(Request $request, $id)
   {
       $spec = AboAssign::where('tbl_abo_assign.id',Auth::id())->find($id);
       $spec->delete();

       return response($spec);
   }

}
