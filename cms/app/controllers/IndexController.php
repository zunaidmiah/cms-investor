<?php
ini_set('max_execution_time', 0);
class IndexController extends \BaseController
{



    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $highlights = CrawledAnnounce::where('category', 'Financial Results')->orderBy('date_of_publishing', 'desc')->take(2)->get();


        $montages = Montage::where('status', '=', 1)->get();
        $BottomMontages = BottomMontage::where('status', '=', 1)->get();
        $reportLink['annualreports'] = Report::where('type', '=', 'annualreports')->where('active', '=', 1)->orderBy('updated_at', 'DESC')->LIMIT(1)->get();
        $reportLink['quarterlyreports'] = Report::where('type', '=', 'quarterlyreports')->where('active', '=', 1)->orderBy('updated_at', 'DESC')->LIMIT(1)->get();
        $homePageData = Page::find(1);
        $CoreBusiness = CoreBusiness::all();
        $CorporateInformation = CorporateInformation::all();
        $page_title = "Lien Hoe Corporation Berhad | Hotels, Building and Civil works, Property Development & Investment";
        $latestNews = DB::connection('medianews')->select('SELECT * FROM media_news WHERE `status` = 1 ORDER BY `date` DESC LIMIT 0,4');
        $links = Links::All();
        // ticker data
        $stockdata        = DB::connection('charts')->select('SELECT * FROM ohlc ORDER BY `id` DESC LIMIT 0,1');
        $share_price      = DB::connection('charts')->select('SELECT * FROM ohlcvs ORDER BY `date` DESC LIMIT 20');

        $dataArray = [];
        foreach ($share_price as $data) {
            array_push($dataArray, $data->last_done);
        }
        $max = round(max($dataArray) * 1.02, 3);
        $min = round(min($dataArray) * 0.98, 3);
        // dd($latestNews);

        $popup = PopUp::find(1);

