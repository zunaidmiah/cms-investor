<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
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
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */
	
	
    public function changeGrienvanceStatus($id, $status=0)
    {
	 $grievance = Grievance::find($id);
	if($grievance!=null){
	  $grievance->status = $status;
	  $grievance->save();
	}
	
	  return Redirect::back()->with('success_message','Status change saved successfully.');
    }
    
    public function testing_pdf()
    {
       
       

     	
     return View::make('testing_pdf');

    }
    public function delete_multiple($items_to_delete)
    {
      
      $integerIDs = array_map('intval', explode(',', $items_to_delete));

      Grievance::whereIn('id',$integerIDs)->delete();

      Session::put('delete_messae','Selected Items SuccessFully  Deleted!');

      return Redirect::to('admin/grienvance_procedure');
      // ->with('delete_messae','Selected Items SuccessFully  Deleted!');
    
    }
    
    public function del($id)
    {
        $del=Grievance::where(['id'=>$id])->delete();
        if($del)
        {
          Grievance::where('job_title','last_deleted_record')->update(['updates_at'=>date('Y-m-d H:i:s')]);
          Session::put('delete_messae','SuccessFully  Deleted!');
          return Redirect::to('admin/grienvance_procedure');
        }
    }
    
    public function destory_session()
    {
       Session::flush('success_message');
    }
    
    public function grienvance_procedure()
    {
        $report     = Grievance::where('job_title','!=','last_deleted_record')->get();
        $report2    = Grievance::orderBy('id', 'desc')->where('job_title','!=','last_deleted_record')->take(1)->get();
        if(count($report2)<=0){
          $report2    = Grievance::where('job_title', 'last_deleted_record')->take(1)->get();
        }
        $links      = DB::connection("cms")->table("links")->get();
        $page       = Page::where('type','grienvance_procedure')->get();
        $countries  = $this->countries();
       return View::make('admin.grivenvace_procendure',compact('report','report2','links','page','countries'));
    }

public function grivance()
{
$id=100;
$report=Grievance::where('job_title','!=','last_deleted_record')->where('status', 1)->get();
	$banners=DB::connection('cms')->select('SELECT *,b.banner from page_banner as a left join banners as b on a.banner_id=b.id where a.page_id='.$id.' and status=1 order by a.id desc');

		//$banners=DB::select(DB::raw($raw));

		//dd($banners);
	if($banners)
	{
		$banner=$banners[0]->banner;
	}else{
		$banner='banner5.jpg';
		
	}
	$links = DB::connection("cms")->table("links")->get();
	
return View::make('grievancereportslisting',compact('report','banner','links'));
}


