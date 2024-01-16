<?php

class MontageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            //echo "its here";
		// get all the nerds
		$montage = Montage::all();
                //echo "<pre>";
                //print_r($nerds);
                //echo "</pre>";
		// load the view and pass the nerds
		return View::make('admin.index_edit')
			->with('montage', $montage);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/nerds/create.blade.php)
		return View::make('admin.index_edit');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
        public function add_montages()
	{
                if (!Session::has('user')) {
                    return Redirect::to('ListDeedAdmin');
                }
                $user = Session::get('user');
		// load the create form (app/views/nerds/create.blade.php)
                $montage = Montage::all();
		return View::make('admin.add_montages')
                        ->with('montages', $montage)
                        ->with('user', $user);
	}
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation

		

		$rules = array(
			'title'       => '',
			'status'      => '',
			'Banner'      => '',
                        'morestatus'  => '',
                        'url'         => ''
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
                     Session::flash('error_message', 'The information has not been saved/updated. Please correct the errors');
			return Redirect::to('index_edit')
				->withErrors($validator);

		} else {
			// store
			$montage = new Montage;
			$montage->title       = Input::get('title');
			$montage->status      = (Input::get('status')) ? Input::get('status') : 0;
                        $montage->body        = Input::get('montage_banner_text');
                        $montage->MoreStatus  = (Input::get('morestatus')) ? Input::get('morestatus') : 0;
                        $montage->url         = Input::get('url');
		  if (Input::hasFile('Banner_image')){
                        Input::file('Banner_image')->move(public_path()."/uploads/slides/",Input::file('Banner_image')->getClientOriginalName());
                        $montage->Banner      = Input::file('Banner_image')->getClientOriginalName();
                        //$url = $file->getURL();

                    }
			$montage->save();

			// redirect
			Session::flash('message', 'The information has been saved successfully.');
			return Redirect::to('index_edit');
		}
	}
  public function edit_montages($id)
	{
		// get the nerd
		$montage = Montage::find($id);

		// show the edit form and pass the nerd
		return View::make('admin.update_montages')
			->with('montage', $montage);
	}

	public function update($id)
	{
		//print_r($_POST);
                //exit;
		$rules = array(
			'title'       => '',
			'status'      => '',
			'Banner'      => '',
                        'MoreStatus'  => '',
                        'url'         => ''
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('index_edit/' . $id . '/edit')
				->withErrors($validator)
				;
		} else {
			// store
                        //print_r($_POST);
                        //exit;
			$montage = Montage::find($id);
			$montage->title       = Input::get('title');
			$montage->status      = Input::get('status');
                        $montage->body      = Input::get('mon_body');
                        $montage->MoreStatus  = Input::get('morestatus');
                        $montage->url         = Input::get('url');
			if (Input::hasFile('Banner_image')){
                            Input::file('Banner_image')->move(public_path()."/uploads/slides/",Input::file('Banner_image')->getClientOriginalName());
                            $montage->Banner      = Input::file('Banner_image')->getClientOriginalName();
                        //$url = $file->getURL();

                        }
                        $montage->save();

			// redirect
			Session::flash('message', 'The information has been updated successfully!');
			return Redirect::to('index_edit');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function dodestroy($id)
	{
		// delete
		$montages = Montage::find($id);
		$montages->delete();

		// redirect
		Session::flash('message', 'The information has been deleted successfully!');
		return Redirect::to('index_edit');
	}

}