        return View::make('front.index')
            ->with('montages', $montages)
            ->with('BottomMontages', $BottomMontages)
            ->with('homePageData', $homePageData)
            ->with('businesses_create', $CoreBusiness)
            ->with('corporate_information_create', $CorporateInformation)
            ->with('page_title', $page_title)
            ->with('latestNews', $latestNews)
            ->with('stockdata', $stockdata)
            ->with('popup', $popup)
            ->with('share_price', $share_price)
            ->with('reportLink', $reportLink)
            ->with('links', $links)
            ->with('max', $max)
            ->with('min', $min)
            ->with('highlights',  $highlights);
    }

    public function showCharter()
    {
        $page_title = "Board Charter";

        return View::make('front.board_charter')
            ->with('page_title', $page_title);
    }

    public function showProfile()
    {
        $page_title = "Corporate Profile";
        $links = Links::All();
        $profile = Page::find(4);
        return View::make('front.corporate_profile', ['page' => $profile])
            ->with('page_title', $page_title);
    }

    public function showCeoMessage()
    {
        $page_title = "CEO Message";
        $profile = Page::find(8);
        $ceo_image = $CoreSub = CoreSub::select('image')->where([
            'type' => 'ceomessage'
        ])->first();

        return View::make('front.ceo_message', ['page' => $profile, 'ceo_image' => $ceo_image->image])
            ->with('page_title', $page_title);
    }

    public function showCore($type)
    {
        $page = Page::where('type', $type)->first();
        $page_title = strip_tags($page->heading2);
        $CoreSub = CoreSub::where('status', '=', 1)->where('type', $type)->first();
        return View::make('front.core_sub', ['CoreSub' => $CoreSub, 'page' => $page])
            ->with('page_title', $page_title);
    }


    public function showStructure()
    {
        $page_title = "Corporate Structure";
        $CorporateStructure = CorporateStructure::where('status', '=', 1)->first();
        return View::make('front.corporate_structure', ['CorporateStructure' => $CorporateStructure])
            ->with('page_title', $page_title);
    }

    public function showCalculator()
    {
        $page_title = "Price Gain/Loss Calculator";
        $links = Links::all();
        return View::make('front.investor_tools_news_price_gain_loss_calculator')
            ->with('page_title', $page_title)->with('links', $links);
    }

    public function showPage($page = "pagenotfound")
    {
        $page_title = "Page Not Found";
        $montages = Montage::where('status', '=', 1)->get();
        $CoreBusiness = CoreBusiness::all();
        $links = Links::All();
        return View::make('front.' . $page, ["links" => $links])
            ->with('page_title', $page_title)
            ->with('montages', $montages)
            ->with('businesses_create', $CoreBusiness);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function Online_job_vacancy($vacancy_id)
    {



        $page_title = "Job Vacancies";

        $montages = Montage::where('status', '=', 1)->get();
        $Education_data = array();
        $Education_data['HigherLevel'] = "Higher secondary / STPM / &quot;A&quot; Level / Pre-U";
        $Education_data['DiplomaHigher'] = "Diploma / Advanced Higher / Graduate Diploma";
        $Education_data['ProfessionalDegree'] = "Professional Certificated / Degree / Master";

        $Country_data = array();
        $Country_data['Select'] = "-- Select--";
        $Country_data['UnitedKingdom'] = "United Kingdom";
        $Country_data['America'] = "United States of America";
        $Country_data['UAE'] = "United Arab Emirates";

        $job_title = Career::find($vacancy_id);
        $links = Links::All();

        // load the create form (app/views/nerds/create.blade.php)
        return View::make('front.online_job_application', ['links' => $links])
            ->with('education_data', $Education_data)
            ->with('country_data', $Country_data)
            ->with('montages', $montages)
            ->with('vacancy_id', $vacancy_id)
            ->with('page_title', $page_title)
            ->with('job_title', $job_title);
    }
    public function create()
    {
        $page_title = "Careers";
        $montages = Montage::where('status', '=', 1)->get();
        $homePageData = Page::find(1);
        $careers = Career::where('status', '=', 1)->get();
        $page = Page::where('type', 'career')->first();
        $links = Links::All();
        return View::make('front.careers', ['links' => $links])
            ->with('montages', $montages)
            ->with('job_vacancies_data', $careers)
            ->with('page', $page)
            ->with('page_title', $page_title);
    }
    public function online_apply_form($vacancy_id)
    {
        $page_title = "Careers | Online Job Application Form";
        $montages = Montage::where('status', '=', 1)->get();
        $Education_data = array();
        $Education_data['HigherLevel'] = "Higher secondary / STPM / &quot;A&quot; Level / Pre-U";
        $Education_data['DiplomaHigher'] = "Diploma / Advanced Higher / Graduate Diploma";
        $Education_data['ProfessionalDegree'] = "Professional Certificated / Degree / Master";

        $Country_data = array();
        $Country_data['Select'] = "-- Select--";
        $Country_data['UnitedKingdom'] = "United Kingdom";
        $Country_data['America'] = "United States of America";
        $Country_data['UAE'] = "United Arab Emirates";
        $links = Links::All();

        $job_title = Career::find($vacancy_id);
        return View::make('front.online_job_application')
            ->with('vacancy_id', $vacancy_id)
            ->with('education_data', $Education_data)
            ->with('country_data', $Country_data)
            ->with('montages', $montages)
            ->with('page_title', $page_title)
            ->with('job_title', $job_title)
            ->with('links', $links);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
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
            $Home->EducationLevel = Input::get('Education_Level');
            $Home->Address       = Input::get('Address');
            $Home->City          = Input::get('City');
            $Home->State         = Input::get('State');
            $Home->PostalCode    = Input::get('Postal_Code');
            $Home->Country       = Input::get('Country');
            $Home->career_vacancy_id = Input::get('vacancy_id');

            $Home->JobName        = Career::find(Input::get('vacancy_id'))->jobtitle;


            if (Input::hasFile('CV_docs')) {
                $fileName = Input::file('CV_docs')->getClientOriginalName();
                $pathExt = pathinfo($fileName);

                $allowedExt = array('PDF', 'RTF', 'DOC', 'DOCX', 'JPG', 'JPEG');
                if (in_array(strtoupper($pathExt['extension']), $allowedExt)) {
                    /*
	                	Sergey Vratenkov -- appending applicant's name in front of the CV filename and move CV into FTP folder
	                	Input::file('CV_docs')->move(public_path()."/uploads/cv/",Input::file('CV_docs')->getClientOriginalName());
	                	$Home->CV  = Input::file('CV_docs')->getClientOriginalName();
	                */
                    $appFileName = Input::get('Name') . '-' . $fileName;
                    //Input::file('CV_docs')->move(public_path().'/uploads/cv/', $appFileName);
                    $Home->CV = $appFileName;
                    Input::file('CV_docs')->move(public_path() . "/uploads/cv/", $appFileName);
                    //$Home->process_cv(public_path().'/uploads/cv/', $appFileName);
                } else {
                    Session::flash('error_message', 'This type of file is not allowed.Please use any of these file types PDF, RTF, DOC, DOCX, JPG, JPEG');
                    return Redirect::to('online_apply_form/' . Input::get('vacancy_id'));
                }
                //$url = $file->getURL();
            }

            $Home->save();
            //$Home->process_csv();

            // redirect
            Session::flash('message', 'You have successfully submitted your CV. Only short listed candidates will be notified for interview.');
            Session::flash('eror_message', '<strong>Error!</strong> Please correct the errors in the form below.');
            return Redirect::to('online_apply_form/' . Input::get('vacancy_id'));
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
                ->withErrors($validator);
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
        $file = public_path() . "/download/info.jpg";
        $headers = array(
            'Content-Type: application/jpg',
        );
        return Response::download($file, 'filename.jpg', $headers);
    }

    public function getStockData()
    {

        // ticker data
        $stockdata          = DB::connection('charts')->select('SELECT * FROM ohlc ORDER BY `id` DESC LIMIT 0,1');

        return View::make('includes.ticker')
            ->with('stockdata', $stockdata);
    }


    public function showContacttracing()
    {
        $page_title = "Contact Tracing";

        return View::make('front.contact_tracing')
            ->with('page_title', $page_title);
        return "Contact Tracing";
    }

    public function storeContacttracing()
    {
        $rules = array(
            'name' => 'required',
            'phone' => 'required',
            'temperature' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors())->withInput();
        } else {
            // store
            $contact = new ContactTracing;
            $contact->name = Input::get('name');
            $contact->phone = Input::get('phone');
            $contact->temperature = Input::get('temperature');
            $contact->status = 1;
            $contact->save();

            // redirect
            Session::flash('message', 'Successfully Submited');
            return Redirect::to('contacttracing');
        }
    }

    public function showYourname($phn)
    {
        $name = ContactTracing::where("phone", $phn)->pluck("name");
        return Response::json(array('name' => $name));
    }
}
