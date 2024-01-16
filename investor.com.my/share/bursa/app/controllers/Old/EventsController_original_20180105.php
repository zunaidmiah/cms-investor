<?php

class EventsController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default EventsController
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
       
        	        
         public function EventsHome() {
            
                $page = Page::where('type','=','eventcalendar')->where('published','=',1)->get();
		        $pgCount = Events::count();
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
           $Profileslisting = Events::OrderBy(DB::raw("STR_TO_DATE(date, '%d/%m/%Y')"),"DESC")->paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
		        return View::make('admineventcalendar',array(
                                                   'page' => $page,
												   'profilelist'=>$Profileslisting,
												    'cntarray1' => $cntarray1
												     )
                                 );
             
        }
	
       public function Add()
          {
             // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
            $diradd = Events::create(Input::all());
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
           $banner = Events::find($proid);
		   $banner->title = Input::get('title');
           $banner->time = Input::get('time');
           $banner->date = Input::get('date');
		   $banner->content = Input::get('content');
           $banner->active = Input::get('active');
           $banner->venue = Input::get('venue');
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
		//   $type = Input::get('type');
           $dirp = Events::truncate();
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
		public function SingleDelete() {
		   $id = Input::get('dirid'); 
           $dirpro = Events::findOrFail($id);
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
    public function frontEventsHome()
    {
       $page = Page::where('type','=','eventcalendar')->where('published','=',1)->get();
       $yearsort = Events::select(DB::raw('DISTINCT SUBSTRING(date, -4, 4) as year'))->where('active','=','1')->orderBy(DB::raw('SUBSTRING(date, -4, 4)'),'DESC')->get();
       $yearsorts = Array();
                //$yearsorts['latest'] = 'latest';
                foreach ($yearsort as $yearsort1)
                {
                    $yearsorts[$yearsort1->year] = $yearsort1->year;         
                    
                }
       if(Input::has('datesort'))
       {
           $events = Events::where('active','=','1')->where(DB::raw('SUBSTRING(date, -4, 4)'),'=',Input::get('datesort'))->OrderBy(DB::raw("STR_TO_DATE(date, '%d/%m/%Y')"),"DESC")->get();
       }
       else
       {
           $events = Events::where('active','=','1')->OrderBy(DB::raw("STR_TO_DATE(date, '%d/%m/%Y')"),"DESC")->get();
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
                                                   "title" => "Event Calendar",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
                $mainMenuTitle = $page[0]->page_title;
                $metaTitle = $mainMenuTitle;
              	
	       return View::make('fronteventscalendar',array(
                                                   'page' => $page,
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,
                                                   'metaTitle' => $metaTitle,
                                                   'yearsorts' => $yearsorts,
                                                   'events' => $events
                                                    )
                                 );
       
    }
}

