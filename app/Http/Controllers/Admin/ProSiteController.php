<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\PromoterSite;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\Admin\PromoterSiteStatus;
use App\Models\Admin\PromoterGallery;
use Auth;
use DB;
use App\User;

class ProSiteController extends Controller
{
	public function index(Request $request)
    {
      if(Auth::user()->RoleId == 1)
      {
        $data = PromoterSite::select('*')
        ->where('tbl_prosite.id',Auth::id())
        ->get();
      }
      elseif(Auth::user()->RoleId == 3)
      {
        $data = PromoterSite::select('*')
        ->where('tbl_prosite.id',Auth::id())
        ->get();
      }
        
       return response($data);
    }

	public function store(Request $request)
	{
        $input = $request->all();
        $counts=[];
        $files = $request->file('file');
        $input['id'] = Auth::id();  
        $no = $input['FlatCount']; 

        if($request->hasFile('SiteMap'))
        { 
            $destinationPath = 'uploads/promoter/sitemap'; 
            $file = $request->file('SiteMap');        
            $fil = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $str = Str::random(3);
            $filename = $fil.'_'.$str.'.'.$ext; 
            $file->move($destinationPath, $filename);                        
            $input['SiteMap'] = $filename;

        }
        
        $destinationPath1 = 'uploads/promoter/video'; 

        if($request->hasFile('ProGalleryVideo'))
        {
            $file = $request->file('ProGalleryVideo');        
            $fil = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $str = Str::random(3);
            $filename = $fil.'_'.$str.'.'.$ext; 
            $file->move($destinationPath1, $filename);                        
            $input['ProGalleryVideo'] = $filename;
        }

        $data = PromoterSite::create($input);

        if($request->file('file'))
        {

            $files = $request->file('file');

            $destinationPath = 'uploads/promoter/gallery'; 

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
                $input['ProGalleryImage'] = $filename;
                $input['ProSiteId'] = $data->ProSiteId;

                $data1 = PromoterGallery::create($input);

                $count++ ;
                if($count == 5){
                  break;
                }
            }
        }
       
        for( $i = 1;$i<=$no;$i++){
          $input['ProSiteId'] = $data->ProSiteId;
          $input['FlatNo'] = $i;
          $data = PromoterSiteStatus::create($input);
        }

