<?php

class BannerController extends \BaseController 
{

	


	public function showBanners()
	{
		if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
		//$banners = Banners::where('status',1)->get();

            $last= Banners::orderBy('updated_at', 'desc')->first();
            if(!empty($last))
            {
            	$lastUpdated =$last->updated_at;
            	$lastUpdated=$lastUpdated->toDateTimeString();
            }else{
            	$lastUpdated = date("Y-m-d H:i:s");

            }
            
            

		 $pgCount = Banners::count();
//dd('hello');
			 for ($i = 1; $i <= $pgCount; $i++ )
             {  
                 if($i == 1)
                 {
                 $cntArr[10] = 10;
                 }
                 
                 if($i == 11)
                 {
                 $cntArr[20] = 20;
                 }
                 
                 if($i == 21)
                 {
                 $cntArr[30] = 30;
                 }
                 
                 if($i == 31)
                 {
                 $cntArr[50] = 50;
                 }
                 
                 if($i == 51)
                 {
                 $cntArr[100] = 100;
                 //exit;
                 }
             }
             if(Input::get('noperpage1'))
             {
               $noperpage = Input::get('noperpage1');  
             }
             else {
                  
                   $noperpage = 100;
               }

               //dd($noperpage);
             /* End of Paginate Count Section */
         $banners = Banners::orderBy('id', 'desc')->paginate($noperpage);
         //dd($annualreport);
					 if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }




		return view::make('admin.banners',array('banners'=>$banners, 'cntarray1' => $cntarray1, 'lastUpdated'=>$lastUpdated));
	}


	public function bannerStore()
	{
		//echo dirname(public_path());
		$banner = new Banners;
			$banner->title       = Input::get('title');
			$banner->status      = (Input::get('status')) ? Input::get('status') : 0;
                       
		  if (Input::hasFile('Banner_image')){
		  	$bannername= str_random(10).Input::file('Banner_image')->getClientOriginalName();
                        Input::file('Banner_image')->move(public_path()."/uploads/banners/",$bannername);

                        // After upload banner copy banner to bursa, charts, laravel and 1 other sites.
                        \File::copy(public_path()."/uploads/banners/".$bannername, dirname(public_path()).'/../bursa/public/uploads/banners/'.$bannername);
                        \File::copy(public_path()."/uploads/banners/".$bannername, dirname(public_path()).'/../charts/public/uploads/banners/'.$bannername);
                        \File::copy(public_path()."/uploads/banners/".$bannername, dirname(public_path()).'/../laravel/public/uploads/banners/'.$bannername);
                        \File::copy(public_path()."/uploads/banners/".$bannername, dirname(public_path()).'/../uploads/banners/'.$bannername);

                        $banner->Banner      = $bannername;
                        //$url = $file->getURL();

                    }
			$banner->save();

			//dd($banner->id);
			$i=0;
			$count = count(Input::get('pages'));
			$pages= Input::get('pages');
			for($i; $i<$count;$i++)
			{
				DB::table('page_banner')->insert(array('page_id' =>$pages[$i], 'banner_id'=> $banner->id ));
			}



			// redirect
			Session::flash('message', 'The information has been saved successfully.');
			return Redirect::to('banners');
	}




	public function bannerUpdate()
	{
		//dd(Input::all());
		$bannerId= Input::get('id');
		$banner = Banners::find($bannerId);

		$banner->status = Input::get('status');
		$banner->title = Input::get('title');

		 if (Input::hasFile('Banner_image')){
		 	$bannername= str_random(10).Input::file('Banner_image')->getClientOriginalName();
                        Input::file('Banner_image')->move(public_path()."/uploads/banners/", $bannername);
                        $banner->Banner      = $bannername;
                        //$url = $file->getURL();

                        // After upload banner copy banner to bursa, charts, laravel and 1 other sites.
                        \File::copy(public_path()."/uploads/banners/".$bannername, dirname(public_path()).'/../bursa/public/uploads/banners/'.$bannername);
                        \File::copy(public_path()."/uploads/banners/".$bannername, dirname(public_path()).'/../charts/public/uploads/banners/'.$bannername);
                        \File::copy(public_path()."/uploads/banners/".$bannername, dirname(public_path()).'/../laravel/public/uploads/banners/'.$bannername);
                        \File::copy(public_path()."/uploads/banners/".$bannername, dirname(public_path()).'/../uploads/banners/'.$bannername);

                    }
        $banner->save();

        DB::table('page_banner')->where('banner_id', $bannerId)->delete();

        $i=0;
			$count = count(Input::get('pages'));
			$pages= Input::get('pages');
			for($i; $i<$count;$i++)
			{
				DB::table('page_banner')->insert(array('page_id' =>$pages[$i], 'banner_id'=> $banner->id ));
			}



        Session::flash('message', 'The information has been updated successfully!');
			return Redirect::to('banners');
	}

	public function dodestroybanner($id)
	{
		// delete
		$montages = Banners::find($id);
		$montages->delete();

		DB::table('page_banner')->where('banner_id', $id)->delete();

		// redirect
		Session::flash('message', 'The information has been deleted successfully!');
		return Redirect::to('banners');
	}



	public function dodestroyallbanner()
	{
		$banners = Banners::truncate();
		DB::table('page_banner')->truncate();
		Session::flash('message', 'The information has been deleted successfully!');
		return Redirect::to('banners');
	}

	public function deleteSelected(){
            
         //$input=Input::get('deleteid');

          $id = Input::get('deleteid'); 
		  $ids= explode(',',$id[0]);
		   $banner = Banners::whereIn('id', $ids)->delete();



        

           DB::table('page_banner')->whereIn('banner_id', $ids)->delete(); 

         Session::flash('message', 'The information has been deleted successfully!');
		return Redirect::to('banners');
                 
    }

}
