<?php

class AdminCareersController extends BaseController {

	

	public function showAdminVacancies()
	{
            if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
            $user = Session::get('user');
            return View::make('admin.career_vac_edit')->with('user', $user);
	}
        public function showAdminOnlineApplicants()
	{
            if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
            $user = Session::get('user');
            return View::make('admin.career_online_applicants_edit')->with('user', $user);
	}
 public function showDefaultblade()
	{
           
            
            return View::make('admin.index_edit');
	}
}
