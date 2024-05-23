<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User\Buyer;
use App\Models\User\BuyerComment;
use App\Models\Admin\Type;
use App\Models\Admin\Category;
use App\Models\Admin\PromoterSite;
use App\Models\Admin\PromoterSiteStatus;
use App\Models\Admin\PromoterGallery;
use App\Models\Admin\Property;
use App\Models\Admin\PropertyEb;
use App\Models\Admin\PropertyWater;
use App\Models\Admin\PropertyGallery;
use App\Models\User\BuyerRent;
use App\Models\User\BuyerSeller;
use DB;
use App\Models\User;


class BuyerController extends Controller
{
   public function BuyerComment(Request $request)
   {
      $input = $request->all();
      $input['CommentDate'] = date('Y-m-d H:i:s');
      $buyer = BuyerComment::create($input);     

      if($buyer['ProSiteId'] != null)
      {
         $val = $input['ProSiteId'];
         $promoter = PromoterSite::where('tbl_prosite.ProSiteId',$val)
         ->first();
         
         $promotergallery = PromoterGallery::where('tbl_pro_gallery.ProSiteId',$val)
         ->get(); 

         $promoterstatus = PromoterSiteStatus::where('tbl_prosite_status.ProSiteId',$val)
         ->get();   

         $comment = BuyerComment::where('tbl_buyer_comment.ProSiteId',$val)
         ->where('tbl_buyer_comment.BuyerCommentStatus','Approved')
         ->get(); 

          $commentcount = $comment->count();

          $status = "your comments get successfully.Please Wait admin Response";

         return view('user.promoter-details',compact('promoter','promotergallery','promoterstatus','comment','commentcount','status'));
      }

      if($buyer['PropertyId'] != null)
      {
         $val2 = $input['PropertyId'];

         $property = Property::where('tbl_property.PropertyId',$val2)
         ->first();

         $propertygallery = PropertyGallery::where('tbl_property_gallery.PropertyId',$val2)
         ->get();

         $propertyeb = PropertyEb::where('tbl_property_eb.PropertyId',$val2)
         ->get();

         $propertywater = PropertyWater::where('tbl_property_water.PropertyId',$val2)
         ->get();


         $comment = BuyerComment::where('tbl_buyer_comment.PropertyId',$val2)
         ->where('tbl_buyer_comment.BuyerCommentStatus','Approved')
         ->get(); 

          $commentcount = $comment->count();

         if($comment->isEmpty())
         {
             $comment = "no comments";
         }      

       $top = Property::select( 'tbl_property.*',DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as PropertyGalleryImage'))
      ->where('tbl_property.NeedId',$val2)
      ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Approved','Waitting','Canceled'])
      ->groupBy('tbl_property.PropertyId')
      ->take(5)->get();

      $latest = Property::select( 'tbl_property.*',DB::raw('(select PropertyGalleryImage from tbl_property_gallery where tbl_property_gallery.PropertyId  =  tbl_property.PropertyId order by PropertyId asc limit 1) as PropertyGalleryImage'))
      ->where('tbl_property.NeedId',$val2)
      ->orderBy('tbl_property.PropertyId','desc')
      ->whereNotIn('tbl_property.PropertyStatus', ['Completed','Approved','Waitting','Canceled'])
      ->groupBy('tbl_property.PropertyId')
      ->take(5)->get();   

         return view('user.property-details',compact('property','propertygallery','propertyeb','propertywater','comment','commentcount','top','latest'));
      }
      
   }

   public function BuyerCommentGet(Request $request,$proid)
   {
       $data = BuyerComment::select('*')
       ->where('tbl_buyer_comment.PropertyId',$proid)
       ->get();
       
       return response($data);
   }

   public function BuyerCommentPromoterGet(Request $request,$id)
   {
       $data = BuyerComment::select('*')
       ->where('tbl_buyer_comment.ProSiteId',$id)
       ->get();
       
       return response($data);
   }
   

    public function BuyerStatusUpdate(Request $request, $id)
    {
        $input = $request->all();
        $val = $input['BuyerCommentStatus'];
        $data = BuyerComment::where('tbl_buyer_comment.BuyerCommentId',$id)
        ->update(['BuyerCommentStatus' =>$val]);

        return response($data);       
    }

    public function BuyerRequest(Request $request)
    {
        return view('user.buyerrequest');   
    }
     
    public function BuyerRequestSend(Request $request)
    {
        $input = $request->all();
        // dd($input);

        if($input['NeedType'] == "buy")
        {
           $data = BuyerSeller::create($input);
        }
 
       return redirect('/buyerrequest')->with('message', 'Register Success....Wait For Replay.');   
    }

    public function BuyerSellerGet(Request $request)
    {
       $data = BuyerSeller::where('tbl_buyer_sell.Status','Pending')
       ->orWhere('tbl_buyer_sell.Status', 'Approved')
       ->get();
       return response($data);
    }

    public function BuyerSellerAdd(Request $request)
    {
       $input = $request->all();
       $buy = BuyerSeller::create($input);

       return response($buy);
    }

    public function BuyerSellerUpdate(Request $request,$id)
    {
       $input = $request->all();
       $buy = BuyerSeller::find($id);
       $data = $buy->update($input);

       return response($data);
    }







}