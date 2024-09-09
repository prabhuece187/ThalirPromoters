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
use App\Models\Admin\AboAssign;
use App\Models\Admin\MediatorAssign;
use App\Models\Admin\MediatorFollow;
use Auth;
use DB;
use App\User;
use FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;
use Storage;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
      if(Auth::user()->RoleId == 1)
      {
            if($request->searchdata == "nosearch")
            {
                $filter = json_decode($request->filter);
                $sorting = json_decode($request->sorting);

                $data = Property::select( 'tbl_property.*',
                    DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
                ->whereNotIn('tbl_property.PropertyStatus', ['Completed']);

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


                // $data = Property::select( 'tbl_property.*',
                //     DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
                // ->whereNotIn('tbl_property.PropertyStatus', ['Completed'])
                // ->where('tbl_property.PropertyId', 'LIKE', '%' . $request->searchdata . '%')
                // ->orWhere('tbl_property.PropertyName', 'LIKE', '%' . $request->searchdata . '%')
                // ->orWhere('tbl_property.PropertyRegNo', 'LIKE', '%' . $request->searchdata . '%')
                // ->orWhere('tbl_property.PropertyTotalBudget', 'LIKE', '%' . $request->searchdata . '%')
                // ->orWhere('tbl_property.AreaName', 'LIKE', '%' . $request->searchdata . '%')
                // ->orderBy('tbl_property.PropertyId','desc');
                // $total = $data->count();

                // $data = $data->take($request->count)
                //         ->skip($request->count*($request->page-1))
                //         ->orderBy(key((array)($sorting)),current((array)($sorting)))
                //         ->get();

                $datas = Property::select( 'tbl_property.*',
                    DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'));

                if (isset($request->propertyname))
                {
                   $datas->where('tbl_property.PropertyName',$request->propertyname);
                }

                if (isset($request->propertyreg))
                {
                   $datas->where('tbl_property.PropertyDescription', 'LIKE', '%' . $request->propertyreg . '%')
                   ->orWhere('tbl_property.PropertyName', 'LIKE', '%' . $request->propertyreg . '%')
                   ->orWhere('tbl_property.PropertyId', 'LIKE', '%' . $request->propertyreg . '%')
                   ->orWhere('tbl_property.NeedId', 'LIKE', '%' . $request->propertyreg . '%')
                   ->orWhere('tbl_property.NeedName', 'LIKE', '%' . $request->propertyreg . '%')
                   ->orWhere('tbl_property.AreaName', 'LIKE', '%' . $request->propertyreg . '%')
                   ->orWhere('tbl_property.PropertyAreaDetail', 'LIKE', '%' . $request->propertyreg . '%')
                   ->orWhere('tbl_property.PropertyRegNo', 'LIKE', '%' . $request->propertyreg . '%')
                   ->orWhere('tbl_property.AreaId', 'LIKE', '%' . $request->propertyreg . '%')
                   ->orWhere('tbl_property.PropertyAreaDetail', 'LIKE', '%' . $request->propertyreg . '%')
                   ->orWhere('tbl_property.PropertyReferName', 'LIKE', '%' . $request->propertyreg . '%')
                   ->orWhere('tbl_property.PropertyTotalBudget', 'LIKE', '%' . $request->propertyreg . '%');
                }

                if (isset($request->reachus))
                {
                   $datas->where('tbl_property.ReachUs',$request->reachus);
                }

                if (isset($request->propertyid))
                {
                   $datas->where('tbl_property.PropertyId',$request->propertyid);
                }

                if (isset($request->Area))
                {
                   $datas->where('tbl_property.AreaId',$request->Area);
                }

                if (isset($request->Type))
                {
                   $datas->where('tbl_property.TypeId',$request->Type);
                }

                if (isset($request->Need))
                {
                   $datas->where('tbl_property.NeedId',$request->Need);
                }

                if (isset($request->Sold))
                {
                    if($request->Sold == "sold"){
                      $datas->where('tbl_property.PropertyStatus', ['Completed']);
                    }
                    else
                    {
                        if (isset($request->StatusSearch))
                        {
                           $datas->where('tbl_property.PropertyStatus',$request->StatusSearch);
                        //    return response()->json($datas);

                        }
                        else
                        {
                            $datas->whereNotIn('tbl_property.PropertyStatus', ['Completed']);
                        }
                    }
                }

                if (isset($request->MinAmount))
                {
                   $min = $request->MinAmount;
                   $max = $request->MaxAmount;
                   $datas->whereBetween('tbl_property.PropertyTotalBudget',[$min,$max]);
                }

                $datas->orderBy('tbl_property.PropertyId','desc');

                $total = $datas->count();

                $data = $datas->take($request->count)
                        ->skip($request->count*($request->page-1))
                        ->orderBy(key((array)($sorting)),current((array)($sorting)))
                        ->get();
            }

      }
      elseif(Auth::user()->RoleId == 2)
      {

         if($request->searchdata == "nosearch")
         {
                $filter = json_decode($request->filter);
                $sorting = json_decode($request->sorting);

                $data = Property::select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
                ->where('tbl_property.id',Auth::id())
                ->whereNotIn('tbl_property.PropertyStatus', ['Completed']);

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


                $datas = Property::select( 'tbl_property.*',
                    DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'));

                if (isset($request->propertyreg))
                {
                   $datas->where('tbl_property.PropertyDescription', 'LIKE', '%' . $request->propertyreg . '%');
                }

                if (isset($request->reachus))
                {
                   $datas->where('tbl_property.ReachUs',$request->reachus);
                }

                // if (isset($request->propertyname))
                // {
                //    $datas->where('tbl_property.PropertyName',$request->propertyname);
                // }

                if (isset($request->propertyid))
                {
                   $datas->where('tbl_property.PropertyId',$request->propertyid);

                }

                if (isset($request->Area))
                {
                   $datas->where('tbl_property.AreaId',$request->Area);
                }

                if (isset($request->Type))
                {
                   $datas->where('tbl_property.TypeId',$request->Type);
                }

                if (isset($request->Need))
                {
                   $datas->where('tbl_property.NeedId',$request->Need);
                }

                if (isset($request->Sold))
                {
                    if($request->Sold == "sold"){
                      $datas->where('tbl_property.PropertyStatus', ['Completed']);
                    }
                    else{
                      $datas->whereNotIn('tbl_property.PropertyStatus', ['Completed']);
                    }
                }

                if (isset($request->MinAmount))
                {
                   $min = $request->MinAmount;
                   $max = $request->MaxAmount;
                   $datas->whereBetween('tbl_property.PropertyTotalBudget',[$min,$max]);
                }

                $datas->orderBy('tbl_property.PropertyId','desc');

                $total = $datas->count();

                $data = $datas->take($request->count)
                        ->skip($request->count*($request->page-1))
                        ->orderBy(key((array)($sorting)),current((array)($sorting)))
                        ->get();
         }

      }

      $RoleId = Auth::user()->RoleId;

      return response(['data' => $data , 'role' => $RoleId ,'total' => $total]);
    }

    public function store(Request $request)
    {
       DB::beginTransaction();
        try
        {
            $input = $request->all();
            $input['id'] = Auth::id();
            $input['PropertyGalleryVideo'] = null;

            if(Auth::user()->RoleId !== 1){
               $input['PropertyStatus']  = 'Waitting';
            }

            $data = Property::create($input);
            $ebval = $input['eb'];
            $waterval = $input['water'];

            if($waterval[0]['PropertyWaterSource'] != null)
            {
                foreach ($waterval as $detailwater)
                {
                    $detailwater['PropertyId'] = $data->PropertyId;
                    $detailwater['id']=Auth::id();
                    PropertyWater::create($detailwater);
                }
            }

            if($ebval[0]['PropertyEbStatus'] != null)
            {
                foreach ($ebval as $detaileb)
                {
                    $detaileb['PropertyId'] = $data->PropertyId;
                    $detaileb['id']=Auth::id();
                    PropertyEb::create($detaileb);
                }
            }
            DB::commit();

           $RoleId = Auth::user()->RoleId;

           return response(['data' => $data , 'role' => $RoleId ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response(404,$e);
        }
    }

    public function destroy(Request $request, $id)
    {
        $comprotype = CommercialPropertyType::where('tbl_com_type.id',Auth::id())->find($id);
        $comprotype->delete();

        return response($comprotype);
    }

    public function PropertyDataGet(Request $request, $id)
    {

        $valid = Auth::id();

        if($valid === 1)
        {
            $property = Property::where('tbl_property.PropertyId',$id)
            ->first();

            $property['water'] = PropertyWater::where('tbl_property_water.PropertyId',$id)
            ->get();

            $property['eb'] = PropertyEb::where('tbl_property_eb.PropertyId',$id)
            ->get();

            $property['gallery'] = PropertyGallery::select('*')
            ->where('tbl_property_gallery.PropertyId',$id)
            ->get();

            return response()->json($property);
        }
        else
        {
            $property = Property::where('tbl_property.id',Auth::id())
            ->where('tbl_property.PropertyId',$id)
            ->first();

            $property['water'] = PropertyWater::where('tbl_property_water.id',Auth::id())
            ->where('tbl_property_water.PropertyId',$id)
            ->get();

             $property['eb'] = PropertyEb::where('tbl_property_eb.id',Auth::id())
            ->where('tbl_property_eb.PropertyId',$id)
            ->get();

             $property['gallery'] = PropertyGallery::select('*')
            ->where('tbl_property_gallery.id',Auth::id())
            ->where('tbl_property_gallery.PropertyId',$id)
            ->get();

            return response()->json($property);
        }

    }

    public function PropertyUpdate(Request $request,$id)
    {

      DB::beginTransaction();
      try
      {
        $valid = Auth::id();
        if($valid === 1){
           $property = Property::find($id);
        }
        else
        {
          $property = Property::where('tbl_property.id',Auth::id())->find($id);
        }
        $input = $request->all();
        $input['id'] = $input['id'];
        $input['PropertyGalleryVideo'] = $input['videovalue'];

        $property->update($input);

        $ebval = $input['eb'];
        $waterval = $input['water'];


        if(count($waterval) > 0)
        {
            PropertyWater::where('tbl_property_water.PropertyId',$id)
            ->where('tbl_property_water.id',Auth::id())
            ->delete();

            foreach ($waterval as $detailwater)
            {
                $detailwater['PropertyId'] = $id;
                $detailwater['id']=Auth::id();
                PropertyWater::create($detailwater);
            }
        }

        if(count($ebval) > 0)
        {
            PropertyEb::where('tbl_property_eb.PropertyId',$id)
            ->where('tbl_property_eb.id',Auth::id())
            ->delete();

            foreach ($ebval as $detaileb)
            {
                $detaileb['PropertyId'] = $id;
                $detaileb['id']=Auth::id();
                PropertyEb::create($detaileb);
            }
        }

         DB::commit();
          $RoleId = Auth::user()->RoleId;
          return response(['input' => $input , 'role' => $RoleId ]);

         } catch (\Exception $e) {
            DB::rollBack();
            return response(404,$e);
        }

    }

    // public function PropertyImageGet(Request $request ,$id)
    // {
    //     $data = PropertyGallery::select('*')
    //     ->where('tbl_property_gallery.id',Auth::id())
    //     ->where('tbl_property_gallery.PropertyId',$id)
    //     ->get();

    //     return response($data);
    // }

    public function PropertyImageAdd(Request $request,$proid)
    {

            $input = $request->all();

            if($request->file('file'))
            {
                $destinationPath = 'uploads/property/gallery';

                $files = $request->file('file');

                $count  = 0;

                foreach ($files as $file){

                    $str = str::random(3);

                    $fil = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                    $filename = $fil.'_'.$str.'.'.$ext;

                    $img = Image::make($file->getRealPath())->resize(850, 650);
                    $img->insert(public_path('uploads/main/logo.jpg'), 'bottom-right', 10, 10);


                    $ff = $img->save($destinationPath.'/'.$filename);

                    $input['id'] = Auth::id();
                    $input['PropertyGalleryImage'] = $filename;
                    $input['PropertyId'] = $proid;

                    $data1 = PropertyGallery::create($input);

                    $count++ ;
                    if($count == 5){
                      break;
                    }
                }
             }

            if($request->file('PropertyGalleryVideo'))
            {
                $destinationPath1 = 'uploads/property/video';

                $file = $request->file('PropertyGalleryVideo');
                $fil = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $str = str::random(3);
                $filename1 = $fil.'_'.$str.'.'.$ext;
                $file->move($destinationPath1, $filename1);
                $input['PropertyGalleryVideo'] = $filename1;

                Property::where('tbl_property.id',Auth::id())
                ->where('tbl_property.PropertyId',$proid)
                ->update(['PropertyGalleryVideo' =>$filename1]);
            }

            if($request->file('document'))
            {
                $docss = $request->file('document');
                $destinationPath2 = 'uploads/property/document';
                $count  = 0;

                foreach ($docss as $file)
                {
                    $str = str::random(3);

                    $fil = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                    $filename3 = $fil.'_'.$str.'.'.$ext;


                    $file->move($destinationPath2, $filename3);

                    $input['id'] = Auth::id();
                    $input['PropertyDocumentName'] = $filename3;
                    $input['PropertyId'] = $proid;

                    PropertyDocument::create($input);

                    $count++;

                    if($count == 5){
                      break;
                    }
                  }
             }

             return response($input);
    }

    public function PropertyImageUpdate(Request $request,$pid)
    {
        $input = $request->all();
        $input['id'] = Auth::id();

        $destinationPath = 'uploads/property/gallery';
        $destinationPath1 = 'uploads/property/video';
        $destinationPath2 = 'uploads/property/document';

        if($request->file('file'))
        {
            $propertygallery =  PropertyGallery::where('tbl_property_gallery.PropertyId',$pid)
            ->get();

            foreach ($propertygallery as $gallery){
                if(is_null($gallery['PropertyGalleryImage']))
                {
                    $unlink = 'uploads/property/gallery/'.$gallery['PropertyGalleryImage'];
                    unlink($unlink);
                }
            }

            PropertyGallery::where('tbl_property_gallery.PropertyId',$pid)
            ->delete();

            $files = $request->file('file');

            $input['id'] = Auth::id();

            $count  = 0;

            foreach ($files as $file)
            {
                $str = str::random(3);

                $fil = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename = $fil.'_'.$str.'.'.$ext;

                $img = Image::make($file->getRealPath())->resize(850, 650);
                $img->insert(public_path('uploads/main/logo.jpg'), 'bottom-right', 10, 10);
                $ff = $img->save($destinationPath.'/'.$filename);

                $input['id'] = Auth::id();
                $input['PropertyGalleryImage'] = $filename;
                $input['PropertyId'] = $pid;

                $data1 = PropertyGallery::create($input);

                $count++;

                if($count == 5){
                  break;
                }
            }
        }

        if($request->hasFile('PropertyGalleryVideo'))
        {
            if($request->PropertyGalleryVideo != $request->PropertyGalleryVideo1)
            {
                if($request->PropertyGalleryVideo1 != "null")
                {
                   $file_path6 = 'uploads/property/video/'.$request->PropertyGalleryVideo1;
                   unlink($file_path6);
                }

                $file11 = $request->file('PropertyGalleryVideo');
                $fil11 = pathinfo($file11->getClientOriginalName(), PATHINFO_FILENAME);
                $ext11 = pathinfo($file11->getClientOriginalName(), PATHINFO_EXTENSION);
                $str11 = str::random(3);
                $filename11 = $fil11.'_'.$str11.'.'.$ext11;
                $file11->move($destinationPath1, $filename11);
                $input['PropertyGalleryVideo'] = $filename11;

                Property::where('tbl_property.PropertyId',$pid)
                ->update(['PropertyGalleryVideo' =>$filename11]);
            }
        }

        if($request->file('document'))
        {
            $propertydocument =  PropertyDocument::where('tbl_property_document.PropertyId',$pid)
            ->get();

            foreach ($propertydocument as $document){
               $unlink = 'uploads/property/document/'.$document['PropertyDocumentName'];
               unlink($unlink);
            }

            PropertyDocument::where('tbl_property_document.id',Auth::id())
            ->where('tbl_property_document.PropertyId',$pid)
            ->delete();

            $docss = $request->file('document');

            $input['id'] = Auth::id();

            $count  = 0;

            foreach ($docss as $file)
            {
                $str = str::random(3);

                $fil = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename3 = $fil.'_'.$str.'.'.$ext;

                $file->move($destinationPath2, $filename3);

                $input['id'] = Auth::id();
                $input['PropertyDocumentName'] = $filename3;
                $input['PropertyId'] = $pid;

                $data1 = PropertyDocument::create($input);

                $count++;

                if($count == 5){
                  break;
                }
            }
        }

        return response($input);

    }

    public function PropertyFollowGet(Request $request, $id)
    {
        if(Auth::user()->RoleId === 5){
             $assign = DB::table('tbl_abo_assign')
            ->where('tbl_abo_assign.PropertyId',$id)
            ->first();

            if($assign === null){
               return response("Not authorized");
            }

        }

        $property['data'] = Property::select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as PropertyGalleryImage'))
        ->where('tbl_property.PropertyId',$id)
        ->first();

        $property['mediator'] = MediatorAssign::select('tbl_mediator_assign.MediatorId','tbl_mediator_assign.MediatorName')
        ->where('tbl_mediator_assign.PropertyId',$id)
        ->get();

        $property['abo'] = AboAssign::select('tbl_abo_assign.AboId','tbl_abo_assign.AboName','tbl_abo_assign.AboAssignedId')
        ->where('tbl_abo_assign.PropertyId',$id)
        ->get();

        $property['role'] = Auth::user()->RoleId;

        return response($property);
    }

    public function PropertyFollowValGet(Request $request, $id)
    {
        $follow['data'] = DB::table('tbl_property_follow')
        ->where('tbl_property_follow.PropertyId',$id)
        ->get();

        $follow['role'] = Auth::user()->RoleId;

        return response($follow);
    }

    public function PropertyFollowAdd(Request $request)
    {
        $input = $request->all();
        $input['id'] = Auth::id();
        $follow = PropertyFollow::create($input);

        return response($follow);
    }

    public function PropertyFollowUpdate(Request $request, $id)
    {
        $follow = PropertyFollow::where('tbl_property_follow.id',Auth::id())->find($id);
        $input = $request->all();
        $data =  $follow->update($input);

        return response($follow);
    }

    public function PropertyPersonValGet(Request $request, $id)
    {
        $person = DB::table('tbl_property_person')
        ->join('tbl_property','tbl_property_person.PropertyId','tbl_property.PropertyId')
        ->where('tbl_property_person.PropertyId',$id)
        ->get();

        $property = DB::table('tbl_property')
        ->where('tbl_property.PropertyId',$id)
        ->first();

        return response(['person' => $person , 'property' => $property ]);
    }

    public function PropertyPersonAdd(Request $request)
    {
        $input = $request->all();
        $input['id'] = Auth::id();
        $person = PropertyPerson::create($input);

        return response($person);
    }

    public function PropertyPersonUpdate(Request $request, $id)
    {

        $person = PropertyPerson::where('tbl_property_person.id',Auth::id())->find($id);
        $input = $request->all();
        $data =  $person->update($input);

        return response($person);
    }

    public function PropertyStatusUpdate(Request $request, $id)
    {
        $property = Property::find($id);
        $input = $request->all();
        $data =  $property->update(['PropertyStatus'=>$input['PropertyStatus'],'PropertyPendingReason'=>$input['PropertyPendingReason'],'PropertyUserStatus'=>$input['PropertyUserStatus']]);

        return response($data);
    }

    public function PropertyUserStatusUpdate(Request $request, $id)
    {
        $property = Property::find($id);
        $input = $request->all();
        $data =  $property->update(['PropertyUserStatus'=>$input['PropertyUserStatus']]);

        return response($data);
    }

    public function PropertyDocumentGet(Request $request, $id)
    {
         $property = Property::join('tbl_property_document','tbl_property.PropertyId','tbl_property_document.PropertyId')
        ->where('tbl_property.PropertyId',$id)
        ->get();

        return response($property);
    }

    public function PropertySearch(Request $request)
    {
        $filter = json_decode($request->filter);
        $sorting = json_decode($request->sorting);


        $datas = Property::select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
        ->whereNotIn('tbl_property.PropertyStatus', ['Completed']);

        if (isset($request->propertyreg))
        {
           $datas->where('tbl_property.PropertyRegNo',$request->propertyreg);
        }

        if (isset($request->propertyname))
        {
           $datas->where('tbl_property.PropertyName',$request->propertyname);
        }

        if (isset($request->propertyid))
        {
           $datas->where('tbl_property.PropertyId',$request->propertyid);

        }

        if (isset($request->Area))
        {
           $datas->where('tbl_property.AreaId',$request->Area);
        }

        if (isset($request->MinAmount))
        {
           $min = $request->MinAmount;
           $max = $request->MaxAmount;
           $datas->whereBetween('tbl_property.PropertyTotalBudget',[$min,$max]);
        }

        $datas->orderBy('tbl_property.PropertyId','desc');

        // ->where('tbl_property.PropertyId', 'LIKE', '%' . $request->searchdata . '%')
        // ->orWhere('tbl_property.PropertyName', 'LIKE', '%' . $request->searchdata . '%')
        // ->orWhere('tbl_property.PropertyRegNo', 'LIKE', '%' . $request->searchdata . '%')
        // ->orWhere('tbl_property.PropertyTotalBudget', 'LIKE', '%' . $request->searchdata . '%')
        // ->orWhere('tbl_property.AreaName', 'LIKE', '%' . $request->searchdata . '%')
        // ->orderBy('tbl_property.PropertyId','desc');
        $total = $datas->count();

        $data = $datas->take($request->count)
                ->skip($request->count*($request->page-1))
                ->orderBy(key((array)($sorting)),current((array)($sorting)))
                ->get();

         $RoleId = Auth::user()->RoleId;

        return response(['data' => $data , 'role' => $RoleId ,'total' => $total]);
    }

    public function PropertyGetDatas(Request $request)
    {
        $property = Property::whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled'])->get();

        return response($property);
    }

    public function PropertyBuyerDataGet(Request $request,$needid)
    {
      if(Auth::user()->RoleId == 1)
      {
            if($request->searchdata == "nosearch")
            {
                $filter = json_decode($request->filter);
                $sorting = json_decode($request->sorting);

                $data = Property::select( 'tbl_property.*',
                    DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
                ->whereNotIn('tbl_property.PropertyStatus', ['Completed'])
                ->where('tbl_property.NeedId',$needid);

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


                // $data = Property::select( 'tbl_property.*',
                //     DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
                // ->whereNotIn('tbl_property.PropertyStatus', ['Completed'])
                // ->where('tbl_property.PropertyId', 'LIKE', '%' . $request->searchdata . '%')
                // ->orWhere('tbl_property.PropertyName', 'LIKE', '%' . $request->searchdata . '%')
                // ->orWhere('tbl_property.PropertyRegNo', 'LIKE', '%' . $request->searchdata . '%')
                // ->orWhere('tbl_property.PropertyTotalBudget', 'LIKE', '%' . $request->searchdata . '%')
                // ->orWhere('tbl_property.AreaName', 'LIKE', '%' . $request->searchdata . '%')
                // ->orderBy('tbl_property.PropertyId','desc');
                // $total = $data->count();

                // $data = $data->take($request->count)
                //         ->skip($request->count*($request->page-1))
                //         ->orderBy(key((array)($sorting)),current((array)($sorting)))
                //         ->get();


                $datas = Property::select( 'tbl_property.*',
                    DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
                ->where('tbl_property.NeedId',$needid);

                if (isset($request->propertyname))
                {
                   $datas->where('tbl_property.PropertyName',$request->propertyname);
                }

                if (isset($request->propertyreg))
                {
                   $datas->where('tbl_property.PropertyDescription', 'LIKE', '%' . $request->propertyreg . '%');
                }

                if (isset($request->reachus))
                {
                   $datas->where('tbl_property.ReachUs',$request->reachus);
                }

                if (isset($request->propertyid))
                {
                   $datas->where('tbl_property.PropertyId',$request->propertyid);
                }

                if (isset($request->Area))
                {
                   $datas->where('tbl_property.AreaId',$request->Area);
                }

                if (isset($request->Type))
                {
                   $datas->where('tbl_property.TypeId',$request->Type);
                }

                // if (isset($request->Need))
                // {
                //    $datas->where('tbl_property.NeedId',$request->Need);
                // }

                if (isset($request->Sold))
                {
                    if($request->Sold == "sold"){
                      $datas->where('tbl_property.PropertyStatus', ['Completed']);
                    }
                    else{
                      $datas->whereNotIn('tbl_property.PropertyStatus', ['Completed']);
                    }
                }

                if (isset($request->MinAmount))
                {
                   $min = $request->MinAmount;
                   $max = $request->MaxAmount;
                   $datas->whereBetween('tbl_property.PropertyTotalBudget',[$min,$max]);
                }

                $datas->orderBy('tbl_property.PropertyId','desc');

                $total = $datas->count();

                $data = $datas->take($request->count)
                        ->skip($request->count*($request->page-1))
                        ->orderBy(key((array)($sorting)),current((array)($sorting)))
                        ->get();
            }

      }
      elseif(Auth::user()->RoleId == 2)
      {

         if($request->searchdata == "nosearch")
         {
                $filter = json_decode($request->filter);
                $sorting = json_decode($request->sorting);

                $data = Property::select( 'tbl_property.*',
            DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
                ->where('tbl_property.id',Auth::id())
                ->whereNotIn('tbl_property.PropertyStatus', ['Completed'])
                ->where('tbl_property.NeedId',$needid);

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


                $datas = Property::select( 'tbl_property.*',
                    DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo'))
                ->where('tbl_property.NeedId',$needid);

                if (isset($request->propertyreg))
                {
                   $datas->where('tbl_property.PropertyDescription', 'LIKE', '%' . $request->propertyreg . '%');
                }

                if (isset($request->reachus))
                {
                   $datas->where('tbl_property.ReachUs',$request->reachus);
                }

                // if (isset($request->propertyname))
                // {
                //    $datas->where('tbl_property.PropertyName',$request->propertyname);
                // }

                if (isset($request->propertyid))
                {
                   $datas->where('tbl_property.PropertyId',$request->propertyid);

                }

                if (isset($request->Area))
                {
                   $datas->where('tbl_property.AreaId',$request->Area);
                }

                if (isset($request->Type))
                {
                   $datas->where('tbl_property.TypeId',$request->Type);
                }

                // if (isset($request->Need))
                // {
                //    $datas->where('tbl_property.NeedId',$request->Need);
                // }

                if (isset($request->Sold))
                {
                    if($request->Sold == "sold"){
                      $datas->where('tbl_property.PropertyStatus', ['Completed']);
                    }
                    else{
                      $datas->whereNotIn('tbl_property.PropertyStatus', ['Completed']);
                    }
                }

                if (isset($request->MinAmount))
                {
                   $min = $request->MinAmount;
                   $max = $request->MaxAmount;
                   $datas->whereBetween('tbl_property.PropertyTotalBudget',[$min,$max]);
                }

                $datas->orderBy('tbl_property.PropertyId','desc');

                $total = $datas->count();

                $data = $datas->take($request->count)
                        ->skip($request->count*($request->page-1))
                        ->orderBy(key((array)($sorting)),current((array)($sorting)))
                        ->get();
         }

      }

      $RoleId = Auth::user()->RoleId;

      return response(['data' => $data , 'role' => $RoleId ,'total' => $total]);
    }

}
