<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* Route::get('/', function()
{
	return View::make('hello');
});
*/

Route::group(["before" => "auth"], function ()
{
Route::get('admin/userslist','UserController@listUsers',array('before' => 'auth'));
//new routing for bursa project
Route::get('admin/general', 'CorporateController@General');
Route::get('admin/dirprofile', 'CorporateController@DirProfile');
Route::post('admin/dirprofileadd', 'CorporateController@DirProfileAdd');
Route::post('admin/dirprofiledelete', 'CorporateController@DirProfileDelete');
Route::post('admin/dirprofiledeleteall', 'CorporateController@DirProfileDeleteAll');
Route::post('admin/page/dirprodeletemultiple', 'PageController@DirProDeleteMultiple');
Route::post('admin/dirprofileedit', 'CorporateController@DirProfileEdit');
Route::get('admin/keymanagement', 'CorporateController@KeyManagemenProfile');
Route::get('admin/ourproperties', 'CorporateController@OurProperties');
Route::get('admin/oursubsidiaries', 'CorporateController@OurSubsidiaries');
Route::post('admin/oursubsidiariesadd', 'CorporateController@OurSubsidiariesAdd');
Route::post('admin/deleteallpdf', 'CorporateController@DeleteAllPdf');
Route::post('admin/pdfsingledelete', 'CorporateController@PdfSingleDelete');
Route::post('admin/pdfedit', 'CorporateController@PdfEdit');
Route::post('admin/page/pdfdeletemultiple', 'PageController@PdfDeleteMultiple');
Route::post('admin/page/reportsdeletemultiple', 'PageController@ReportsDeleteMultiple');
Route::post('admin/page/investoralertsdeletemultiple', 'CorporateController@CorporateDeleteMultiple');
Route::get('admin/corpgovernance', 'CorporateController@CorpGovernance');
Route::get('admin/ipostatistics', 'IpoController@IpoStatistics');
Route::get('admin/ipocompetitive', 'IpoController@IpoCompetitive');
Route::get('admin/iporiskfactors', 'IpoController@IpoRiskFactors');
Route::get('admin/ipoutilisationproceeds', 'IpoController@IpoUtilisationProceeds');
Route::get('admin/ipoindustryoverview', 'IpoController@IpoIndustryOverview');
Route::get('admin/entitlements', 'IpoController@Entitlements');
Route::get('admin/entitlement', 'IpoController@Entitlement');
Route::get('admin/financialhighlights', 'CorporateController@FinancialHighlights');
Route::get('admin/financialcomprehensive', 'CorporateController@FinancialComprehensive');
Route::get('admin/financialposition', 'CorporateController@FinancialPosition');
Route::get('admin/flowstatements', 'CorporateController@FlowStatements');
Route::get('admin/equity', 'CorporateController@Equity');
Route::get('admin/financialquarterlyreport', 'CorporateController@FinancialQuarterlyReport');
Route::get('admin/financialinfosegmentalanalysis', 'CorporateController@FinancialInfoSegmentalAnalysis');
Route::get('admin/financialratioanalysis', 'CorporateController@FinancialRatioAnalysis');
Route::get('admin/managementchairmansstatement', 'CorporateController@ManagementChairmansStat');
Route::get('admin/managementreviewoperations', 'CorporateController@ManagementReviewOperations');
Route::get('admin/managementpastperformancereview', 'CorporateController@ManagementPastPerformanceReview');
Route::get('admin/newscenter', 'CorporateController@NewsCenter');
Route::get('admin/investoralert', 'CorporateController@InvestorAlert');
Route::get('admin/additionallisting', 'CorporateController@AdditionalListing');
Route::get('admin/listingcircular', 'CorporateController@ListingCircular');
Route::get('admin/financialresult', 'CorporateController@FinancialResult');
Route::get('admin/generalannouncement', 'CorporateController@GeneralAnnouncement');
Route::get('admin/financialresultlisting', 'CorporateController@FinancialResultlisting');
Route::get('admin/generalmeeting', 'CorporateController@GeneralMeeting');
Route::get('admin/specialannouncement', 'CorporateController@SpecialAnnouncement');
Route::get('admin/directorinterest', 'CorporateController@DirectorInterest');
Route::get('admin/shareholderinterest', 'CorporateController@ShareholderInterest');
Route::get('admin/interestsubstanial', 'CorporateController@InterestSubstanial');
Route::get('admin/personceasing', 'CorporateController@PersonCeasing');
Route::get('admin/auditcommittee', 'CorporateController@AuditCommittee');
Route::get('admin/boardroom', 'CorporateController@BoardRoom');
Route::get('admin/chiefexecutive', 'CorporateController@ChiefExecutive');
Route::get('admin/principalofficer', 'CorporateController@PrincipalOfficer');
Route::get('admin/address', 'CorporateController@Address');
Route::get('admin/companysecretary', 'CorporateController@CompanySecretary');
Route::get('admin/registrar', 'CorporateController@Registrar');
Route::get('admin/treasury', 'CorporateController@Treasury');
Route::get('admin/shareimmediate', 'CorporateController@ShareImmediate');
Route::get('admin/sharepursuant', 'CorporateController@SharePursuant');
Route::get('admin/sharecompanypursuant', 'CorporateController@ShareCompanypursuant');
Route::post('admin/inverstoralert/saveinverstor', 'CorporateController@saveInvestor');  
Route::post('admin/inverstoralert/saveAdditional', 'CorporateController@saveAdditional');  
Route::post('admin/inverstoralert/saveCircular', 'CorporateController@saveCircular');  
Route::post('admin/inverstoralert/saveFinancial', 'CorporateController@saveFinancial');  
Route::post('admin/inverstoralert/saveGeneralAnnouncement', 'CorporateController@saveGeneralAnnouncement');  
Route::get('admin/annualreports', 'ReportsController@AnnualReports'); 
Route::post('admin/add', 'ReportsController@Add');
Route::post('admin/edit', 'ReportsController@Edit');
Route::post('admin/editinvestoralert', 'CorporateController@Editinvestoralert');   
Route::post('admin/deleteall', 'ReportsController@DeleteAll');
Route::post('admin/deleteallinvestoralert', 'CorporateController@DeleteAllInvestor');
Route::post('admin/singledelete', 'ReportsController@SingleDelete');
Route::post('admin/singledeleteinvestor', 'CorporateController@SingleDeleteInvestor');
Route::get('admin/annualaudit', 'ReportsController@AnnualAudit');
Route::get('admin/quarterlyreports', 'ReportsController@QuarterlyReports');
Route::get('admin/circularreports', 'ReportsController@CircularReports');
Route::get('admin/prospectusarreports', 'ReportsController@ProspectusarReports');
Route::get('admin/analystreports', 'ReportsController@AnalystReports');
Route::get('admin/newsalert', 'ReportsController@NewsAlert');
Route::post('admin/addnewsalert', 'ReportsController@AddNewsAlert');
Route::post('admin/deleteallnewsalerts', 'ReportsController@DeleteAllNewsAlerts');
Route::post('admin/page/newsalertdeletemultiple', 'PageController@NewsAlertDeleteMultiple');
Route::post('admin/editnewsalert', 'ReportsController@EditNewsAlert');
Route::post('admin/newsalertsingledelete', 'ReportsController@NewsAlertSingleDelete');
Route::get('admin/evencalendar', 'EventsController@EventsHome');
Route::post('admin/eventadd', 'EventsController@Add');
Route::post('admin/eventedit', 'EventsController@Edit');
Route::post('admin/eventdeleteall', 'EventsController@DeleteAll');
Route::post('admin/eventsingledelete', 'EventsController@SingleDelete');
Route::post('admin/eventmultipledelete', 'PageController@EventsDeleteMultiple');
Route::get('admin/priceticker', 'StockController@PriceTicker');
Route::resource('admin/priceandvolume', 'StockController@PriceAndVolume');
Route::get('admin/shareholding', 'StockController@Shareholding');
Route::get('admin/shareholderslist', 'StockController@ShareholdersList');
Route::get('admin/topshareholders', 'StockController@TopShareholders');
Route::post('admin/addtopshareholders', 'StockController@AddTopShareholders');
Route::post('admin/edittopshareholders', 'StockController@EditTopShareholders');
Route::post('admin/deletealltopshareholders', 'StockController@DeleteAllTopShareholders');
Route::post('admin/singledeletetopshareholders', 'StockController@SingleDeleteTopShareholders');
Route::post('admin/page/shareholdersdeletemultiple', 'PageController@ShareHoldersDeleteMultiple');
/////////////////////////////////////////
Route::post('admin/deleteallusers','UserController@userDeleteAll');
Route::post('admin/deletesingleuser','UserController@adminDeleteUser');
Route::get('admin/dashboard','AdminController@dashboard');
Route::get('admin/index','AdminController@adminindex');
Route::get('admin/vaccancies', 'Career1Controller@vaccancyIndex');
Route::get('admin/applicants', 'Career1Controller@applicantsListing');
Route::get('admin/manufacturing/packaging/canpac','ManufacturingController@packagingCanpac');
Route::get('admin/manufacturing/packaging/southeast','ManufacturingController@packagingSoutheast');
Route::get('admin/manufacturing/palmoil/refinery','ManufacturingController@palmoilRefinery');
Route::get('admin/manufacturing/palmoil/mill','ManufacturingController@palmoilMill');
Route::get('admin/trading/yeelee', 'TradingController@tradingAdminYelee');
Route::post('admin/trading/admindeletebanner', 'TradingController@adminDeleteBanner');
Route::post('admin/trading/admindeletebrand', 'TradingController@adminDeleteBrand');
Route::post('admin/trading/admindeleteallbanner', 'TradingController@adminDeleteAllBanner');
Route::post('admin/trading/admindeleteallbrands', 'TradingController@adminDeleteAllBrands');
Route::get('admin/investor/pressrelease', 'PressreleaseController@adminPressrelease');
Route::post('admin/index/addbanner', 'AdminController@addBanner');
Route::post('admin/index/editbanner', 'AdminController@editBanner');
Route::post('admin/index/deletebanner', 'AdminController@deleteBanner');
Route::post('admin/index/addcorebusiness', 'AdminController@addCorebusiness');
Route::post('admin/index/editcorebusiness', 'AdminController@editCorebusiness');
Route::post('admin/index/deletecorebusiness', 'AdminController@deleteCorebusiness');
Route::post('admin/manufacturing/addslidingbanner', 'ManufacturingController@addSlidingBanner');
Route::post('admin/manufacturing/editslidingbanner', 'ManufacturingController@editSlidingBanner');

Route::post('admin/applicants/deleteapplication', 'Career1Controller@deleteApplication');
Route::post('admin/trading/addslidingbanner', 'TradingController@addSlidingBanner');
Route::post('admin/trading/editslidingbanner', 'TradingController@editSlidingBanner');
Route::post('admin/trading/addbrands', 'TradingController@addBrands');
Route::post('admin/trading/editbrands', 'TradingController@editBrands');

Route::post('admin/manufacturing/addprocesseslisting', 'ManufacturingController@addProcesssListings');
Route::post('admin/manufacturing/editprocesseslisting', 'ManufacturingController@editProcesssListings');
Route::post('admin/manufacturing/deleteprocesseslisting', 'ManufacturingController@deleteProcesslisting');
Route::post('admin/manufacturing/deleteslidingbanner', 'ManufacturingController@deleteSlidingbanner');
Route::post('admin/manufacturing/deleteallbanner', 'ManufacturingController@deleteAllBanner');
Route::post('admin/manufacturing/deleteallprocess', 'ManufacturingController@deleteAllProcess');

Route::post('admin/manufacturing/deleteallsoutheastbanner', 'ManufacturingController@deleteAllSoutheastBanner');
Route::post('admin/manufacturing/deleteallsoutheastprocess', 'ManufacturingController@deleteAllSoutheastProcess');

Route::post('admin/vaccancy/addvaccancy', 'Career1Controller@addVaccancy');
Route::post('admin/vaccancy/editvaccancy', 'Career1Controller@editVaccancy');
Route::post('admin/vaccancy/deletevaccancy', 'Career1Controller@deleteVaccancy');
Route::post('admin/page/savepage', 'PageController@savePage');

Route::post('admin/page/deletemultipleuserlist', 'PageController@adminDeleteMultipleUserlist');
Route::post('admin/page/deletemultiplefeedback', 'PageController@adminDeleteMultipleFeedback');
Route::post('admin/page/deletemultiplebrandlisting', 'PageController@adminDeleteMultipleBrandlisting');
Route::post('admin/page/deletemultipleannual', 'PageController@adminDeleteMultipleAnnual');
Route::post('admin/page/deletemultiplepressrelease', 'PageController@adminDeleteMultiplePressrelease');
Route::post('admin/page/deletemultipleapplicants', 'PageController@adminDeleteMultipleApplicants');
Route::post('admin/page/deletemultiplevaccancies', 'PageController@adminDeleteMultipleVaccancies');
Route::post('admin/page/deletemultiplecorebusinesses', 'PageController@adminDeleteMultipleIndexCorebusinesses');
Route::post('admin/page/deletemultipleindexbanner', 'PageController@adminDeleteMultipleIndexBanner');
Route::post('admin/page/deletemultiplebanner', 'PageController@adminDeleteMultipleBanner');
Route::post('admin/page/deletemultipleprocesses', 'PageController@adminDeleteMultipleProcesses');
Route::post('admin/investor/addpressrelease', 'PressreleaseController@addPressrelease');
Route::post('admin/investor/deletepressrelease', 'PressreleaseController@deletePressrelease');
Route::post('admin/investor/deleteallpressrelease', 'PressreleaseController@deleteAllPressrelease');
Route::post('admin/investor/editpressrelease', 'PressreleaseController@editPressrelease');
Route::post('admin/investor/editpage', 'PressreleaseController@editPage');
Route::get('admin/contacts/feedbacks', 'ContactController@adminFeedback');
Route::get('admin/contacts/contactus', 'ContactController@adminContactus');
Route::post('admin/contacts/deletefeedback', 'ContactController@adminDeleteFeedback');
Route::post('admin/contacts/deleteallfeedback', 'ContactController@adminDeleteAllFeedback');
Route::get('admin/plantation/sementra', 'PlantationController@adminSementra');
Route::post('admin/plantation/addsementra', 'PlantationController@adminAddSementra');
Route::post('admin/plantation/editsementra', 'PlantationController@adminEditSementra');
Route::post('admin/plantation/deletesementra', 'PlantationController@adminDeleteSementra');
Route::post('admin/plantation/deleteallsementra', 'PlantationController@adminDeleteAllSementra');
Route::post('admin/plantation/addprocesses', 'PlantationController@adminAddProcesses');
Route::post('admin/plantation/editprocesses', 'PlantationController@adminEditProcesses');
Route::post('admin/plantation/deleteprocesses', 'PlantationController@adminDeleteProcesses');
Route::post('admin/plantation/deleteallprocesses', 'PlantationController@adminDeleteAllProcesses');
Route::get('admin/teaplantation/teaplantation', 'TeaplantationController@adminTeaplantation');
Route::post('admin/teaplantation/addbanner', 'TeaplantationController@adminAddBanner');
Route::post('admin/teaplantation/editbanner', 'TeaplantationController@adminEditBanner');
Route::post('admin/teaplantation/deletebanner', 'TeaplantationController@adminDeleteBanner');
Route::post('admin/teaplantation/deleteallbanner', 'TeaplantationController@adminDeleteAllBanner');
Route::post('admin/teaplantation/addprocesses', 'TeaplantationController@adminAddProcesses');
Route::post('admin/teaplantation/editprocesses', 'TeaplantationController@adminEditProcesses');
Route::post('admin/teaplantation/deleteprocesses', 'TeaplantationController@adminDeleteProcesses');
Route::post('admin/teaplantation/deleteallprocesses', 'TeaplantationController@adminDeleteAllProcesses');

Route::get('admin/hospitality/hospitality', 'HospitalityController@adminHospitality');
Route::post('admin/hospitality/addbanner', 'HospitalityController@adminAddBanner');
Route::post('admin/hospitality/editbanner', 'HospitalityController@adminEditBanner');
Route::post('admin/hospitality/deletebanner', 'HospitalityController@adminDeleteBanner');
Route::post('admin/hospitality/deleteallbanner', 'HospitalityController@adminDeleteAllBanner');
Route::post('admin/hospitality/addprocesses', 'HospitalityController@adminAddProcesses');
Route::post('admin/hospitality/editprocesses', 'HospitalityController@adminEditProcesses');
Route::post('admin/hospitality/deleteprocesses', 'HospitalityController@adminDeleteProcesses');
Route::post('admin/hospitality/deleteallprocesses', 'HospitalityController@adminDeleteAllProcesses');

Route::get('admin/annual/reports', 'AnnualreportController@adminAnnualreport');

Route::post('admin/annual/addreports', 'AnnualreportController@adminAddReports');
Route::post('admin/annual/editreports', 'AnnualreportController@adminEditReports');
Route::post('admin/annual/deletereports', 'AnnualreportController@adminDeleteReports');
Route::post('admin/annual/deleteallreports', 'AnnualreportController@adminDeleteAllReports');
Route::get('admin/company/announcements', 'AnnouncementController@adminAnnouncement');


Route::post('admin/updatepriceticker', 'AdminController@updatePriceTicker');
Route::post('admin/updateorder', 'AdminController@updateOrder');
Route::resource('admin/irhome', 'AdminController@adminIRHome');

});
Route::get('/','HomeController@showIndex');
Route::get('admin/login','AdminController@showLogin');
Route::post('updatepricetickerfront', 'AdminController@updatePriceTicker');

