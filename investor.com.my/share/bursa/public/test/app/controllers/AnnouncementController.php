<?php

class AnnouncementController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
       
	
        public function adminAnnouncement() {
                $page = Page::where('type','=','announcements')->where('published','=',1)->get();
             return View::make('adminannouncement', array(
                                                   'page' => $page
                                                  ));
        }
        
		  public function frontAnnouncement()
        {
	      $page = Page::where('type','=','announcements')->where('published','=',1)->get();
	   //   $annualreport = Annualreport::where('active','=',1)->get();
	      
              $pageTitle = $page[0]->left_block1_title;
              $masthead = url().'/images/banner_subpage/banner7.jpg';
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
                                                   "title" => "Annual Reports",
                                                   "url" => ""
                                                )
                                   
                                    );
               
                $mainMenuTitle = $page[0]->page_title;
                return View::make('frontannouncement',array(
                                                       'page' => $page[0],
                                                       'mainMenuTitle' => $mainMenuTitle,
                                                       'pageTitle' => $pageTitle ,
                                                       'breadcrumbs' => $breadcrumbs,
                                                       'masthead' => $masthead                                                       
                                                     ));
        
        }
		
      
       
}

