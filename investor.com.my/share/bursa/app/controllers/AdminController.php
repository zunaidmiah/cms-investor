<?php

class AdminController extends BaseController {

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
       
	public function showLogin()
	{
	
            return View::make('login');
	}
        
        public function handleLogin() {
            
          $data = Input::only(['username', 'password']);
         
          if(Auth::attempt(['username' => $data['username'], 'password' => $data['password'],'active' => 1])){
             $accesslist = unserialize(Auth::user()->accesslist);
             Session::put('accesslist', $accesslist);
          
            return Redirect::intended('admin/irhome');
          }

          return Redirect::route('login')->withInput();
  
        }
        public function dashboard() {
             $applicants = Application::select('applications.*','vaccancies.job_location','vaccancies.job_title','vaccancies.post_date','vaccancies.company' )->join('vaccancies','applications.vaccancyid','=','vaccancies.id')->orderBy('applications.id', 'DESC')->paginate(5);            
             $pressreleases = Pressrelease::paginate(5);
             $applicants_count = Application::count();
             $vaccancies_count = Career::count();
             $pressreleases_count = Pressrelease::count();
             return View::make('dashboard', array(
                                                   'applicants' => $applicants,
                                                   'pressreleases' => $pressreleases,
                                                   'applicants_count' => $applicants_count,
                                                   'vaccancies_count' => $vaccancies_count,
                                                   'pressreleases_count' => $pressreleases_count
                                                  ));
        }
        
