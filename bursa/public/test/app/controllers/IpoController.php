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
          
          $frontEntitlement = Announcement::where('category','=','Entitlements (Notice of Book Closure)')->where('status','=',1)->where('active','=',1)->get();
          //dd($frontEntitlement);
         
          return View::make('frontentitlement',array('frontEntitlement' => $frontEntitlement,
                                                      'breadcrumbs' => $breadcrumbs
                                                      ));
		      
          
}
        
         public function frontEntitlementDetail($id){

          $entitlementdetail = Announcement::findorFail($id);
          //dd($entitlementdetail);
          return View::make('frontentitlementdetail', array('entitlementdetail' => $entitlementdetail));
}
         public function frontInvestorAlert(){ 
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
                                                   "title" => "BursaAnnouncements",
                                                   "url" => ""
                                                ),
                                    4 => array 
                                                (
                                                  "title" => "Investor Alert",
                                                  "url" => "" 
                                                )           
                                   
                                    );
		$investoralert = Announcement::where('category','=','Investor Alert')->where('status','=',1)->where('active','=',1)->get();
		 
		  
		
        return View::make('frontinvestoralert',array(
		'investoralert'=>$investoralert,
    'breadcrumbs' => $breadcrumbs
		));
}
        public function frontAdditionallisting(){

        $frontAdditionallisting = Announcement::where('category','=','Additional Listing Announcement (ALA)')->where('status','=',1)->where('active','=',1)->get();
        //dd($frontadditionallisting);
        return View::make('frontadditionallisting', array('frontAdditionallisting' => $frontAdditionallisting));
}
       public function frontAdditionallistingdetail($id){
         $frontadditionaldetail = Announcement::findorFail($id);
        return View::make('frontadditionallistingdetail',array('frontadditionaldetail' => $frontadditionaldetail));
}
      public function frontlistingcircular(){

        $frontListingCircular = Announcement::where('category','=','Listing Circular')->where('status','=',1)->where('active','=',1)->get();
        //dd($frontadditionallisting);
        return View::make('frontlistingcircular', array('frontListingCircular' => $frontListingCircular));
      
}
      public function frontlistingcirculardetail(){
        return View::make('frontlistingcirculardetail');
}
      public function frontTradingright(){
        $Tradingright = Announcement::where('category','=','Trading Right')->where('status','=',1)->where('active','=',1)->get();
        //dd($frontadditionallisting);
        return View::make('frontTradingright', array('TradingRight' => $Tradingright));
        }
        public function frontfinanciallisting(){
          $FinancialResult = Announcement::where('category','=','Financial Results')->where('status','=',1)->where('active','=',1)->get();
        //dd($frontadditionallisting);
        return View::make('frontfinanciallisting', array('FinancialResult' => $FinancialResult));
        
}
public function frontfinanciallistingdetail(){
        return View::make('frontfinanciallistingdetail');
}

public function frontgeneralannouncementlisting(){
  $GeneralAnnouncement = Announcement::where('category','=','General Announcement')->where('status','=',1)->where('active','=',1)->get();
        //dd($frontadditionallisting);
  return View::make('frontgeneralannouncementlisting', array('GeneralAnnouncement' => $GeneralAnnouncement));
}

