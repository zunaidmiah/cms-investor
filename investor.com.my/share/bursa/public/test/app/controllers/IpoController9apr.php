<?php

class IpoController extends BaseController {

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
		public function Entitlement() {
            
               $page = Page::where('type','=','entitlement')->where('published','=',1)->get();
			   
		        return View::make('adminentitlement',array(
                                                   'page' => $page
                                                    )
                                 );
             
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
         public function frontEntitlement(){
		 
        return View::make('frontentitlement');
}
        
         public function frontEntitlementDetail(){
        return View::make('frontentitlementdetail');
}
         public function frontInvestorAlert(){ 
		  if((!empty($_REQUEST['dDateFrom'])) && (!empty($_REQUEST['dDateTo']))){
		   $investoralert =Announcement::where('category','=','Investor Alert')->where('created_at','>=',date('Y-m-d',strtotime($_REQUEST['dDateFrom'])))->where('created_at','<=',date('Y-m-d',strtotime($_REQUEST['dDateTo'])))->where('status','=',1)->where('active','=',1)->get();
		  
		  }else if(!empty($_REQUEST['from_year'])){
		  $investoralert =Announcement::where('category','=','Investor Alert')->where('created_at','>=',date('Y-m-d',strtotime($_REQUEST['from_year'])))->where('created_at','<=',date('Y-m-d',strtotime($_REQUEST['to_year'])))->where('status','=',1)->where('active','=',1)->get();
		  }
		  else{
		$investoralert = Announcement::where('category','=','Investor Alert')->where('status','=',1)->where('active','=',1)->get();
		 
		  }
		
        return View::make('frontinvestoralert',array(
		'investoralert'=>$investoralert
		));
}
        public function frontAdditionallisting(){
        return View::make('frontadditionallisting');
}
       public function frontAdditionallistingdetail(){
        return View::make('frontadditionallistingdetail');
}
      public function frontlistingcircular(){
        return View::make('frontlistingcircular');
}public function frontlistingcirculardetail(){
        return View::make('frontlistingcirculardetail');
}public function frontTradingright(){
        return View::make('frontTradingright');
}public function frontfinanciallisting(){
        return View::make('frontfinanciallisting');
}public function frontfinanciallistingdetail(){
        return View::make('frontfinanciallistingdetail');
}public function frontgeneralannouncementlisting(){
        return View::make('frontgeneralannouncementlisting');
}public function frontgeneralannouncementdetail(){
        return View::make('frontgeneralannouncementdetail');
}public function frontgeneralmeetinglisting(){
        return View::make('frontgeneralmeetinglisting');
}public function frontgeneralmeetingdetail(){
        return View::make('frontgeneralmeetingdetail');
}public function frontspecialannouncementlisting(){
        
        return View::make('frontspecialannouncementlisting');
}public function frontspecialannouncementdetail(){

        return View::make('frontspecialannouncementdetail');
}
public function frontdirectorinterestdetail(){

        return View::make('frontdirectorinterestdetail');
}
public function frontdirectorinterest(){

        return View::make('frontdirectorinterest');
}
public function frontshareholderinterest(){

        return View::make('frontshareholderinterest');
}
public function frontshareholderdetail(){

        return View::make('frontshareholderdetail');
}
public function frontinterestshareholderlist(){

        return View::make('frontinterestshareholderlist');
}
public function frontinterestshareholderdetail(){

        return View::make('frontinterestshareholderdetail');
}
public function frontpersonceasing(){

        return View::make('frontpersonceasing');
}
public function auditcommittee(){

        return View::make('auditcommittee');
}
public function auditcommitteedetail(){

        return View::make('auditcommitteedetail');
}
public function boardroom(){

        return View::make('boardroom');
}
public function boardroomdetail(){

        return View::make('boardroomdetail');
}
public function chiefexecutiveofficer(){

        return View::make('chiefexecutiveofficer');
}
public function principalofficer(){

        return View::make('principalofficer');
}
public function principalofficerdetail(){

        return View::make('principalofficerdetail');
}
public function addresslisting(){

        return View::make('addresslisting');
}
public function addressdetail(){

        return View::make('addressdetail');
}
public function compsectretarylisting(){

        return View::make('compsectretarylisting');
}
public function registrarlist(){

        return View::make('registrarlist');
}
public function registrardetail(){

        return View::make('registrardetail');
}
public function resale(){

        return View::make('resale');
}
public function immediateannouncement(){

        return View::make('immediateannouncement');
}
public function companypursuant(){

        return View::make('companypursuant');
}
public function sharecompanypursuant(){

        return View::make('sharecompanypursuant');
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

