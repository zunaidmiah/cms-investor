<?php

class PressreleaseController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Pressrelease Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
       
	/* Admin Functions */
        public function adminPressrelease()
        {
		  $page = Page::where('type','=','pressrealese')->where('published','=',1)->get();
                     /* Paginate Count Section */
             $pgCount = Pressrelease::count();
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
          
           if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		  $pressreleases = Pressrelease::paginate($noperpage);
          return View::make('adminpressrelease', array ( 'page' => $page, 
		                                                  'pressreleases' => $pressreleases,
                                                              'cntarray1' => $cntarray1));
                  
        }
		 public function addPressrelease()
        {
            $pressrelease = Pressrelease::create(Input::all());
             if($pressrelease)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Pressrelease Added Successfully.</p>
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
		public function deletePressrelease() {
		   $id = Input::get('pressreleaseid'); 
           $pressrelease = Pressrelease::findOrFail($id);
		   $pressrelease->delete();
		   if($pressrelease)
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
          // $banners = Banner::paginate(2);
          // $corebusinesses = Corebusiness::paginate(2);
          // return View::make('adminindex', array ( 'banners' => $banners, 'corebusinesses' => $corebusinesses ));
        }
		//Delete All Press release 
		public function deleteAllPressrelease() {
		  
           $pressrelease = Pressrelease::truncate();
		   if($pressrelease)
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
        public function editPressrelease()
        {
           $pressreleaseId = Input::get('pressreleaseid'); 
           $press = Pressrelease::find($pressreleaseId);
		   $press->image = Input::file('image');
		   $press->pdf = Input::file('pdf');
		   $press->active = Input::get('active');
           $press->title = Input::get('title');
           $press->date = Input::get('date');
           $press->citation = Input::get('citation');
		   $press->content = Input::get('content');
		   $press->read_more = Input::get('read_more');
          if($press->save())
		   {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Press Release Edited Successfully.</p>
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
        /* End of Admin Functions */
        public function editPage()
        {
           $pageid = Input::get('pageid'); 
           $pageupdate = Page::find($pageid);
		   $pageupdate->page_title = Input::get('page_title');
		   $pageupdate->left_block1_title = Input::get('left_block1_title');
		   $pageupdate->left_block1_content = Input::get('left_block1_content');
           $pageupdate->right_block1_title = Input::get('right_block1_title');
           $pageupdate->right_block1_content = Input::get('right_block1_content');
           $pageupdate->right_block2_content = Input::get('right_block2_content');
		   $pageupdate->right_block3_content = Input::get('right_block3_content');
		   if($pageupdate->save())
		   {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Press Release Edited Successfully.</p>
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
        
         public function frontPressrelease($dateSort = null)
        {
	          $page = Page::where('type','=','pressrealese')->where('published','=',1)->get();
                   if(isset($dateSort) != '')
                  {
                  
                        $pressreleases = Pressrelease::select('id','title','citation','content','read_more',DB::raw('SUBSTRING(date, -4) as year'),'created_at','updated_at','image_file_name','image_file_size','image_content_type','image_updated_at','pdf_file_name','pdf_file_size','pdf_content_type','pdf_updated_at')->where(DB::raw('SUBSTRING(date, -4)'),'=',$dateSort)->where('active','=',1)->get();

                  }
                  else {
                      $pressreleases = Pressrelease::select('id','title','citation','content','read_more',DB::raw('SUBSTRING(date, -4) as year'),'created_at','updated_at','image_file_name','image_file_size','image_content_type','image_updated_at','pdf_file_name','pdf_file_size','pdf_content_type','pdf_updated_at')->where('active','=',1)->get();

                  }
                  $categories = Pressrelease::select('id',DB::raw('SUBSTRING(date, -4) as year'),DB::raw('count(id) as count'))->where('active','=',1)->groupBy(DB::raw('SUBSTRING(date, -4)'))->orderBy(DB::raw('SUBSTRING(date, -4)'))->get('DESC');
              $pageTitle = $page[0]->page_title;
              $masthead = url().'/images/banner_subpage/banner13.jpg';
              $breadcrumbs = array(
                                      0 => array 
                                                (
                                                   "title" => "Home",
                                                   "url" => ""
                                                ),
                                     1 => array 
                                                (
                                                   "title" => "Investor Relations",
                                                   "url" => ""
                                                ),
                                    2 => array 
                                                (
                                                   "title" => "Press Release",
                                                   "url" => ""
                                                )
                                   
                                    );
               
                $mainMenuTitle = $page[0]->page_title;
                return View::make('frontpressrelease',array(
                                                       'page' => $page[0],
													   'categories' => $categories,
													   'pressreleases' => $pressreleases,
                                                       'mainMenuTitle' => $mainMenuTitle,
                                                       'pageTitle' => $pageTitle ,
                                                       'breadcrumbs' => $breadcrumbs,
                                                       'masthead' => $masthead
                                                      
                                                       
                                                     ));
        //   return View::make('adminannualreport', array ( 'page' => $page));       
        }
        

       
}