Route::get('admin/logout','AdminController@handleLogout');
Route::post('admin/login', array('as' => 'login', 'uses' => 'AdminController@handleLogin'));
Route::get('/forgotpassword', 'AdminController@forgotPassword');
Route::post('user/store', 'UserController@store');
Route::post('user/update', 'UserController@update');
Route::post('admin/users/saveuser', 'UserController@saveUser');
Route::post('admin/users/updateuser', 'UserController@updateUser');
Route::post('admin/users/changepassword', 'UserController@changepassword');



Route::post('company/careers/submitapp', 'Career1Controller@submitApp');

Route::post('contacts/feedback/submitfeedback', 'ContactController@submitFeedback');

/* Front Routers */
Route::get('manufacturing/packaging/canpac','ManufacturingController@packagingFrontCanpac');
Route::get('manufacturing/packaging/southeast','ManufacturingController@packagingFrontSoutheast');
Route::get('manufacturing/palmoil/refinery','ManufacturingController@palmoilFrontRefinery');
Route::get('manufacturing/palmoil/mill','ManufacturingController@palmoilFrontMill');

Route::get('company/careers', 'Career1Controller@frontCareer');
Route::post('company/searchcareers', 'Career1Controller@frontsearchCareer');
Route::get('company/careers/apply/{vaccancy_id}', 'Career1Controller@showApplyForm');
Route::get('trading/tradingdivision/yelee', 'TradingController@tradingFrontYelee');
Route::get('contacts/feedback', 'ContactController@feedbackFront');
Route::get('contacts/contactus', 'ContactController@contactusFront');