public function update_gravience($id){

  $data = Input::all();
  // print "<pre>";print_r($data);exit;
  $grievance = Grievance::find($id);

  $grievance->name          = $data['report_name'];
  $grievance->address       = $data['report_address'];
  $grievance->city          = $data['report_city'];
  $grievance->job_title     = $data['report_jobtitle'];
  $grievance->state         = $data['report_state'];
  $grievance->email         = $data['report_email'];
  $grievance->postal_code   = $data['report_postal_code'];
  $grievance->telephone     = $data['report_telephone'];
  $grievance->country       = $data['report_countryname'];
  $grievance->description   = $data['report_description'];
  $grievance->company_name  = $data['report_companyname'];

  $file = Input::file('report_file');
  if($file){
      $destinationPath = 'photos';
      $extension = $file->getClientOriginalExtension(); 
      $filename = str_random(12).".{$extension}";
      if(!empty($grievance->image))
        unlink($destinationPath.'/'.$grievance->image);
      $upload_success = Input::file('report_file')->move($destinationPath, $filename);

      $grievance->image         = $filename;
  }

  $grievance->save();

  return Redirect::back()->with('success_message','Changes saved Successfully.');

}
public function save_gravience()
{
// images
$data = Input::all();    

 $image=$data['Submit'];
// if($image)
// {
    
//          try {
//            $file = $image;
//             $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
//              $image->move("images", $name);
//          } catch (Illuminate\Filesystem\FileNotFoundException $e) {

//          }
//          $image_name=$name;
//       } 
//       else{
//         $image_name='';
//       }


  $file = Input::file('Submit');
  if($file)
  {
    $destinationPath = 'photos';
    $extension = $file->getClientOriginalExtension(); 
    $filename = str_random(12).".{$extension}";
    $upload_success = Input::file('Submit')->move($destinationPath, $filename);
}
else{
$filename='';
}
$image_name='';
/*
$save=Grievance::insertGetId(array(
       'name'      => $data['Name'],
       'address'      => $data['Address'],

       'city'      => $data['City'],


       'job_title'      => $data['JobTitle'],
       'state'      => $data['State'],

       'email'      => $data['Email'],

       'postal_code'      => $data['PostalCode'],
       'telephone'      => $data['Phone'],

       'country'      => $data['DDLCountry'],



       'description'      => $data['message1'],
       'telephone'      => $data['Phone'],

       'updates_at'      => date('Y-m-d'),
       'image' =>$filename,
       'company_name'=>$data['CompanyName']
 
));
*/
//send email
		$to_name = $data['Name'];
        $to_email = $data['Email'];
		$data = array(
		'Subject'=>'Email Confirmation Mail',
       'Name'      => $data['Name'],
       'Address'      => $data['Address'],
       'City'      => $data['City'],
       'JobTitle'      => $data['JobTitle'],
       'State'      => $data['State'],
       'Email'      => $data['Email'],
       'PostalCode'      => $data['PostalCode'],
       'Phone'      => $data['Phone'],
       'DDLCountry'      => $data['DDLCountry'],
       'Message1'      => $data['message1'],
       'Phone'      => $data['Phone'],
       'UpdatesAt'      => date('Y-m-d'),
       'Filename' =>$filename, 
       'CompanyName'=>$data['CompanyName']
		);
        Mail::send('emails.grivenvace_email_confirmation', $data, function($message) use ($to_name,
        $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Email Confirmation Mail');
        $message->from($_ENV['MAIL_FROM_ADDRESS_BURSA'],'Bursa Grievance Mail');
        });
		
        if( count(Mail::failures()) > 0 ) {

           $errorData="Email to ".$to_email." failed due to:  ";
           foreach(Mail::failures() as $email_failure) {
                $errorData=$errorData."<br".$email_failure;
                }
			Session::flash('error_message', 'Email verification link can not be sent.');
			return Redirect::to('grievanceform');
		}
		
Session::flash('success_message', 'Email verification link has been sent to your email '.$data['Email'].'.');
return Redirect::to('grievanceform');

}

public function verifyEmail()
{
$data = Input::all();    

$oldGrievances=Grievance::where('email', $data['Email'])->where('name', $data['Name'])->where('telephone', $data['Phone'])->where('description', $data['message1'])->get();

if(count($oldGrievances)==0){
$save=Grievance::insertGetId(array(
       'name'      => $data['Name'],
       'address'      => $data['Address'],

       'city'      => $data['City'],


       'job_title'      => $data['JobTitle'],
       'state'      => $data['State'],

       'email'      => $data['Email'],

       'postal_code'      => $data['PostalCode'],
       'telephone'      => $data['Phone'],

       'country'      => $data['DDLCountry'],



       'description'      => $data['message1'],
       'telephone'      => $data['Phone'],

       'updates_at'      => date('Y-m-d'),
       'image' => $data['Filename'],
       'company_name'=>$data['CompanyName'],
	   
       'status'=> 0
 
));
if($save){

Session::flash('success_message', 'Email verified, Information has been saved successfully.');
return Redirect::to('grievanceform');
}
else{
Session::flash('error_message', 'The information has not been saved. Please correct the errors.');
return Redirect::to('grievanceform');
}
}
else{
Session::flash('error_message', 'The information has not been saved. Grievance already exists.');
return Redirect::to('grievanceform')->with('data', $data);
}
}

