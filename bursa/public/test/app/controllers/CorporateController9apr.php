<?php

class CorporateController extends BaseController {

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
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">�</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>All Records Deleted Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">�</button>
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
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">�</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>All Records Deleted Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">�</button>
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
        public function InvestorAlert() {
           
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
                $results = DB::select('select * from announcements where category = ?', array('Investor Alert'));
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
			$AdditionalListing = Announcement::where('category','=','Additional Listing')->paginate($noperpage);
            if($pgCount > 0)
           {
				$cntarray1 = $cntArr;
           }
           else {
				$cntarray1 = 0;
           }
		   
		  $results = DB::select('select * from announcements where category = ?', array('Additional Listing'));
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
		   
		  $results = DB::select('select * from announcements where category = ?', array('Listing Circular'));
				 return View::make('adminlistingcircular',array(
                                                   'page' => $page,
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
			$AdditionalListing = Announcement::where('category','=','Financial Result')->paginate($noperpage);
            if($pgCount > 0)
           {
				$cntarray1 = $cntArr;
           }
           else {
				$cntarray1 = 0;
           }
		   
		  $results = DB::select('select * from announcements where category = ?', array('Financial Result'));
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
                $results = DB::select('select * from announcements where category = ?', array('General Announcement'));
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
            return View::make('adminfinancialresultlisting');
         }
		 public function GeneralMeeting() {
            return View::make('admingeneralmeeting');
         }
		 public function SpecialAnnouncement() {
            return View::make('adminspecialannouncement');
         }
		 public function DirectorInterest() {
            return View::make('admindirectorinterest');
         }
		 public function ShareholderInterest() {
            return View::make('adminshareholderinterest');
         }
		 public function InterestSubstanial() {
            return View::make('admininterestsubstanial');
         }
		 public function PersonCeasing() {
            return View::make('adminpersonceasing');
         }
		 public function AuditCommittee() {
            return View::make('adminauditcommittee');
         }
		 public function BoardRoom() {
            return View::make('adminboardroom');
         }
		 public function ChiefExecutive() {
            return View::make('adminchiefexecutive');
         }
		 public function PrincipalOfficer() {
            return View::make('adminprincipalofficer');
         }
		 public function Address() {
            return View::make('adminaddress');
         }
		 public function CompanySecretary() {
            return View::make('admincompanysecretary');
         }
		 public function Registrar() {
            return View::make('adminregistrar');
         }
		 public function Treasury() {
            return View::make('admintreasury');
         }
		 public function ShareImmediate() {
            return View::make('adminshareimmediate');
         }
		 public function SharePursuant() {
            return View::make('adminsharepursuant');
         }
		 public function ShareCompanypursuant() {
            return View::make('adminsharecompanypursuant');
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
                                                   "title" => "General",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
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
                                                   "title" => "Directors' Profile",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
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
                                                   "title" => "Key Management Team",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
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
                                                   "title" => "Our Properties",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
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
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
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
                                                   "title" => "Corporate Governance",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
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
                                                   "title" => "Management Analysis",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Chairman's Statement",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
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
                                                   "title" => "Management Analysis",
                                                   "url" => ""
                                                ),
                                    3 => array 
                                                (
                                                   "title" => "Review of Operations",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
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
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
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
                                                   "title" => "Financial Highlights",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "";
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
                                                   "title" => "FinancialComprehensive",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "";
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
                $tagLine = "";
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
                $tagLine = "";
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
                $tagLine = "";
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
                                                   "title" => "Latest Quarterly Report",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "";
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
                                                   "title" => "Segmental Analysis",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "";
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
                                                   "title" => "Ratio Analysis",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "";
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
                $announcelists = Announcement::orderBy(DB::Raw("STR_TO_DATE( date_of_publishing,  '%d %M %Y' )"), 'DESC')->paginate(5);
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
                $tagLine = "";
                $mainMenuTitle = $page[0]->page_title;
		return View::make('frontbursaannouncelist',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'announcelists' => $announcelists
                                                    )
                                 );
         }
         
         public function frontBursaAnnouncement($announce_id) {
            
                
                $page = Page::where('type','=','newscenter')->where('published','=',1)->get();
                $announcement = Announcement::where('id','=',$announce_id)->get();
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
                                                   "url" => ""
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
                $tagLine = "";
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
                $tagLine = "";
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
	
	   
         
}