/* End of Front Routers */
/* Investor Relations Front */
Route::get('regionaloffices', 'ContactController@regionaloffices');
Route::resource('contactsubmit', 'ContactController@contactsubmit');
Route::resource('contactus', 'ContactController@contactusFront');
Route::get('investorrelations/newscentre/bursaannouncements/{announce_id}', 'CorporateController@frontBursaAnnouncement');
Route::resource('investorrelations/newscentre/bursaannouncements', 'CorporateController@frontBursaAnnounceList');
Route::resource('investorrelations/shareinformation/topshareholders', 'StockController@frontTopShareholders');
Route::get('investorrelations/shareinformation/shareholdingsanalysis', 'StockController@frontShareholding');
Route::resource('investorrelations/shareinformation/pricevolume', 'StockController@frontPriceAndVolume');
Route::get('investorrelations/shareinformation/priceticker', 'StockController@frontpriceticker');
Route::resource('investorrelations/reports/prospectus', 'ReportsController@frontProspectusarReports');
Route::resource('investorrelations/reports/circulars', 'ReportsController@frontCircularReports');
Route::get('investorrelations/reports/analystreports', 'ReportsController@frontAnalystReports');
Route::get('investorrelations/reports/quarterlyreports', 'ReportsController@frontQuarterlyReports');
Route::resource('investorrelations/reports/annualauditedaccounts', 'ReportsController@frontAnnualAudit');
Route::get('investorrelations/reports/annualreports', 'ReportsController@frontAnnualReports');
Route::resource('investorrelations/eventcalendar', 'EventsController@frontEventsHome');
Route::post('investorrelations/investortools/newsalertsunsubscribesubmit', 'ReportsController@UnSubscribeNewsAlertSubmit');
Route::post('investorrelations/investortools/newsalertssubscribesubmit', 'ReportsController@SubscribeNewsAlertSubmit');
Route::resource('investorrelations/investortools/newsalertsunsubscribe', 'ReportsController@frontNewsAlertUnsubscribe');
Route::resource('investorrelations/investortools/newsalerts', 'ReportsController@frontNewsAlert');
Route::resource('investorrelations/investortools/calculator', 'ReportsController@frontPriceGainCalculator');
Route::resource('investorrelations/managementanalysis/pastperformance', 'CorporateController@frontManagementPastPerformanceReview');
Route::resource('investorrelations/managementanalysis/reviewoperations', 'CorporateController@frontManagementReviewOperations');
Route::resource('investorrelations/managementanalysis/chairmanstatement', 'CorporateController@frontManagementChairmansStat');
Route::get('investorrelations/financialinformation/financialhighlights', 'CorporateController@frontFinancialHighlights');
Route::resource('investorrelations/financialinformation/comprehensiveincome', 'CorporateController@frontFinancialComprehensive');
Route::resource('investorrelations/financialinformation/financialposition', 'CorporateController@frontFinancialPosition');
Route::resource('investorrelations/financialinformation/cashflowstatement', 'CorporateController@frontFinancialFlowStatements');
Route::resource('investorrelations/financialinformation/equitychanges', 'CorporateController@frontFinancialEquity');
Route::resource('investorrelations/financialinformation/latestreport', 'CorporateController@frontLatestReport');
Route::resource('investorrelations/financialinformation/segmentalanalysis', 'CorporateController@frontFinancialSegmentalAnalysis');
Route::resource('investorrelations/financialinformation/ratioanalysis', 'CorporateController@frontFinancialRatioAnalysis');
Route::get('investorrelations/entitlementdetail', 'CorporateController@frontEntitlementDetail');
Route::get('investorrelations/entitlements', 'IpoController@frontEntitlements');
Route::get('investorrelations/frontentitlement', 'IpoController@frontEntitlement');
Route::post('investorrelations/frontentitlement', 'IpoController@frontEntitlement');
Route::get('investorrelations/frontentitlementdetail/{id}', 'IpoController@frontEntitlementDetail');
Route::get('investorrelations/frontinvestoralert', 'IpoController@frontInvestorAlert');
Route::post('investorrelations/frontinvestoralert', 'IpoController@frontInvestorAlert');
Route::get('investorrelations/frontadditionallisting', 'IpoController@frontAdditionallisting');
Route::get('investorrelations/frontadditionallistingdetail/{id}', 'IpoController@frontAdditionallistingdetail');
Route::get('investorrelations/auditcommittee', 'IpoController@auditcommittee');
Route::get('investorrelations/auditcommitteedetail', 'IpoController@auditcommitteedetail');
Route::get('investorrelations/boardroom', 'IpoController@boardroom');
Route::get('investorrelations/boardroomdetail', 'IpoController@boardroomdetail');
Route::get('investorrelations/chiefexecutiveofficer', 'IpoController@chiefexecutiveofficer');
Route::get('investorrelations/principalofficer', 'IpoController@principalofficer');
Route::get('investorrelations/principalofficerdetail', 'IpoController@principalofficerdetail');
Route::get('investorrelations/addresslisting', 'IpoController@addresslisting');
Route::get('investorrelations/addressdetail', 'IpoController@addressdetail');
Route::get('investorrelations/compsectretarylisting', 'IpoController@compsectretarylisting');
Route::get('investorrelations/registrarlist', 'IpoController@registrarlist');
Route::get('investorrelations/registrardetail', 'IpoController@registrardetail');
Route::get('investorrelations/resale', 'IpoController@resale');
Route::get('investorrelations/immediateannouncement', 'IpoController@immediateannouncement');
Route::get('investorrelations/companypursuant', 'IpoController@companypursuant');
Route::get('investorrelations/sharecompanypursuant', 'IpoController@sharecompanypursuant');

