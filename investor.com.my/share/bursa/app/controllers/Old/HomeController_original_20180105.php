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
      //$latestAnnouncements = DB::table('announcements')->orderBy(DB::Raw("STR_TO_DATE( date_of_publishing,  '%d %M %Y' )"), 'DESC')->take(3)->get();
        $latestAnnouncements = $announcelists = CrawledAnnounce::where('status','=',1)->orderBy('date_of_publishing', 'DESC')->take(3)->get();
        
        $details_annc = array();
		 //$details_annc['Entitlements (Notice of Book Closure)'] = 'investorrelations/frontentitlementdetail'; backup comment
        $details_annc['Entitlement(Notice of Book Closure)'] = 'investorrelations/frontentitlementdetail';
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
        $details_annc["Notice of Interest of Substantial Shareholder Pursuant to Form 29A of the Companies Act. 1965"] = 'investorrelations/interestshareholderdetail';
        $details_annc["Notice of Person Ceasing (29C)"] = 'investorrelations/personceasingdetail';
        $details_annc['Change in Audit Committee'] = 'investorrelations/auditcommitteedetail';
        $details_annc['Change in Boardroom'] = 'investorrelations/boardroomdetail';
        $details_annc['Change in Chief Executive Officer'] = 'investorrelations/chiefexecutiveofficerdetail';
        $details_annc['Change in Principal Officer'] = 'investorrelations/principalofficerdetail';
        $details_annc['Change of Address'] = 'investorrelations/addressdetail';
        $details_annc['Change of Company Secretary'] = 'investorrelations/compsectretarydetail';
        $details_annc['Change of Registrar'] = 'investorrelations/registrardetail';
        $details_annc['Notice of Resale/Cancellation of Treasury Shares - Immediate Announcement'] = 'investorrelations/resaledetail';
        $details_annc["Notice of Shares Buy Back by a Company pursuant to Form 28A"] = 'investorrelations/companypursuantdetail';
        $details_annc['Notice of Shares Buy Back by a Company pursuant to Form 28B'] = 'investorrelations/sharecompanypursuantdetail';
        $details_annc['Notice of Shares Buy Back - Immediate Announcement'] = 'investorrelations/immediateannouncementdetail';

        $details_annc['General Announcement for PLC'] = 'investorrelations/frontgeneralannouncementdetail';
        $details_annc['Additional Listing Announcement'] = 'investorrelations/frontadditionallistingdetail';
        
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
                                                      'laststockdata' => $laststockdata[0],
            										'details_annc' => $details_annc
                                                  
            ));
        }
       
}
