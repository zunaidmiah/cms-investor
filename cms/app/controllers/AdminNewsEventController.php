<?php

class AdminNewsEventController extends BaseController {

	

	public function showNewsEvent()
	{
            if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
            $user = Session::get('user');
            return View::make('admin.news_event_edit')->with('user', $user);
	}

}
