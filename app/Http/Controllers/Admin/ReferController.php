<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\Admin\Refer;
use App\Models\Admin\ReferGallery;
use Auth;
use DB;
use App\User;

class ReferController extends Controller
{
	public function index(Request $request)
    {
      if(Auth::user()->RoleId == 1)
      {
            if($request->searchdata == "")
            {
                $filter = json_decode($request->filter);        
                $sorting = json_decode($request->sorting);

                $data = Refer::select( 'tbl_refer.*',
                    DB::raw('(select ReferGalleryImage from tbl_refer_gallery where tbl_refer_gallery.ReferId  =  tbl_refer.ReferId order by ReferId asc limit 1) as photo'))
                ->whereNotIn('tbl_refer.ReferStatus', ['Completed']);

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

                $data = Refer::select( 'tbl_refer.*',
                    DB::raw('(select ReferGalleryImage from tbl_refer_gallery where tbl_refer_gallery.ReferId  =  tbl_refer.ReferId order by ReferId asc limit 1) as photo'))
                ->whereNotIn('tbl_refer.ReferStatus', ['Completed'])
                ->where('tbl_refer.ReferId', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_refer.ReferType', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_refer.ReferLead', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_refer.ReferFor', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_refer.ReferVal', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_refer.ReferFacing', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_refer.ReferName', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_refer.ReferNumber', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_refer.ReferSize', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_refer.AreaName', 'LIKE', '%' . $request->searchdata . '%')
                ->orWhere('tbl_refer.ReferFullDetails', 'LIKE', '%' . $request->searchdata . '%')
                ->orderBy('tbl_refer.ReferId','desc');

                $total = $data->count();

                $data = $data->take($request->count)
                        ->skip($request->count*($request->page-1))
                        ->orderBy(key((array)($sorting)),current((array)($sorting)))
                        ->get();
            }
      }
      
       $RoleId = Auth::user()->RoleId;  
       return response(['data' => $data , 'role' => $RoleId,'total' => $total ]);
    }

	public function store(Request $request)
	{
        $input = $request->all();
        $counts=[];
        $files = $request->file('file');
        $input['id'] = Auth::id();  
        
        $destinationPath1 = 'uploads/refer/video'; 

        if($request->hasFile('ReferVideo'))
        {
            $file = $request->file('ReferVideo');        
            $fil = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $str = Str::random(3);
            $filename = $fil.'_'.$str.'.'.$ext; 
            $file->move($destinationPath1, $filename);                        
            $input['ReferVideo'] = $filename;
        }

        $data = Refer::create($input);

        if($request->file('file'))
        {

            $files = $request->file('file');

            $destinationPath = 'uploads/refer/gallery'; 

            $input['id'] = Auth::id(); 

            $count  = 0;     

            foreach ($files as $file){

                $str = str::random(3);

                $fil = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename = $fil.'_'.$str.'.'.$ext; 
                
                $img = Image::make($file->getRealPath())->resize(850, 650);  

                $ff = $img->save($destinationPath.'/'.$filename); $ff = $file->move($destinationPath, $filename);

                $input['id'] = Auth::id();
                $input['ReferGalleryImage'] = $filename;
                $input['ReferId'] = $data->ReferId;

                $data1 = ReferGallery::create($input);

                $count++ ;
                if($count == 3){
                  break;
                }
            }
        }

        return response($input);       

	}

	public function ReferUpdate(Request $request,$id)
    {
        $input = $request->all();
        $refer = Refer::where('tbl_refer.id',Auth::id())->find($id);
        $files = $request->file('file');

        $input['id'] = Auth::id();      

        $destinationPath1 = 'uploads/refer/video'; 

        if($request->hasFile('ReferVideo'))
        { 
            if($request->ReferVideo != $request->ReferVideo1)
            {
                $file_path6 = 'uploads/refer/video/'.$request->ReferVideo1;
                unlink($file_path6);
                $file11 = $request->file('ReferVideo');     
                $fil11 = pathinfo($file11->getClientOriginalName(), PATHINFO_FILENAME);
                $ext11 = pathinfo($file11->getClientOriginalName(), PATHINFO_EXTENSION);
                $str11 = Str::random(3);
                $filename11 = $fil11.'_'.$str11.'.'.$ext11;  
                $file11->move($destinationPath1, $filename11);                          
                $input['ReferVideo'] = $filename11;
            }
        }
        else
        {
            $input['ReferVideo'] = $refer->ReferVideo;
        }

        $data = $refer->update($input);

        if($request->file('file'))
        {
           $refergallery =  ReferGallery::where('tbl_refer_gallery.id',Auth::id())
            ->where('tbl_refer_gallery.ReferId',$id)
            ->get();

            foreach ($refergallery as $gallery){
               $unlink = 'uploads/refer/gallery/'.$gallery['ReferGalleryImage'];
               unlink($unlink);
            }

            ReferGallery::where('tbl_refer_gallery.id',Auth::id())
            ->where('tbl_refer_gallery.ReferId',$id)
            ->delete();

            $files = $request->file('file');

            $destinationPath = 'uploads/refer/gallery'; 

            $input['id'] = Auth::id(); 

            $count  = 0;     

            foreach ($files as $file){

                $str = str::random(3);

                $fil = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename = $fil.'_'.$str.'.'.$ext; 
                
                $img = Image::make($file->getRealPath())->resize(850, 650);  

                $ff = $img->save($destinationPath.'/'.$filename);

                $input['id'] = Auth::id();
                $input['ReferGalleryImage'] = $filename;
                $input['ReferId'] = $id;

                $data1 = ReferGallery::create($input);

                $count++ ;
                if($count == 5){
                  break;
                }
            }
        }    
        
        return response($input);       
    }

    public function ReferDelete(Request $request, $id)
    {
        $refer = Refer::where('tbl_refer.id',Auth::id())->find($id);


        $refergallery = ReferGallery::where('tbl_refer_gallery.id',Auth::id())
            ->where('tbl_refer_gallery.ReferId',$id)
            ->get();

        $video = 'uploads/refer/video/'.$refer['ReferVideo'];
                unlink($video);

        foreach ($refergallery as $gallery){
           $unlink = 'uploads/refer/gallery/'.$gallery['ReferGalleryImage'];
           unlink($unlink);
        }


        $refer->delete();

        $data =ReferGallery::where('tbl_refer_gallery.id',Auth::id())
            ->where('tbl_refer_gallery.ReferId',$id)
            ->delete();

        return response($data);
    }

    public function ReferImageGet(Request $request ,$id)
    {
        $data = ReferGallery::select('*')
        ->where('tbl_refer_gallery.id',Auth::id())    
        ->where('tbl_refer_gallery.ReferId',$id)
        ->get();
        
        return response($data);
    }


    public function ReferStatusUpdate(Request $request,$id)
    {   
        $status = Refer::where('tbl_refer.id',Auth::id())->find($id);
        $input = $request->all();
        $status->update(['ReferStatus'=>$input['ReferStatus']]); 

        return response($status);
    }


}