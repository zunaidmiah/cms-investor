<?php


class AdminController extends BaseController {

	public function __construct() {
        //parent::__construct();

    }

    public function index() {
    	return View::make('admin.admin_login');
    }

    public function showPage($page=""){
        if (!Session::has('user')) {
            return Redirect::to('ListDeedAdmin');
        }
        $user = Session::get('user');

            return View::make('admin.'.$page)
                    ->with('user', $user)
                    ;

        }

    public function adminLogin() {
    		// validate the info, create rules for the inputs
		$rules = array(
			'username'    => 'required', // make sure its required
			'password'    => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('ListDeedAdmin')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			// attempt to do the login

                        try
                        {
                            // Login credentials
                            $credentials = array(
                                'email'    => Input::get('username'),
                                'password' => Input::get('password'),
                            );

                            // Authenticate the user
                            //print_r("Passsword Entered..");
				$password = Hash::make('password');
				//echo $password; exit;
                            $user = Sentry::authenticate($credentials, false);
                            //print_r("Login Successful"); exit;
                            Session::put('user', $user);
                            return Redirect::to('dashboard');
                        }
                        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
                        {
                            //echo 'Login field is required.';
                            Session::flash('error_message', 'Login field is required.');
                            return Redirect::to('ListDeedAdmin');
                        }
                        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
                        {
                            //echo 'Password field is required.';
                            Session::flash('error_message', 'Password field is required.');
                            return Redirect::to('ListDeedAdmin');
                        }
                        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
                        {
                            //echo 'Wrong password, try again.';
                            Session::flash('error_message', 'Wrong password, try again.');
                            return Redirect::to('ListDeedAdmin');
                        }
                        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
                        {
                            //echo 'User was not found.';
                            Session::flash('error_message', 'User was not found.');
                            return Redirect::to('ListDeedAdmin');
                        }
                        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
                        {
                            //echo 'User is not activated.';
                            Session::flash('error_message', 'User is not activated.');
                            return Redirect::to('ListDeedAdmin');
                        }

                        // The following is only required if the throttling is enabled
                        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
                        {
                            //echo 'User is suspended.';
                            Session::flash('error_message', 'User is suspended.');
                            return Redirect::to('ListDeedAdmin');
                        }
                        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
                        {
                            //echo 'User is banned.';
                            Session::flash('error_message', 'User is banned.');
                            return Redirect::to('ListDeedAdmin');
                        }




                        // The login failed. Check error to see why.



		}
    }
    public function adminLogout() {
        Sentry::logout();
        return Redirect::to('ListDeedAdmin');
        }


    public function showDashboard(){
        if (!Session::has('user')) {
            return Redirect::to('ListDeedAdmin');
        }
       $user = Session::get('user');
		$vacancy= DB::select('select vacancies.name,vacancies.created_at,careers.jobtitle from vacancies,careers where(vacancies.career_vacancy_id=careers.id) order by(vacancies.id) desc limit 0,5 ');

		$count=Vacancy::count();
		$count_jobs = Career::where('status', '=', 1)->count();
                $count_photos = Photos::count();




        return View::make('admin.dashboard')->with('user', $user)
        ->with('count_jobs', $count_jobs)
	->with('vacancy',$vacancy)->with('count',$count)->with('count_photos',$count_photos);
    }




       // $page->save();
        //echo "wow";

    public function ForgotPassword() {
    		// validate the info, create rules for the inputs

		 return View::make('admin.forgot_password');

    }
    public function ProcessForgotPassword() {
    		// validate the info, create rules for the inputs
	try
        {
            // Find the user using the user email address
            $user = Sentry::findUserByLogin(Input::get('email'));

            // Get the password reset code
            $resetCode = $user->getResetPasswordCode();

            //return View::make('admin.forgot_password');


            Mail::send('emails.auth.reminder', array('resetCode' => $resetCode,'id'=>$user->id), function($message)
            {
                $message->to(Input::get('email'), "My Name")->subject('Reset Password Request');
            });
            //return Redirect::to('ActivatePassword/'.$resetCode.'/'.$user->id);
            // Now you can send this code to your user via email for example.
            Session::flash('message', 'The information has been sent on email successfully.');
            return View::make('admin.forgot_password');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            Session::flash('error_message', 'We are unable to find email in database.');
            return View::make('admin.forgot_password');
        }


    }
    public function ActivateNewPassword($passcode,$user_id) {

        return View::make('admin.activate_new_password')
                ->with('passcode', $passcode)
                ->with('user_id', $user_id);
    }

    public function ProcessNewPassword(){
        try
        {
            //print_r($_POST);
            //exit;
            // Find the user using the user id
            $user = Sentry::findUserById(Input::get('user_id'));

            // Check if the reset password code is valid
            if ($user->checkResetPasswordCode(Input::get('passcode')))
            {
                // Attempt to reset the user password
                if ($user->attemptResetPassword(Input::get('passcode'), Input::get('password')))
                {
                    // Password reset passed
                    Session::flash('message', 'Your password has been updated successfully.');
                     return Redirect::to('ListDeedAdmin');
                }
                else
                {
                    // Password reset failed
                    Session::flash('error_message', 'We are unable to set password.');
                     return Redirect::to('ListDeedAdmin');
                }
            }
            else
            {
                // The provided password reset code is Invalid
            }
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }
    }
	
    public function changepassword($user_id){
		$newpassword = Hash::make(Input::get('password'));
		$password=DB::table('users')
            ->where('id', $user_id)
            ->update(array('password' => $newpassword));
			
			if($password)
			{
				Session::flash('flash_message', '<b>Well done!</b> You successfully Saved.');
				Session::flash('flash_type', 'alert-success');
			}
			else
			{
				Session::flash('flash_message', '<b>Oops!</b> Something wrong Passsword not Save..');
				Session::flash('flash_type', 'alert-danger');
			}
			 return Redirect::to('dashboard');
	}

}
