<?php
ini_set('max_execution_time', 0);
class IndexController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

            $montages = Montage::where('status', '=', 1)->get();
           // print_r($montages);
            $homePageData = Page::find(1);
            $CoreBusiness = CoreBusiness::all();
            $page_title="Cultivation and production of oil palm";
            $latestNews = DB::connection('medianews')->select('SELECT * FROM media_news WHERE `status` = 1 ORDER BY `date` DESC LIMIT 0,3');
            return View::make('front.index')
                    ->with('montages', $montages)
                    ->with('homePageData', $homePageData)
                    ->with('businesses_create', $CoreBusiness)
                    ->with('page_title', $page_title)
                    ->with('latestNews', $latestNews)
                    ;
	}
        public function showPage($page="pagenotfound"){
            $page_title="Innovative Solutions";
            $montages = Montage::where('status', '=', 1)->get();
            $CoreBusiness = CoreBusiness::all();

            return View::make('front.'.$page)
                    ->with('page_title', $page_title)
                    ->with('montages', $montages)
                    ->with('businesses_create', $CoreBusiness)
                    ;

        }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
        public function Online_job_vacancy($vacancy_id)
	{

 
            
            $page_title="Job Vacancies";

            $montages = Montage::where('status', '=', 1)->get();
            $Education_data = array();
            $Education_data['HigherLevel']="Higher secondary / STPM / &quot;A&quot; Level / Pre-U";
            $Education_data['DiplomaHigher']="Diploma / Advanced Higher / Graduate Diploma";
            $Education_data['ProfessionalDegree']="Professional Certificated / Degree / Master";

            $Country_data = array();
            $Country_data['Select']="-- Select--";
            $Country_data['UnitedKingdom']="United Kingdom";
            $Country_data['America']="United States of America";
            $Country_data['UAE']="United Arab Emirates";

            $job_title=Career::find($vacancy_id);    
            

		// load the create form (app/views/nerds/create.blade.php)
		return View::make('front.online_job_application')
                        ->with('education_data', $Education_data)
                        ->with('country_data', $Country_data)
                        ->with('montages', $montages)
                        ->with('vacancy_id', $vacancy_id)
                        ->with('page_title', $page_title)
                        ->with('job_title',$job_title)
                        ;


	}
	public function create()
	{
            $page_title="Cultivation and production of oil palm";
            $montages = Montage::where('status', '=', 1)->get();
            $homePageData = Page::find(1);
            $careers = Career::where('status', '=', 1)->get();
            return View::make('front.careers')
                    ->with('montages', $montages)
                    ->with('job_vacancies_data', $careers)
                    ->with('page_title', $page_title)
                    ;


	}
        public function online_apply_form($vacancy_id)
	{
            $page_title="Cultivation and production of oil palm";
            $montages = Montage::where('status', '=', 1)->get();
            $Education_data = array();
            $Education_data['HigherLevel']="Higher secondary / STPM / &quot;A&quot; Level / Pre-U";
            $Education_data['DiplomaHigher']="Diploma / Advanced Higher / Graduate Diploma";
            $Education_data['ProfessionalDegree']="Professional Certificated / Degree / Master";

            $Country_data = array();
            $Country_data['Select']="-- Select--";
            $Country_data['UnitedKingdom']="United Kingdom";
            $Country_data['America']="United States of America";
            $Country_data['UAE']="United Arab Emirates";

            $job_title=Career::find($vacancy_id);
            return View::make('front.online_job_application')
                    ->with('vacancy_id', $vacancy_id)
                    ->with('education_data', $Education_data)
                    ->with('country_data', $Country_data)
                    ->with('montages', $montages)
                    ->with('page_title', $page_title)
                    ->with('job_title',$job_title)
                    ;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
        $rules = array(
			'name'           => '',
			'DOB'            => '',
			'Email'          => '',
	        'ContactNumber'  => '',
	        'MobileNumber'   => '',
	        'EducationLevel' => '',
	        'Address'        => '',
	        'City'           => '',
	        'State'          => '',
	        'PostalCode'     => '',
	        'Country'        => '',
	        'CV'             => '',
	        'career_vacancy_id'  => '',
			'g-recaptcha-response' => 'required|recaptcha',
	);
	$validator = Validator::make(Input::all(), $rules);
                
                
                

		// process the login
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator->errors())->withInput();
		} else {
			// store
			$Home = new Home;
			$Home->name          = Input::get('Name');
			$Home->DOB           = Input::get('DOB');
            $Home->Email         = Input::get('Email');
            $Home->ContactNumber = Input::get('Phone');
            $Home->MobileNumber  = Input::get('MPhone');
            $Home->EducationLevel= Input::get('Education_Level');
            $Home->Address       = Input::get('Address');
            $Home->City          = Input::get('City');
            $Home->State         = Input::get('State');
            $Home->PostalCode    = Input::get('Postal_Code');
            $Home->Country       = Input::get('Country');
            $Home->career_vacancy_id= Input::get('vacancy_id');

            $Home->JobName		= Career::find(Input::get('vacancy_id'))->jobtitle;

            if (Input::hasFile('CV_docs')){
                $fileName = Input::file('CV_docs')->getClientOriginalName();
                $pathExt = pathinfo($fileName);
                          
                $allowedExt = array('PDF', 'RTF', 'DOC', 'DOCX', 'JPG', 'JPEG');
                if(in_array(strtoupper($pathExt['extension']),$allowedExt))
                {
	                /*
	                	Sergey Vratenkov -- appending applicant's name in front of the CV filename and move CV into FTP folder
	                	Input::file('CV_docs')->move(public_path()."/uploads/cv/",Input::file('CV_docs')->getClientOriginalName());
	                	$Home->CV  = Input::file('CV_docs')->getClientOriginalName();
	                */
					$appFileName = Input::get('Name').'-'.$fileName;
					Input::file('CV_docs')->move(public_path().'/uploads/cv/', $appFileName);
					$Home->CV = $appFileName;
					$Home->process_cv(public_path().'/uploads/cv/', $appFileName);
                }
                else 
                {
                  	Session::flash('error_message', 'This type of file is not allowed.Please use any of these file types PDF, RTF, DOC, DOCX, JPG, JPEG');
		  			return Redirect::to('online_apply_form/'.Input::get('vacancy_id'));
                }
                //$url = $file->getURL();
			}

			$Home->save();
			$Home->process_csv();

			// redirect
			Session::flash('message', 'Thank you! You have successfully submitted your CV. Only short listed candidates will be notified for interview.');
            Session::flash('eror_message', '<strong>Error!</strong> Please correct the errors in the form below.');
			return Redirect::to('online_apply_form/'.Input::get('vacancy_id'));
		}
	}


	public function update($id)
	{

		$rules = array(
			'title'       => 'required',
			'status'      => 'required',
			'Banner'      => '',
                        'MoreStatus'  => '',
                        'url'         => ''
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('index_edit/' . $id . '/edit')
				->withErrors($validator)
				;
		} else {
			// store
			$montage = Montage::find($id);
			$montage->title       = Input::get('title');
			$montage->status      = Input::get('status');
                        $montage->Banner      = Input::get('Banner_image');
                        $montage->MoreStatus  = Input::get('morestatus');
                        $montage->url         = Input::get('url');
			$montage->save();

			// redirect
			Session::flash('message', 'The information has been updated successfully!');
			return Redirect::to('index_edit');
		}
	}


	public function dodestroy($id)
	{
		// delete
		$montages = Montage::find($id);
		$montages->delete();

		// redirect
		Session::flash('message', 'The information has been deleted successfully!');
		return Redirect::to('index_edit');
	}
       public function getDownload()
        {
        //PDF file is stored under project/public/download/info.pdf
            $file= public_path(). "/download/info.jpg";
            $headers = array(
              'Content-Type: application/jpg',
            );
            return Response::download($file, 'filename.jpg', $headers);
        }




        public function showProfile()
        {
            $page_title="Corporate Profile:: Lien Hoe Corporation Berhad";
             return View::make('aboutus.profile')->with('page_title', $page_title);
        }


        public function showMission()
        {
            $page_title="Vision &amp; Mission:: Lien Hoe Corporation Berhad";
             return View::make('aboutus.mission')->with('page_title', $page_title);
        }

        public function showBoard()
        {
            $bods=DB::connection('cms')->select('SELECT * from bod where status=1 order by display_order asc');
            
            $page_title="Board of Directors";
             return View::make('aboutus.directors', array('bods' => $bods))->with('page_title', $page_title);
        }

        public function showStructure()
        {
            $page_title="Corporate Structure:: Lien Hoe Corporation Berhad";
             return View::make('aboutus.structure')->with('page_title', $page_title);
        }

        public function showMilestone()
        {
            $page_title="Milestone:: Lien Hoe Corporation Berhad";
             return View::make('aboutus.milestone')->with('page_title', $page_title);
        }

        public function showachivements()
        {
            $page_title="Achievements:: Lien Hoe Corporation Berhad";
             return View::make('aboutus.achievements')->with('page_title', $page_title);
        }

        public function showCharter()
        {
            $page_title="Board Charter";
             return View::make('aboutus.charter')->with('page_title', $page_title);
        }

       

        

        public function showNetworks()
        {
            $page_title="Telecommunications Network Services:: Core Business";
             return View::make('corebusiness.telenetwork')->with('page_title', $page_title);
        }

        public function showTrading()
        {
            $page_title="Trading of Telecommunications Network Products:: Core Business";
             return View::make('corebusiness.trading')->with('page_title', $page_title);
        }

        public function showGreenTech()
        {
            $page_title="Green Energy :: Sustainable Power Solutions";
             return View::make('corebusiness.greentech')->with('page_title', $page_title);
        }

        public function showWorks()
        {
            $page_title="M &amp;E Services";
             return View::make('corebusiness.works')->with('page_title', $page_title);
        }

        public function showClients()
        {
            $page_title="Our Clients";
             return View::make('corebusiness.client')->with('page_title', $page_title);
        }


        public function showCalculator()
        {
            $page_title="Price Gain / Loss Calculator";
             return View::make('aboutus.calculator')->with('page_title', $page_title);
        }

































}
