<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\Admin\Type;
use App\Models\Admin\Floor;
use App\Models\Admin\Roof;
use App\Models\Admin\Area;
use App\Models\Admin\Purpose;
use App\Models\Admin\Knowus;
use App\Models\Admin\Property;
use App\Models\Admin\PropertyEb;
use App\Models\Admin\PropertyWater;
use App\Models\Admin\PropertyGallery;
use App\Models\Admin\PropertyDocument;
use App\Models\Admin\PropertyFollow;
use App\Models\Admin\PropertyPerson;
use App\Models\Admin\Refer;
use App\Models\Admin\ReferGallery;
use App\Models\Admin\Mediator;
use App\Models\Admin\MediatorAssign;
use App\Models\Admin\MediatorFollow;
use App\Models\Admin\Abo;
use App\Models\Admin\AboAssign;
use App\Models\Admin\AboFollow;
use Auth;
use DB;
use App\User;
use FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;

class ReportController extends Controller
{
	public function AdminProp(Request $request)
    {
      if(Auth::user()->RoleId == 1)
      {
        $data = Property::select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
        ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Approved','Waitting'])
        ->where('tbl_property.id',Auth::id())
        ->get();
      }

      $RoleId = Auth::user()->RoleId;  

       return response(['data' => $data , 'role' => $RoleId ]);
    }

	public function OtherProp(Request $request)
    {
      if(Auth::user()->RoleId == 1)
      {
        $data = Property::select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
        ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Approved','Waitting'])
        ->whereNotIn('tbl_property.id', [1])
        ->get();
      }

      $RoleId = Auth::user()->RoleId;  

       return response(['data' => $data , 'role' => $RoleId ]);
    }

    public function CompletedProp(Request $request)
    {
      if(Auth::user()->RoleId == 1)
      {
        $data = Property::select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'),DB::raw('(select name from users where users.id  =  tbl_property.id) as name'),DB::raw('(select Mobile from users where users.id  =  tbl_property.id) as mobile'))
        ->where('tbl_property.PropertyStatus', 'Completed')
        ->get();
      }

      $RoleId = Auth::user()->RoleId;  

       return response(['data' => $data , 'role' => $RoleId ]);
    }

    public function RoughReport(Request $request)
    {
      if(Auth::user()->RoleId == 1)
      {
        $input = $request->all();
   
      
        $property = Refer::select( 'tbl_refer.*',
                    DB::raw('(select ReferGalleryImage from tbl_refer_gallery where tbl_refer_gallery.ReferId  =  tbl_refer.ReferId order by ReferId desc limit 1) as photo'));

        if (isset($input['ReferLead'])){
           $property->where('tbl_refer.ReferLead',$input['ReferLead']);
        } 

        if (isset($input['ReferFor'])){
           $property->where('tbl_refer.ReferFor',$input['ReferFor']);
        } 

        if (isset($input['ReferType'])){
           $property->where('tbl_refer.ReferType',$input['ReferType']);
        } 

        if (isset($input['Area'])){
           $property->where('tbl_refer.AreaId',$input['Area']['AreaId']);
        } 

        if (isset($input['MinAmount'])){

           $min = $input['MinAmount'];
           $max = $input['MaxAmount'];
           $property->whereBetween('tbl_refer.ReferVal',[$min,$max]);
        } 

        $data = $property->get();
      }

      $RoleId = Auth::user()->RoleId;  

       return response(['data' => $data , 'role' => $RoleId ]);
    }

    public function AllProp(Request $request)
    {
      if(Auth::user()->RoleId == 1)
      {
        $data = Property::select( 'tbl_property.*',
                    DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))->get();
      }

      $RoleId = Auth::user()->RoleId;  

       return response(['data' => $data , 'role' => $RoleId ]);
    }

    public function CustomerFollowReport(Request $request)
    {
       $abo = AboAssign::where('tbl_abo_assign.PropertyId',$request->PropertyId)->first();
       $mediator = MediatorAssign::where('tbl_mediator_assign.PropertyId',$request->PropertyId)->get();
       $admin = PropertyFollow::where('tbl_property_follow.PropertyId',$request->PropertyId)->get();
       $mediatorfollow = MediatorFollow::where('tbl_mediator_follow.PropertyId',$request->PropertyId)->get();

       return response(['abo' => $abo , 'mediator' => $mediator ,'admin' => $admin , 'mediatorfollow' => $mediatorfollow ]);
    }

    public function MediatorFollowReport(Request $request)
    {
       // return response($request->status);

       $mediatorfollow = MediatorFollow::where('tbl_mediator_follow.MediatorFollowStatus',$request->status)->get();

       return response($mediatorfollow);
    }


}