public function frontgeneralannouncementdetail(){
        return View::make('frontgeneralannouncementdetail');
}
public function frontgeneralmeetinglisting(){

  $GeneralMeeting = Announcement::where('category','=','General Meeting')->where('status','=',1)->where('active','=',1)->get();
        //dd($frontadditionallisting);
  return View::make('frontgeneralmeetinglisting', array('GeneralMeeting' => $GeneralMeeting));
}
public function frontgeneralmeetingdetail(){

        return View::make('frontgeneralmeetingdetail');
}
public function frontspecialannouncementlisting(){
        $SpecialAnnouncement = Announcement::where('category','=','Special Announcement')->where('status','=',1)->where('active','=',1)->get();
        //dd($frontadditionallisting);
  return View::make('frontspecialannouncementlisting', array('GeneralAnnouncement' => $SpecialAnnouncement));
}
public function frontspecialannouncementdetail(){

        return View::make('frontspecialannouncementdetail');
}
public function frontdirectorinterestdetail(){
  
        return View::make('frontdirectorinterestdetail');
}
public function frontdirectorinterest(){
   $DirectorInterest = Announcement::where('category','=','Changes in Director\'s Interest Pursuant to Section 135 of the Companies Act. 1965')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
  return View::make('frontdirectorinterest', array('DirectorInterest' => $DirectorInterest));
        
}
public function frontshareholderinterest(){
$ShareHolderInterest = Announcement::where('category','=','Changes in Substantial Shareholder\'s Interest Pursuant to Form 29B of the Companies Act. 1965')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('frontshareholderinterest', array('ShareHolderInterest' => $ShareHolderInterest));
        
}
public function frontshareholderdetail(){

        return View::make('frontshareholderdetail');
}
public function frontinterestshareholderlist(){
$ShareHolderInterestA = Announcement::where('category','=','Changes in Substantial Shareholder\'s Interest Pursuant to Form 29A of the Companies Act. 1965')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('frontinterestshareholderlist', array('ShareHolderInterestA' => $ShareHolderInterestA));
        
}
public function frontinterestshareholderdetail(){

        return View::make('frontinterestshareholderdetail');
}
public function frontpersonceasing(){
  // Category Not defined in the database so have assumed 'Person Ceasing' Temporarily
$PersonCeasing = Announcement::where('category','=','Person Ceasing')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('frontpersonceasing', array('PersonCeasing' => $PersonCeasing));
}
public function auditcommittee(){
 // Category Not defined in the database so have assumed 'Change in Audit Committee' Temporarily
$AuditCommittee = Announcement::where('category','=','Change in Audit Committee')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('auditcommitee', array('AuditCommittee' => $AuditCommittee ));
        
}
public function auditcommitteedetail(){

        return View::make('auditcommitteedetail');
}
public function boardroom(){
  // Category Not defined in the database so have assumed 'Change in Boardroom' Temporarily
    $Boardroom = Announcement::where('category','=','Change in Boardroom')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('boardroom', array('Boardroom' => $Boardroom ));
}
public function boardroomdetail(){

        return View::make('boardroomdetail');
}
public function chiefexecutiveofficer(){
// Category Not defined in the database so have assumed 'Change in CEO' Temporarily
    $CEO = Announcement::where('category','=','Change in CEO')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('chiefexecutiveofficer', array('CEO' => $CEO ));
        
}
public function principalofficer(){
  // Category Not defined in the database so have assumed 'Change in principal officer' Temporarily
$principalofficer = Announcement::where('category','=','Change in Principal Officer')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('principalofficer', array('principalofficer ' => $principalofficer  ));
        
}
public function principalofficerdetail(){

        return View::make('principalofficerdetail');
}
public function addresslisting(){
          // Category Not defined in the database so have assumed 'Change in Address' Temporarily
$Address = Announcement::where('category','=','Change of Address')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('addresslisting', array('Address' => $Address));
        
}
public function addressdetail(){

        return View::make('addressdetail');
}
public function compsectretarylisting(){
           // Category Not defined in the database so have assumed 'Change in Address' Temporarily
$Secretary = Announcement::where('category','=','Change of Secretary')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('compsecretarylisting', array('Secretary' => $Secretary));
}
public function registrarlist(){

          // Category Not defined in the database so have assumed 'Change in Address' Temporarily
$Registrar = Announcement::where('category','=','Change of Registrar')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('registrarlist', array('Registrar' => $Registrar));
        
}
public function registrardetail(){

        return View::make('registrardetail');
}
public function resale(){
                // Category Not defined in the database so have assumed 'Change in Address' Temporarily
$Resale = Announcement::where('category','=','Resale of Shares')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('resale', array('Resale' => $Resale));
}
public function immediateannouncement(){
  $ImmediateBuyBack = Announcement::where('category','=','Buy Back of Shares Immediate')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('immediateannouncement', array('ImmediateBuyBack' => $ImmediateBuyBack));
}
public function companypursuant(){
$BuyBackA = Announcement::where('category','=','Buy Back of Shares By Company Persuant 28A')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('companypursuant', array('BuyBackA' => $BuyBackA));
        
}
public function sharecompanypursuant(){
$BuyBackB = Announcement::where('category','=','Buy Back of Shares By Company Persuant 28B')->where('status','=',1)->where('active','=',1)->get();
        //dd($DirectorInterest);
return View::make('sharecompanypursuant', array('BuyBackB' => $BuyBackB));
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