        return response($input);       

	}

	public function PromoterSiteUpdate(Request $request,$id)
    {
        $input = $request->all();
        $promoter = PromoterSite::where('tbl_prosite.id',Auth::id())->find($id);
        $no = $input['FlatCount']; 
        $files = $request->file('file');

        $input['id'] = Auth::id();      

        if($request->hasFile('SiteMap'))
        { 
            if($request->SiteMap != $request->SiteMap1)
            {
                $file_path = 'uploads/promoter/sitemap/'.$request->SiteMap1;
                unlink($file_path);
                $destinationPath = 'uploads/promoter/sitemap'; 
                $file = $request->file('SiteMap');        
                $fil = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $str = Str::random(3);
                $filename = $fil.'_'.$str.'.'.$ext; 
                $file->move($destinationPath, $filename);                        
                $input['SiteMap'] = $filename;
            }
        }
        else
        {
            $input['SiteMap'] = $promoter->SiteMap;
        }


        $destinationPath1 = 'uploads/promoter/video'; 

        if($request->hasFile('ProGalleryVideo'))
        { 
            if($request->ProGalleryVideo != $request->ProGalleryVideo1)
            {
                $file_path6 = 'uploads/promoter/video/'.$request->ProGalleryVideo1;
                unlink($file_path6);
                $file11 = $request->file('ProGalleryVideo');     
                $fil11 = pathinfo($file11->getClientOriginalName(), PATHINFO_FILENAME);
                $ext11 = pathinfo($file11->getClientOriginalName(), PATHINFO_EXTENSION);
                $str11 = Str::random(3);
                $filename11 = $fil11.'_'.$str11.'.'.$ext11;  
                $file11->move($destinationPath1, $filename11);                          
                $input['ProGalleryVideo'] = $filename11;
            }
        }
        else
        {
            $input['ProGalleryVideo'] = $promoter->ProGalleryVideo;
        }

        $data = $promoter->update($input);

        if($request->FlatCount != $input['FlatCount'])
        {
           $prosite = PromoterSiteStatus::where('tbl_prosite_status.id',Auth::id())->delete($id);
        
            for( $i = 1;$i<=$no;$i++){
              $input['ProSiteId'] = $id;
              $input['FlatNo'] = $i;
              $data = PromoterSiteStatus::create($input);
            }
        }

        if($request->file('file'))
        {
           $promergallery =  PromoterGallery::where('tbl_pro_gallery.id',Auth::id())
            ->where('tbl_pro_gallery.ProSiteId',$id)
            ->get();

            foreach ($promergallery as $gallery){
               $unlink = 'uploads/promoter/gallery/'.$gallery['ProGalleryImage'];
               unlink($unlink);
            }

            PromoterGallery::where('tbl_pro_gallery.id',Auth::id())
            ->where('tbl_prosite.ProSiteId',$id)
            ->delete();

            $files = $request->file('file');

            $destinationPath = 'uploads/promoter/gallery'; 

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
                $input['ProGalleryImage'] = $filename;
                $input['ProSiteId'] = $id;

                $data1 = PromoterGallery::create($input);

                $count++ ;
                if($count == 5){
                  break;
                }
            }
        }    
        
        return response($input);       
    }

    public function destroy(Request $request, $id)
    {
        $supplier = PromoterSite::where('tbl_prosite.id',Auth::id())->find($id);
        $supplier->delete();

        return response($supplier);
    }

    public function PromoterSiteDetail(Request $request,$id)
    {   
        $site = PromoterSite::select('*')
        ->where('tbl_prosite.id',Auth::id())
        ->where('tbl_prosite.ProSiteId',$id)
        ->get();

        $site['detail']= PromoterSite::join('tbl_prosite_status','tbl_prosite.ProSiteId','tbl_prosite_status.ProSiteId')
        ->where('tbl_prosite.id',Auth::id()) 
        ->where('tbl_prosite.ProSiteId',$id) 
        ->get();    

        return response($site);
    }

    public function PromoterSiteStatus(Request $request,$id)
    {   
        $status = PromoterSiteStatus::where('tbl_prosite_status.id',Auth::id())->find($id);
        $input = $request->all();
        $input['id']=Auth::id();
        $input['FlatNo'] =  $input['FlatNo'];
        $status->update($input); 

        return response($status);
    }

    public function PromoterStatusUpdate(Request $request,$id)
    {   
        $status = PromoterSite::where('tbl_prosite.id',Auth::id())->find($id);
        $input = $request->all();
        $status->update(['ProStatus'=>$input['ProStatus']]); 

        return response($status);
    }

    public function PromoterSiteGet(Request $request)
    {
        $data = PromoterSite::select('*')
        ->where('tbl_prosite.id',Auth::id())
        ->get();
        
        return response($data);
    }

    public function PromoterImageGet(Request $request ,$id)
    {
        $data = PromoterGallery::select('*')
        ->where('tbl_pro_gallery.id',Auth::id())    
        ->where('tbl_pro_gallery.ProSiteId',$id)
        ->get();
        
        return response($data);
    }


    public function PromoterImageAdd(Request $request)
    {
        $input = $request->all();
        $input['id'] = Auth::id();  

       

        $data = PromoterGallery::create($input);

        return response($input);       

    }

    public function PromoterImageUpdate(Request $request,$id)
    {
        $input = $request->all();
        $promoter = PromoterGallery::where('tbl_pro_gallery.id',Auth::id())->find($id);
        $input['id'] = Auth::id();  

        $destinationPath = 'uploads/promoter/gallery'; 
        $destinationPath1 = 'uploads/promoter/video'; 

        if($request->hasFile('ProGalleryImage1'))
        { 
            if($request->ProGalleryImage1 != $request->ProGalleryImage6)
            {
                $file_path1 = 'uploads/promoter/gallery/'.$request->ProGalleryImage6;
                unlink($file_path1);
                $file1 = $request->file('ProGalleryImage1');     
                $fil1 = pathinfo($file1->getClientOriginalName(), PATHINFO_FILENAME);
                $ext1 = pathinfo($file1->getClientOriginalName(), PATHINFO_EXTENSION);
                $str1 = Str::random(3);
                $filename1 = $fil1.'_'.$str1.'.'.$ext1;  
                $file1->move($destinationPath, $filename1);                          
                $input['ProGalleryImage1'] = $filename1;
            }
        }
        else
        {
            $input['ProGalleryImage1'] = $promoter->ProGalleryImage1;
        }

        if($request->hasFile('ProGalleryImage2'))
        { 
            if($request->ProGalleryImage2 != $request->ProGalleryImage7)
            {
                $file_path2 = 'uploads/promoter/gallery/'.$request->ProGalleryImage7;
                unlink($file_path2);
                $file2 = $request->file('ProGalleryImage2');     
                $fil2 = pathinfo($file2->getClientOriginalName(), PATHINFO_FILENAME);
                $ext2 = pathinfo($file2->getClientOriginalName(), PATHINFO_EXTENSION);
                $str2 = Str::random(3);
                $filename2 = $fil2.'_'.$str2.'.'.$ext2;  
                $file2->move($destinationPath, $filename2);                          
                $input['ProGalleryImage2'] = $filename2;
            }
        }
        else
        {
            $input['ProGalleryImage2'] = $promoter->ProGalleryImage2;
        }


        if($request->hasFile('ProGalleryImage3'))
        { 
            if($request->ProGalleryImage3 != $request->ProGalleryImage8)
            {
                $file_path3 = 'uploads/promoter/gallery/'.$request->ProGalleryImage8;
                unlink($file_path3);
                $file3 = $request->file('ProGalleryImage3');     
                $fil3 = pathinfo($file3->getClientOriginalName(), PATHINFO_FILENAME);
                $ext3 = pathinfo($file3->getClientOriginalName(), PATHINFO_EXTENSION);
                $str3 = Str::random(3);
                $filename3 = $fil3.'_'.$str3.'.'.$ext3;  
                $file3->move($destinationPath, $filename3);                          
                $input['ProGalleryImage3'] = $filename3;
            }
        }
        else
        {
            $input['ProGalleryImage3'] = $promoter->ProGalleryImage3;
        }

        if($request->hasFile('ProGalleryImage4'))
        { 
            if($request->ProGalleryImage4 != $request->ProGalleryImage9)
            {
                $file_path4 = 'uploads/promoter/gallery/'.$request->ProGalleryImage9;
                unlink($file_path4);
                $file4 = $request->file('ProGalleryImage4');     
                $fil4 = pathinfo($file4->getClientOriginalName(), PATHINFO_FILENAME);
                $ext4 = pathinfo($file4->getClientOriginalName(), PATHINFO_EXTENSION);
                $str4 = Str::random(3);
                $filename4 = $fil4.'_'.$str4.'.'.$ext4;  
                $file4->move($destinationPath, $filename4);                          
                $input['ProGalleryImage4'] = $filename4;
            }
        }
        else
        {
            $input['ProGalleryImage4'] = $promoter->ProGalleryImage4;
        }

        if($request->hasFile('ProGalleryImage5'))
        { 
            if($request->ProGalleryImage5 != $request->ProGalleryImage10)
            {
                $file_path5 = 'uploads/promoter/gallery/'.$request->ProGalleryImage10;
                unlink($file_path5);
                $file5 = $request->file('ProGalleryImage5');     
                $fil5 = pathinfo($file5->getClientOriginalName(), PATHINFO_FILENAME);
                $ext5 = pathinfo($file5->getClientOriginalName(), PATHINFO_EXTENSION);
                $str5 = Str::random(3);
                $filename5 = $fil5.'_'.$str5.'.'.$ext5;  
                $file5->move($destinationPath, $filename5);                          
                $input['ProGalleryImage5'] = $filename5;
            }
        }
        else
        {
            $input['ProGalleryImage5'] = $promoter->ProGalleryImage5;
        }

        if($request->hasFile('ProGalleryVideo'))
        { 
            if($request->ProGalleryVideo != $request->ProGalleryVideo1)
            {
                $file_path6 = 'uploads/promoter/video/'.$request->ProGalleryVideo1;
                unlink($file_path6);
                $file11 = $request->file('ProGalleryVideo');     
                $fil11 = pathinfo($file11->getClientOriginalName(), PATHINFO_FILENAME);
                $ext11 = pathinfo($file11->getClientOriginalName(), PATHINFO_EXTENSION);
                $str11 = Str::random(3);
                $filename11 = $fil11.'_'.$str11.'.'.$ext11;  
                $file11->move($destinationPath1, $filename11);                          
                $input['ProGalleryVideo'] = $filename11;
            }
        }
        else
        {
            $input['ProGalleryVideo'] = $promoter->ProGalleryVideo;
        }


        $data = $promoter->update($input);

        return response($input);       

    }

}