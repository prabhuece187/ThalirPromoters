<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admin\Type;
use App\Models\Admin\Category;
use App\Models\Admin\PromoterSite;
use App\Models\Admin\PromoterSiteStatus;
use App\Models\Admin\PromoterGallery;
use App\Models\User\BuyerComment;
use DB;
use App\Models\User;
use App\Models\Admin\Area;


class UserPromoterController extends Controller
{
   public function PromoterDetail(Request $request,$prodid)
   {
   	$promoter = PromoterSite::where('tbl_prosite.ProSiteId',$prodid)
      ->first();

      $idvalue = $promoter['id']; 
      
      $promotergallery = PromoterGallery::where('tbl_pro_gallery.ProSiteId',$prodid)
      ->get(); 

      $promoterstatus = PromoterSiteStatus::where('tbl_prosite_status.ProSiteId',$prodid)
      ->get();     

      $comment = BuyerComment::where('tbl_buyer_comment.ProSiteId',$prodid)
      ->where('tbl_buyer_comment.BuyerCommentStatus','Approved')
      ->get(); 

       $commentcount = $comment->count();

      if($comment->isEmpty())
      {
          $comment = "no items";
      }

      $status = null;
      $flat = PromoterSiteStatus::find(1);

      // $top = PromoterSite::where('tbl_prosite.id',$idvalue)
      // ->groupBy('tbl_prosite.ProSiteId')
      // ->take(5)->get();

      // $latest = PromoterSite::orderBy('tbl_prosite.ProSiteId','desc')
      // ->where('tbl_prosite.id',$idvalue)
      // ->groupBy('tbl_prosite.ProSiteId')
      // ->take(5)->get();
      // ,'top','latest'

      return view('user.promoter-details',compact('promoter','promotergallery','promoterstatus','comment','commentcount','status','flat'));
      
   }

