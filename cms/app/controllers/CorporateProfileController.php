<?php

class CorporateProfileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
          if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
           $page = Page::find(4);
	   return View::make('admin.corporate_profile', ['page' => $page ]);
        }

        /** Update corporate profile data **/
        public function update()
        {

             $rules = array(
			'heading1'     => 'required',
                        'body1'       => 'required',
            'body2'       => 'required',
            'heading3'       => 'required',
            'body3'       => 'required',
            'heading4'       => 'required',
            'body4'       => 'required',
            
		);
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
			return Redirect::to('corporate-profile')
				->withErrors($validator)
				->withInput();
            }
            $id = Input::get('id'); 
            $page = Page::find($id);
            
            $page->heading1       = Input::get('heading1');
            $page->body1          = Input::get('body1');
            $page->body2          = Input::get('body2');
            $page->heading3          = Input::get('heading3');
            $page->body3          = Input::get('body3');
            $page->heading4          = Input::get('heading4');
            $page->body4          = Input::get('body4');
            $page->save();
            Session::flash('message', 'The page has been saved successfully!');
            return Redirect::to('corporate-profile');
        }
}