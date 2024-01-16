<?php

class BottomMontageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            //echo "its here";
		// get all the nerds
		$BottomMontage = BottomMontage::all();
                //echo "<pre>";
                //print_r($nerds);
                //echo "</pre>";
		// load the view and pass the nerds
		return View::make('admin.index_edit')
			->with('BottomMontage', $BottomMontage);
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
        public function add_BottomMontages()
	{
                if (!Session::has('user')) {
                    return Redirect::to('ListDeedAdmin');
                }
                $user = Session::get('user');
		// load the create form (app/views/nerds/create.blade.php)
                $BottomMontage = BottomMontage::all();
		return View::make('admin.add_BottomMontages')
                        ->with('BottomMontages', $BottomMontage)
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
			$BottomMontage = new BottomMontage;
			$BottomMontage->title       = Input::get('title');
			$BottomMontage->status      = (Input::get('status')) ? Input::get('status') : 0;
                        $BottomMontage->body        = Input::get('BottomMontage_banner_text');
                        $BottomMontage->MoreStatus  = (Input::get('morestatus')) ? Input::get('morestatus') : 0;
                        $BottomMontage->url         = Input::get('url');
		  if (Input::hasFile('Banner_image')){
                        Input::file('Banner_image')->move(public_path()."/uploads/slides/",Input::file('Banner_image')->getClientOriginalName());
                        $BottomMontage->Banner      = Input::file('Banner_image')->getClientOriginalName();
                        //$url = $file->getURL();

                    }
			$BottomMontage->save();

			// redirect
			Session::flash('message', 'The information has been saved successfully.');
			return Redirect::to('index_edit');
		}
	}
  public function edit_BottomMontages($id)
	{
		// get the nerd
		$BottomMontage = BottomMontage::find($id);

		// show the edit form and pass the nerd
		return View::make('admin.update_BottomMontages')
			->with('BottomMontage', $BottomMontage);
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
			$BottomMontage = BottomMontage::find($id);
			$BottomMontage->title       = Input::get('title');
			$BottomMontage->status      = Input::get('status');
                        $BottomMontage->body      = Input::get('mon_body');
                        $BottomMontage->MoreStatus  = Input::get('morestatus');
                        $BottomMontage->url         = Input::get('url');
			if (Input::hasFile('Banner_image')){
                            Input::file('Banner_image')->move(public_path()."/uploads/slides/",Input::file('Banner_image')->getClientOriginalName());
                            $BottomMontage->Banner      = Input::file('Banner_image')->getClientOriginalName();
                        //$url = $file->getURL();

                        }
                        $BottomMontage->save();

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
		$BottomMontages = BottomMontage::find($id);
		$BottomMontages->delete();

		// redirect
		Session::flash('message', 'The information has been deleted successfully!');
		return Redirect::to('index_edit');
	}

}
