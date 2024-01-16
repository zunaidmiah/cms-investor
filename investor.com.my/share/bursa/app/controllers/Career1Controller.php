<?php

class Career1Controller extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Career Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
      
	public function vaccancyIndex()
        {
            $page = Page::where('type','=','career')->where('published','=',1)->get();
             /* Paginate Count Section */
             $pgCount = Career::count();
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

            $vaccancies = Career::paginate($noperpage); 
           
            return View::make('vaccancies',array(
                                                      'page' => $page,
                                                      'vaccancies' => $vaccancies,
                                                      'cntarray1' => $cntarray1
                                                )
                                 );
          
        }
        
       public function applicantsListing()
        {
            $page = Page::where('type','=','application')->where('published','=',1)->get(); /* Paginate Count Section */
             $pgCount = Application::join('vaccancies','applications.vaccancyid','=','vaccancies.id')->count();
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

            $applicants = Application::select('applications.*','vaccancies.job_location','vaccancies.job_title','vaccancies.post_date','vaccancies.company')->join('vaccancies','applications.vaccancyid','=','vaccancies.id')->paginate($noperpage); 
           
            return View::make('applications',array(
                                                      'page' => $page,
                                                      'applicants' => $applicants,
                                                      'cntarray1' => $cntarray1
                                                )
                                 );
        }
         public function deleteApplication() {
		   $id = Input::get('applicantid'); 
           $applicant = Application::findOrFail($id);
		   $applicant->delete();
		   if($applicant)
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
        public function frontCareer()
        {
            $page = Page::where('type','=','career')->where('published','=',1)->get();
            $vaccancies = Career::where('active','=',1)->get(); 
            
            $vaccDatas = Career::select('id','job_title')->where('active','=',1)
            ->groupBy('job_title')
            ->get();
          
            $locDatas = Career::select('id','job_location')->where('active','=',1)
            ->groupBy('job_location')
            ->get();
            
            $vaccTitles = array();
            foreach ($vaccDatas as $vaccData)
            {
                $vaccTitles[$vaccData->job_title] = $vaccData->job_title;
                
            }
            
            
            $vaccLocs = array();
            foreach ($locDatas as $locData)
            {
                $vaccLocs[$locData->job_location] = $locData->job_location;
                
            }
            $masthead = url().'/images/banner_subpage/banner10.jpg';
            $breadcrumbs = array(
                                      0 => array 
                                                (
                                                   "title" => "Home",
                                                   "url" => ""
                                                ),
                                     1 => array 
                                                (
                                                   "title" => "Company",
                                                   "url" => ""
                                                ),
                                     2 => array 
                                                (
                                                   "title" => "Careers",
                                                   "url" => ""
                                                )
                                    );
                $pageTitle = $page[0]->page_title;
                $mainMenuTitle = $page[0]->page_title;
                return View::make('frontcareers',array(
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'pageTitle' => $pageTitle,
                                                   'mainMenuTitle' => $mainMenuTitle,
                                                   'page' => $page[0],
                                                   'vaccancies' => $vaccancies,
                                                   'vaccTitles' => $vaccTitles,
                                                   'vaccLocs' => $vaccLocs,
                                                   'selectedJob' => null,
                                                   'selectedLoc' => null
                                                
                                                    )
                                 ); 
        }
        public function frontsearchCareer()
        {
            $page = Page::where('type','=','career')->where('published','=',1)->get();
			 $q = Career::query();
			 if (Input::get('job_title'))
             {
     // simple where here or another scope, whatever you like
            $vaccancies =  $q->where('job_title','like',Input::get('job_title'));
              }
			   if (Input::get('job_location')!='')
                {
                $vaccancies = $q->where('job_location', Input::get('job_location'));
                }
            $vaccancies = $q->orderBy('created_at')->get();
         //   $vaccancies = Career::where('active','=',1)->get(); 
            //echo '<pre>';
            //print_r($queries = DB::getQueryLog());
	    $selectedJob = Input::get('job_title');
            $selectedLoc = Input::get('job_location');
             $vaccDatas = Career::select('id','job_title')->where('active','=',1)
            ->groupBy('job_title')
            ->get();
          
            $locDatas = Career::select('id','job_location')->where('active','=',1)
            ->groupBy('job_location')
            ->get();
            
            $vaccTitles = array();
            foreach ($vaccDatas as $vaccData)
            {
                $vaccTitles[$vaccData->job_title] = $vaccData->job_title;
                
            }
            
            
            $vaccLocs = array();
            foreach ($locDatas as $locData)
            {
                $vaccLocs[$locData->job_location] = $locData->job_location;
                
            }
            
            $masthead = url().'/images/banner_subpage/banner10.jpg';
            $breadcrumbs = array(
                                      0 => array 
                                                (
                                                   "title" => "Home",
                                                   "url" => ""
                                                ),
                                     1 => array 
                                                (
                                                   "title" => "Company",
                                                   "url" => ""
                                                ),
                                     2 => array 
                                                (
                                                   "title" => "Careers",
                                                   "url" => ""
                                                )
                                    );
                $pageTitle = $page[0]->page_title;
                $mainMenuTitle = "Company";
                return View::make('frontcareers',array(
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'pageTitle' => $pageTitle,
                                                   'mainMenuTitle' => $mainMenuTitle,
                                                   'page' => $page[0],
                                                   'vaccancies' => $vaccancies,
                                                   'vaccTitles' => $vaccTitles,
                                                   'vaccLocs' => $vaccLocs,
                                                   'selectedJob' => $selectedJob,
                                                   'selectedLoc' => $selectedLoc
                                                
                                                    )
                                 ); 
        }
        
       
        public function addVaccancy()
        {
          
            $vaccancy = Career::create(Input::all());
           if($vaccancy)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Vaccancy Added Successfully.</p>
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
         public function deleteVaccancy() {
		   $id = Input::get('vaccancyid'); 
           $vaccancy = Career::findOrFail($id);
		   $vaccancy->delete();
		   if($vaccancy)
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
        public function editVaccancy()
        {
           $vaccancyId = Input::get('vaccancyid'); 
           $vaccancy = Career::find($vaccancyId);
           $vaccancy->job_title = Input::get('job_title');
           $vaccancy->company = Input::get('company');
           $vaccancy->job_location = Input::get('job_location');
           $vaccancy->post_date = Input::get('post_date');
           $vaccancy->requirements_content = Input::get('requirements_content');
           $vaccancy->responsibilities_content = Input::get('responsibilities_content');
           $vaccancy->footer_content = Input::get('footer_content');
           $vaccancy->active = Input::get('active');
          
           if($vaccancy->save())
           {
                
               return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Vaccancy Edited Successfully.</p>
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
        
        /* Application Functions Here */
        public function showApplyForm($vaccancy_id)
        {
            $vaccancy = Career::find($vaccancy_id);
            $page = Page::where('type','=','career')->where('published','=',1)->get();
            $masthead = url().'/images/banner_subpage/banner10.jpg';
            $pageTitle = $page[0]->left_block1_title;
          
            $breadcrumbs = array(
                                      0 => array 
                                                (
                                                   "title" => "Home",
                                                   "url" => ""
                                                ),
                                     1 => array 
                                                (
                                                   "title" => "Company",
                                                   "url" => ""
                                                ),
                                     2 => array 
                                                (
                                                   "title" => "Careers",
                                                   "url" => ""
                                                ),
                                     3 => array 
                                                (
                                                   "title" => "Job Application",
                                                   "url" => ""
                                                )
                                    );
               
                $mainMenuTitle = $page[0]->page_title;
                return View::make('frontapplyform',array(
                                                       'vaccancy' => $vaccancy,
                                                       'page' => $page[0],
                                                       'mainMenuTitle' => $mainMenuTitle,
                                                       'masthead' => $masthead,
                                                       'pageTitle' => $pageTitle ,
                                                       'breadcrumbs' => $breadcrumbs
                                                       
                                                     ));
        }
        
        public function submitApp()
        {
           $application = Application::create(Input::all());
           if($application)
           {
                return Redirect::back()->with('message','<div class="alert alert-success nomargin"><i class="icon-flag"></i>Success! Thank you for your submission. You have successfully submitted your CV. Only short listed candidates will be notified for interview.</div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error">
								<i class="icon-warning-sign"></i>
								Error! Please correct the errors in the form below.
							</div>
                            ');
           }
        }
        /* End of Application Functions */
        
        

       
}

