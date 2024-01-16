<?php

class ManufacturingController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default ManufacturingController
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
       
        	        
         public function packagingCanpac() {
            
                $page = Page::where('type','=','pkcanpac')->where('published','=',1)->get();
		     
			$pgCount = Slidingbanner::where('type','=','pkcanpac')->count();
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
         $slidingbanners = Slidingbanner::where('type','=','pkcanpac')->paginate($noperpage);
					 if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
                
				 /* Paginate Count Section */
             $pgCount = Processeslisting::where('type','=','pkcanpac')->count();
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
           $processlistings = Processeslisting::where('type','=','pkcanpac')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray2 = $cntArr;
           }
           else {
           $cntarray2 = 0;
           }
				
				
                return View::make('adminpkcanpac',array(
                                                   'page' => $page,
												   'slidingbanners' => $slidingbanners,
												   'cntarray1' => $cntarray1,
                                                   'processlistings' => $processlistings,
												   'cntarray2' => $cntarray2
                                                
                                                    )
                                 );
             
        }
        
        public function packagingSoutheast() {
            
                $page = Page::where('type','=','pksoutheast')->where('published','=',1)->get();
				$pgCount = Slidingbanner::where('type','=','pksoutheast')->count();
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
           $slidingbanners = Slidingbanner::where('type','=','pksoutheast')->paginate($noperpage);
					 if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
             
			    /* Paginate Count Section */
             $pgCount = Processeslisting::where('type','=','pksoutheast')->count();
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
           $processlistings = Processeslisting::where('type','=','pksoutheast')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray2 = $cntArr;
           }
           else {
           $cntarray2 = 0;
           }
               
                return View::make('adminpksoutheast',array(
                                                   'page' => $page,
                                                   'slidingbanners' => $slidingbanners,
												   'cntarray1' => $cntarray1,
                                                   'processlistings' => $processlistings,
												    'cntarray2' => $cntarray2
                                                
                                                    )
                                 );
             
        }
        
        public function palmoilRefinery() {
            
                $page = Page::where('type','=','pmrefinery')->where('published','=',1)->get();
				
			$pgCount = Slidingbanner::where('type','=','pmrefinery')->count();
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
           $slidingbanners = Slidingbanner::where('type','=','pmrefinery')->paginate($noperpage);
					 if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
                
				
				    /* Paginate Count Section */
             $pgCount = Processeslisting::where('type','=','pmrefinery')->count();
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
             $processlistings = Processeslisting::where('type','=','pmrefinery')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray2 = $cntArr;
           }
           else {
           $cntarray2 = 0;
           }
				
              
                return View::make('adminpmrefinery',array(
                                                   'page' => $page,
                                                   'slidingbanners' => $slidingbanners,
												    'cntarray1' => $cntarray1,
                                                   'processlistings' => $processlistings,
												   'cntarray2' => $cntarray2
                                                
                                                    )
                                 );
             
        }
	
        public function deleteAllBanner() {
		  
           $slidingbanner = Slidingbanner::where('type','=','pmrefinery')->delete();
		   if($slidingbanner)
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
          // $banners = Banner::paginate(2);
          // $corebusinesses = Corebusiness::paginate(2);
          // return View::make('adminindex', array ( 'banners' => $banners, 'corebusinesses' => $corebusinesses ));
        }
		 public function deleteAllProcess() {
		  
           $Processes = Processeslisting::where('type','=','pmrefinery')->delete();
		   if($Processes)
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
          // $banners = Banner::paginate(2);
          // $corebusinesses = Corebusiness::paginate(2);
          // return View::make('adminindex', array ( 'banners' => $banners, 'corebusinesses' => $corebusinesses ));
        }
		 public function deleteAllSoutheastBanner() {
		  
           $slidingbanner = Slidingbanner::where('type','=','pksoutheast')->delete();
		   if($slidingbanner)
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
          // $banners = Banner::paginate(2);
          // $corebusinesses = Corebusiness::paginate(2);
          // return View::make('adminindex', array ( 'banners' => $banners, 'corebusinesses' => $corebusinesses ));
        }
		 public function deleteAllSoutheastProcess() {
		  
           $Processes = Processeslisting::where('type','=','pksoutheast')->delete();
		   if($Processes)
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
          // $banners = Banner::paginate(2);
          // $corebusinesses = Corebusiness::paginate(2);
          // return View::make('adminindex', array ( 'banners' => $banners, 'corebusinesses' => $corebusinesses ));
        }
        public function palmoilMill() {
            
                $page = Page::where('type','=','pmmill')->where('published','=',1)->get();
				
				$pgCount = Slidingbanner::where('type','=','pmmill')->count();
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
          $slidingbanners = Slidingbanner::where('type','=','pmmill')->paginate($noperpage);
					 if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
                
				
              
			  
			  	    /* Paginate Count Section */
             $pgCount = Processeslisting::where('type','=','pmmill')->count();
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
               $processlistings = Processeslisting::where('type','=','pmmill')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray2 = $cntArr;
           }
           else {
           $cntarray2 = 0;
           }
				
			    
              
                return View::make('adminpmmill',array(
                                                   'page' => $page,
                                                   'slidingbanners' => $slidingbanners,
												   'cntarray1' => $cntarray1,
                                                   'processlistings' => $processlistings,
												   'cntarray2' => $cntarray2
												   
                                                
                                                    )
                                 );
             
        }
        
        public function addSlidingBanner()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
            $slidingbanner = Slidingbanner::create(Input::all());
             if($slidingbanner)
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
        
       // Edit Sliding Banner
       public function editSlidingBanner()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
                     
           $slidingbannerId = Input::get('bannerid'); 
           $banner = Slidingbanner::find($slidingbannerId);
           $banner->bannerimage = Input::file('bannerimage');
           $banner->title = Input::get('title');
           $banner->display_order = Input::get('display_order');
           $banner->active = Input::get('active');
           $banner->type = Input::get('type');
            if($banner->save())
            {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Sliding Banner Edited Successfully.</p>
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
          
          
          /* Processes Listings */
       public function addProcesssListings()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
            $Processeslisting = Processeslisting::create(Input::all());
             if($Processeslisting)
            {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Process Added Successfully.</p>
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
        
       // Edit Sliding Banner
       public function editProcesssListings()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
                     
           $bannerId = Input::get('bannerid'); 
           $banner = Processeslisting::find($bannerId);
           $banner->bannerimage = Input::file('bannerimage');
           $banner->title = Input::get('title');
           $banner->short_description = Input::get('short_description');
           $banner->display_order = Input::get('display_order');
           $banner->active = Input::get('active');
           $banner->type = Input::get('type');
            if($banner->save())
            {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Process Edited Successfully.</p>
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
          /* End of Processes Listings */
		  public function deleteSlidingbanner() {
		   $id = Input::get('slidingbannerid'); 
           $slidingbanner = Slidingbanner::findOrFail($id);
		   $slidingbanner->delete();
		   if($slidingbanner)
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
            public function deleteProcesslisting() {
		   $id = Input::get('processlistingid'); 
           $processeslistings = Processeslisting::findOrFail($id);
		   $processeslistings->delete();
		   if($processeslistings)
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
          /* Front Controller Methods */
          public function packagingFrontCanpac()
          {
                $page = Page::where('type','=','pkcanpac')->where('published','=','1')->get();
                $slidingbanners = Slidingbanner::where('type','=','pkcanpac')->where('active','=','1')->orderBy('display_order', 'ASC')->get();;
                $processlistings = Processeslisting::where('type','=','pkcanpac')->where('active','=','1')->orderBy('display_order', 'ASC')->get();
                $masthead = url().'/images/banner_subpage/banner15.jpg';
                $breadcrumbs = array(
                                      0 => array 
                                                (
                                                   "title" => "Home",
                                                   "url" => ""
                                                ),
                                     1 => array 
                                                (
                                                   "title" => "Manufacturing",
                                                   "url" => ""
                                                ),
                                     2 => array 
                                                (
                                                   "title" => "Packaging Division",
                                                   "url" => ""
                                                ),
                                     3 => array 
                                                (
                                                   "title" => "Canpac Sdn Bhd",
                                                   "url" => ""
                                                )
                                    );
                $pageTitle = "PACKAGING DIVISION";
                $mainMenuTitle = $page[0]->page_title;
                return View::make('frontpkcanpac',array(
                                                   'page' => $page[0],
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'pageTitle' => $pageTitle,
                                                   'mainMenuTitle' => $mainMenuTitle,
                                                   'slidingbanners' => $slidingbanners,
                                                   'processlistings' => $processlistings
                                                
                                                    )
                                 ); 
          }
          
           public function packagingFrontSoutheast()
          {
                $page = Page::where('type','=','pksoutheast')->where('published','=','1')->get();
                $slidingbanners = Slidingbanner::where('type','=','pksoutheast')->where('active','=','1')->orderBy('display_order', 'ASC')->get();
                $processlistings = Processeslisting::where('type','=','pksoutheast')->where('active','=','1')->orderBy('display_order', 'ASC')->get();
                $masthead = url().'/images/banner_subpage/banner16.jpg';
                $breadcrumbs = array(
                                      0 => array 
                                                (
                                                   "title" => "Home",
                                                   "url" => ""
                                                ),
                                     1 => array 
                                                (
                                                   "title" => "Manufacturing",
                                                   "url" => ""
                                                ),
                                     2 => array 
                                                (
                                                   "title" => "Packaging Division",
                                                   "url" => ""
                                                ),
                                     3 => array 
                                                (
                                                   "title" => "South East Asia Paper Products Sdn Bhd",
                                                   "url" => ""
                                                )
                                    );
                $pageTitle = "PACKAGING DIVISION";
                $mainMenuTitle = $page[0]->page_title;
                return View::make('frontpkcanpac',array(
                                                   'page' => $page[0],
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'pageTitle' => $pageTitle,
                                                   'mainMenuTitle' => $mainMenuTitle,
                                                   'slidingbanners' => $slidingbanners,
                                                   'processlistings' => $processlistings
                                                
                                                    )
                                 );  
          }
          
           public function palmoilFrontRefinery()
          {
                $page = Page::where('type','=','pmrefinery')->where('published','=','1')->get();
                $slidingbanners = Slidingbanner::where('type','=','pmrefinery')->where('active','=','1')->orderBy('display_order', 'ASC')->get();
                $processlistings = Processeslisting::where('type','=','pmrefinery')->where('active','=','1')->orderBy('display_order', 'ASC')->get();
                $masthead = url().'/images/banner_subpage/banner12.jpg';
                $breadcrumbs = array(
                                      0 => array 
                                                (
                                                   "title" => "Home",
                                                   "url" => ""
                                                ),
                                     1 => array 
                                                (
                                                   "title" => "Manufacturing",
                                                   "url" => ""
                                                ),
                                     2 => array 
                                                (
                                                   "title" => "Palm Oil Refinery Division",
                                                   "url" => ""
                                                ),
                                     3 => array 
                                                (
                                                   "title" => "Yee Lee Edible Oils Sdn Bhd",
                                                   "url" => ""
                                                )
                                    );
                $pageTitle = "PACKAGING DIVISION";
                $mainMenuTitle = $page[0]->page_title;
                return View::make('frontpkcanpac',array(
                                                   'page' => $page[0],
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'pageTitle' => $pageTitle,
                                                   'mainMenuTitle' => $mainMenuTitle,
                                                   'slidingbanners' => $slidingbanners,
                                                   'processlistings' => $processlistings
                                                
                                                    )
                                 );  
          }
          
           public function palmoilFrontMill()
          {
                $page = Page::where('type','=','pmmill')->where('published','=','1')->get();
                $slidingbanners = Slidingbanner::where('type','=','pmmill')->where('active','=','1')->orderBy('display_order', 'ASC')->get();
                $processlistings = Processeslisting::where('type','=','pmmill')->where('active','=','1')->orderBy('display_order', 'ASC')->get();
                $masthead = url().'/images/banner_subpage/banner4.jpg';
                $breadcrumbs = array(
                                      0 => array 
                                                (
                                                   "title" => "Home",
                                                   "url" => ""
                                                ),
                                     1 => array 
                                                (
                                                   "title" => "Manufacturing",
                                                   "url" => ""
                                                ),
                                     2 => array 
                                                (
                                                   "title" => "Palm Oil Mill Division",
                                                   "url" => ""
                                                ),
                                     3 => array 
                                                (
                                                   "title" => "Yee Lee Palm Oil Industries Sdn Bhd",
                                                   "url" => ""
                                                )
                                    );
                $pageTitle = "PACKAGING DIVISION";
                $mainMenuTitle = $page[0]->page_title;
                return View::make('frontpkcanpac',array(
                                                   'page' => $page[0],
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'pageTitle' => $pageTitle,
                                                   'mainMenuTitle' => $mainMenuTitle,
                                                   'slidingbanners' => $slidingbanners,
                                                   'processlistings' => $processlistings
                                                
                                                    )
                                 );  
          }
          /* End of Front Controller Methods */
}

