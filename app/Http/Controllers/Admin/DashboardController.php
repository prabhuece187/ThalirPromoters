<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Property;
use App\Models\Admin\PropertyEb;
use App\Models\Admin\PropertyWater;
use App\Models\Admin\PropertyGallery;
use App\Models\Admin\PropertyDocument;
use App\Models\Admin\PropertyFollow;
use App\Models\Admin\PropertyPerson;
use App\Models\User\BuyerComment;
use App\Models\User\ClientData;
use App\Models\Admin\PromoterSite;
use App\Models\Admin\PromoterSiteStatus;
use App\Models\Admin\PromoterGallery;
use App\Models\Admin\MediatorAssign;
use App\Models\Admin\MediatorFollow;
use App\Models\Admin\MediatorBuyer;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Property::select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
        ->where('tbl_property.PropertyStatus', 'Waitting')
        ->count();

        $status = Property::select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
        ->where('tbl_property.PropertyUserStatus', 'add')
        ->where('tbl_property.id', Auth::id())
        ->count();

        $commentprop = BuyerComment::where('tbl_buyer_comment.BuyerCommentStatus','New')
        ->where('tbl_buyer_comment.PropertyId','!=',null)
        ->groupBy('tbl_buyer_comment.PropertyId')
        ->count();

         $commentprom = BuyerComment::where('tbl_buyer_comment.BuyerCommentStatus','New')
        ->where('tbl_buyer_comment.ProSiteId','!=',null)
        ->groupBy('tbl_buyer_comment.ProSiteId')
        ->count();

         $client = ClientData::where('tbl_client_data.Status',0)
        ->count();

        $mediatorfollowstatus = MediatorFollow::where('tbl_mediator_follow.MediatorNotifyStatus',0)
        ->count();

        $propertyfollowstatus = PropertyFollow::where('tbl_property_follow.NotifyStatus',0)
        ->count();


        $role = Auth::user()->RoleId;


        if($role === 1) {
           $totalassign = MediatorAssign::count();
           $totalassignyes = MediatorAssign::where('tbl_mediator_assign.MediatorAssignAccess','yes')->count();
           $totalassignno = MediatorAssign::where('tbl_mediator_assign.MediatorAssignAccess','no')->count();
           $totalassignprocess = MediatorAssign::where('tbl_mediator_assign.MediatorAssignStatus','Processing')->count();
           $totalassigncomplete = MediatorAssign::where('tbl_mediator_assign.MediatorAssignStatus','Compeleted')->count();
           $totalassignend = MediatorAssign::where('tbl_mediator_assign.MediatorAssignStatus','End')->count();
           $totalassignstart = MediatorAssign::where('tbl_mediator_assign.MediatorAssignStatus','Start')->count();
        }
        else
        {
           $idval = Auth::id();

           $totalassign = MediatorAssign::where('tbl_mediator_assign.MediatorId',$idval)->count();

           $totalassignyes = MediatorAssign::where('tbl_mediator_assign.MediatorAssignAccess','yes')
           ->where('tbl_mediator_assign.MediatorId',$idval)
           ->count();

           $totalassignno = MediatorAssign::where('tbl_mediator_assign.MediatorAssignAccess','no')
           ->where('tbl_mediator_assign.MediatorId',$idval)
           ->count();

           $totalassignprocess = MediatorAssign::where('tbl_mediator_assign.MediatorAssignStatus','Processing')
           ->where('tbl_mediator_assign.MediatorId',$idval)
           ->count();

           $totalassigncomplete = MediatorAssign::where('tbl_mediator_assign.MediatorAssignStatus','Compeleted')
           ->where('tbl_mediator_assign.MediatorId',$idval)
           ->count();

           $totalassignend = MediatorAssign::where('tbl_mediator_assign.MediatorAssignStatus','End')
           ->where('tbl_mediator_assign.MediatorId',$idval)
           ->count();

           $totalassignstart = MediatorAssign::where('tbl_mediator_assign.MediatorAssignStatus','Start')
           ->where('tbl_mediator_assign.MediatorId',$idval)
           ->count();
        }

        return response(['data' => $data , 'role' => $role ,'status' => $status,'commentprop' => $commentprop,'commentprom' => $commentprom,'client' => $client
            ,'totalassign'=> $totalassign ,'totalassignyes'=> $totalassignyes ,'totalassignno'=> $totalassignno ,'totalassignprocess'=> $totalassignprocess ,
            'totalassigncomplete'=> $totalassigncomplete ,'totalassignend'=> $totalassignend ,'totalassignstart'=> $totalassignstart,'mediatorfollowstatus'=> $mediatorfollowstatus,
            'propertyfollowstatus'=> $propertyfollowstatus
        ]);

    }

    public function NewComeProperty(Request $request)
    {
        $data = Property::select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'),DB::raw('(select name from users where users.id  =  tbl_property.id) as name'),DB::raw('(select Mobile from users where users.id  =  tbl_property.id) as mobile'))
        ->where('tbl_property.PropertyStatus', 'Waitting')
        ->get();

        $role = Auth::user()->RoleId;

        return response(['data' => $data , 'role' => $role ]);
    }


    public function NewUserStatus(Request $request)
    {
       $status = Property::select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
        ->where('tbl_property.PropertyUserStatus', 'add')
        ->where('tbl_property.id', Auth::id())
        ->get();

        $role = Auth::user()->RoleId;

        return response(['status' => $status , 'role' => $role ]);
    }

    public function NewPropComments(Request $request)
    {
       $prop = Property::join('tbl_buyer_comment','tbl_property.PropertyId','tbl_buyer_comment.PropertyId')
       ->select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
        ->where('tbl_buyer_comment.BuyerCommentStatus', 'new')
        ->groupBy('tbl_buyer_comment.PropertyId')
        ->get();

        $role = Auth::user()->RoleId;

        return response(['prop' => $prop , 'role' => $role ]);
    }

    public function NewPromComments(Request $request)
    {
       $prom = PromoterSite::join('tbl_buyer_comment','tbl_prosite.ProSiteId','tbl_buyer_comment.ProSiteId')
       ->where('tbl_buyer_comment.BuyerCommentStatus', 'new')
       ->groupBy('tbl_buyer_comment.ProSiteId')
       ->get();

       $role = Auth::user()->RoleId;

       return response(['prom' => $prom , 'role' => $role ]);
    }

    public function ClientDataGet(Request $request)
    {
        $client = ClientData::leftJoin('users','tbl_client_data.id','users.id')
        ->select('tbl_client_data.*','users.name')
        ->orderBy('ClientDataId','desc')
        ->get();

        $role = Auth::user()->RoleId;

        return response(['client' => $client , 'role' => $role ]);
    }

    public function ClientStatusUpdate(Request $request, $id)
    {
        $property = ClientData::find($id);
        $input = $request->all();

        $data =  $property->update(['Status'=>1,'id'=>Auth::id()]);

        return response($data);
    }

    public function PropertyFollowStatusGet(Request $request)
    {
        $property = PropertyFollow::where('NotifyStatus',0)->get();

        return response($property);
    }

    public function MediatorFollowStatusGet(Request $request)
    {
        $mediator = MediatorFollow::where('MediatorNotifyStatus',0)->get();

        return response($mediator);
    }

    public function PropertyFollowStatusUpdate(Request $request, $id)
    {
        $property = PropertyFollow::find($id);
        $input = $request->all();

        $data =  $property->update(['NotifyStatus'=>1,'id'=>Auth::id()]);

        return response($data);
    }

    public function MediatorFollowStatusUpdate(Request $request, $id)
    {
        $mediator = MediatorFollow::find($id);
        $input = $request->all();

        $data =  $mediator->update(['MediatorNotifyStatus'=>1,'id'=>Auth::id()]);

        return response($data);
    }

}
