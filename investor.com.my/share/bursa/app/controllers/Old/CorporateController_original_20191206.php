<?php

class CorporateController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default CorporateController
	|--------------------------------------------------------------------------
	|
	| You may wish to sue controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
       
        	        
         public function General() {
            
                $page = Page::where('type','=','general')->where('published','=',1)->get();
		        return View::make('admincorporategeneral',array(
                                                   'page' => $page
                                                    )
                                 );
             
        }
       public function DirProfile() {
            
                $page = Page::where('type','=','dirprofile')->where('published','=',1)->get();
				$pgCount = Profile::where('type','=','profile')->count();
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
           $Profileslisting = Profile::where('type','=','profile')->orderBy('updated_at','DESC')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('admindirprofile',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		public function KeyManagemenProfile() {
            
                $page = Page::where('type','=','keymanagement')->where('published','=',1)->get();
				$pgCount = Profile::where('type','=','keymanagement')->count();
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
           $Profileslisting = Profile::where('type','=','keymanagement')->orderBy('updated_at','DESC')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminkeymanagement',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		
		  public function DirProfileAdd()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
            $diradd = Profile::create(Input::all());
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
		 public function DirProfileDelete() {
		   $id = Input::get('dirid'); 
           $dirpro = Profile::findOrFail($id);
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
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
         
        }
		public function DirProfileDeleteAll() {
		   $type = Input::get('type');
           $dirp = Profile::where('type','=',$type)->delete();
		   if($dirp)
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
        public function DirProfileEdit()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
                     
           $proid = Input::get('id'); 
           $banner = Profile::find($proid);
           $banner->name = Input::get('name');
           $banner->date = Input::get('date');
           $banner->active = Input::get('active');
           $banner->content = Input::get('content');
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
          /* End of Front Controller Methods */
		  public function OurProperties() {
            
                $page = Page::where('type','=','ourproperties ')->where('published','=',1)->get();
				$pgCount = Pdf::where('type','=','ourproperties')->count();
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
           $Profileslisting = Pdf::where('type','=','ourproperties ')->orderBy('updated_at','DESC')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminourproperties',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
				  public function OurSubsidiaries() {
            
                $page = Page::where('type','=','oursubsidiaries ')->where('published','=',1)->get();
				$pgCount = Pdf::where('type','=','oursubsidiaries')->count();
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
           $Profileslisting = Pdf::where('type','=','oursubsidiaries ')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminoursubsidiaries',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		 public function CorpGovernance() {
            
                $page = Page::where('type','=','corpgovernance')->where('published','=',1)->get();
				$pgCount = Pdf::where('type','=','corpgovernance')->count();
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
           $Profileslisting = Pdf::where('type','=','corpgovernance')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('admincorpgovernance',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		 public function FinancialHighlights() {
            
                $page = Page::where('type','=','financialhighlights')->where('published','=',1)->get();
		        return View::make('adminfinancialhighlights',array(
                                                   'page' => $page
                                                    )
                                 );
             
        }
		public function FinancialComprehensive() {
            
                $page = Page::where('type','=','financialcomprehensive')->where('published','=',1)->get();
				$pgCount = Pdf::where('type','=','financialcomprehensive')->count();
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
           $Profileslisting = Pdf::where('type','=','financialcomprehensive')->orderBy('updated_at','DESC')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminfinancialcomprehensive',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		public function FinancialPosition() {
            
                $page = Page::where('type','=','financialposition')->where('published','=',1)->get();
				$pgCount = Pdf::where('type','=','financialposition')->count();
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
           $Profileslisting = Pdf::where('type','=','financialposition')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminfinancialposition',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		
			public function FlowStatements() {
            
                $page = Page::where('type','=','flowstatements')->where('published','=',1)->get();
				$pgCount = Pdf::where('type','=','flowstatements')->count();
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
           $Profileslisting = Pdf::where('type','=','flowstatements')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminflowstatements',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		public function Equity() {
            
                $page = Page::where('type','=','equity')->where('published','=',1)->get();
				$pgCount = Pdf::where('type','=','equity')->count();
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
           $Profileslisting = Pdf::where('type','=','equity')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminequity',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		public function FinancialQuarterlyReport() {
            
                $page = Page::where('type','=','financialquarterlyreport')->where('published','=',1)->get();
				$pgCount = Pdf::where('type','=','financialquarterlyreport')->count();
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
           $Profileslisting = Pdf::where('type','=','financialquarterlyreport')->orderBy(DB::raw("STR_TO_DATE(date,'%d/%m/%Y')"),'DESC')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminfinancialquarterlyreport',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		 public function FinancialInfoSegmentalAnalysis() {
            
                $page = Page::where('type','=','financialinfosegmentalanalysis')->where('published','=',1)->get();
		        return View::make('adminfinancialinfosegmentalanalysis',array(
                                                   'page' => $page
                                                    )
                                 );
             
        }
		 public function FinancialRatioAnalysis() {
            
                $page = Page::where('type','=','financialratioanalysis')->where('published','=',1)->get();
		        return View::make('adminfinancialratioanalysis',array(
                                                   'page' => $page
                                                    )
                                 );
             
        }
		public function ManagementChairmansStat() {
            
                $page = Page::where('type','=','managementanalysischairmain')->where('published','=',1)->get();
				$pgCount = Pdf::where('type','=','managementanalysischairmain')->count();
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
           $Profileslisting = Pdf::where('type','=','managementanalysischairmain')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminmanagementanalysischairmain',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		public function ManagementReviewOperations() {
            
                $page = Page::where('type','=','managementreviewoperations')->where('published','=',1)->get();
				$pgCount = Pdf::where('type','=','managementreviewoperations')->count();
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
           $Profileslisting = Pdf::where('type','=','managementreviewoperations')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('adminmanagementreviewoperations',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
		public function ManagementPastPerformanceReview() {
            
                $page = Page::where('type','=','managementpastperformancereview')->where('published','=',1)->get();
				 return View::make('adminmanagementpastperformancereview',array(
                                                   'page' => $page
												     )
                                 );
             
        }
		public function OurSubsidiariesAdd()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
            $diradd = Pdf::create(Input::all());
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
		  public function DeleteAllPdf() {
		   $type = Input::get('type');
           $dirp = Pdf::where('type','=',$type)->delete();
		   if($dirp)
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
		public function PdfSingleDelete() {
		   $id = Input::get('dirid'); 
           $dirpro = Pdf::findOrFail($id);
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
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
         
        }
		public function PdfEdit()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
                     
           $proid = Input::get('id'); 
           $banner = Pdf::find($proid);
           $banner->title = Input::get('title');
           $banner->date = Input::get('date');
           $banner->active = Input::get('active');
           $banner->pdf = Input::file('pdf');
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
		  	public function NewsCenter() {
            
                $page = Page::where('type','=','newscenter')->where('published','=',1)->get();
				
				 return View::make('adminnewscenter',array(
                                                   'page' => $page
												     )
                                 );
             
        }
        
        // Front Functions
        public function frontGeneral() {
            
                $page = Page::where('type','=','general')->where('published','=',1)->get();
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
                                                   "title" => "Corporate Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Statutory Information",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
		return View::make('frontcorporategeneral',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine
                                                    )
                                 );
         }
         
        public function frontDirProfile() {
            
                if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'latest')
                    {
                        $profiles = Profile::where('type','=','profile')->where('active','=',1)->orderBy('updated_at','DESC')->get();
                    }
                    else
                    {
                        $profiles = Profile::where('type','=','profile')->where('active','=',1)->where('date','=',$dateSort)->orderBy('updated_at','DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $profiles = Profile::where('type','=','profile')->orderBy('updated_at','DESC')->where('active','=',1)->get();
                }
                
                $page = Page::where('type','=','dirprofile')->where('published','=',1)->get();
            
                
                $profieDate = Profile::select('date')->where('type','=','profile')->where('active','=',1)->orderBy('updated_at','DESC')->distinct()->get();
              
                $profieDates = Array();
                $profieDates['latest'] = 'Latest';
                foreach ($profieDate as $profileDate1)
                {
                    $profieDates[$profileDate1->date] = $profileDate1->date;
                   
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
                                                   "title" => "Corporate Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Board of Directors",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		return View::make('frontcorporatedirprofile',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle,
                                                   'profieDates' => $profieDates,
                                                   'profiles' => $profiles
                                                    )
                                 );
         }
         
        public function frontKeyManagemenProfile() {
            
                $page = Page::where('type','=','keymanagement')->where('published','=',1)->get();
                $profiles = Profile::where('type','=','keymanagement')->orderBy('updated_at','DESC')->where('active','=',1)->get();
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
                                                   "title" => "Corporate Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Management Team",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		return View::make('frontcorporatekeymanagement',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle,
                                                   'profiles' => $profiles
                                                    )
                                 );
         }
         
        public function frontOurProperties() {
                
                if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    $pdfs = Pdf::where('type','=','ourproperties')->where('active','=',1)->where(DB::raw('SUBSTRING(date, -4, 4)'),'=',$dateSort)->orderBy('updated_at','DESC')->get();
                    
                }
                
                else {
                    
                    $dateSort = ''; 
                    $pdfs = Pdf::where('type','=','ourproperties')->orderBy('updated_at','DESC')->where('active','=',1)->get();
                }
               $profieDate = Pdf::select(DB::raw('DISTINCT SUBSTRING(date, -4, 4) as year'))->where('type','=','ourproperties')->where('active','=',1)->orderBy('updated_at','DESC')->distinct()->get();
              
                $profieDates = Array();
                foreach ($profieDate as $profileDate1)
                {
                    $profieDates[$profileDate1->year] = $profileDate1->year;
                   
                }
               
                $page = Page::where('type','=','ourproperties')->where('published','=',1)->get();
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
                                                   "title" => "Corporate Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Audit Committee",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		return View::make('frontcorporateourproperties',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle,
                                                   'pdfs' => $pdfs,
                                                   'profieDates' => $profieDates
                                                    )
                                 );
         }
         
        public function frontOurSubsidiaries() {
                
                if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'latest')
                    {
                        $pdfs = Pdf::where('type','=','oursubsidiaries')->where('active','=',1)->orderBy('updated_at','DESC')->get();
                    }
                    else
                    {
                        $pdfs = Pdf::where('type','=','oursubsidiaries')->where('active','=',1)->where('date','=',$dateSort)->orderBy('updated_at','DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $pdfs = Pdf::where('type','=','oursubsidiaries')->orderBy('updated_at','DESC')->where('active','=',1)->get();
                }
               $profieDate = Pdf::select('date')->where('type','=','oursubsidiaries')->where('active','=',1)->orderBy('updated_at','DESC')->distinct()->get();
              
                $profieDates = Array();
                $profieDates['latest'] = 'Latest';
                foreach ($profieDate as $profileDate1)
                {
                    $profieDates[$profileDate1->date] = $profileDate1->date;
                   
                }
               
                $page = Page::where('type','=','oursubsidiaries')->where('published','=',1)->get();
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
                                                   "title" => "Corporate Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Our Subsidiaries",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		return View::make('frontcorporateoursubsidiaries',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle,
                                                   'pdfs' => $pdfs,
                                                   'profieDates' => $profieDates
                                                    )
                                 );
         }
         
        public function frontCorpGovernance() {
                 
         if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'latest')
                    {
                        $pdfs = Pdf::where('type','=','corpgovernance')->where('active','=',1)->orderBy('updated_at','DESC')->get();
                    }
                    else
                    {
                        $pdfs = Pdf::where('type','=','corpgovernance')->where('active','=',1)->where('date','=',$dateSort)->orderBy('updated_at','DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $pdfs = Pdf::where('type','=','corpgovernance')->orderBy('updated_at','DESC')->where('active','=',1)->get();
                }
               $profieDate = Pdf::select('date')->where('type','=','corpgovernance')->where('active','=',1)->orderBy('updated_at','DESC')->distinct()->get();
              
                $profieDates = Array();
                $profieDates['latest'] = 'Latest';
                foreach ($profieDate as $profileDate1)
                {
                    $profieDates[$profileDate1->date] = $profileDate1->date;
                   
                }
               
                $page = Page::where('type','=','corpgovernance')->where('published','=',1)->get();
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
                                                   "title" => "Whistle Blower Policy",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		return View::make('frontcorporategovernance',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle,
                                                   'pdfs' => $pdfs,
                                                   'profieDates' => $profieDates
                                                    )
                                 );
         
        }
		 public function frontManagementChairmansStat() {
                
                if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'latest')
                    {
                        $pdfs = Pdf::where('type','=','managementanalysischairmain')->where('active','=',1)->orderBy(DB::raw("STR_TO_DATE(date,'%d/%m/%Y')"),'DESC')->get();
                    }
                    else
                    {
                        $pdfs = Pdf::where('type','=','managementanalysischairmain')->where('active','=',1)->where('date','=',$dateSort)->orderBy(DB::raw("STR_TO_DATE(date,'%d/%m/%Y')"),'DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $pdfs = Pdf::where('type','=','managementanalysischairmain')->orderBy('updated_at','DESC')->where('active','=',1)->get();
                }
               $profieDate = Pdf::select('date')->where('type','=','managementanalysischairmain')->where('active','=',1)->orderBy(DB::raw("STR_TO_DATE(date,'%d/%m/%Y')"),'DESC')->distinct()->get();
              
                $profieDates = Array();
                //$profieDates['latest'] = 'Latest';
                foreach ($profieDate as $profileDate1)
                {
                    $profieDates[$profileDate1->date] = $profileDate1->date;
                   
                }
               
                $page = Page::where('type','=','managementanalysischairmain')->where('published','=',1)->get();
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
                                                   "title" => "Governance",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Corporate Governance",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		return View::make('frontmanagementchairmansstat',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle,
                                                   'pdfs' => $pdfs,
                                                   'profieDates' => $profieDates
                                                    )
                                 );
         }
		 public function frontManagementReviewOperations() {
                
                if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'latest')
                    {
                        $pdfs = Pdf::where('type','=','managementreviewoperations')->where('active','=',1)->orderBy('updated_at','DESC')->get();
                    }
                    else
                    {
                        $pdfs = Pdf::where('type','=','managementreviewoperations')->where('active','=',1)->where('date','=',$dateSort)->orderBy('updated_at','DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $pdfs = Pdf::where('type','=','managementreviewoperations')->orderBy('updated_at','DESC')->where('active','=',1)->get();
                }
               $profieDate = Pdf::select('date')->where('type','=','managementreviewoperations')->where('active','=',1)->orderBy('updated_at','DESC')->distinct()->get();
              
                $profieDates = Array();
                $profieDates['latest'] = 'Latest';
                foreach ($profieDate as $profileDate1)
                {
                    $profieDates[$profileDate1->date] = $profileDate1->date;
                   
                }
               
                $page = Page::where('type','=','managementreviewoperations')->where('published','=',1)->get();
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
                                                   "title" => "Governance",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Board Charter",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		return View::make('frontmanagementreviewoperations',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle,
                                                   'pdfs' => $pdfs,
                                                   'profieDates' => $profieDates
                                                    )
                                 );
         }
		 public function frontManagementPastPerformanceReview() {
                
              
                $page = Page::where('type','=','managementpastperformancereview')->where('published','=',1)->get();
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
                                                   "title" => "Management Analysis",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Past Performance Review",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
		return View::make('frontmanagementpastperformancereview',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle
                                                    )
                                 );
         }
		 
		 
		  public function frontFinancialHighlights() {
            
                $page = Page::where('type','=','financialhighlights')->where('published','=',1)->get();
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
                                                   "title" => "Financial Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Financial Statistics",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
		return View::make('frontfinancialhighlights',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine
                                                    )
                                 );
         }
		  public function frontFinancialComprehensive() {
             if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'latest')
                    {
                        $pdfs = Pdf::where('type','=','financialcomprehensive')->where('active','=',1)->orderBy('updated_at','DESC')->get();
                    }
                    else
                    {
                        $pdfs = Pdf::where('type','=','financialcomprehensive')->where('active','=',1)->where('date','=',$dateSort)->orderBy('updated_at','DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $pdfs = Pdf::where('type','=','financialcomprehensive')->orderBy('updated_at','DESC')->where('active','=',1)->get();
                }
               $profieDate = Pdf::select('date')->where('type','=','financialcomprehensive')->where('active','=',1)->orderBy('updated_at','DESC')->distinct()->get();
              
                $profieDates = Array();
                $profieDates['latest'] = 'Latest';
                foreach ($profieDate as $profileDate1)
                {
                    $profieDates[$profileDate1->date] = $profileDate1->date;
                   
                }
                $page = Page::where('type','=','financialcomprehensive')->where('published','=',1)->get();
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
                                                   "title" => "Financial Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Comprehensive Income",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
		return View::make('frontfinancialcomprehensive',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
												   'pdfs' => $pdfs,
                                                   'profieDates' => $profieDates
                                                    )
                                 );
         }
		  public function frontFinancialPosition() {
             if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'latest')
                    {
                        $pdfs = Pdf::where('type','=','financialposition')->where('active','=',1)->orderBy('updated_at','DESC')->get();
                    }
                    else
                    {
                        $pdfs = Pdf::where('type','=','financialposition')->where('active','=',1)->where('date','=',$dateSort)->orderBy('updated_at','DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $pdfs = Pdf::where('type','=','financialposition')->orderBy('updated_at','DESC')->where('active','=',1)->get();
                }
               $profieDate = Pdf::select('date')->where('type','=','financialposition')->where('active','=',1)->orderBy('updated_at','DESC')->distinct()->get();
              
                $profieDates = Array();
                $profieDates['latest'] = 'Latest';
                foreach ($profieDate as $profileDate1)
                {
                    $profieDates[$profileDate1->date] = $profileDate1->date;
                   
                }
                $page = Page::where('type','=','financialposition')->where('published','=',1)->get();
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
                                                   "title" => "Financial Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Financial Position",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
		return View::make('frontfinancialposition',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
												   'pdfs' => $pdfs,
                                                   'profieDates' => $profieDates
                                                    )
                                 );
         }
		 
		  public function frontFinancialFlowStatements() {
             if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'latest')
                    {
                        $pdfs = Pdf::where('type','=','flowstatements')->where('active','=',1)->orderBy('updated_at','DESC')->get();
                    }
                    else
                    {
                        $pdfs = Pdf::where('type','=','flowstatements')->where('active','=',1)->where('date','=',$dateSort)->orderBy('updated_at','DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $pdfs = Pdf::where('type','=','flowstatements')->orderBy('updated_at','DESC')->where('active','=',1)->get();
                }
               $profieDate = Pdf::select('date')->where('type','=','flowstatements')->where('active','=',1)->orderBy('updated_at','DESC')->distinct()->get();
              
                $profieDates = Array();
                $profieDates['latest'] = 'Latest';
                foreach ($profieDate as $profileDate1)
                {
                    $profieDates[$profileDate1->date] = $profileDate1->date;
                   
                }
                $page = Page::where('type','=','flowstatements')->where('published','=',1)->get();
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
                                                   "title" => "Financial Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Cash Flow Statements",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
		return View::make('frontflowstatements',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
												   'pdfs' => $pdfs,
                                                   'profieDates' => $profieDates
                                                    )
                                 );
         }
		
		  public function frontFinancialEquity() {
             if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'latest')
                    {
                        $pdfs = Pdf::where('type','=','equity')->where('active','=',1)->orderBy('updated_at','DESC')->get();
                    }
                    else
                    {
                        $pdfs = Pdf::where('type','=','equity')->where('active','=',1)->where('date','=',$dateSort)->orderBy('updated_at','DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $pdfs = Pdf::where('type','=','equity')->orderBy('updated_at','DESC')->where('active','=',1)->get();
                }
               $profieDate = Pdf::select('date')->where('type','=','equity')->where('active','=',1)->orderBy('updated_at','DESC')->distinct()->get();
              
                $profieDates = Array();
                $profieDates['latest'] = 'Latest';
                foreach ($profieDate as $profileDate1)
                {
                    $profieDates[$profileDate1->date] = $profileDate1->date;
                   
                }
                $page = Page::where('type','=','equity')->where('published','=',1)->get();
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
                                                   "title" => "Financial Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Statement of Changes In Equity",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
		return View::make('frontequity',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
												   'pdfs' => $pdfs,
                                                   'profieDates' => $profieDates
                                                    )
                                 );
         }
		 
		 
		 public function frontLatestReport() {
             if (Input::has('datesort'))
                {
                    $dateSort = Input::get('datesort');
                    if($dateSort == 'latest')
                    {
                        $pdfs = Pdf::where('type','=','financialquarterlyreport')->where('active','=',1)->orderBy(DB::raw("STR_TO_DATE(date,'%d/%m/%Y')"),'DESC')->get();
                    }
                    else
                    {
                        $pdfs = Pdf::where('type','=','financialquarterlyreport')->where('active','=',1)->where('date','=',$dateSort)->orderBy(DB::raw("STR_TO_DATE(date,'%d/%m/%Y')"),'DESC')->get();
                    }
                }
                
                else {
                    
                    $dateSort = ''; 
                    $pdfs = Pdf::where('type','=','financialquarterlyreport')->orderBy(DB::raw("STR_TO_DATE(date,'%d/%m/%Y')"),'DESC')->where('active','=',1)->get();
                }
               $profieDate = Pdf::select('date')->where('type','=','financialquarterlyreport')->where('active','=',1)->orderBy(DB::raw("STR_TO_DATE(date,'%d/%m/%Y')"),'DESC')->distinct()->get();
              
                $profieDates = Array();
                $profieDates['latest'] = 'Latest';
                foreach ($profieDate as $profileDate1)
                {
                    $profieDates[$profileDate1->date] = $profileDate1->date;
                   
                }
                $page = Page::where('type','=','financialquarterlyreport')->where('published','=',1)->get();
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
                                                   "title" => "Financial Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Key Audit Matters",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
		return View::make('frontquarterlyreportslatest',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
												   'pdfs' => $pdfs,
                                                   'Reports' => $pdfs,
                                                   'profieDates' => $profieDates
                                                    )
                                 );
         }
		 
		  public function frontFinancialSegmentalAnalysis() {
            
                $page = Page::where('type','=','financialinfosegmentalanalysis')->where('published','=',1)->get();
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
                                                   "title" => "Financial Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Highlights",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
		return View::make('frontfinancialinfosegmentalanalysis',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine
                                                    )
                                 );
         }
		 
		 public function frontFinancialRatioAnalysis() {
            
                $page = Page::where('type','=','financialratioanalysis')->where('published','=',1)->get();
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
                                                   "title" => "Financial Information",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Production Statistics",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
		return View::make('frontfinancialratioanalysis',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine
                                                    )
                                 );
         }
         
          public function frontBursaAnnounceList() {
            
                $page = Page::where('type','=','newscenter')->where('published','=',1)->get();
                //$announcelists = Announcement::orderBy(DB::Raw("STR_TO_DATE( date_of_publishing,  '%d %M %Y' )"), 'DESC')->paginate(5);
                $announcelists = CrawledAnnounce::where('status','=',1)->orderBy('date_of_publishing', 'DESC')->paginate(5);

                $details_annc = array();
				$details_annc['Entitlement'] = 'investorrelations/frontentitlementdetail';
                $details_annc['Entitlement(Notice of Book Closure)'] = 'investorrelations/frontentitlementdetail'; //added
                //$details_annc['Investor Alert Announcement'] = 'investorrelations/frontinvestoralertdetail';
				$details_annc['Investor Alert'] = 'investorrelations/frontinvestoralertdetail';
                $details_annc['Additional Listing Announcement (ALA)'] = 'investorrelations/frontadditionallistingdetail';
                $details_annc['Listing Circular'] = 'investorrelations/frontlistingcirculardetail';
                $details_annc['Trading of rights announcement'] = 'investorrelations/fronttradingrightdetail';
                $details_annc['Financial Results'] = 'investorrelations/frontfinanciallistingdetail';
                $details_annc['General Announcement'] = 'investorrelations/frontgeneralannouncementdetail';
                $details_annc['General Meeting'] = 'investorrelations/frontgeneralmeetingdetail';
                $details_annc['General Meetings'] = 'investorrelations/frontgeneralmeetingdetail';
                $details_annc['Special Announcements'] = 'investorrelations/frontspecialannouncementdetail';
                $details_annc["Changes in Director's Interest Pursuant to Section 135 of the Companies Act. 1965"] = 'investorrelations/directorinterestdetail';
                $details_annc["Changes in Substantial Shareholder's Interest Pursuant to Form 29B of the Companies Act. 1965"] = 'investorrelations/shareholderdetail';
                $details_annc['Change in Substantial Shareholders Interest Pursuant to Form 29B'] = 'investorrelations/shareholderdetail';
                $details_annc["Notice of Interest of Substantial Shareholder Pursuant to Form 29A of the Companies Act. 1965"] = 'investorrelations/interestshareholderdetail';
                $details_annc["Notice of Person Ceasing (29C)"] = 'investorrelations/personceasingdetail';
                $details_annc['Change in Audit Committee'] = 'investorrelations/auditcommitteedetail';
                $details_annc['Change in Boardroom'] = 'investorrelations/boardroomdetail';
                $details_annc['Change in Chief Executive Officer'] = 'investorrelations/chiefexecutiveofficerdetail';
                $details_annc['Change in Principal Officer'] = 'investorrelations/principalofficerdetail';
                $details_annc['Change of Address'] = 'investorrelations/addressdetail';
                $details_annc['Change of Company Secretary'] = 'investorrelations/compsectretarydetail';
                $details_annc['Change of Registrar'] = 'investorrelations/registrardetail';
                $details_annc['Change in Nomination Committee'] = 'investorrelations/nominationcommitteedetail';
                $details_annc['Notice of Resale/Cancellation of Treasury Shares - Immediate Announcement'] = 'investorrelations/resaledetail';
                $details_annc["Notice of Shares Buy Back by a Company pursuant to Form 28A"] = 'investorrelations/companypursuantdetail';
                $details_annc['Notice of Shares Buy Back by a Company pursuant to Form 28B'] = 'investorrelations/sharecompanypursuantdetail';
                $details_annc['Notice of Shares Buy Back - Immediate Announcement'] = 'investorrelations/immediateannouncementdetail';

              $details_annc['General Announcement for PLC'] = 'investorrelations/frontgeneralannouncementdetail';
              $details_annc['Additional Listing Announcement'] = 'investorrelations/frontadditionallistingdetail';

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
                                                   "title" => "News Centre",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Bursa Announcements",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
		return View::make('frontbursaannouncelist',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'announcelists' => $announcelists,
													'details_annc' => $details_annc
                                                    )
                                 );
         }
         
         public function frontBursaAnnouncement($announce_id= null) {

               //echo Request::segment(4);exit;
               $page = Page::where('type','=','newscenter')->where('published','=',1)->get();
               if($announce_id)
               {
                $announcement = Announcement::where('id','=',$announce_id)->get();
               }
               else
               {
                $announcement = Announcement::get();
               }

                $pageTitle = "<h2>".$announcement[0]->title."</h2>";
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
                                                   "title" => "News Centre",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Bursa Announcements",
                                                   "url" => URL::to('/investorrelations/newscentre/bursaannouncements')
                                                ),
                                    4 => array 
                                                (
                                                   "title" => $announcement[0]->category,
                                                   "url" => ""
                                                ),
                                    5 => array 
                                                (
                                                   "title" => $announcement[0]->title,
                                                   "url" => ""
                                                )
                                   
                                    );
                
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $page[0]->page_title;
		return View::make('frontbursaannouncement',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'announcement' => $announcement[0]
                                                    )
                                 );
         }
         
         public function frontEntitlementDetail() {
            
              $entitle_title = urldecode(Input::get('title'));
             
                
                $entitlement = Announcement::where('title','LIKE',"%$entitle_title%")->get();
              
                $pageTitle = $entitle_title;
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
                                                   "title" => "News Centre",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Bursa Announcements",
                                                   "url" => ""
                                                ),
                                    4 => array 
                                                (
                                                   "title" => "Entitlements Listing",
                                                   "url" => url()."/investorrelations/entitlements"
                                                ),
                                    5 => array 
                                                (
                                                   "title" => $entitle_title,
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Oil Palm Plantation Investment Holdings";
                $mainMenuTitle = $entitle_title;
		return View::make('frontbursaentitlementdetail',array(
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'entitlement' => $entitlement[0]
                                                    )
                                 );
         }
         public function saveInvestor() {
                 			  
                $title=Input::get('title');
				$category=Input::get('type');
				$date=Input::get('date');
				$reference_no=Input::get('textarea_reference');
                 $short_description=Input::get('textarea_announcement_content');
				if(isset($_REQUEST['active']) && !empty($_REQUEST['active'])){
				$active=Input::get('active');}else{
				$active=0;
				}
				
				$company_name=Input::get('company');
		 
		 DB::insert('insert into announcements (title, category,date_of_publishing,reference_no,company_name,active,short_description) values (?, ?,?,?,?,?,?)', array($title, $category,$date,$reference_no,$company_name,$active,$short_description));
                 return Redirect::back();
	} 
       public function SingleDeleteInvestor(){
        $id = Input::get('dirid'); 
           $dirpro = Announcement::findOrFail($id);
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
       public function DeleteAllInvestor()
       {
       $type = Input::get('type');
           $dirp = Announcement::where('category','=',$type)->delete();
		   if($dirp)
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
                <i class="fa fa-check-circle"></i> <strong>Error!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
       }
	   public function Editinvestoralert(){
	  
	       $invid = Input::get('id'); 
         
		  $announcement=array(
		  'title'=>Input::get('title'),
		  'category'=>Input::get('type'),
		  'date_of_publishing'=>Input::get('date'),
		  'active'=>Input::get('active'),
		  'company_name'=>Input::get('company'),
		  'reference_no'=>trim(Input::get('textarea_reference')),
		  'short_description'=>trim(Input::get('textarea_announcement_content')),
		  );
        
		  DB::table('announcements')
            ->where('id', $invid)
            ->update($announcement);
			
	      return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Edited Successfully.</p>
              </div>'); 
         
	   }
	   public function CorporateDeleteMultiple(){
	   $id = Input::get('deleteid'); 
		  $ids= explode(',',$id[0]);
		   $banner = Announcement::whereIn('id', $ids)->delete();
		 //  $banner->delete();
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
	   
	   // dated 04-04-2015
	     public function saveAdditional() {
                 // print_r($_REQUEST);
					// die;				 
                $title=Input::get('title');
				$category=Input::get('type');
				$date=Input::get('date');
				$reference_no=Input::get('textarea_reference');
                 $short_description=Input::get('textarea_announcement_content');
				if(isset($_REQUEST['active']) && !empty($_REQUEST['active'])){
				$active=Input::get('active');}else{
				$active=0;
				}
				
				$company_name=Input::get('company');
		 
		 DB::insert('insert into announcements (title, category,date_of_publishing,reference_no,company_name,active,short_description) values (?, ?,?,?,?,?,?)', array($title, $category,$date,$reference_no,$company_name,$active,$short_description));
                 return Redirect::back();
	}
	
	   
	
	
	
	
	/* public function InvestorAlert() {
           
         $page = Page::where('type','=','inverstoralert')->where('published','=',1)->get();
				$pgCount = Announcement::where('category','=','Investor Alert')->count();
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
			   $Announcementlisting = Announcement::where('category','=','Investor Alert')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
                $results = DB::select('select * from annc where category = ?', array('Investor Alert'));
				 return View::make('admininverstoralert',array(
                                                   'page' => $page,
												   'accountlisting'=>$Announcementlisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
        }
             


        public function AdditionalListing() {
			  $page = Page::where('type','=','additionallisting');
			  $pgCount = Announcement::where('category','=','Additional Listing')->count();
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
             }else {
                  
                   $noperpage = 10;
               }
			$AdditionalListing = Announcement::where('category','LIKE','%Additional Listing%')->paginate($noperpage);
            if($pgCount > 0)
           {
				$cntarray1 = $cntArr;
           }
           else {
				$cntarray1 = 0;
           }
		   
		  $results = DB::select('select * from annc where category LIKE "%?%"', array('Additional Listing'));
				 return View::make('adminadditionallisting',array(
                                                   'page' => $page,
												   'accountlisting'=>$AdditionalListing,
												    'cntarray1' => $cntarray1
												     )
                                 );
            // return View::make('adminadditionallisting');
         }
		 
		 // circular listing starts here
		 
		 public function ListingCircular() {
			 $page = Page::where('type','=','adminlistingcircular');
			  $pgCount = Announcement::where('category','=','Listing Circular')->count();
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
             }else {
                  
                   $noperpage = 10;
               }
			$AdditionalListing = Announcement::where('category','=','Listing Circular')->paginate($noperpage);
            if($pgCount > 0)
           {
				$cntarray1 = $cntArr;
           }
           else {
				$cntarray1 = 0;
           }
		   
		  $results = DB::select('select * from annc where category = ?', array('Listing Circular'));
				 return View::make('adminlistingcircular',array(
                                                   // 'page' => $page,
												   'accountlisting'=>$AdditionalListing,
												    'cntarray1' => $cntarray1
												     )
                                 );
			 
			 
            // return View::make('adminlistingcircular');
         }
		 
	public function saveCircular() {
               	 
                $title=Input::get('title');
				$category=Input::get('type');
				$date=Input::get('date');
				$reference_no=Input::get('textarea_reference');
                 $short_description=Input::get('textarea_announcement_content');
				if(isset($_REQUEST['active']) && !empty($_REQUEST['active'])){
				$active=Input::get('active');}else{
				$active=0;
				}
				
				$company_name=Input::get('company');
		 
		 DB::insert('insert into announcements (title, category,date_of_publishing,reference_no,company_name,active,short_description) values (?, ?,?,?,?,?,?)', array($title, $category,$date,$reference_no,$company_name,$active,$short_description));
                 return Redirect::back();
	}
		 
		 // circular listing ends here
		 
		 // financial result starts here
		 public function FinancialResult() {
			  $page = Page::where('type','=','adminfinancialresult');
			  $pgCount = Announcement::where('category','=','Financial Result')->count();
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
             }else {
                  
                   $noperpage = 10;
               }
			$AdditionalListing = Announcement::where('category','=','Financial Results')->paginate($noperpage);
            if($pgCount > 0)
           {
				$cntarray1 = $cntArr;
           }
           else {
				$cntarray1 = 0;
           }
		   
		  $results = DB::select('select * from annc where category = ?', array('Financial Results'));
				 return View::make('adminfinancialresult',array(
                                                   'page' => $page,
												   'accountlisting'=>$AdditionalListing,
												    'cntarray1' => $cntarray1
												     )
                                 );
			 
			 
			 
			 
            // return View::make('adminfinancialresult');
         }
		 
		 public function saveFinancial() {
               	 
                $title=Input::get('title');
				$category=Input::get('type');
				$date=Input::get('date');
				$reference_no=Input::get('textarea_reference');
                 $short_description=Input::get('textarea_announcement_content');
				if(isset($_REQUEST['active']) && !empty($_REQUEST['active'])){
				$active=Input::get('active');}else{
				$active=0;
				}
				
				$company_name=Input::get('company');
		 
		 DB::insert('insert into announcements (title, category,date_of_publishing,reference_no,company_name,active,short_description) values (?, ?,?,?,?,?,?)', array($title, $category,$date,$reference_no,$company_name,$active,$short_description));
                 return Redirect::back();
	}
		 
		 // financial result ends here
		 
		 // general announcement starts here
		  public function GeneralAnnouncement() {
			   $page = Page::where('type','=','generalannouncement')->where('published','=',1)->get();
				$pgCount = Announcement::where('category','=','General Announcement')->count();
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
			$Announcementlisting = Announcement::where('category','=','General Announcement')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
			   
           $cntarray1 = 0;
		   
           }
                $results = DB::select('select * from annc where category = ?', array('General Announcement'));
				 return View::make('admingeneralannouncement',array(
                                                   'page' => $page,
												   'accountlisting'=>$Announcementlisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
			  
            // return View::make('admingeneralannouncement');
         }
		 
		  public function saveGeneralAnnouncement() {
               	 
        $title=Input::get('title');
				$category=Input::get('type');
				$date=Input::get('date');
				$reference_no=Input::get('textarea_reference');
                 $short_description=Input::get('textarea_announcement_content');
				if(isset($_REQUEST['active']) && !empty($_REQUEST['active'])){
				$active=Input::get('active');}else{
				$active=0;
				}
				
				$company_name=Input::get('company');
		 
		 DB::insert('insert into announcements (title, category,date_of_publishing,reference_no,company_name,active,short_description) values (?, ?,?,?,?,?,?)', array($title, $category,$date,$reference_no,$company_name,$active,$short_description));
                 return Redirect::back();
	}
		 
		  // general announcement ends here
		 public function FinancialResultlisting() {
      $pgCount = Announcement::where('category','=','Trading of Rights Announcement')->count();
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
      $financialResult = Announcement::where('category','=','Trading of Rights Announcement')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Trading of Rights Announcement'));
         return View::make('adminfinancialresultlisting',array(
                           'financialResult'=>$financialResult,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminfinancialresultlisting');
         }
		 public function GeneralMeeting() 
     {
        $pgCount = Announcement::where('category','=','General Meetings')->count();
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
      $Generalmeeting = Announcement::where('category','=','General Meetings')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('General Meetings'));
         return View::make('admingeneralmeeting',array(
                           'generalmeeting'=>$Generalmeeting,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('admingeneralmeeting');
      }
		 public function SpecialAnnouncement() {
      $pgCount = Announcement::where('category','=','Special Announcement')->count();
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
      $specialAnnouncement = Announcement::where('category','=','Special Announcement')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Special Announcement'));
         return View::make('adminspecialannouncement',array(
                           'specialAnnouncement'=>$specialAnnouncement,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminspecialannouncement');
         }
		 public function DirectorInterest() {
        $pgCount = Announcement::where('category','=',"Changes in Director's Interest Pursuant to Section 135 of the Companies Act. 1965")->count();
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
      $directorInterest = Announcement::where('category','=',"Changes in Director's Interest Pursuant to Section 135 of the Companies Act. 1965")->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array("Changes in Director's Interest Pursuant to Section 135 of the Companies Act. 1965"));
         return View::make('admindirectorinterest',array(
                           'directorInterest'=>$directorInterest,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('admindirectorinterest');
         }
		 public function ShareholderInterest() {
      $pgCount = Announcement::where('category','=',"Changes in Substantial Shareholder's Interest Pursuant to Form 29B of the Companies Act. 1965")->count();
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
      $shareholderInterest = Announcement::where('category','=',"Changes in Substantial Shareholder's Interest Pursuant to Form 29B of the Companies Act. 1965")->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array("Changes in Substantial Shareholder's Interest Pursuant to Form 29B of the Companies Act. 1965"));
         return View::make('adminshareholderinterest',array(
                           'shareholderInterest'=>$shareholderInterest,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminshareholderinterest');
         }
		 public function InterestSubstanial() {
          $pgCount = Announcement::where('category','=',"Notice of Interest of Substantial Shareholder Pursuant to Form 29A of the Companies Act. 1965")->count();
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
      $interestSubstanial = Announcement::where('category','=',"Notice of Interest of Substantial Shareholder Pursuant to Form 29A of the Companies Act. 1965")->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array("Notice of Interest of Substantial Shareholder Pursuant to Form 29A of the Companies Act. 1965"));
         return View::make('admininterestsubstanial',array(
                           'interestSubstanial'=>$interestSubstanial,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('admininterestsubstanial');
         }
		 public function PersonCeasing() {
          $pgCount = Announcement::where('category','=','Notice of Person Ceasing (29C)')->count();
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
      $personCeasing = Announcement::where('category','=','Notice of Person Ceasing (29C)')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Notice of Person Ceasing (29C)'));
         return View::make('adminpersonceasing',array(
                           'personCeasing'=>$personCeasing,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminpersonceasing');
         }
		 public function AuditCommittee() {
      $pgCount = Announcement::where('category','=','Change in Audit Committee')->count();
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
      $auditComittee = Announcement::where('category','=','Change in Audit Committee')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Change in Audit Committee'));
         return View::make('adminauditcommittee',array(
                           'auditComittee'=>$auditComittee,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminauditcommittee');
         }
		 public function BoardRoom() {
      $pgCount = Announcement::where('category','=','Change in Boardroom')->count();
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
      $broadroom = Announcement::where('category','=','Change in Boardroom')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Change in Boardroom'));
         return View::make('adminboardroom',array(
                           'broadroom'=>$broadroom,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminboardroom');
         }
		 public function ChiefExecutive() {
      $pgCount = Announcement::where('category','=','Change in Chief Executive Officer')->count();
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
      $chiefExecutive = Announcement::where('category','=','Change in Chief Executive Officer')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Change in Chief Executive Officer'));
         return View::make('adminchiefexecutive',array(
                           'chiefExecutive'=>$chiefExecutive,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminchiefexecutive');
         }
		 public function PrincipalOfficer() {
        $pgCount = Announcement::where('category','=','Change in Principal Officer')->count();
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
      $principalOfficer = Announcement::where('category','=','Change in Principal Officer')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Change in Principal Officer'));
         return View::make('adminprincipalofficer',array(
                           'principalOfficer'=>$principalOfficer,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminprincipalofficer');
         }
		 public function Address() {
      $pgCount = Announcement::where('category','=','Change of Address')->count();
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
      $address = Announcement::where('category','=','Change of Address')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Change of Address'));
         return View::make('adminaddress',array(
                           'address'=>$address,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminaddress');
         }
		 public function CompanySecretary() {
      $pgCount = Announcement::where('category','=','Change of Company Secretary')->count();
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
      $companySecretary = Announcement::where('category','=','Change of Company Secretary')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Change of Company Secretary'));
         return View::make('admincompanysecretary',array(
                           'companySecretary'=>$companySecretary,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('admincompanysecretary');
         }
		 public function Registrar() {
          $pgCount = Announcement::where('category','=','Change of Registrar')->count();
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
      $registrar = Announcement::where('category','=','Change of Registrar')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Change of Registrar'));
         return View::make('adminregistrar',array(
                           'registrar'=>$registrar,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminregistrar');
         }
		 public function Treasury() {
       $pgCount = Announcement::where('category','=','Notice of Resale/Cancellation of Treasury Share - Immediate Announcement')->count();
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
      $treasury = Announcement::where('category','=','Notice of Resale/Cancellation of Treasury Share - Immediate Announcement')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Notice of Resale/Cancellation of Treasury Share - Immediate Announcement'));
         return View::make('admintreasury',array(
                           'treasury'=>$treasury,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('admintreasury');
         }
		 public function ShareImmediate() {
      $pgCount = Announcement::where('category','=','Notice of Shares Buy Back - Immediate Announcement')->count();
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
      $shareImmediate = Announcement::where('category','=','Notice of Shares Buy Back - Immediate Announcement')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Notice of Shares Buy Back - Immediate Announcement'));
         return View::make('adminshareimmediate',array(
                           'shareImmediate'=>$shareImmediate,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminshareimmediate');
         }
		 public function SharePursuant() {
      $pgCount = Announcement::where('category','=','Notice of Shares Buy Back by a Company Pursuant to Form 28A')->count();
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
      $sharePursuant = Announcement::where('category','=','Notice of Shares Buy Back by a Company Pursuant to Form 28A')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Notice of Shares Buy Back by a Company Pursuant to Form 28A'));
         return View::make('adminsharepursuant',array(
                           'sharePursuant'=>$sharePursuant,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminsharepursuant');
         }
		 public function ShareCompanypursuant() {
        $pgCount = Announcement::where('category','=','Notice of Shares Buy Back by a Company Pursuant to Form 28B')->count();
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
      $shareCompanyPursuant = Announcement::where('category','=','Notice of Shares Buy Back by a Company Pursuant to Form 28B')->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
         
           $cntarray1 = 0;
       
           }
                $results = DB::select('select * from annc where category = ?', array('Notice of Shares Buy Back by a Company Pursuant to Form 28B'));
         return View::make('adminsharecompanypursuant',array(
                           'shareCompanyPursuant'=>$shareCompanyPursuant,
                            'cntarray1' => $cntarray1
                             )
                                 );
            // return View::make('adminsharecompanypursuant');
         } */
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// dated 11-05-2015 JP
	public function addAnnouncements() {
		/* update requested data */
		$data = array();
		$data['reference_no'] = strip_tags(Input::get('reference_no'));
		if(isset($_REQUEST['status']) && !empty($_REQUEST['status'])){
			$data['status']=Input::get('status');
		}else{
			$data['status']=0;
		}
		$data['date_of_publishing'] = date('Y-m-d', strtotime(str_replace("/", "-", Input::get('date_of_publishing'))));
		$data['html'] = Input::get('html');
		$data['title'] = Input::get('title');
		$data['company_name'] = Input::get('company_name');
		$data['category'] = Input::get('category');
	
		//dd($data);
	
		if(CrawledAnnounce::create($data))
		{
			return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Announcement Added Successfully.</p>
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
	
	public function editAnnouncements(){
			
		/* update requested data */
		$data = array();
		$data['reference_no'] = strip_tags(Input::get('reference_no'));
		if(isset($_REQUEST['status']) && !empty($_REQUEST['status'])){
			$data['status']=Input::get('status');
		}else{
			$data['status']=0;
		}
		$data['date_of_publishing'] = date('Y-m-d', strtotime(str_replace("/", "-", Input::get('date_of_publishing'))));
		$data['html'] = Input::get('html');
		$data['title'] = Input::get('title');
		$data['company_name'] = Input::get('company_name');
	
		if(CrawledAnnounce::where('id', Input::get('id'))->update($data))
		{
			return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Announcement Edited Successfully.</p>
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
	
	public function deleteAnnouncement(){
		$id = Input::get('id');
		$dirpro = CrawledAnnounce::findOrFail($id);
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
	
	public function deleteMultipleAnnouncement(){
		$id = Input::get('deleteid');
		$ids= explode(',',$id);
		$banner = CrawledAnnounce::whereIn('id', $ids)->delete();
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
	
	public function deleteAllAnnouncement()
	{
		$type = Input::get('type');
	
		$dirp = CrawledAnnounce::where('category','=', $type)->delete();
		if($dirp)
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
                <i class="fa fa-check-circle"></i> <strong>Error!</strong>
                <p>Something happened try again.</p>
              </div>');
		}
	}
	
	 
	public function Entitlement() {
	
		$page = Page::where('type','=','cat_entitlement')->where('published','=',1)->get();
	
		/* use category on entire page */
		$base_category = 'Entitlements (Notice of Book Closure)';
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'DESC')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminentitlement',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	
	}
	
	public function InvestorAlert() {
		 
		$page = Page::where('type','=','cat_investoralert')->where('published','=',1)->get();
	
		/* use category on entire page */
		$base_category = 'Investor Alert Announcement';
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('admininverstoralert',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	 
	
	
	public function AdditionalListing() {
		$page = Page::where('type','=','cat_additionallisting')->where('published','=',1)->get();
			
		/* use category on entire page */
		$base_category = 'Additional Listing Announcement (ALA)';
			
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminadditionallisting',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
		
	// circular listing starts here
		
	public function ListingCircular() {
		$page = Page::where('type','=','cat_listingcirculars')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = 'Listing Circular';
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminlistingcircular',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	
		
	// circular listing ends here
		
	// financial result starts here
	public function FinancialResult() {
		$page = Page::where('type','=','cat_financialresults')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = 'Financial Results';
	
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
				
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminfinancialresult',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	
	}
	
	// financial result ends here
		
	// general announcement starts here
	public function GeneralAnnouncement() {
		$page = Page::where('type','=','cat_generalannouncement')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = 'General Announcement';
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
			 
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('admingeneralannouncement',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
		 
	}
	
		
	public function FinancialResultlisting() {
		$page = Page::where('type','=','cat_financialresult')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = 'Trading of rights announcement';
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminfinancialresultlisting',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
		
		
		
		
		
		
		
		
	public function GeneralMeeting() {
		$page = Page::where('type','=','cat_generalmeetings')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = 'General Meetings';
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('admingeneralmeeting',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	 
	public function SpecialAnnouncement() {
		$page = Page::where('type','=','cat_specialannouncement')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = 'Special Announcements';
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminspecialannouncement',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	 
	public function DirectorInterest() {
		$page = Page::where('type','=','cat_directorinterest')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Changes in Director's Interest Pursuant to Section 135 of the Companies Act. 1965";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('admindirectorinterest',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function ShareholderInterest() {
		$page = Page::where('type','=','cat_shareholderinterest')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Changes in Substantial Shareholder's Interest Pursuant to Form 29B of the Companies Act. 1965";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminshareholderinterest',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function InterestSubstanial() {
		$page = Page::where('type','=','cat_interestshareholder')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Notice of Interest of Substantial Shareholder Pursuant to Form 29A of the Companies Act. 1965";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('admininterestsubstanial',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function PersonCeasing() {
		$page = Page::where('type','=','cat_personceasing')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Notice of Person Ceasing (29C)";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminpersonceasing',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function AuditCommittee() {
		$page = Page::where('type','=','cat_auditcommittee')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Change in Audit Committee";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminauditcommittee',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function BoardRoom() {
		$page = Page::where('type','=','cat_boardroom')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Change in Boardroom";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminboardroom',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function ChiefExecutive() {
		$page = Page::where('type','=','cat_chiefexecutiveofficer')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Change in Chief Executive Officer";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminchiefexecutive',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function PrincipalOfficer() {
		$page = Page::where('type','=','cat_principalofficer')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Change in Principal Officer";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminprincipalofficer',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function Address() {
		$page = Page::where('type','=','cat_addresslisting')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Change of Address";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminaddress',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function CompanySecretary() {
		$page = Page::where('type','=','cat_compsectretarylisting')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Change of Company Secretary";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('admincompanysecretary',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function Registrar() {
		$page = Page::where('type','=','cat_registrarlist')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Change of Registrar";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminregistrar',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function Treasury() {
		$page = Page::where('type','=','cat_resalelist')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Notice of Resale/Cancellation of Treasury Shares - Immediate Announcement";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('admintreasury',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function ShareImmediate() {
		$page = Page::where('type','=','cat_immediateannouncement')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Notice of Shares Buy Back - Immediate Announcement";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminshareimmediate',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function SharePursuant() {
		$page = Page::where('type','=','cat_companypursuant')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Notice of Shares Buy Back by a Company pursuant to Form 28A";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminsharepursuant',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	public function ShareCompanypursuant() {
		$page = Page::where('type','=','cat_sharecompanypursuant')->where('published','=',1)->get();
		/* use category on entire page */
		$base_category = "Notice of Shares Buy Back by a Company pursuant to Form 28B";
		 
		$pgCount = CrawledAnnounce::where('category','LIKE', $base_category )->count();
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
		}else {
	
			$noperpage = 10;
		}
		$AdditionalListing = CrawledAnnounce::where('category','LIKE', $base_category )->orderBy('date_of_publishing', 'desc')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}
		return View::make('adminsharecompanypursuant',array(
				'page' => $page,
				'accountlisting'=>$AdditionalListing,
				'cntarray1' => $cntarray1,
				'base_category' => $base_category
		)
		);
	}
	
	
	
         
}