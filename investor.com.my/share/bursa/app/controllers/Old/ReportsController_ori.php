<?php

class ReportsController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default CorporateController
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
       
        	        
         public function AnnualReports() {
            
                $page = Page::where('type','=','annualreports')->where('published','=',1)->get();
		$pgCount = Report::where('type','=','annualreports')->count();
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
                 break;
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
           $Profileslisting = Report::where('type','=','annualreports')->OrderBy('updated_at','DESC')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminannualreports',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		public function AnnualAudit() {
            
                $page = Page::where('type','=','annualaudit')->where('published','=',1)->get();
		        $pgCount = Report::where('type','=','annualaudit')->count();
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
           $Profileslisting = Report::where('type','=','annualaudit')->OrderBy('updated_at','DESC')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminannualaudit',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		public function QuarterlyReports() {
            
                $page = Page::where('type','=','quarterlyreports')->where('published','=',1)->get();
		        $pgCount = Report::where('type','=','quarterlyreports')->count();
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
           $Profileslisting = Report::where('type','=','quarterlyreports')->OrderBy('updated_at','DESC')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminquarterlyreports',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		public function CircularReports() {
            
                $page = Page::where('type','=','circularreports')->where('published','=',1)->get();
		        $pgCount = Report::where('type','=','circularreports')->count();
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
           $Profileslisting = Report::where('type','=','circularreports')->OrderBy('updated_at','DESC')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('admincircularreports',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		public function ProspectusarReports() {
            
                $page = Page::where('type','=','prospectusarreports')->where('published','=',1)->get();
		        $pgCount = Report::where('type','=','prospectusarreports')->OrderBy('updated_at','DESC')->count();
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
           $Profileslisting = Report::where('type','=','prospectusarreports')->OrderBy('updated_at','DESC')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminprospectusarreports',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		public function AnalystReports() {
            
                $page = Page::where('type','=','analystreports')->where('published','=',1)->get();
		        $pgCount = Report::where('type','=','analystreports')->count();
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
           $Profileslisting = Report::where('type','=','analystreports')->OrderBy('updated_at','DESC')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminanalystreports',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
       public function Add()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
            $diradd = Report::create(Input::all());
             if($diradd)
            {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Added Successfully.</p>
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
		  public function Edit()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
                     
           $proid = Input::get('id'); 
           $banner = Report::find($proid);
           $banner->title = Input::get('title');
           $banner->date = Input::get('date');
		   $banner->content = Input::get('content');
           $banner->active = Input::get('active');
           $banner->pdf = Input::file('pdf');
		   $banner->pdf2 = Input::file('pdf2');
		   $banner->pdf3 = Input::file('pdf3');
		   $banner->pdf4 = Input::file('pdf4');
		   $banner->image = Input::file('image');
            if($banner->save())
            {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Edited Successfully.</p>
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
		   public function DeleteAll() {
		   $type = Input::get('type');
           $dirp = Report::where('type','=',$type)->delete();
		   if($dirp)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">�</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>All Records Deleted Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">�</button>
                <i class="fa fa-check-circle"></i> <strong>Error!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
          
        }
		public function SingleDelete() {
		   $id = Input::get('dirid'); 
           $dirpro = Report::findOrFail($id);
		   $dirpro->delete();
		   if($dirpro)
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
                <i class="fa fa-check-circle"></i> <strong>Error!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
         
        }
		public function NewsAlert() {
            
                $page = Page::where('type','=','newsalerts')->where('published','=',1)->get();
		        $pgCount = Alerts::count();
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
           $Profileslisting = Alerts::OrderBy('updated_at','DESC')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('admininvestornewsalert',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		
		
		public function AddNewsAlert()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
            $diradd = Alerts::create(Input::all());
             if($diradd)
            {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Added Successfully.</p>
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
		  
	   /* Subscribe / Unsubscribe */
	   public function SubscribeNewsAlertSubmit()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
           $email = Input::get('email'); 
		   $alertcnt = Alerts::where('email' , '=', $email)->count();
		   if( $alertcnt == 0)
		   {
			   $diradd = Alerts::create(Input::all());
			   if($diradd)
			  {
				  return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
				  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				  <i class="fa fa-check-circle"></i> <strong>Success!</strong>
				  <p>News Alert Subscribed Successfully.</p>
				</div>');
			  }
			  else
			  {
				  return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
				  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				  <i class="fa fa-check-circle"></i> <strong>Error!</strong>
				  <p>Something happened try again.</p>
				</div>');
			  }
		   }
		   else
		   {
			    return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
				  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				  <i class="fa fa-check-circle"></i> <strong>Error!</strong>
				  <p>This email id already exists.</p>
				</div>');
		   }
          }
		  
		 public function UnSubscribeNewsAlertSubmit() {
		   $email = Input::get('email'); 
		   $alertcnt = Alerts::where('email' , '=', $email)->count();
		   if($alertcnt > 0)
		   {
			 $alert = Alerts::where('email' , '=', $email)->first();
			 $alert->delete();
			 if($alert)
			 {
				  return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
				  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				  <i class="fa fa-check-circle"></i> <strong>Success!</strong>
				  <p>Unsubscribed Successfully.</p>
				</div>');
			 }
			 else 
			 {
				 return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
				  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				  <i class="fa fa-check-circle"></i> <strong>Error!</strong>
				  <p>Something happened try again.</p>
				</div>');
			 }
		   }
		   else
		   {
			    return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
				  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				  <i class="fa fa-check-circle"></i> <strong>Error!</strong>
				  <p>This email ID has not subscribed to the News Alerts yet. Thank you.</p>
				</div>');
		   }
         
        }  
		  
	   /* End of Subscribe / Unsubscribe */	  
		  public function SingleNewsAlertsDelete() {
		   $id = Input::get('dirid'); 
           $dirpro = Alerts::findOrFail($id);
		   $dirpro->delete();
		   if($dirpro)
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
                <i class="fa fa-check-circle"></i> <strong>Error!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
         
        }
		   public function DeleteAllNewsAlerts() {
		 
           $dirp = Report::truncate();
		   if($dirp)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">�</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>All Records Deleted Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">�</button>
                <i class="fa fa-check-circle"></i> <strong>Error!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
          
        }
		
		 public function EditNewsAlert()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
                     
           $proid = Input::get('id'); 
           $banner = Alerts::find($proid);
           $banner->name = Input::get('name');
           $banner->email = Input::get('email');
           $banner->active = Input::get('active');
           if($banner->save())
            {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Edited Successfully.</p>
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
		  
		  public function NewsAlertSingleDelete() {
		   $id = Input::get('dirid'); 
           $dirpro = Alerts::findOrFail($id);
		   $dirpro->delete();
		   if($dirpro)
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
                <i class="fa fa-check-circle"></i> <strong>Error!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
         
        }
		 public function frontPriceGainCalculator() {
           
                $pageTitle = "Price Gain / Loss Calculator";
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
                                                   "title" => "Investor Tools",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Price Gain / Loss Calculator",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
                $mainMenuTitle = "Price Gain / Loss Calculator";
                $metaTitle = $mainMenuTitle;
		return View::make('frontinvestortoolpricegaincalculator',array(
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine
                                                  
                                                    )
                                 );
         }
		 
		 public function frontNewsAlert() {
            
               $page = Page::where('type','=','newsalerts')->where('published','=',1)->get();
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
                                                   "title" => "Investor Tools",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "News Alert",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle.":: Subscribe";
		       
                   return View::make('frontinvestornewsalert',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle
												   
												  
												     )
                                 );
             
        }
		
		public function frontNewsAlertUnsubscribe() {
            
               $page = Page::where('type','=','newsalerts')->where('published','=',1)->get();
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
                                                   "title" => "Investor Tools",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "News Alert",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle.":: Unsubscribe";
		       
                   return View::make('frontinvestornewsalertunsubscribe',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle
												   
												  
												     )
                                 );
             
        }
        
        public function frontAnnualReports()
        {
                $page = Page::where('type','=','annualreports')->where('published','=',1)->get();
                $Reports = Report::where('type','=','annualreports')->where('active','=',1)->OrderBy('updated_at','DESC')->get();
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
                                                   "title" => "Reports",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Annual Reports",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		       
                   return View::make('frontannualreports',array(
                                                   'page' => $page,
                                                   'Reports' => $Reports,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle
												   
												  
												     )
                                 );
        }
        
         public function frontAnnualAudit()
        {
                $page = Page::where('type','=','annualaudit')->where('published','=',1)->get();
                $dateSort = Report::select(DB::raw('DISTINCT SUBSTRING(date, -4, 4) as year'))->where('type','=','annualaudit')->where('active','=','1')->get();
                $dateSorts = Array();
                $dateSorts['all'] = 'List all options here';
                foreach ($dateSort as $dateSort1)
                {
                    $dateSorts[$dateSort1->year] = $dateSort1->year;
                   
                }
                if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'all')
                    {
                      $Reports = Report::where('type','=','annualaudit')->where('active','=',1)->orderBy('updated_at','DESC')->get();
                    }
                    else
                    {
                      $Reports = Report::where('type','=','annualaudit')->where('active','=',1)->where(DB::raw('SUBSTRING(date, -4, 4)'),'=',$dateSort)->orderBy('updated_at','DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $Reports = Report::where('type','=','annualaudit')->where('active','=',1)->OrderBy('updated_at','DESC')->get();
                }
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
                                                   "title" => "Reports",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Annual Audited Accounts",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		       
                   return View::make('frontannualaudit',array(
                                                   'page' => $page,
                                                   'Reports' => $Reports,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'dateSorts' => $dateSorts,
                                                   'metaTitle' => $metaTitle
												   
												  
												     )
                                 );
        }
        
        public function frontQuarterlyReports() {
            
                $page = Page::where('type','=','quarterlyreports')->where('published','=',1)->get();
                $Reports = Report::where('type','=','quarterlyreports')->where('active','=','1')->get();
		/*$qrtlyData = Array();
                foreach ($yearArrs as $yearArr)
                {
                    $matchYear = $yearArr->year;
                   
                    $reportDatas = Report::where('type','=','quarterlyreports')->where('active','=',1)->where(DB::raw('SUBSTRING(date, -4, 4)'),'=',$matchYear)->orderBy('updated_at','DESC')->get();
                    $qrtlyData[$matchYear] = array();
                   
                       array_push($qrtlyData[$matchYear],$reportDatas);
                    
                }
                 */
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
                                                   "title" => "Reports",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Quarterly Reports",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
                return View::make('frontquarterlyreports',array(
                                                   'page' => $page,
                                                   'Reports' => $Reports,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle
												   
												  
												     )
                                 );
             
		       
        }
        
        
         public function frontAnalystReports()
        {
                $page = Page::where('type','=','analystreports')->where('published','=',1)->get();
                $Reports = Report::where('type','=','analystreports')->OrderBy('updated_at','DESC')->get();
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
                                                   "title" => "Reports",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Analyst Reports",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		       
                   return View::make('frontanalystreports',array(
                                                   'page' => $page,
                                                   'Reports' => $Reports,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle
												   
												  
												     )
                                 );
        }
        
        
        public function frontCircularReports() {
            
                $page = Page::where('type','=','circularreports')->where('published','=',1)->get();
                $dateSort = Report::select(DB::raw('DISTINCT SUBSTRING(date, -4, 4) as year'))->where('type','=','circularreports')->where('active','=','1')->get();
                $dateSorts = Array();
                $dateSorts['all'] = 'List all options here';
                foreach ($dateSort as $dateSort1)
                {
                    $dateSorts[$dateSort1->year] = $dateSort1->year;
                   
                }
                if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'all')
                    {
                      $Reports = Report::where('type','=','circularreports')->where('active','=',1)->orderBy('updated_at','DESC')->get();
                    }
                    else
                    {
                      $Reports = Report::where('type','=','circularreports')->where('active','=',1)->where(DB::raw('SUBSTRING(date, -4, 4)'),'=',$dateSort)->orderBy('updated_at','DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $Reports = Report::where('type','=','circularreports')->where('active','=',1)->OrderBy('updated_at','DESC')->get();
                }
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
                                                   "title" => "Reports",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Circulars",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		       
                   return View::make('frontcircularreports',array(
                                                   'page' => $page,
                                                   'Reports' => $Reports,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'dateSorts' => $dateSorts,
                                                   'metaTitle' => $metaTitle
												   
												  
												     )
                                 );
        }
        
        public function frontProspectusarReports() {
            
                $page = Page::where('type','=','prospectusarreports')->where('published','=',1)->get();
                $dateSort = Report::select(DB::raw('DISTINCT SUBSTRING(date, -4, 4) as year'))->where('type','=','prospectusarreports')->where('active','=','1')->get();
                $dateSorts = Array();
                $dateSorts['all'] = 'List all options here';
                foreach ($dateSort as $dateSort1)
                {
                    $dateSorts[$dateSort1->year] = $dateSort1->year;
                   
                }
                if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'all')
                    {
                      $Reports = Report::where('type','=','prospectusarreports')->where('active','=',1)->orderBy('updated_at','DESC')->get();
                    }
                    else
                    {
                      $Reports = Report::where('type','=','prospectusarreports')->where('active','=',1)->where(DB::raw('SUBSTRING(date, -4, 4)'),'=',$dateSort)->orderBy('updated_at','DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $Reports = Report::where('type','=','prospectusarreports')->where('active','=',1)->OrderBy('updated_at','DESC')->get();
                }
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
                                                   "title" => "Reports",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Prospectus",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		       
                   return View::make('frontprospectusareports',array(
                                                   'page' => $page,
                                                   'Reports' => $Reports,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'dateSorts' => $dateSorts,
                                                   'metaTitle' => $metaTitle
												   
												  
												     )
                                 );
        }
        
}

