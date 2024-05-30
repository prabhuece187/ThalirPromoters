<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\MediatorAssign;
use App\Models\Admin\MediatorFollow;
use App\Models\Admin\MediatorBuyer;
use App\Models\Admin\Property;
use App\User;
use DB;
use Auth;
use DateTime;

class MediatorAssignController extends Controller
{
   public function MediatorAssign(Request $request)
   {
        $RoleId = Auth::user()->RoleId;

        if(Auth::user()->RoleId === 1){

            if($request->searchdata == "nosearch")
            {

                $filter = json_decode($request->filter);
                $sorting = json_decode($request->sorting);

                $data = MediatorAssign::join('tbl_abo_assign','tbl_mediator_assign.AboAssignedId','tbl_abo_assign.AboAssignedId')
                ->select('tbl_mediator_assign.*','tbl_abo_assign.AboId','tbl_abo_assign.AboName')
                ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing');

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

                $datas = MediatorAssign::join('tbl_abo_assign','tbl_mediator_assign.AboAssignedId','tbl_abo_assign.AboAssignedId')
                ->select('tbl_mediator_assign.*','tbl_abo_assign.AboId','tbl_abo_assign.AboName')
                ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing');

                if (isset($request->propertyname))
                {
                   $datas->where('tbl_mediator_assign.PropertyName','LIKE', '%' . $request->propertyname . '%');
                }

                if (isset($request->propertyid))
                {
                   $datas->where('tbl_mediator_assign.PropertyId',$request->propertyid);
                }

                if (isset($request->mediatorname))
                {
                   $datas->where('tbl_mediator_assign.MediatorName','LIKE', '%' . $request->mediatorname . '%');
                }

                if (isset($request->mediatorid))
                {
                   $datas->where('tbl_mediator_assign.MediatorId',$request->mediatorid);
                }

                if (isset($request->status))
                {
                   $datas->where('tbl_mediator_assign.MediatorAssignStatus',$request->status);
                }

                if (isset($request->access))
                {
                   $datas->where('tbl_mediator_assign.MediatorAssignAccess',$request->access);
                }

                if (isset($request->description))
                {
                   $datas->where('tbl_mediator_assign.MediatorAssignDesc', 'LIKE', '%' . $request->description . '%');
                }

                $total = $datas->count();

                $data = $datas->take($request->count)
                        ->skip($request->count*($request->page-1))
                        ->orderBy(key((array)($sorting)),current((array)($sorting)))
                        ->get();

            }

        }
        else if(Auth::user()->RoleId === 4)
        {
            if($request->searchdata == "nosearch")
            {
                $filter = json_decode($request->filter);
                $sorting = json_decode($request->sorting);

                $data = MediatorAssign::join('tbl_abo_assign','tbl_mediator_assign.AboAssignedId','tbl_abo_assign.AboAssignedId')
                ->select('tbl_mediator_assign.*','tbl_abo_assign.AboId','tbl_abo_assign.AboName')
                ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing')->where('tbl_mediator_assign.MediatorId',Auth::id());

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

                $datas = MediatorAssign::join('tbl_abo_assign','tbl_mediator_assign.AboAssignedId','tbl_abo_assign.AboAssignedId')
                ->select('tbl_mediator_assign.*','tbl_abo_assign.AboId','tbl_abo_assign.AboName')
                ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing')->where('tbl_mediator_assign.MediatorId',Auth::id());

                if (isset($request->propertyname))
                {
                   $datas->where('tbl_mediator_assign.PropertyName','LIKE', '%' . $request->propertyname . '%');
                }

                if (isset($request->propertyid))
                {
                   $datas->where('tbl_mediator_assign.PropertyId',$request->propertyid);
                }

                if (isset($request->mediatorname))
                {
                   $datas->where('tbl_mediator_assign.MediatorName','LIKE', '%' . $request->mediatorname . '%');
                }

                if (isset($request->mediatorid))
                {
                   $datas->where('tbl_mediator_assign.MediatorId',$request->mediatorid);
                }

                if (isset($request->status))
                {
                   $datas->where('tbl_mediator_assign.MediatorAssignStatus',$request->status);
                }

                if (isset($request->access))
                {
                   $datas->where('tbl_mediator_assign.MediatorAssignAccess',$request->access);
                }

                if (isset($request->description))
                {
                   $datas->where('tbl_mediator_assign.MediatorAssignDesc', 'LIKE', '%' . $request->description . '%');
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

                $data = MediatorAssign::join('tbl_abo_assign','tbl_mediator_assign.AboAssignedId','tbl_abo_assign.AboAssignedId')
                ->select('tbl_mediator_assign.*','tbl_abo_assign.AboId','tbl_abo_assign.AboName')
                ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing')
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

                $datas = MediatorAssign::join('tbl_abo_assign','tbl_mediator_assign.AboAssignedId','tbl_abo_assign.AboAssignedId')
                ->select('tbl_mediator_assign.*','tbl_abo_assign.AboId','tbl_abo_assign.AboName')
                ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing')
                ->where('tbl_abo_assign.AboId',Auth::id());

                if (isset($request->propertyname))
                {
                   $datas->where('tbl_mediator_assign.PropertyName','LIKE', '%' . $request->propertyname . '%');
                }

                if (isset($request->propertyid))
                {
                   $datas->where('tbl_mediator_assign.PropertyId',$request->propertyid);
                }

                if (isset($request->mediatorname))
                {
                   $datas->where('tbl_mediator_assign.MediatorName','LIKE', '%' . $request->mediatorname . '%');
                }

                if (isset($request->mediatorid))
                {
                   $datas->where('tbl_mediator_assign.MediatorId',$request->mediatorid);
                }

                if (isset($request->status))
                {
                   $datas->where('tbl_mediator_assign.MediatorAssignStatus',$request->status);
                }

                if (isset($request->access))
                {
                   $datas->where('tbl_mediator_assign.MediatorAssignAccess',$request->access);
                }

                if (isset($request->description))
                {
                   $datas->where('tbl_mediator_assign.MediatorAssignDesc', 'LIKE', '%' . $request->description . '%');
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

   public function MediatorAssignAdd(Request $request)
   {
	    $input = $request->all();
	    $input['id'] = Auth::id();
	    $assign = MediatorAssign::create($input);

	    return response($assign);
   }

   public function MediatorAssignUpdate(Request $request, $id)
   {
        $assign = MediatorAssign::where('tbl_mediator_assign.id',Auth::id())->find($id);
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

        $mediator = MediatorAssign::join('tbl_mediator','tbl_mediator_assign.MediatorId','tbl_mediator.MediatorId')
        ->select('tbl_mediator_assign.*','tbl_mediator.AboId','tbl_mediator.AboName')
        ->where('tbl_mediator_assign.PropertyId',$pid)
        ->where('tbl_mediator_assign.MediatorId',$mid)
        ->first();

        $datetime1 = new DateTime();
        $datetime2 = new DateTime($mediator->MediatorAssignDate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        $RoleId = Auth::user()->RoleId;


        return response(['property' => $property , 'mediator' => $mediator,'role' => $RoleId,'days' => $days]);
    }

    public function MediatorFollowValGet(Request $request, $mid,$pid)
    {
        $follow = DB::table('tbl_mediator_follow')
        ->where('tbl_mediator_follow.PropertyId',$pid)
        ->where('tbl_mediator_follow.MediatorId',$mid)
        ->get();

        return response($follow);
    }

    public function MediatorFollowAdd(Request $request)
    {
        $input = $request->all();

        if($input['MediatorId'] === Auth::id())
        {
          $input['id'] = Auth::id();
        }
        else
        {
          $input['id'] = $input['MediatorId'];
        }

        $follow = MediatorFollow::create($input);

        return response($follow);
    }

    public function MediatorFollowUpdate(Request $request, $id)
    {
        $follow = MediatorFollow::find($id);
        $input = $request->all();


        if($follow->MediatorId === Auth::id())
        {
          $input['id'] = Auth::id();
        }
        else
        {
          $input['id'] = $input['MediatorId'];
        }

        $data =  $follow->update($input);

        return response($follow);
    }

    public function MediatorBuyerValGet(Request $request, $mid,$pid)
    {
        $person = DB::table('tbl_mediator_buyer')
        ->where('tbl_mediator_buyer.PropertyId',$pid)
        ->where('tbl_mediator_buyer.MediatorId',$mid)
        ->get();

        $mediator = MediatorAssign::where('tbl_mediator_assign.PropertyId',$pid)
        ->where('tbl_mediator_assign.MediatorId',$mid)
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
        $assign = MediatorAssign::find($id);
        $input = $request->all();
        // return response($input);
        $data =  $assign->update(['MediatorAssignStatus'=>$input['MediatorAssignStatus']]);

        return response($data);
    }

    public function MediatorAssignDataGet(Request $request, $data)
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

                    $data = MediatorAssign::where('tbl_mediator_assign.MediatorAssignAccess',$data)
                    ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing');

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

                    $datas = MediatorAssign::where('tbl_mediator_assign.MediatorAssignAccess',$data)
                    ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing');

                    if (isset($request->propertyname))
                    {
                       $datas->where('tbl_mediator_assign.PropertyName',$request->propertyname);
                    }

                    if (isset($request->propertyid))
                    {
                       $datas->where('tbl_mediator_assign.PropertyId',$request->propertyid);
                    }

                    if (isset($request->mediatorname))
                    {
                       $datas->where('tbl_mediator_assign.MediatorName',$request->mediatorname);
                    }

                    if (isset($request->mediatorid))
                    {
                       $datas->where('tbl_mediator_assign.MediatorId',$request->mediatorid);
                    }

                    if (isset($request->status))
                    {
                       $datas->where('tbl_mediator_assign.MediatorAssignStatus',$request->status);
                    }

                    if (isset($request->description))
                    {
                       $datas->where('tbl_mediator_assign.MediatorAssignDesc', 'LIKE', '%' . $request->description . '%');
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

                    $data = MediatorAssign::where('tbl_mediator_assign.MediatorAssignStatus',$data)
                    ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing');

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

                    $datas = MediatorAssign::where('tbl_mediator_assign.MediatorAssignStatus',$data)
                    ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing');

                    if (isset($request->propertyname))
                    {
                       $datas->where('tbl_mediator_assign.PropertyName',$request->propertyname);
                    }

                    if (isset($request->propertyid))
                    {
                       $datas->where('tbl_mediator_assign.PropertyId',$request->propertyid);
                    }

                    if (isset($request->mediatorname))
                    {
                       $datas->where('tbl_mediator_assign.MediatorName',$request->mediatorname);
                    }

                    if (isset($request->mediatorid))
                    {
                       $datas->where('tbl_mediator_assign.MediatorId',$request->mediatorid);
                    }

                    if (isset($request->access))
                    {
                       $datas->where('tbl_mediator_assign.MediatorAssignAccess',$request->access);
                    }

                    if (isset($request->description))
                    {
                       $datas->where('tbl_mediator_assign.MediatorAssignDesc', 'LIKE', '%' . $request->description . '%');
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

                    $data = MediatorAssign::where('tbl_mediator_assign.MediatorAssignAccess',$data)
                    ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing')
                    ->where('tbl_mediator_assign.MediatorId',Auth::id());

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

                    $datas = MediatorAssign::where('tbl_mediator_assign.MediatorAssignAccess',$data)
                    ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing')
                    ->where('tbl_mediator_assign.MediatorId',Auth::id());

                    if (isset($request->propertyname))
                    {
                       $datas->where('tbl_mediator_assign.PropertyName',$request->propertyname);
                    }

                    if (isset($request->propertyid))
                    {
                       $datas->where('tbl_mediator_assign.PropertyId',$request->propertyid);
                    }

                    if (isset($request->mediatorname))
                    {
                       $datas->where('tbl_mediator_assign.MediatorName',$request->mediatorname);
                    }

                    if (isset($request->mediatorid))
                    {
                       $datas->where('tbl_mediator_assign.MediatorId',$request->mediatorid);
                    }

                    if (isset($request->status))
                    {
                       $datas->where('tbl_mediator_assign.MediatorAssignStatus',$request->status);
                    }

                    if (isset($request->description))
                    {
                       $datas->where('tbl_mediator_assign.MediatorAssignDesc', 'LIKE', '%' . $request->description . '%');
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

                    $data = MediatorAssign::where('tbl_mediator_assign.MediatorAssignStatus',$data)
                    ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing')
                    ->where('tbl_mediator_assign.MediatorId',Auth::id());

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

                    $datas = MediatorAssign::where('tbl_mediator_assign.MediatorAssignStatus',$data)
                    ->orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing')
                    ->where('tbl_mediator_assign.MediatorId',Auth::id());

                    if (isset($request->propertyname))
                    {
                       $datas->where('tbl_mediator_assign.PropertyName',$request->propertyname);
                    }

                    if (isset($request->propertyid))
                    {
                       $datas->where('tbl_mediator_assign.PropertyId',$request->propertyid);
                    }

                    if (isset($request->mediatorname))
                    {
                       $datas->where('tbl_mediator_assign.MediatorName',$request->mediatorname);
                    }

                    if (isset($request->mediatorid))
                    {
                       $datas->where('tbl_mediator_assign.MediatorId',$request->mediatorid);
                    }

                    if (isset($request->status))
                    {
                       $datas->where('tbl_mediator_assign.MediatorAssignStatus',$request->status);
                    }

                    if (isset($request->access))
                    {
                       $datas->where('tbl_mediator_assign.MediatorAssignAccess',$request->access);
                    }

                    if (isset($request->description))
                    {
                       $datas->where('tbl_mediator_assign.MediatorAssignDesc', 'LIKE', '%' . $request->description . '%');
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

    public function MediatorAssignPerson(Request $request,$id)
    {
        $RoleId = Auth::user()->RoleId;

        if(Auth::user()->RoleId == 1){

            if($request->searchdata == "nosearch")
            {

                $filter = json_decode($request->filter);
                $sorting = json_decode($request->sorting);

                $data = MediatorAssign::orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing')->where('tbl_mediator_assign.MediatorId',$id);

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

                $datas = MediatorAssign::orderBy('tbl_mediator_assign.MediatorAssignStatus','asc','processing')->where('tbl_mediator_assign.MediatorId',$id);

                if (isset($request->propertyname))
                {
                   $datas->where('tbl_mediator_assign.PropertyName','LIKE', '%' . $request->propertyname . '%');
                }

                if (isset($request->propertyid))
                {
                   $datas->where('tbl_mediator_assign.PropertyId',$request->propertyid);
                }

                if (isset($request->mediatorname))
                {
                   $datas->where('tbl_mediator_assign.MediatorName','LIKE', '%' . $request->mediatorname . '%');
                }

                if (isset($request->mediatorid))
                {
                   $datas->where('tbl_mediator_assign.MediatorId',$request->mediatorid);
                }

                if (isset($request->status))
                {
                   $datas->where('tbl_mediator_assign.MediatorAssignStatus',$request->status);
                }

                if (isset($request->access))
                {
                   $datas->where('tbl_mediator_assign.MediatorAssignAccess',$request->access);
                }

                if (isset($request->description))
                {
                   $datas->where('tbl_mediator_assign.MediatorAssignDesc', 'LIKE', '%' . $request->description . '%');
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

   public function MediatorAssignDelete(Request $request, $id)
   {
       $spec = MediatorAssign::where('tbl_mediator_assign.id',Auth::id())->find($id);
       $spec->delete();

       return response($spec);
   }

}
