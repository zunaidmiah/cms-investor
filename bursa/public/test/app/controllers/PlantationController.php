<?php

class PlantationController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Contact Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/       

        
       
        public function adminSementra()
        {
		  $page = Page::where('type','=','sementra')->where('published','=',1)->get();
		  
		  $pgCount = Slidingbanner::where('type','=','sementrabanner')->count();
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
                 exit;
                 }
             }
             if(Input::get('noperpage1'))
             {
               $noperpage = Input::get('noperpage1');  
             }
             else {
                  
                   $noperpage = 10;
               }
             /* End of Paginate Count Section */
           $sementrasbanner = Slidingbanner::where('type','=','sementrabanner')->paginate($noperpage);
					 if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		   
		   
		    /* Paginate Count Section */
             $pgCount = Processeslisting::where('type','=','plantationprocesses')->count();
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
                 exit;
                 }
             }
             if(Input::get('noperpage2'))
             {
               $noperpage = Input::get('noperpage2');  
             }
             else {
                  
                   $noperpage = 10;
               }
             /* End of Paginate Count Section */
            $processeslisting = Processeslisting::where('type','=','plantationprocesses')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray2 = $cntArr;
           }
           else {
           $cntarray2 = 0;
           }
		 
		 
          return View::make('adminsementra', array ( 'page' => $page, 'sementrasbanners'=>$sementrasbanner, 'processeslistings'=>$processeslisting,'cntarray1' => $cntarray1 , 'cntarray2' => $cntarray2 ));
                  
        }
        public function oilplantationFront()
          {
                $slidingbanners = Slidingbanner::where('type','=','sementrabanner')->where('active','=','1')->orderBy('display_order', 'ASC')->get();
                $processeslisting = Processeslisting::where('type','=','plantationprocesses')->where('active','=','1')->orderBy('display_order', 'ASC')->get();
                $page = Page::where('type','=','sementra')->where('published','=',1)->get();
                $masthead = url().'/images/banner_subpage/banner3.jpg';
                $breadcrumbs = array(
                                      0 => array 
                                                (
                                                   "title" => "Home",
                                                   "url" => ""
                                                ),
                                     1 => array 
                                                (
                                                   "title" => "Plantation",
                                                   "url" => ""
                                                ),
                                     2 => array 
                                                (
                                                   "title" => "Oil Palm Estate",
                                                   "url" => ""
                                                ),
                                     3 => array 
                                                (
                                                   "title" => "Sementra Plantations Sdn Bhd",
                                                   "url" => ""
                                                )
                                    );
                $pageTitle = $page[0]->left_block1_title;
                $mainMenuTitle = $page[0]->page_title;
                return View::make('frontplantation',array(
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'page' => $page[0],
                                                   'pageTitle' => $pageTitle,
                                                   'mainMenuTitle' => $mainMenuTitle,
                                                   'slidingbanners' => $slidingbanners,
                                                   'brandslistings' => $processeslisting
                                                
                                                    )
                                 ); 
          }
          
        public function adminAddSementra() {
           $slidingbanners = Slidingbanner::create(Input::all()); 
           if($slidingbanners)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Sliding Banner Added Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
       } 
public function adminEditSementra() {
           $sementrasbannerId = Input::get('sementrasbannerid'); 
           $banner = Slidingbanner::find($sementrasbannerId);
           $banner->bannerimage = Input::file('bannerimage');
           $banner->title = Input::get('title');
           $banner->display_order = Input::get('display_order');
           $banner->active = Input::get('active');
            if($banner->save())
            {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Sliding banner Edited Successfully.</p>
              </div>');
            }
            else
            {
                return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
            }
       } 
        public function adminDeleteSementra() {
		   $id = Input::get('sementrasbannerid'); 
           $banner = Slidingbanner::findOrFail($id);
		   $banner->delete();
		   if($banner)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Deleted Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
       
        }
		public function adminDeleteAllSementra() {
		  
           $slidingbanners = Slidingbanner::where('type','=','sementrabanner')->delete();
		   if($slidingbanners)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>All Records Deleted Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
          
        }
		
		
		///processes
		public function adminAddProcesses() {
           $processeslisting = Processeslisting::create(Input::all()); 
           if($processeslisting)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Sliding Banner Added Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
       } 
public function adminEditProcesses() {
           $processesId = Input::get('processesid'); 
           $banner = Processeslisting::find($processesId);
           $banner->bannerimage = Input::file('bannerimage');
           $banner->title = Input::get('title');
           $banner->display_order = Input::get('display_order');
		   $banner->short_description = Input::get('short_description');		   
           $banner->active = Input::get('active');
            if($banner->save())
            {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Sliding banner Edited Successfully.</p>
              </div>');
            }
            else
            {
                return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
            }
       } 
        public function adminDeleteProcesses() {
		   $id = Input::get('processesid'); 
           $processes = Processeslisting::findOrFail($id);
		   $processes->delete();
		   if($processes)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Deleted Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
      
        }
		public function adminDeleteAllProcesses() {
		  
           $processes = Processeslisting::where('type','=','plantationprocesses')->delete();
		   if($processes)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>All Records Deleted Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
       
        }
}

