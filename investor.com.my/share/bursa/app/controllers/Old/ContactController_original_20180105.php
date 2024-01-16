<?php

class ContactController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Contact Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/       
	       
        
        public function contactusFront()
        {
           $tagLine = "Full Turnkey Solutions for Telecom Client.";
           $mainMenuTitle = "Contact Us";
           $metaTitle = $mainMenuTitle;
           $contactFrame = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.014551153018!2d101.56394030000001!3d3.090785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4db427cc497d%3A0xc3b0da0fd708fc20!2s18%2C+Jalan+Jurunilai+U1%2F20%2C+Hicom-glenmarie+Industrial+Park%2C+40150+Shah+Alam%2C+Selangor%2C+Malaysia!5e0!3m2!1sen!2smy!4v1430303398379" width="100%" height="400" frameborder="0" style="border:0"></iframe>';
           $masthead = "";
           $pageTitle = "<h1>Contact Us</h1>";
          
           $breadcrumbs = array(
                                      0 => array 
                                                (
                                                   "title" => "Home",
                                                   "url" => ""
                                                ),
                                     1 => array 
                                                (
                                                   "title" => "Contact Us",
                                                   "url" => ""
                                                )
                                   
                                   
                                    );
               
                return View::make('frontcontactus',array(
                                                       'mainMenuTitle' => $mainMenuTitle,
                                                       'contactFrame' => $contactFrame,
                                                       'pageTitle' => $pageTitle ,
                                                       'breadcrumbs' => $breadcrumbs,
                                                       'tagLine' => $tagLine
                                                       
                                                     ));
        }
        
        public function contactsubmit()
        {
           /* $Name = Input::get('Name');
            $Email = Input::get('Email');
            $Phone = Input::get('Phone');
            $CompanyName= Input::get('CompanyName');
            $subject = Input::get('subject');
            $message = Input::get('message');
            $subscribe = Input::get('subscribe');
           
            */
           // $mailmsg = compact();
            $mailmsg = array();
            $mailmsg = Input::all();
             $rules = array(
                        'g-recaptcha-response' => 'required|recaptcha',
		);
            $validator = Validator::make(Input::all(), $rules);
                
                
                

		// process the login
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator->errors())->withInput();
                }
          
            Mail::send('emails.contact', $mailmsg , function($message)
{
    $message->to('enquiry@myock.com', 'OCK Enquiry')->subject('Bursa Enquiry!');
});
       
if(Input::has('subscribe'))   
                      {
    if(Input::get('subscribe') == 'Subscribe')   
    {
                   $email = Input::get('Email'); 
		   $alertcnt = Alerts::where('email' , '=', $email)->count();
		   if( $alertcnt == 0)
		   {
			   $diradd = Alerts::create(Input::all());
			   if($diradd)
			  {
				$msg = '<div class="alert alert-success alert-dismissable">
				  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				  <i class="fa fa-check-circle"></i> <strong>Success!</strong>
				  <p>Email Sent, News Alert Subscribed Successfully.</p>
				</div>';  
                               
			  }
			  else
			  {
				$msg = '<div class="alert alert-error alert-dismissable">
				  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				  <i class="fa fa-check-circle"></i> <strong>Error!</strong>
				  <p>Something happened try again.</p>
				</div>';  
                             
			  }
		   }
		   else
		   {
			$msg = '<div class="alert alert-error alert-dismissable">
				  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				  <i class="fa fa-check-circle"></i> <strong>Error!</strong>
				  <p>Email Sent, This email id already exists for News Alert.</p>
				</div>';    
                       
		   }

      }
                      }
                    else
                  {
   $msg = '<div class="alert alert-success alert-dismissable">
				  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				  <i class="fa fa-check-circle"></i> <strong>Success!</strong>
				  <p>Email Sent Successfully.</p>
				</div>';    
                }
  return Redirect::back()->with('message',$msg);
 }          
 
  public function regionaloffices() {
            
                $pageTitle = "Regional Offices";
                $masthead = url().'/images/banner_subpage/banner13.jpg';
                $breadcrumbs = array(
                                    0 => array 
                                                (
                                                   "title" => "Home",
                                                   "url" => ""
                                                ),
                                     1 => array 
                                                (
                                                   "title" => "Contact Us",
                                                   "url" => "http://bursa.ock.net.my/contactus"
                                                ),
                                    2 => array 
                                                (
                                                   "title" => "Regional Offices",
                                                   "url" => ""
                                                )
                                   
                                    );
                $tagLine = "Full Turnkey Solutions for Telecom Client.";
                $mainMenuTitle = $pageTitle;
                $metaTitle = $mainMenuTitle;
		       
                   return View::make('frontregionaloffices',array(
                                                   'pageTitle' => $pageTitle,
                                                   'masthead' => $masthead,
                                                   'breadcrumbs' => $breadcrumbs,
                                                   'tagLine' => $tagLine,                                       
                                                   'metaTitle' => $metaTitle,
                                                   
												   
												  
												     )
                                 );
             
        }
}

