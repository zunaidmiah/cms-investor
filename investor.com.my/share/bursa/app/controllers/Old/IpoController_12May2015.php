<?php

use Illuminate\Support\Facades\URL;
class IpoController extends BaseController {
	public $breadcrumbs = [
		['title' => 'Home', 'url' => '/'],
		['title' => 'Investor Relations', 'url' => ''],
		['title' => 'News Center', 'url' => ''],
		['title' => 'Bursa Announcements', 'url' => '']
	];
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

	public function IpoStatistics() {

		$page = Page::where('type','=','ipostatistics')->where('published','=',1)->get();
		return View::make('adminipostatistics',array(
				'page' => $page
			)
		);

	}

	public function IpoCompetitive() {

		$page = Page::where('type','=','ipocompetitive')->where('published','=',1)->get();
		return View::make('adminipocompetitive',array(
				'page' => $page
			)
		);

	}

	public function IpoRiskFactors() {

		$page = Page::where('type','=','iporiskfactors')->where('published','=',1)->get();
		return View::make('adminiporiskfactors',array(
				'page' => $page
			)
		);

	}

	public function IpoUtilisationProceeds() {

		$page = Page::where('type','=','ipoutilisationproceeds')->where('published','=',1)->get();
		return View::make('adminipoutilisationproceeds',array(
				'page' => $page
			)
		);

	}

	public function IpoIndustryOverview() {

		$page = Page::where('type','=','ipoindustryoverview')->where('published','=',1)->get();
		return View::make('adminipoindustryoverview',array(
				'page' => $page
			)
		);

	}

	public function Entitlements() {

		$page = Page::where('type','=','entitlements')->where('published','=',1)->get();
		return View::make('adminentitlements',array(
				'page' => $page
			)
		);

	}

//	public function Entitlement() {
//
//		$page = Page::where('type','=','entitlement')->where('published','=',1)->get();
//
//		return View::make('adminentitlement',array(
//				'page' => $page
//			)
//		);
//
//	}

	public function Entitlement() {

		$page = Page::where('type','=','entitlement')->where('published','=',1)->get();

		$pgCount = Announcement::where('category','=','Entitlements')->count();
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
		$entitlement = Announcement::where('category','LIKE','%Entitlements%')->paginate($noperpage);
		if($pgCount > 0)
		{
			$cntarray1 = $cntArr;
		}
		else {
			$cntarray1 = 0;
		}

		$results = DB::select('select * from annc where category LIKE "%?%"', array('Entitlements'));
		return View::make('adminentitlement',array(
				'page' => $page,
				'entitlement'=>$entitlement,
				'cntarray1' => $cntarray1
			)
		);


		// return View::make('adminentitlement',array(
		//                                          'page' => $page
		//                                           )
		//                        );

	}

	/* Front Functions */