   public function PromoterPage(Request $request)
   {

      $data = $request->all();
      $min = (int)$request->minimum_price;
      $max = (int)$request->maximum_price;
      $area = Area::get();


      if ($min != 0 || $max != 0)
      {
         $products = PromoterSite::select( 'tbl_prosite.*',DB::raw('(select ProGalleryImage from tbl_pro_gallery where tbl_pro_gallery.ProSiteId  =  tbl_prosite.ProSiteId order by ProSiteId asc limit 1) as ProGalleryImage'),DB::raw('(select count(ProGalleryId) ProGalleryImage from tbl_pro_gallery where tbl_pro_gallery.ProSiteId  =  tbl_prosite.ProSiteId ) as pic'))
         ->whereIn('ProMinType',[$request->minimum_amt,$request->maximum_amt])
         ->whereIn('ProMaxType',[$request->minimum_amt,$request->maximum_amt])
         ->orderBy('tbl_prosite.ProSiteId','desc');   

         $productsone = PromoterSite::select( 'tbl_prosite.*',DB::raw('(select ProGalleryImage from tbl_pro_gallery where tbl_pro_gallery.ProSiteId  =  tbl_prosite.ProSiteId order by ProSiteId asc limit 1) as ProGalleryImage'),DB::raw('(select count(ProGalleryId) ProGalleryImage from tbl_pro_gallery where tbl_pro_gallery.ProSiteId  =  tbl_prosite.ProSiteId ) as pic'))
         ->whereIn('ProMinType',[$request->minimum_amt,$request->maximum_amt])
         ->whereIn('ProMaxType',[$request->minimum_amt,$request->maximum_amt])
         ->orderBy('tbl_prosite.ProSiteId','desc'); 
      }
      else
      {
          $products = PromoterSite::select( 'tbl_prosite.*',DB::raw('(select ProGalleryImage from tbl_pro_gallery where tbl_pro_gallery.ProSiteId  =  tbl_prosite.ProSiteId order by ProSiteId asc limit 1) as ProGalleryImage'),DB::raw('(select count(ProGalleryId) ProGalleryImage from tbl_pro_gallery where tbl_pro_gallery.ProSiteId  =  tbl_prosite.ProSiteId ) as pic'))
         ->orderBy('tbl_prosite.ProSiteId','desc');   

         $productsone = PromoterSite::select( 'tbl_prosite.*',DB::raw('(select ProGalleryImage from tbl_pro_gallery where tbl_pro_gallery.ProSiteId  =  tbl_prosite.ProSiteId order by ProSiteId asc limit 1) as ProGalleryImage'),DB::raw('(select count(ProGalleryId) ProGalleryImage from tbl_pro_gallery where tbl_pro_gallery.ProSiteId  =  tbl_prosite.ProSiteId ) as pic'))
         ->orderBy('tbl_prosite.ProSiteId','desc'); 
      }


      if ($request->ajax()) 
      {

         if (isset($request->area)) 
         {

            $products->whereIn('AreaId',$request->area);
            $productsone->whereIn('AreaId',$request->area);
         }

         if (isset($request->prosearch)) 
         {
            $products->where('PromoterName', 'LIKE', '%' . $request->prosearch . '%')
            ->orWhere('ProSiteId', 'LIKE', '%' . $request->prosearch . '%')
            ->orWhere('ProMinVal', 'LIKE', '%' . $request->prosearch . '%')
            ->orWhere('ProMaxVal', 'LIKE', '%' . $request->prosearch . '%');

            $productsone->where('PromoterName', 'LIKE', '%' . $request->prosearch . '%')
            ->orWhere('ProSiteId', 'LIKE', '%' . $request->prosearch . '%')
            ->orWhere('ProMinVal', 'LIKE', '%' . $request->prosearch . '%')
            ->orWhere('ProMaxVal', 'LIKE', '%' . $request->prosearch . '%');
         }

         if (isset($request->prosearch1)) 
         {
            $products->where('PromoterName', 'LIKE', '%' . $request->prosearch1 . '%')
            ->orWhere('ProSiteId', 'LIKE', '%' . $request->prosearch1 . '%')
            ->orWhere('ProMinVal', 'LIKE', '%' . $request->prosearch . '%')
            ->orWhere('ProMaxVal', 'LIKE', '%' . $request->prosearch . '%');

            $productsone->where('PromoterName', 'LIKE', '%' . $request->prosearch1 . '%')
            ->orWhere('ProSiteId', 'LIKE', '%' . $request->prosearch1 . '%')
            ->orWhere('ProMinVal', 'LIKE', '%' . $request->prosearch . '%')
            ->orWhere('ProMaxVal', 'LIKE', '%' . $request->prosearch . '%');
         }

         if (isset($request->prodistance)) 
         {
            $products->where('ProDistance', 'LIKE', '%' . $request->prodistance . '%');

            $productsone->where('ProDistance', 'LIKE', '%' . $request->prodistance . '%');
         }

         if (isset($request->prodistance2)) 
         {
            $products->where('ProDistance', 'LIKE', '%' . $request->prodistance2 . '%');

            $productsone->where('ProDistance', 'LIKE', '%' . $request->prodistance2 . '%');
         }


         if (isset($request->minimum_price) && isset($request->maximum_price))
         {
            if ($min != 0 || $max != 0)
            {
               if($request->minimum_amt == "Lakhs" && $request->maximum_amt == "Cr")
               {
                  $val1 =  $productsone->whereBetween('ProMinVal', [$min , 99 ]);
                  $val2 =  $productsone->whereBetween('ProMaxVal', [$min , 99 ])->union($val1);
                  $val3 =  $products->whereBetween('ProMinVal', [1, $max]);
                  $val4 =  $products->whereBetween('ProMaxVal', [1, $max])->union($val3); 
                  $products = $val2->union($val4);            

               }
               else if($request->minimum_amt == "K" && $request->maximum_amt == "Lakhs")
               {
                  $val1 =  $productsone->whereBetween('ProMinVal', [$min , 99 ]);
                  $val2 =  $productsone->whereBetween('ProMaxVal', [$min , 99 ])->union($val1);
                  $val3 =  $products->whereBetween('ProMinVal', [1, $max]);
                  $val4 =  $products->whereBetween('ProMaxVal', [1, $max])->union($val3); 
                  $products = $val2->union($val4); 
               }
               else
               {
                   $val1 =  $productsone->whereBetween('ProMinVal', [$min, $max]);
                   $products  = $products->whereBetween('ProMaxVal', [$min, $max])->union($val1);
               }
            }
            // else
            // {
            //    if (isset($request->sort)) 
            //    {
            //       if($request->sort['0'] == 'asc')
            //       {
            //          $products->orderByRaw('PropertyTotalBudget','asc');
            //       }
            //       else
            //       {
            //         $products->orderByRaw('PropertyTotalBudget','desc');
            //       }
            //    }
            // }
         }
      }

      $promoter = $products->paginate(100);

       // dd($promoter);


      // dd($request->all());

      if($promoter->isEmpty())
      {
         $promoter = "no items";
      }

      if ($request->ajax()) 
      {
         return view('user.promoterproduct',['promoter'=>$promoter,'area'=>$area]);
      }
      else
      {
         return view('user.promoter-right',['promoter'=>$promoter,'area'=>$area]);
      }
      
   }

   public function PromoterFlatNo(Request $request,$id)
   {
      $flat = PromoterSiteStatus::find($id);

      return view('user.flatdetail', compact('flat'));
   }

}