Route::get('investorrelations/frontlistingcircular', 'IpoController@frontlistingcircular');
Route::get('investorrelations/frontlistingcirculardetail', 'IpoController@frontlistingcirculardetail');
Route::get('investorrelations/fronttradingright', 'IpoController@frontTradingright');
Route::get('investorrelations/frontfinanciallisting', 'IpoController@frontfinanciallisting');
Route::get('investorrelations/frontfinanciallistingdetail', 'IpoController@frontfinanciallistingdetail');
Route::get('investorrelations/frontgeneralannouncementlisting', 'IpoController@frontgeneralannouncementlisting');
Route::get('investorrelations/frontgeneralannouncementdetail', 'IpoController@frontgeneralannouncementdetail');
Route::get('investorrelations/frontgeneralmeetinglisting', 'IpoController@frontgeneralmeetinglisting');
Route::get('investorrelations/frontgeneralmeetingdetail', 'IpoController@frontgeneralmeetingdetail');
Route::get('investorrelations/frontspecialannouncementlisting', 'IpoController@frontspecialannouncementlisting');
Route::get('investorrelations/frontspecialannouncementdetail', 'IpoController@frontspecialannouncementdetail');
Route::get('investorrelations/directorinterestdetail', 'IpoController@frontdirectorinterestdetail');
Route::get('investorrelations/directorinterest', 'IpoController@frontdirectorinterest');
Route::get('investorrelations/shareholderinterest', 'IpoController@frontshareholderinterest');
Route::get('investorrelations/shareholderdetail', 'IpoController@frontshareholderdetail');
Route::get('investorrelations/interestshareholderlist', 'IpoController@frontinterestshareholderlist');
Route::get('investorrelations/interestshareholderdetail', 'IpoController@frontinterestshareholderdetail');
Route::get('investorrelations/personceasing', 'IpoController@frontpersonceasing');
Route::get('investorrelations/ipocentre/industryoverview', 'IpoController@frontIpoIndustryOverview');
Route::get('investorrelations/ipocentre/utilizationproceeds', 'IpoController@frontIpoUtilisationProceeds');
Route::get('investorrelations/ipocentre/riskfactors', 'IpoController@frontIpoRiskFactors');
Route::get('investorrelations/ipocentre/competitiveadvantages', 'IpoController@frontIpoCompetitiveAdvantage');
Route::get('investorrelations/ipocentre/ipostatistics', 'IpoController@frontIpoStatistics');
Route::resource('investorrelations/corporategovernance', 'CorporateController@frontCorpGovernance');
Route::resource('investorrelations/corporateinformation/oursubsidiaries', 'CorporateController@frontOurSubsidiaries');
Route::resource('investorrelations/corporateinformation/ourproperties', 'CorporateController@frontOurProperties');
Route::get('investorrelations/corporateinformation/keymanagemnet', 'CorporateController@frontKeyManagemenProfile');
Route::resource('investorrelations/corporateinformation/directorprofile', 'CorporateController@frontDirProfile');
Route::get('investorrelations/corporateinformation/general', 'CorporateController@frontGeneral');
/* End of Investor Relations Front */

Route::get('investorrelations/announcements', 'AnnouncementController@frontAnnouncement');
Route::get('plantation/oilpalmestate', 'PlantationController@oilplantationFront');
Route::get('plantation/teaplantation', 'TeaplantationController@teaplantationFront');
Route::get('hospitality/hospitalitydivision', 'HospitalityController@hospitalityFront');


/* Company Controllers */
Route::get('company/companyhistory', 'CompanyController@frontCompanyhistory');
Route::get('company/corporateinformation', 'CompanyController@frontcorporateinfo');
Route::get('company/corporatestructure', 'CompanyController@frontcorporatestructure');
Route::get('company/corporatephilosophy', 'CompanyController@frontcorporatephilo');
Route::get('company/corporatevision', 'CompanyController@frontcorporatevision');
Route::get('company/corporatesocialresponsibility', 'CompanyController@frontcorporatesocialresp');

Route::controller('password', 'RemindersController'); // Password Reminder