<?php

class HomeController extends BaseController {

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

	public function showWelcome()
	{
		return View::make('hello');
	}
        
        public function showIndex()
        {
      
        $page = Page::where('type','=','irhome')->where('published','=',1)->get();
       
        $reports = Report::where('type','=','annualreports')->where('active','=',1)->orderBy('updated_at','DESC')->paginate(3);
        // Following for latest news
        $latestNews = DB::connection('medianews')->select('SELECT * FROM media_news WHERE `status` = 1 ORDER BY `date` DESC LIMIT 0,3');
        
        // Following for stock price
        $stockdata = DB::connection('charts')->select('SELECT * FROM ohlc ORDER BY `id` DESC LIMIT 0,1');
        
        // Last Stock Data
        $laststockdata = DB::connection('charts')->select('SELECT * FROM ohlcvs ORDER BY `id` DESC LIMIT 0,1');
       
     
      //  $latestAnnouncements = DB::connection('mysql')->select("SELECT * FROM announcements WHERE ORDER BY STR_TO_DATE( date_of_publishing,  '%d %M %Y' )  DESC LIMIT 0,3");
        $latestAnnouncements = DB::table('announcements')->orderBy(DB::Raw("STR_TO_DATE( date_of_publishing,  '%d %M %Y' )"), 'DESC')->take(3)->get();
        $tagLine = "Full Turnkey Solutions for Telecom Client.";
            
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
                                                )

                                    );
            $mainMenuTitle = $page[0]->page_title;
            $pageTitle = $page[0]->page_title;
            return View::make('frontindex', array(    'page' => $page,
                                                      'Reports' => $reports,
                                                      'mainMenuTitle' => $mainMenuTitle,
                                                      'pageTitle' => $pageTitle ,
                                                      'breadcrumbs' => $breadcrumbs,
                                                      'tagLine' => $tagLine,
                                                      'latestnews' => $latestNews,
                                                      'latestannouncements' => $latestAnnouncements,
                                                      'stockdata' => $stockdata[0],
                                                      'laststockdata' => $laststockdata[0]
                                                  
            ));
        }
       
}