        public function adminindex() {
           
           $page = Page::where('type','=','index')->where('published','=',1)->get();
	   
              /* Paginate Count Section */
             $pgCount = Banner::count();
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
                 exit;
                 }
             }
             if(Input::get('noperpage1'))
             {
               $noperpage = Input::get('noperpage1');  
             }
             else {
                  
                   $noperpage = 10;
               }
             /* End of Paginate Count Section */
           $banners = Banner::paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
           
               /* Paginate Count Section */
             $pgCount = Corebusiness::count();
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
                 exit;
                 }
             }
             if(Input::get('noperpage2'))
             {
               $noperpage = Input::get('noperpage2');  
             }
             else {
                  
                   $noperpage = 10;
               }
             /* End of Paginate Count Section */
           $corebusinesses = Corebusiness::paginate($noperpage);
            if($pgCount > 0)
           {
           $cntarray2 = $cntArr;
           }
           else {
           $cntarray2 = 0;
           }
           return View::make('adminindex', array ( 'page' => $page,'banners' => $banners, 'cntarray1' => $cntarray1, 'cntarray2' => $cntarray2,'corebusinesses' => $corebusinesses ));
        }
		  public function deleteBanner() {
		   $id = Input::get('bannerid'); 
           $banner = Banner::findOrFail($id);
		   $banner->delete();
		   if($banner)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Deleted Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
          // $banners = Banner::paginate(2);
          // $corebusinesses = Corebusiness::paginate(2);
          // return View::make('adminindex', array ( 'banners' => $banners, 'corebusinesses' => $corebusinesses ));
        }
       public function addBanner() {
           $banner = Banner::create(Input::all()); 
           if($banner)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Montage Added Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
       } 
       
        public function editBanner() {
           $bannerId = Input::get('bannerid'); 
           $banner = Banner::find($bannerId);
           $banner->bannerimage = Input::file('bannerimage');
           $banner->title = Input::get('title');
           $banner->banner_text1 = Input::get('banner_text1');
           $banner->banner_text2 = Input::get('banner_text2');
           $banner->active = Input::get('active');
            if($banner->save())
            {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Montage Edited Successfully.</p>
              </div>');
            }
            else
            {
                return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
            }
       } 
       
       /* Core Businesses Functions */
       public function addCorebusiness() {
           $corebusinesses = Corebusiness::create(Input::all()); 
           if($corebusinesses)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Corebusiness Added Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
       } 
        public function deleteCorebusiness() {
		   $id = Input::get('corebusinessid'); 
           $corebusinesses = Corebusiness::findOrFail($id);
		   $corebusinesses->delete();
		   if($corebusinesses)
           {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Deleted Successfully.</p>
              </div>');
           }
           else 
           {
               return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
           }
          // $banners = Banner::paginate(2);
          // $corebusinesses = Corebusiness::paginate(2);
          // return View::make('adminindex', array ( 'banners' => $banners, 'corebusinesses' => $corebusinesses ));
        }
        public function editCorebusiness() {
           $corebusinessId = Input::get('corebusinessid'); 
           $corebusiness = Corebusiness::find($corebusinessId);
           $corebusiness->corebusinessimage = Input::file('corebusinessimage');
           $corebusiness->title = Input::get('title');
           $corebusiness->short_description = Input::get('short_description');
           $corebusiness->url = Input::get('url');
           $corebusiness->display_order = Input::get('display_order');
           $corebusiness->active = Input::get('active');
            if($corebusiness->save())
            {
                return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Corebusiness Edited Successfully.</p>
              </div>');
            }
            else
            {
                return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Something happened try again.</p>
              </div>');
            }
       } 
       /* End of Core Businesses Functions */
       
       public function handleLogout() {
            
            Auth::logout();
            return Redirect::intended('admin/login');
      }
      
      public function forgotPassword() {
            
            
            return View::make('forgotpass');
      }
	  
	  public function updateOrder()
	  {
		  $data = json_decode($_POST['OrderData']);
		  $model = ucwords(Input::get('model'));
		  foreach(get_object_vars($data) as $k => $value) {
         
                   $corebusiness = $model::find($k);
                   $corebusiness->display_order = $value;
                   $corebusiness->save();
         
                 }

	  }


       public function adminIRHome()
       {
             $page = Page::where('type','=','irhome')->where('published','=',1)->get();
             $stockdata = DB::connection('charts')->select('SELECT * FROM ohlc ORDER BY `id` DESC LIMIT 0,1');
             return View::make('adminirhome', array(
                                                   'page' => $page,
                                                   'stockdata' => $stockdata[0]
                                                  ));
       }
      
       public function updatePriceTicker()
       {
           $today = date('Y-m-d');
           $prevCloseData = DB::connection('charts')->select('SELECT close FROM ohlc WHERE "'.$today.'" !=STR_TO_DATE(`date`,"%d-%m-%Y") ORDER BY `id` DESC LIMIT 0,1');
           $openData = DB::connection('charts')->select('SELECT open FROM ohlc WHERE "'.$today.'" =STR_TO_DATE(`date`,"%d-%m-%Y") ORDER BY `id` LIMIT 0,1');
           $dayHighData = DB::connection('charts')->select('SELECT high FROM ohlc WHERE "'.$today.'" =STR_TO_DATE(`date`,"%d-%m-%Y") ORDER BY `high` DESC LIMIT 0,1');
           $dayLowData = DB::connection('charts')->select('SELECT low FROM ohlc WHERE "'.$today.'" =STR_TO_DATE(`date`,"%d-%m-%Y") ORDER BY `low` LIMIT 0,1');
// Following for stock price
            $stockdata = DB::connection('charts')->select('SELECT * FROM ohlc ORDER BY `id` DESC LIMIT 0,2');
            // Get the Day's high/low value
            
//            $stockhighlow = DB::connection('charts')->select("SELECT `id`,`high`,`low`,`date`,MAX(`high`) as maxclose,MIN(NULLIF(`low`, 0)) as minclose,now(),DATEDIFF(now(),STR_TO_DATE(`date`,'%d-%m-%Y  %H:%i:%s')) as nodays 
//                FROM `ohlc` 
//                WHERE STR_TO_DATE(`date`,'%d-%m-%Y') = STR_TO_DATE('".$stockdata[0]->date."','%d-%m-%Y') ");
            //$stockhighlow = DB::connection('charts')->select("SELECT `id`,`high`,`low`,`date`,MAX(`high`) as maxclose,MIN(`low`) as minclose,now(),DATEDIFF(now(),STR_TO_DATE(`date`,'%d-%m-%Y  %H:%i:%s')) as nodays FROM `ohlc` WHERE DATEDIFF(now(),STR_TO_DATE(`date`,'%d-%m-%Y  %H:%i:%s'))  = 0 ");
            // Get the 52 week's high low
            $yearLastDay = date('Y-m-d', strtotime('-1 year'));
            //$stockhighlowwk = DB::connection('charts')->select("SELECT `id`,`high`,`low`,`date`,MAX(`high`) as maxclose,MIN(NULLIF(`low`, 0)) as minclose,now(),DATEDIFF(now(),STR_TO_DATE(`date`,'%d-%m-%Y  %H:%i:%s')) as nodays FROM `ohlc` WHERE DATEDIFF(now(),STR_TO_DATE(`date`,'%d-%m-%Y  %H:%i:%s'))  BETWEEN 0 AND 364 ");          
            $stockhighlowwk = DB::connection('charts')->select("SELECT `id`,`high`,`low`,`date`,MAX(`high`) as maxclose,MIN(NULLIF(`low`, 0)) as minclose,now(),DATEDIFF(now(),STR_TO_DATE(`date`,'%d-%m-%Y  %H:%i:%s')) as nodays FROM `ohlcvs` WHERE date > '".$yearLastDay."'");          
            // Last Stock Data
            $laststockdata = DB::connection('charts')->select('SELECT * FROM ohlcvs ORDER BY `id` DESC LIMIT 0,1');
            
            $prevClose = ($prevCloseData[0]->close==0)?'<i class="icon-minus icon-arrow-down"></i>':$prevCloseData[0]->close;
            $open = (isset($stockdata[0])) ? $stockdata[0]->open : 0;
            $dayHigh = (isset($stockdata[0])) ? $stockdata[0]->high : 0;
            $dayLow = (isset($stockdata[0])) ? $stockdata[0]->low : 0;
            $weekHigh = ($stockhighlowwk[0]->maxclose==0)?'<i class="icon-minus icon-arrow-down"></i>':number_format($stockhighlowwk[0]->maxclose,2);
            $weekLow = ($stockhighlowwk[0]->minclose==0)?'<i class="icon-minus icon-arrow-down"></i>':number_format($stockhighlowwk[0]->minclose,2);
            $volumeTraded = ($stockdata[0]->volume==0)?'<i class="icon-minus icon-arrow-down"></i>':number_format($stockdata[0]->volume,2);
            $valueTraded = $volumeTraded * $open;
            $price = ($stockdata[0]->close==0)?'<i class="icon-minus icon-arrow-down"></i>':$stockdata[0]->close;
            $change = ($stockdata[0]->adj==0)?"":number_format($stockdata[0]->adj,2);
            $changePercentage = ($stockdata[0]->percentage_change==0)?"":number_format($stockdata[0]->percentage_change,2);
            
//            $prevClose = $stockdata[1]->close;
//            $volumeTraded = $stockdata[0]->volume;
//            $open = $stockdata[0]->open;
//            $valueTraded = $volumeTraded * $open;
//            $dayHigh = $stockhighlow[0]->maxclose;
//            $dayLow = $stockhighlow[0]->minclose;
//            $weekHigh = $stockhighlowwk[0]->maxclose;
//            $weekLow = $stockhighlowwk[0]->minclose;

            $open = ($open==0)?'<i class="icon-minus icon-arrow-down"></i>':$open;
            $dayHigh = ($dayHigh==0)?'<i class="icon-minus icon-arrow-down"></i>':$dayHigh;
            $dayLow = ($dayLow==0)?'<i class="icon-minus icon-arrow-down"></i>':$dayLow;
            $valueTraded = ($valueTraded==0)?'<i class="icon-minus icon-arrow-down"></i>':$valueTraded;

            $quotelastupdated = $stockdata[0]->date;
            $returnData = array(
                                'prevClose' => $prevClose,
                                'volumeTraded' => $volumeTraded,
                                'open' => $open,
                                'valueTraded' => $valueTraded,
                                'dayHigh' => $dayHigh,
                                'dayLow' => $dayLow,
                                'weekHigh' => $weekHigh,
                                'weekLow' => $weekLow,
                                'quotelastupdated' => $quotelastupdated,
                                'price' => $price,
                                'change' => $change,
                                'changePercentage' => $changePercentage
                                );
            echo json_encode($returnData);
            
            
       }
       
}