	public function frontIpoStatistics() {

		$page = Page::where('type','=','ipostatistics')->where('published','=',1)->get();
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
				"title" => "IPO Centre",
				"url" => ""
			),
			3 => array
			(
				"title" => "IPO Statistics",
				"url" => ""
			)

		);
		$tagLine = "Full Turnkey Solutions for Telecom Client.";
		$mainMenuTitle = $page[0]->page_title;
		$metaTitle = $mainMenuTitle;
		return View::make('frontipostatistics',array(
				'page' => $page,
				'pageTitle' => $pageTitle,
				'masthead' => $masthead,
				'breadcrumbs' => $breadcrumbs,
				'tagLine' => $tagLine,
				'metaTitle' => $metaTitle

			)
		);
	}

	/**
	 * private function which handles data retrieval
	 * from the database by taking the category
	 * type as arguments. Further it also filters data
	 * as per the from and to date chosen.
	 */
	private function getData($category)
	{
		if((!empty($_REQUEST['dateFrom'])) && (!empty($_REQUEST['dateTo'])))
		{
			$announcements = Announcement::where('category', 'LIKE', "%" . $category . "%")
				->where('created_at','>=',date('Y-m-d',strtotime($_REQUEST['dateFrom'])))
				->where('created_at','<=',date('Y-m-d',strtotime($_REQUEST['dateTo'])))
				->where('status','=',1)
				->where('active','=',1)
				->get();
		}
		else if(!empty($_REQUEST['from_year']))
		{
			$announcements = Announcement::where('category', 'LIKE', "%" . $category . "%")
				->where('created_at','>=',date('Y-m-d',strtotime($_REQUEST['dateFrom'])))
				->where('created_at','>=',date('Y-m-d',strtotime($_REQUEST['from_year'])))
				->where('created_at','<=',date('Y-m-d',strtotime($_REQUEST['to_year'])))
				->where('status','=',1)
				->where('active','=',1)
				->get();
		}
		else
		{
			$announcements = Announcement::where('category', 'LIKE', "%" . $category . "%")
				->where('status','=',1)
				->where('active','=',1)
				->get();
		}

		return $announcements;
	}

	public function frontEntitlement()
	{
		$page = Page::where('type','=','entitlement')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$announcements = $this->getData('Entitlement');

		$breadcrumbs = $this->breadcrumbs + [
			['title' => 'Entitlementments Summary', 'url' => '/investorrelations/frontentitlement']
		];
		return View::make('frontentitlement', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function frontEntitlementDetail($id)
	{
		$announcement = Announcement::find($id);

		$page = Page::where('type','=','entitlement')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
			['title' => 'Entitlementments Summary', 'url' => '/investorrelations/frontentitlement'],
			['title' => $announcement->title, 'url' => '/investorrelations/frontentitlementdetail/' . $announcement->id]
		];

		return View::make('frontentitlementdetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function frontInvestorAlert()
	{
		$page = Page::where('type','=','investoralert')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
			['title' => 'Investor Alert', 'url' => '/investorrelations/frontinvestoralert/']
		];
		if((!empty($_REQUEST['dDateFrom'])) && (!empty($_REQUEST['dDateTo'])))
		{
			$investoralert = Announcement::where('category','=','Investor Alert')
				->where('created_at','>=',date('Y-m-d',strtotime($_REQUEST['dDateFrom'])))
				->where('created_at','<=',date('Y-m-d',strtotime($_REQUEST['dDateTo'])))
				->where('status','=',1)
				->where('active','=',1)
				->get();

		}
		else if(!empty($_REQUEST['from_year']))
		{
			$investoralert = Announcement::where('category','=','Investor Alert')
				->where('created_at','>=',date('Y-m-d',strtotime($_REQUEST['from_year'])))
				->where('created_at','<=',date('Y-m-d',strtotime($_REQUEST['to_year'])))
				->where('status','=',1)
				->where('active','=',1)
				->get();
		}
		else{
			$investoralert = Announcement::where('category','=','Investor Alert')
				->where('status','=',1)
				->where('active','=',1)
				->get();
		}

		return View::make('frontinvestoralert',array(
			'investoralert'	=> $investoralert,
			'breadcrumbs'	=> $breadcrumbs,
			'pageTitle'		=> $pageTitle
		));
	}

	public function frontAdditionallisting()
	{
		$page = Page::where('type','=','newscenter')->where('published','=',1)->get();
		if((!empty($_REQUEST['dDateFrom'])) && (!empty($_REQUEST['dDateTo']))){
			$announcelists =Announcement::where('category','LIKE','%Additional Listing%')->where('created_at','>=',date('Y-m-d',strtotime($_REQUEST['dDateFrom'])))->where('created_at','<=',date('Y-m-d',strtotime($_REQUEST['dDateTo'])))->where('status','=',1)->where('active','=',1)->get();

		}else if(!empty($_REQUEST['from_year'])){
			$announcelists =Announcement::where('category','LIKE','%Additional Listing%')->where('created_at','>=',date('Y-m-d',strtotime($_REQUEST['from_year'])))->where('created_at','<=',date('Y-m-d',strtotime($_REQUEST['to_year'])))->where('status','=',1)->where('active','=',1)->get();
		}
		else{
			$announcelists = Announcement::where('category','LIKE','%Additional Listing%')->where('status','=',1)->where('active','=',1)->get();

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
				"title" => "Additional Listing Announcement",
				"url" => ""
			)

		);
		$tagLine = "";
		$mainMenuTitle = $page[0]->page_title;

		return View::make('frontadditionallisting',array(
				'page' => $page,
				'pageTitle' => $pageTitle,
				'masthead' => $masthead,
				'breadcrumbs' => $breadcrumbs,
				'tagLine' => $tagLine,
				'announcelists' => $announcelists
			)
		);
	}

	public function frontAdditionallistingdetail($listing_id){
		$page = Page::where('type','=','newscenter')->where('published','=',1)->get();
		$announcement = Announcement::where('id','=',$listing_id)->get();
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
				"url" => "/investorrelations/frontadditionallisting"
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

		//return View::make('frontadditionallistingdetail');
	}

	public function frontlistingcircular()
	{
		$announcements = $this->getData('Listing Circular');
		$page = Page::where('type','=','circularreports')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
			['title' => 'Listing Circulars', 'url' => '/investorrelations/frontlistingcircular']
		];
		return View::make('frontlistingcircular', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function frontlistingcirculardetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','circularreports')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
			['title' => 'Listing Circulars', 'url' => '/investorrelations/frontlistingcircular'],
			['title' => $announcement->title, 'url' => '']
		];
		return View::make('frontlistingcirculardetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function frontTradingright()
	{
		$announcements = $this->getData('Trading Right');
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
			['title' => 'Trading of Rights Announcement', 'url' => '/investorrelations/fronttradingright'],
		];
		return View::make('frontTradingright', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function frontfinanciallisting()
	{
		$announcements = $this->getData('Financial Result');
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
			['title' => 'Financial Results', 'url' => '/investorrelations/frontfinanciallisting']
		];
		return View::make('frontfinanciallisting', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function frontfinanciallistingdetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
			['title' => 'Financial Results', 'url' => '/investorrelations/frontfinanciallisting'],
			['title' => $announcement->title, 'url' => '']
		];
		return View::make('frontfinanciallistingdetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function frontgeneralannouncementlisting()
	{
		$announcements = $this->getData('General Announcement');
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'General Announcement', 'url' => '/investorrelations/frontgeneralannouncementlisting']
			];
		return View::make('frontgeneralannouncementlisting', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function frontgeneralannouncementdetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'General Announcement', 'url' => '/investorrelations/frontgeneralannouncementlisting'],
				['title' => $announcement->title, 'url' => '']
			];
		return View::make('frontgeneralannouncementdetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function frontgeneralmeetinglisting()
	{
		$announcements = $this->getData('General Meeting');
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'General Meetings', 'url' => '/investorrelations/frontgeneralmeetinglisting']
			];
		return View::make('frontgeneralmeetinglisting', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function frontgeneralmeetingdetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'General Meetings', 'url' => '/investorrelations/frontgeneralmeetinglisting'],
				['title' => $announcement->title, 'url' => '']
			];
		return View::make('frontgeneralmeetingdetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function frontspecialannouncementlisting()
	{
		$announcements = $this->getData('Special announcement');
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Special Announcements', 'url' => '/investorrelations/frontspecialannouncementlisting']
			];
		return View::make('frontspecialannouncementlisting', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function frontspecialannouncementdetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Special Announcements', 'url' => '/investorrelations/frontspecialannouncementlisting'],
				['title' => $announcement->title, 'url' => '']
			];
		return View::make('frontspecialannouncementdetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function frontdirectorinterest()
	{
		$announcements = $this->getData("Changes in Director's Interest");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Changes in Director\'s Interest (S135)', 'url' => '/investorrelations/directorinterest']
			];
		return View::make('frontdirectorinterest', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function frontdirectorinterestdetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Changes in Director\'s Interest (S135)', 'url' => '/investorrelations/directorinterest'],
				['title' => $announcement->title, 'url' => '']
			];
		return View::make('frontdirectorinterestdetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function frontshareholderinterest()
	{
		$announcements = $this->getData("Changes in Substantial Shareholder's Interest");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Changes in Substantial Shareholder\'s Interest (29B)', 'url' => '/investorrelations/shareholderinterest'],
			];
		return View::make('frontshareholderinterest', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function frontshareholderdetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Changes in Substantial Shareholder\'s Interest (29B)', 'url' => '/investorrelations/shareholderinterest'],
				['title' => $announcement->title, 'url' => ''],
			];
		return View::make('frontshareholderdetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function frontinterestshareholderlist()
	{
		$announcements = $this->getData("Notice of Interest of Substantial Shareholder");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Notice of Interest Substantial Shareholder (29A)', 'url' => '/investorrelations/interestshareholderlist'],
			];
		return View::make('frontinterestshareholderlist', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function frontinterestshareholderdetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Notice of Interest Substantial Shareholder (29A)', 'url' => '/investorrelations/interestshareholderlist'],
				['title' => $announcement->title, 'url' => ''],
			];
		return View::make('frontinterestshareholderdetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function frontpersonceasing()
	{
		$announcements = $this->getData("Notice of Person Ceasing");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Notice of Person Ceasing (29C)', 'url' => '/investorrelations/personceasing']
			];
		return View::make('frontpersonceasing', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function auditcommittee()
	{
		$announcements = $this->getData("Change in Audit Committee");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Changes in Audit Committee', 'url' => '/investorrelations/auditcommittee']
			];
		return View::make('auditcommittee', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function auditcommitteedetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Changes in Audit Committee', 'url' => '/investorrelations/auditcommittee'],
				['title' => $announcement->title, 'url' => '']
			];
		return View::make('auditcommitteedetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function boardroom()
	{
		$announcements = $this->getData("Change in Boardroom");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Change in Boardroom', 'url' => '/investorrelations/boardroom'],
			];
		return View::make('boardroom', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function boardroomdetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Change in Boardroom', 'url' => '/investorrelations/boardroom'],
				['title' => $announcement->title, 'url' => ''],
			];
		return View::make('boardroomdetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function chiefexecutiveofficer()
	{
		$announcements = $this->getData("Change in Chief Executive Officer");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Change in Chief Executive Officer', 'url' => '/investorrelations/chiefexecutiveofficer'],
			];
		return View::make('chiefexecutiveofficer', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function principalofficer()
	{
		$announcements = $this->getData("Change in Principal Officer");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Change in Principal Officer', 'url' => '/investorrelations/principalofficer'],
			];
		return View::make('principalofficer', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function principalofficerdetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Change in Principal Officer', 'url' => '/investorrelations/principalofficer'],
				['title' => $announcement->title, 'url' => ''],
			];
		return View::make('principalofficerdetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function addresslisting()
	{
		$announcements = $this->getData("Change of Address");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Change of address', 'url' => '/investorrelations/addresslisting'],
			];
		return View::make('addresslisting', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function addressdetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Change of address', 'url' => '/investorrelations/addresslisting'],
				['title' => $announcement->title, 'url' => ''],
			];
		return View::make('addressdetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function compsectretarylisting()
	{
		$announcements = $this->getData("Change of Company Secretary");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Change of Company Secretary', 'url' => '/investorrelations/compsectretarylisting'],
			];
		return View::make('compsectretarylisting', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function registrarlist()
	{
		$announcements = $this->getData("Change of Registrar");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Change of Registrar', 'url' => '/investorrelations/registrarlist'],
			];
		return View::make('registrarlist', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function registrardetail($id)
	{
		$announcement = Announcement::find($id);
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Change of Registrar', 'url' => '/investorrelations/registrarlist'],
				['title' => $announcement->title, 'url' => ''],
			];
		return View::make('registrardetail', compact('announcement', 'breadcrumbs', 'pageTitle'));
	}

	public function resale()
	{
		$announcements = $this->getData("Notice of Resale");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Notice of Resale/Cancellation of Treasury Share - Immediate Announcement', 'url' => '/investorrelations/resale'],
			];
		return View::make('resale', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function immediateannouncement()
	{
		$announcements = $this->getData("Notice of Shares Buy Back%Immediate Announcement");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Notice of Shares Buy Back - Immediate Announcement', 'url' => '/investorrelations/immediateannouncement'],
			];
		return View::make('immediateannouncement', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function companypursuant()
	{
		$announcements = $this->getData("Notice of Shares Buy Back%Form 28A");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Notice of Shares Buy Back by a Company Pursuant to Form 28A', 'url' => '/investorrelations/companypursuant'],
			];
		return View::make('companypursuant', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function sharecompanypursuant()
	{
		$announcements = $this->getData("Notice of Shares Buy Back%Form 28B");
		$page = Page::where('type','=','newscenter')->where('published','=',1)->first();
		$pageTitle = $page->page_title;

		$breadcrumbs = $this->breadcrumbs + [
				['title' => 'Notice of Shares Buy Back by a Company Pursuant to Form 28B', 'url' => '/investorrelations/sharecompanypursuant'],
			];
		return View::make('sharecompanypursuant', compact('announcements', 'breadcrumbs', 'pageTitle'));
	}

	public function frontIpoCompetitiveAdvantage() {

		$page = Page::where('type','=','ipocompetitive')->where('published','=',1)->get();
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
				"title" => "IPO Centre",
				"url" => ""
			),
			3 => array
			(
				"title" => "Competitive Advantages",
				"url" => ""
			)

		);
		$tagLine = "Full Turnkey Solutions for Telecom Client.";
		$mainMenuTitle = $page[0]->page_title;
		$metaTitle = $mainMenuTitle;
		return View::make('frontcompetitiveadvantage',array(
				'page' => $page,
				'pageTitle' => $pageTitle,
				'masthead' => $masthead,
				'breadcrumbs' => $breadcrumbs,
				'tagLine' => $tagLine,
				'metaTitle' => $metaTitle

			)
		);
	}

	public function frontIpoRiskFactors() {

		$page = Page::where('type','=','iporiskfactors')->where('published','=',1)->get();
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
				"title" => "IPO Centre",
				"url" => ""
			),
			3 => array
			(
				"title" => "Risk Factors",
				"url" => ""
			)

		);
		$tagLine = "Full Turnkey Solutions for Telecom Client.";
		$mainMenuTitle = $page[0]->page_title;
		$metaTitle = $mainMenuTitle;
		return View::make('frontiporiskfactors',array(
				'page' => $page,
				'pageTitle' => $pageTitle,
				'masthead' => $masthead,
				'breadcrumbs' => $breadcrumbs,
				'tagLine' => $tagLine,
				'metaTitle' => $metaTitle

			)
		);
	}

	public function frontIpoUtilisationProceeds() {

		$page = Page::where('type','=','ipoutilisationproceeds')->where('published','=',1)->get();
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
				"title" => "IPO Centre",
				"url" => ""
			),
			3 => array
			(
				"title" => "Utilisation of Proceeds",
				"url" => ""
			)

		);
		$tagLine = "Full Turnkey Solutions for Telecom Client.";
		$mainMenuTitle = $page[0]->page_title;
		$metaTitle = $mainMenuTitle;
		return View::make('frontipoutilisationproceeds',array(
				'page' => $page,
				'pageTitle' => $pageTitle,
				'masthead' => $masthead,
				'breadcrumbs' => $breadcrumbs,
				'tagLine' => $tagLine,
				'metaTitle' => $metaTitle

			)
		);
	}

	public function frontIpoIndustryOverview() {

		$page = Page::where('type','=','ipoindustryoverview')->where('published','=',1)->get();
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
				"title" => "IPO Centre",
				"url" => ""
			),
			3 => array
			(
				"title" => "Industry Overview",
				"url" => ""
			)

		);
		$tagLine = "Full Turnkey Solutions for Telecom Client.";
		$mainMenuTitle = $page[0]->page_title;
		$metaTitle = $mainMenuTitle;
		return View::make('frontipoindustryoverview',array(
				'page' => $page,
				'pageTitle' => $pageTitle,
				'masthead' => $masthead,
				'breadcrumbs' => $breadcrumbs,
				'tagLine' => $tagLine,
				'metaTitle' => $metaTitle

			)
		);
	}

	public function frontEntitlements() {

		$page = Page::where('type','=','entitlements')->where('published','=',1)->get();
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
				"title" => "IPO Centre",
				"url" => ""
			),
			3 => array
			(
				"title" => "Entitlements",
				"url" => ""
			)

		);
		$tagLine = "Full Turnkey Solutions for Telecom Client.";
		$mainMenuTitle = $page[0]->page_title;
		$metaTitle = $mainMenuTitle;
		return View::make('frontentitlements',array(
				'page' => $page,
				'pageTitle' => $pageTitle,
				'masthead' => $masthead,
				'breadcrumbs' => $breadcrumbs,
				'tagLine' => $tagLine,
				'metaTitle' => $metaTitle

			)
		);
	}

	/* End of Front Functions */
}