public function grivanceForm()
{
$id=101;
	$banners=DB::connection('cms')->select('SELECT *,b.banner from page_banner as a left join banners as b on a.banner_id=b.id where a.page_id='.$id.' and status=1 order by a.id desc');

		//$banners=DB::select(DB::raw($raw));

		//dd($banners);
	if($banners)
	{
		$banner=$banners[0]->banner;
	}else{
		$banner='banner5.jpg';
		
	}
	$links     = DB::connection("cms")->table("links")->get();
  $page      = Page::where('type','grienvance_procedure')->get();
	
return View::make('grievanceForm',compact('banner','links','page'));
}
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
        $latestAnnouncements =  CrawledAnnounce::where('status','=',1)->orderBy('date_of_publishing', 'DESC')->take(3)->get();;
        
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
        $details_annc["Change in Substantial Shareholders Interest Pursuant to Form 29B"] = 'investorrelations/shareholderdetail';
        $details_annc["Notice of Interest of Substantial Shareholder Pursuant to Form 29A of the Companies Act. 1965"] = 'investorrelations/interestshareholderdetail';
        $details_annc["Notice of Person Ceasing (29C)"] = 'investorrelations/personceasingdetail';
        $details_annc['Change in Audit Committee'] = 'investorrelations/auditcommitteedetail';
        $details_annc['Change in Risk Committee'] = 'investorrelations/riskcommitteedetail';
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
        $details_annc['Change in Nomination Committee'] = 'investorrelations/nominationcommitteedetail';
        $details_annc['General Announcement for PLC'] = 'investorrelations/frontgeneralannouncementdetail';
        $details_annc['Additional Listing Announcement'] = 'investorrelations/frontadditionallistingdetail';
        $details_annc["Change in the Interest of Substantial Shareholder Pursuant to Section"] = 'investorrelations/frontadditionallistingdetail';
        $details_annc["Change in the Interest of Substantial Shareholder Pursuant to Section 138 of CA 2016"] = 'investorrelations/frontadditionallistingdetail';
        $details_annc["Changes in Director's Interest Pursuant to Section 219 of CA 2016"] = 'investorrelations/frontadditionallistingdetail';
        $details_annc['Document Submission'] = 'investorrelations/frontdocumentsubmissiondetail';

        $tagLine = "Oil Palm Plantation Investment Holdings";
            
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

        protected function countries(){
          return $countries = [
  
                                      "Afghanistan"=>"Afghanistan",
                                      "Albania"=>"Albania",
                                      "Algeria"=>"Algeria",
                                      "American Samoa"=>"American Samoa",
                                      "Andorra"=>"Andorra",
                                      "Angola"=>"Angola",
                                      "Anguilla"=>"Anguilla",
                                      "Antarctica"=>"Antarctica",
                                      "Antigua and Barbuda"=>"Antigua and Barbuda",
                                      "Argentina"=>"Argentina",
                                      "Armenia"=>"Armenia",
                                      "Aruba"=>"Aruba",
                                      "Australia"=>"Australia",
                                      "Austria"=>"Austria",
                                      "Azerbaijan"=>"Azerbaijan",
                                      "Bahamas"=>"Bahamas",
                                      "Bahrain"=>"Bahrain",
                                      "Bangladesh"=>"Bangladesh",
                                      "Barbados"=>"Barbados",
                                      "Belarus"=>"Belarus",
                                      "Belgium"=>"Belgium",
                                      "Belize"=>"Belize",
                                      "Benin"=>"Benin",
                                      "Bermuda"=>"Bermuda",
                                      "Bhutan"=>"Bhutan",
                                      "Bolivia"=>"Bolivia",
                                      "Bosnia and Herzegovina"=>"Bosnia and Herzegovina",
                                      "Botswana"=>"Botswana",
                                      "Bouvet Island"=>"Bouvet Island",
                                      "Brazil"=>"Brazil",
                                      "British Indian Ocean Territory"=>"British Indian Ocean Territory",
                                      "Brunei"=>"Brunei",
                                      "Bulgaria"=>"Bulgaria",
                                      "Burkina Faso"=>"Burkina Faso",
                                      "Burundi"=>"Burundi",
                                      "Cambodia"=>"Cambodia",
                                      "Cameroon"=>"Cameroon",
                                      "Canada"=>"Canada",
                                      "Cape Verde"=>"Cape Verde",
                                      "Cayman Islands"=>"Cayman Islands",
                                      "Central African Republic"=>"Central African Republic",
                                      "Chad"=>"Chad",
                                      "Chile"=>"Chile",
                                      "China"=>"China",
                                      "Christmas Island"=>"Christmas Island",
                                      "Cocos (Keeling) Islands"=>"Cocos (Keeling) Islands",
                                      "Colombia"=>"Colombia",
                                      "Comoros"=>"Comoros",
                                      "Congo"=>"Congo",
                                      "Congo (DRC)"=>"Congo (DRC)",
                                      "Cook Islands"=>"Cook Islands",
                                      "Costa Rica"=>"Costa Rica",
                                      "Côte d`Ivoire"=>"C�te d`Ivoire",
                                      "Croatia (Hrvatska)"=>"Croatia (Hrvatska)",
                                      "Cuba"=>"Cuba",
                                      "Cyprus"=>"Cyprus",
                                      "Czech Republic"=>"Czech Republic",
                                      "Denmark"=>"Denmark",
                                      "Djibouti"=>"Djibouti",
                                      "Dominica"=>"Dominica",
                                      "Dominican Republic"=>"Dominican Republic",
                                      "East Timor"=>"East Timor",
                                      "Ecuador"=>"Ecuador",
                                      "Egypt"=>"Egypt",
                                      "El Salvador"=>"El Salvador",
                                      "Equatorial Guinea"=>"Equatorial Guinea",
                                      "Eritrea"=>"Eritrea",
                                      "Estonia"=>"Estonia",
                                      "Ethiopia"=>"Ethiopia",
                                      "Falkland Islands (Islas Malvinas)"=>"Falkland Islands (Islas Malvinas)",
                                      "Faroe Islands"=>"Faroe Islands",
                                      "Fiji Islands"=>"Fiji Islands",
                                      "Finland"=>"Finland",
                                      "France"=>"France",
                                      "French Guiana"=>"French Guiana",
                                      "French Polynesia"=>"French Polynesia",
                                      "French Southern and Antarctic Lands"=>"French Southern and Antarctic Lands",
                                      "Gabon"=>"Gabon",
                                      "Gambia"=>"Gambia",
                                      "Georgia"=>"Georgia",
                                      "Germany"=>"Germany",
                                      "Ghana"=>"Ghana",
                                      "Gibraltar"=>"Gibraltar",
                                      "Greece"=>"Greece",
                                      "Greenland"=>"Greenland",
                                      "Grenada"=>"Grenada",
                                      "Guadeloupe"=>"Guadeloupe",
                                      "Guam"=>"Guam",
                                      "Guatemala"=>"Guatemala",
                                      "Guinea"=>"Guinea",
                                      "GuineaBissau"=>"GuineaBissau",
                                      "Guyana"=>"Guyana",
                                      "Haiti"=>"Haiti",
                                      "Heard Island and McDonald Islands"=>"Heard Island and McDonald Islands",
                                      "Honduras"=>"Honduras",
                                      "Hong Kong SAR"=>"Hong Kong SAR",
                                      "Hungary"=>"Hungary",
                                      "Iceland"=>"Iceland",
                                      "India"=>"India",
                                      "Indonesia"=>"Indonesia",
                                      "Iran"=>"Iran",
                                      "Iraq"=>"Iraq",
                                      "Ireland"=>"Ireland",
                                      "Israel"=>"Israel",
                                      "Italy"=>"Italy",
                                      "Ivory Coast"=>"Ivory Coast",
                                      "Jamaica"=>"Jamaica",
                                      "Japan"=>"Japan",
                                      "Jordan"=>"Jordan",
                                      "Kazakhstan"=>"Kazakhstan",
                                      "Kenya"=>"Kenya",
                                      "Kiribati"=>"Kiribati",
                                      "Korea"=>"Korea",
                                      "Kuwait"=>"Kuwait",
                                      "Kyrgyzstan"=>"Kyrgyzstan",
                                      "Laos"=>"Laos",
                                      "Latvia"=>"Latvia",
                                      "Lebanon"=>"Lebanon",
                                      "Lesotho"=>"Lesotho",
                                      "Liberia"=>"Liberia",
                                      "Libya"=>"Libya",
                                      "Liechtenstein"=>"Liechtenstein",
                                      "Lithuania"=>"Lithuania",
                                      "Luxembourg"=>"Luxembourg",
                                      "Macau SAR"=>"Macau SAR",
                                      "Macedonia Former Yugoslav Republic of"=>"Macedonia Former Yugoslav Republic of",
                                      "Madagascar"=>"Madagascar",
                                      "Malawi"=>"Malawi",
                                      "Malaysia"=>"Malaysia",
                                      "Maldives"=>"Maldives",
                                      "Mali"=>"Mali",
                                      "Malta"=>"Malta",
                                      "Marshall Islands"=>"Marshall Islands",

                                      "Martinique"=>"Martinique",
                                      "Mauritania"=>"Mauritania",
                                      "Mauritius"=>"Mauritius",
                                      "Mayotte"=>"Mayotte",
                                      "Mexico"=>"Mexico",
                                      "Micronesia"=>"Micronesia",
                                      "Moldova"=>"Moldova",
                                      "Monaco"=>"Monaco",
                                      "Mongolia"=>"Mongolia",
                                      "Montserrat"=>"Montserrat",
                                      "Morocco"=>"Morocco",
                                      "Mozambique"=>"Mozambique",
                                      "Myanmar"=>"Myanmar",
                                      "Namibia"=>"Namibia",
                                      "Nauru"=>"Nauru",
                                      "Nepal"=>"Nepal",
                                      "Netherlands"=>"Netherlands",
                                      "Netherlands Antilles"=>"Netherlands Antilles",
                                      "New Caledonia"=>"New Caledonia",
                                      "New Zealand"=>"New Zealand",
                                      "Nicaragua"=>"Nicaragua",
                                      "Niger"=>"Niger",
                                      "Nigeria"=>"Nigeria",
                                      "Niue"=>"Niue",
                                      "Norfolk Island"=>"Norfolk Island",
                                      "North Korea"=>"North Korea",
                                      "Northern Mariana Islands"=>"Northern Mariana Islands",
                                      "Norway"=>"Norway",
                                      "Oman"=>"Oman",
                                      "Pakistan"=>"Pakistan",
                                      "Palau"=>"Palau",
                                      "Palestine"=>"Palestine",
                                      "Panama"=>"Panama",
                                      "Papua New Guinea"=>"Papua New Guinea",
                                      "Paraguay"=>"Paraguay",
                                      "Peru"=>"Peru",
                                      "Philippines"=>"Philippines",
                                      "Pitcairn Islands"=>"Pitcairn Islands",
                                      "Poland"=>"Poland",
                                      "Portugal"=>"Portugal",
                                      "Puerto Rico"=>"Puerto Rico",
                                      "Qatar"=>"Qatar",
                                      "Reunion"=>"Reunion",
                                      "Romania"=>"Romania",
                                      "Russia"=>"Russia",
                                      "Rwanda"=>"Rwanda",
                                      "Saipan"=>"Saipan",
                                      "Samoa"=>"Samoa",
                                      "San Marino"=>"San Marino",
                                      "São Tom�&copy; and Príncipe"=>"S�o Tom� and Pr�ncipe",
                                      "Saudi Arabia"=>"Saudi Arabia",
                                      "Senegal"=>"Senegal",
                                      "Serbia &amp; Montenegro"=>"Serbia &amp; Montenegro",
                                      "Seychelles"=>"Seychelles",
                                      "Sierra Leone"=>"Sierra Leone",
                                      "Singapore"=>"Singapore",
                                      "Slovakia"=>"Slovakia",
                                      "Slovenia"=>"Slovenia",
                                      "Solomon Islands"=>"Solomon Islands",
                                      "Somalia"=>"Somalia",
                                      "South Africa"=>"South Africa",
                                      "South Georgia and the South Sandwich Islands"=>"South Georgia and the South Sandwich Islands",
                                      "Spain"=>"Spain",
                                      "Sri Lanka"=>"Sri Lanka",
                                      "St. Helena"=>"St. Helena",
                                      "St. Kitts and Nevis"=>"St. Kitts and Nevis",
                                      "St. Lucia"=>"St. Lucia",
                                      "St. Pierre and Miquelon"=>"St. Pierre and Miquelon",
                                      "St. Vincent and the Grenadines"=>"St. Vincent and the Grenadines",
                                      "Sudan"=>"Sudan",
                                      "Suriname"=>"Suriname",
                                      "Svalbard and Jan Mayen"=>"Svalbard and Jan Mayen",
                                      "Swaziland"=>"Swaziland",
                                      "Sweden"=>"Sweden",
                                      "Switzerland"=>"Switzerland",
                                      "Syria"=>"Syria",
                                      "Taiwan"=>"Taiwan",
                                      "Tajikistan"=>"Tajikistan",
                                      "Tanzania"=>"Tanzania",
                                      "Thailand"=>"Thailand",
                                      "Togo"=>"Togo",
                                      "Tokelau"=>"Tokelau",
                                      "Tonga"=>"Tonga",
                                      "Trinidad and Tobago"=>"Trinidad and Tobago",
                                      "Tunisia"=>"Tunisia",
                                      "Turkey"=>"Turkey",
                                      "Turkmenistan"=>"Turkmenistan",
                                      "Turks and Caicos Islands"=>"Turks and Caicos Islands",
                                      "Tuvalu"=>"Tuvalu",
                                      "Uganda"=>"Uganda",
                                      "Ukraine"=>"Ukraine",
                                      "United Arab Emirates"=>"United Arab Emirates",
                                      "United Kingdom"=>"United Kingdom",
                                      "United States Minor Outlying Islands"=>"United States Minor Outlying Islands",
                                      "United States of America"=>"United States of America",
                                      "Uruguay"=>"Uruguay",
                                      "Uzbekistan"=>"Uzbekistan",
                                      "Vanuatu"=>"Vanuatu",
                                      "Vatican City"=>"Vatican City",
                                      "Venezuela"=>"Venezuela",
                                      "Vietnam"=>"Vietnam",
                                      "Virgin Islands"=>"Virgin Islands",
                                      "Virgin Islands (British)"=>"Virgin Islands (British)",
                                      "Wallis and Futuna"=>"Wallis and Futuna",
                                      "Yemen"=>"Yemen",
                                      "Yugoslavia"=>"Yugoslavia",
                                      "Zaire"=>"Zaire",
                                      "Zambia"=>"Zambia",
                                      "Zimbabwe"=>"Zimbabwe"
                                      ];
        }
       
}
