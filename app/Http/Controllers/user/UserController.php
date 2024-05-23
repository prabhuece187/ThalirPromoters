<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Models\Admin\Type;
use App\Models\Admin\Category;
use App\Models\Admin\Property;
use App\Models\Admin\PropertyEb;
use App\Models\Admin\PropertyWater;
use App\Models\Admin\PropertyAddition;
use App\Models\Admin\PropertyGallery;
use App\Models\Admin\PropertyAmenities;
use App\Models\Admin\PromoterSite;
use App\Models\Admin\Need;
use App\Models\Admin\Area;
use App\Models\Admin\Purpose;
use App\Models\User\BuyerComment;
use App\Models\Admin\PropertyDocument;
use App\Models\User\ClientData;
use Session; 
use Auth;
use DB;
use App\Models\User;

class UserController extends Controller
{
	public function index(Request $request)
	{
    // <-- command -->
  	  // $property = Property::select( 'tbl_property.*',DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo',DB::raw('(select count(PropertyGalleryId) PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId ) as pic')))
     //  ->orderBy('tbl_property.PropertyId','desc') 
     //  ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled'])
     //  ->take(12)
     //  ->get();
    // <-- command -->

      // $product = Property::select( 'tbl_property.*',DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo',DB::raw('(select count(PropertyGalleryId) PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId ) as pic')))  
      // ->where('tbl_property.NeedId',1)
      // ->orderBy('tbl_property.PropertyId','desc') 
      // ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled'])
      // ->take(12)
      // ->get();

      // $sellproduct = Property::select( 'tbl_property.*',DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo',DB::raw('(select count(PropertyGalleryId) PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId ) as pic')))  
      // ->where('tbl_property.NeedId',2)
      // ->orderBy('tbl_property.PropertyId','desc') 
      // ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled'])
      // ->take(12)
      // ->get();

      // $rentproduct = Property::select( 'tbl_property.*',DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo',DB::raw('(select count(PropertyGalleryId) PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId ) as pic')))  
      // ->where('tbl_property.NeedId',3)
      // ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled'])
      // ->orderBy('tbl_property.PropertyId','desc') 
      // ->take(12)
      // ->get();   

      // $needrentproduct = Property::select( 'tbl_property.*',DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as photo',DB::raw('(select count(PropertyGalleryId) PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId ) as pic')))  
      // ->where('tbl_property.NeedId',4)
      // ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled'])
      // ->orderBy('tbl_property.PropertyId','desc') 
      // ->take(12)
      // ->get(); 

// <-- command -->
      // $promoter = PromoterSite::leftJoin('tbl_pro_gallery','tbl_prosite.ProSiteId','tbl_pro_gallery.ProSiteId')
      // ->groupBy('tbl_prosite.ProSiteId')
      // ->take(12)
      // ->get();
    // <-- command -->

      // $count = 1;

      // if($promoter->isEmpty())
      // {
      //     $promoter = "no items";
      // }
// <-- command -->

      // ------------sell--------

      // if($property->isEmpty())
      // {
      //     $seller = "no items";
      // }
      // else
      // {
      //     foreach ($property as $selling) 
      //     {
      //         $seller['propertyies'][] = array(
      //           'name1'     => $selling['PropertyName'],
      //           'type'      => $selling['TypeName'],
      //           'regno'     => $selling['PropertyRegNo'],
      //           'size'      => $selling['PropertyLandSize'],
      //           'image'     => $selling['photo'],
      //           'desc'      => $selling['PropertyDescription'],
      //           'amt'       => $selling['PropertyTotalBudget'],
      //           'amttype'   => $selling['PropertyTotalValType'],
      //           'area'      => $selling['AreaName'],
      //           'location'  => $selling['PropertyAddress'],
      //           'north'     => $selling['PropertyNorth'],
      //           'south'     => $selling['PropertySouth'],
      //           'west'      => $selling['PropertyWest'],
      //           'east'      => $selling['PropertyEast'],
      //           'corner'    => $selling['PropertyCorner'],
      //           'northbuild'     => $selling['PropertyBuildNorth'],
      //           'southbuild'     => $selling['PropertyBuildSouth'],
      //           'westbuild'      => $selling['PropertyBuildWest'],
      //           'eastbuild'      => $selling['PropertyBuildEast'],
      //           'cornerbuild'    => $selling['PropertyBuildCorner'],
      //           'typeid'    => $selling['TypeId'],
      //           'needid'    => $selling['NeedId'],
      //           'needname'  => $selling['NeedName'],
      //           'know'  => $selling['KnowusName'],
      //           'proid'    => $selling['PropertyId'],
      //           'pic'    => $selling['pic'],
      //           'id'  => $count,  
      //         );
      //        $count++;
      //     } 
      // }

      // $need = Need::get();
    // <-- command -->

      $propertytype = Type::get();
      $need = Need::get();
      $area = Area::get();
      $purpose = Purpose::get();
      $min = (int)$request->minimum_price;
      $max = (int)$request->maximum_price;

      if ($min != 0 || $max != 0)
      {
         $products = Property::select( 'tbl_property.*',DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as PropertyGalleryImage'),DB::raw('(select count(PropertyGalleryId) PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId ) as pic'))
         ->whereIn('PropertyTotalValType',[$request->minimum_amt,$request->maximum_amt])
         ->whereNotIn('tbl_property.PropertyStatus', ['Canceled','Completed']);   

         $productsone = Property::select( 'tbl_property.*',DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as PropertyGalleryImage'),DB::raw('(select count(PropertyGalleryId) PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId ) as pic'))
         ->whereIn('PropertyTotalValType',[$request->minimum_amt,$request->maximum_amt])
         ->whereNotIn('tbl_property.PropertyStatus', ['Canceled','Completed']); 
      }
      else
      {
         $products = Property::select( 'tbl_property.*',DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as PropertyGalleryImage'),DB::raw('(select count(PropertyGalleryId) PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId ) as pic'))
         ->whereNotIn('tbl_property.PropertyStatus', ['Canceled','Completed'])
         ->orderBy('tbl_property.PropertyId','desc');
      }


      if ($request->ajax()) 
      {  
         if (isset($request->need)) 
         {
            if( $request->need != 0){
               $products->whereIn('NeedId',[$request->need]);
            }
         }

         if (isset($request->reach)) 
         {
            if( $request->reach != null){
               $products->whereIn('ReachUs',[$request->reach]);
            }
         }

         if (isset($request->search)) 
         {
            $products->where('PropertyName', 'LIKE', '%' . $request->search . '%')
            ->orWhere('PropertyId', 'LIKE', '%' . $request->search . '%')
            ->orWhere('PropertyTotalBudget', 'LIKE', '%' . $request->search . '%')
            ->orWhere('AreaName', 'LIKE', '%' . $request->search . '%')
            ->orWhere('TypeName', 'LIKE', '%' . $request->search . '%')
            ->orWhere('NeedName', 'LIKE', '%' . $request->search . '%')
            ->orWhere('PropertyDescription', 'LIKE', '%' . $request->search . '%')
            ->orWhere('PurposeName', 'LIKE', '%' . $request->search . '%')
            ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled']);
         }

         if (isset($request->search1)) 
         {
            $products->where('PropertyName', 'LIKE', '%' . $request->search1 . '%')
            ->orWhere('PropertyId', 'LIKE', '%' . $request->search1 . '%')
            ->orWhere('PropertyTotalBudget', 'LIKE', '%' . $request->search1 . '%')
            ->orWhere('AreaName', 'LIKE', '%' . $request->search1 . '%')
            ->orWhere('TypeName', 'LIKE', '%' . $request->search1 . '%')
            ->orWhere('NeedName', 'LIKE', '%' . $request->search1 . '%')
            ->orWhere('PropertyDescription', 'LIKE', '%' . $request->search1 . '%')
            ->orWhere('PurposeName', 'LIKE', '%' . $request->search1 . '%')
            ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled']);
         }

         if (isset($request->serialsearchdata)) 
         {
            $products->where('PropertyId', $request->serialsearchdata)
            ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled']);
         }

         if (isset($request->serialsearchdata2)) 
         {
            $products->where('PropertyId', $request->serialsearchdata2)
            ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled']);
         }

         if (isset($request->area)) 
         {
            $products->whereIn('AreaId',$request->area);
         }

         if (isset($request->purpose)) 
         {
            $products->whereIn('PurposeId',$request->purpose);
         }

          if (isset($request->type)) 
         {
            $products->whereIn('TypeId',$request->type);
         }

         if (isset($request->sort)) 
         {
            if($request->sort['0'] == 'asc')
            {
               $products->orderByRaw('PropertyTotalBudget',$request->sort['0']);
            }
            else{
               $products->orderByRaw('PropertyTotalBudget',$request->sort['0']);
            }
         }

         if (isset($request->minimum_price) && isset($request->maximum_price))
         {
            if ($min != 0 || $max != 0)
            {
               if($request->minimum_amt == "Lakhs" && $request->maximum_amt == "Cr")
               {
                  $val1 =  $productsone->whereBetween('PropertyTotalBudget', [$min , 99 ]);
                  $products =  $products->whereBetween('PropertyTotalBudget', [1, $max])->union($val1)
                  ->orderBy('PropertyTotalBudget','asc');
               }
               else if($request->minimum_amt == "K" && $request->maximum_amt == "Lakhs")
               {
                  $val1 =  $productsone->whereBetween('PropertyTotalBudget', [$min , 99 ]);
                  $products =  $products->whereBetween('PropertyTotalBudget', [1, $max])->union($val1)
                  ->orderBy('PropertyTotalBudget','asc');
               }
               else
               {
                   $products->whereBetween('PropertyTotalBudget', [$min, $max])->orderBy('PropertyTotalBudget','asc');
               }
            }
         }
      }

      $property = $products->paginate(100);

      if($property->isEmpty())
      {
         $property = "no items";
      }


      if ($request->ajax()) 
      {
         return view('user.product',['propertytype'=>$propertytype,'need'=>$need,'area'=>$area,'purpose'=>$purpose,'property'=>$property]);
      }
      else
      {
         return view('user.index',['propertytype'=>$propertytype,'need'=>$need,'area'=>$area,'purpose'=>$purpose,'property'=>$property]);
      }
       
   }

   public function postAdminUserLogin(Request $request)
   {
     $user = User::where('name', '=', $request->name)->first();

     if($user->RoleId === 1){

        if ($user && Hash::check($request->password, $user->password))
        {
           session()->put('name', $user->RoleId);
        }        
        else 
        {
           return redirect('/adminuserlogin')->with('message', 'Check Username and Password.');
        }

        return redirect('/adminuserlogin')->with('message', 'Successfully Logined.');
     }
        return redirect('/adminuserlogin')->with('message', 'Check Username and Password.');
    
   }


   public function SignOut()
   {
      Session::flush();

      return redirect('/adminuserlogin')->with('message', 'Successfully Signout Admin.');
   }

   public function ClientDataRegister(Request $request)
   {
      $data = $request->all();
      ClientData::create($data);

      return redirect('/index')->with('message', 'தகவலுக்கு நன்றி
எங்கள் வாடிக்கையாளர் சேவை மைய அதிகாரி உங்களை விரைவில் தொடர்பு கொள்வார்.');
   }


}