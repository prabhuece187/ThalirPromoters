<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admin\Type;
use App\Models\Admin\Need;
use App\Models\Admin\Area;
use App\Models\Admin\Purpose;
use App\Models\Admin\Property;
use App\Models\Admin\PropertyEb;
use App\Models\Admin\PropertyWater;
use App\Models\Admin\PropertyGallery;
use App\Models\User\BuyerComment;
use App\Models\Admin\PropertyDocument;

use DB;
use App\Models\User;


class UserPropertyController extends Controller
{
   public function PropertyDetail(Request $request,$prodid,$needid)
   {
   	$property = Property::where('tbl_property.PropertyId',$prodid)
      ->first();

      $propertygallery = PropertyGallery::where('tbl_property_gallery.PropertyId',$prodid)
      ->get();

      $propertydocument = PropertyDocument::where('tbl_property_document.PropertyId',$prodid)
      ->get();
      
      $propertyeb = PropertyEb::where('tbl_property_eb.PropertyId',$prodid)
      ->get();

      $propertywater = PropertyWater::where('tbl_property_water.PropertyId',$prodid)
      ->get();

      $comment = BuyerComment::where('tbl_buyer_comment.PropertyId',$prodid)
      ->where('tbl_buyer_comment.BuyerCommentStatus','Approved')
      ->get(); 

      $commentcount = $comment->count();

      if($comment->isEmpty())
      {
          $comment = "no comments";
      }

      if($propertyeb->isEmpty())
      {
         $propertyeb = "no items";
      }

      if($propertywater->isEmpty())
      {
         $propertywater = "no items";
      }

      if($propertydocument->isEmpty())
      {
         $propertydocument = "no items";
      }

      if($propertygallery->isEmpty())
      {
         $propertygallery = "no items";
      }


      return view('user.property-details',compact('property','propertygallery','propertyeb','propertywater','comment','commentcount','propertydocument'));  
   }

   public function PropertyPage(Request $request)
   {
      $data = $request->all();
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

         $productsone = Property::select( 'tbl_property.*',DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as PropertyGalleryImage'),DB::raw('(select count(PropertyGalleryId) PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId ) as pic'))
         ->whereNotIn('tbl_property.PropertyStatus', ['Canceled','Completed'])
         ->orderBy('tbl_property.PropertyId','desc');
      }

     $ned = [$request->need];

      if ($request->ajax()) 
      {  
         if (isset($request->need)) 
         {
            $products->whereIn('NeedId',[$request->need]);
            $productsone->whereIn('NeedId',[$request->need]);
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

            $productsone->where('PropertyName', 'LIKE', '%' . $request->search . '%')
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

            $productsone->where('PropertyName', 'LIKE', '%' . $request->search1 . '%')
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

            $productsone->where('PropertyId', $request->serialsearchdata)
            ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled']);
         }

         if (isset($request->serialsearchdata2)) 
         {
            $products->where('PropertyId', $request->serialsearchdata2)
            ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled']);

            $productsone->where('PropertyId', $request->serialsearchdata2)
            ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Canceled']);
         }


         if (isset($request->area)) 
         {
            $products->whereIn('AreaId',$request->area);
            $productsone->whereIn('AreaId',$request->area);
         }

         if (isset($request->purpose)) 
         {
            $products->whereIn('PurposeId',$request->purpose);
            $productsone->whereIn('PurposeId',$request->purpose);
         }

          if (isset($request->type)) 
         {
            $products->whereIn('TypeId',$request->type);
            $productsone->whereIn('TypeId',$request->type);
         }

         if (isset($request->minimum_price) && isset($request->maximum_price))
         {
            if ($min != 0 || $max != 0)
            {
               if($request->minimum_amt == "Lakhs" && $request->maximum_amt == "Cr")
               {
                  if (isset($request->sort)) 
                  {
                     if($request->sort['0'] == 'asc')
                     {
                       $val1 =  $productsone->whereBetween('PropertyTotalBudget', [$min , 99 ]);
                       $products =  $products->whereBetween('PropertyTotalBudget', [1, $max])->union($val1)
                        ->orderBy('PropertyTotalBudget','asc');
                     }
                     else if($request->sort['0'] == 'desc')
                     {
                       $val1 =  $productsone->whereBetween('PropertyTotalBudget', [$min , 99 ]);
                       $products =  $products->whereBetween('PropertyTotalBudget', [1, $max])->union($val1)
                        ->orderBy('PropertyTotalBudget','desc');
                     }
                  } 
                  else
                  {
                     $val1 =  $productsone->whereBetween('PropertyTotalBudget', [$min , 99 ]);
                     $products =  $products->whereBetween('PropertyTotalBudget', [1, $max])->union($val1);
                  }

               }
               else if($request->minimum_amt == "K" && $request->maximum_amt == "Lakhs")
               {
                  if (isset($request->sort)) 
                  {
                      if($request->sort['0'] == 'asc')
                      {
                          $val1 =  $productsone->whereBetween('PropertyTotalBudget', [$min , 99 ]);
                          $products =  $products->whereBetween('PropertyTotalBudget', [1, $max])->union($val1)
                           ->orderBy('PropertyTotalBudget','asc');
                      }
                      else if($request->sort['0'] == 'desc')
                      {
                          $val1 =  $productsone->whereBetween('PropertyTotalBudget', [$min , 99 ]);
                          $products =  $products->whereBetween('PropertyTotalBudget', [1, $max])->union($val1)
                           ->orderBy('PropertyTotalBudget','desc');
                      }
                  }
                  else
                  {
                     $val1 =  $productsone->whereBetween('PropertyTotalBudget', [$min , 99 ]);
                     $products =  $products->whereBetween('PropertyTotalBudget', [1, $max])->union($val1);
                  }
               }
               else
               {
                  if (isset($request->sort)) 
                  {
                      if($request->sort['0'] == 'asc')
                      {
                        $products->whereBetween('PropertyTotalBudget', [$min, $max])->orderBy('PropertyTotalBudget','asc');
                      }
                      else{
                        $products->whereBetween('PropertyTotalBudget', [$min, $max])->orderBy('PropertyTotalBudget','desc');
                      }
                  }
                  else{
                     $products->whereBetween('PropertyTotalBudget', [$min, $max]);
                  }
               }
            }
            else
            {
               if (isset($request->sort)) 
               {
                  if($request->sort['0'] == 'asc')
                  {
                     $products->orderByRaw('PropertyTotalBudget','asc');
                  }
                  else
                  {
                    $products->orderByRaw('PropertyTotalBudget','desc');
                  }
               }
            }
         }

         // if (isset($request->sort)) 
         // {
         //    if($request->sort['0'] == 'asc')
         //    {
         //       $products->orderByRaw('PropertyTotalBudget','asc');
         //       $productsone->orderByRaw('PropertyTotalBudget','asc');
         //    }
         //    else{
         //       $products->orderByRaw('PropertyTotalBudget','asc');
         //       $productsone->orderByRaw('PropertyTotalBudget','asc');
         //    }
         // }
      }

      $property = $products->paginate(100);


      if($property->isEmpty())
      {
         $property = "no items";
      }


      if(count($ned)==0)
      {
         $ned = "no items";
      }

      if ($request->ajax()) 
      {
         return view('user.product',['propertytype'=>$propertytype,'need'=>$need,'area'=>$area,'purpose'=>$purpose,'property'=>$property,'ned'=>$ned]);
      }
      else
      {
         return view('user.property-right',['propertytype'=>$propertytype,'need'=>$need,'area'=>$area,'purpose'=>$purpose,'property'=>$property,'ned'=>$ned]);
      }
       
   }
}