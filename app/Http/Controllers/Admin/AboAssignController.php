<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AboAssign;
use App\Models\Admin\Mediator;
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

        return response($assign);
   }

    public function MediatorFollowGet(Request $request, $mid,$pid)
    {
        $property = Property::select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as PropertyGalleryImage'))
        ->where('tbl_property.PropertyId',$pid)
        ->first();

        $mediator = AboAssign::where('tbl_abo_assign.PropertyId',$pid)
        ->where('tbl_abo_assign.AboId',$mid)
        ->first();

        $datetime1 = new DateTime();
        $datetime2 = new DateTime($mediator->AboAssignDate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        $RoleId = Auth::user()->RoleId;


        return response(['property' => $property , 'mediator' => $mediator,'role' => $RoleId,'days' => $days]);
    }

    public function MediatorFollowValGet(Request $request, $mid,$pid)
    {
        $follow = DB::table('tbl_mediator_follow')
        ->where('tbl_mediator_follow.PropertyId',$pid)
        ->where('tbl_mediator_follow.AboId',$mid)
        ->get();

        return response($follow);
    }

    public function MediatorFollowAdd(Request $request)
    {
        $input = $request->all();
        $input['id'] = Auth::id();
        $follow = MediatorFollow::create($input);

        return response($follow);
    }

    public function MediatorFollowUpdate(Request $request, $id)
    {
        $follow = MediatorFollow::where('tbl_mediator_follow.id',Auth::id())->find($id);
        $input = $request->all();
        $data =  $follow->update($input);

        return response($follow);
    }

    public function MediatorBuyerValGet(Request $request, $mid,$pid)
    {
        $person = DB::table('tbl_mediator_buyer')
        ->where('tbl_mediator_buyer.PropertyId',$pid)
        ->where('tbl_mediator_buyer.AboId',$mid)
        ->get();

        $mediator = AboAssign::where('tbl_abo_assign.PropertyId',$pid)
        ->where('tbl_abo_assign.AboId',$mid)
        ->first();

        return response(['person' => $person , 'mediator' => $mediator ]);
    }

    public function MediatorBuyerAdd(Request $request)
    {
        $input = $request->all();
        $input['id'] = Auth::id();
        $person = MediatorBuyer::create($input);

        return response($person);
    }

    public function MediatorBuyerUpdate(Request $request, $id)
    {
        $person = MediatorBuyer::where('tbl_mediator_buyer.id',Auth::id())->find($id);
        $input = $request->all();
        $data =  $person->update($input);

        return response($person);
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
