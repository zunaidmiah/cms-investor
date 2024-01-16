<?php

class CorporateInformationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
  {
            //echo" ffff";
        $corporate_information_create = CorporateInformation::all();
        //print_r($Business);
        
        //return View::make('admin.index_edit', compact('admin'));
        return View::make('admin.index_edit')
			->with('corporate_information_create', $corporate_information_create);
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
	public function doStore()
	{
           
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			
			'title'      => 'required',
			'text'      => 'required',
			'image'      => 'required',
                        'url'        => 'required',
			
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('index_edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$Business = new CorporateInformation;
		
			$Business->title      = Input::get('title');
			$Business->text      = Input::get('text');
		
			if (Input::hasFile('image')){
				Input::file('image')->move(public_path()."/uploads/corporates/",Input::file('image')->getClientOriginalName());
				$Business->image      = Input::file('image')->getClientOriginalName();
			}
                        $Business->url      = Input::get('url');
			
			//$Business->save();
                        
			// redirect
			Session::flash('message', 'Successfully created!');
			return Redirect::to('index_edit');
		}
	}
        public function edit($id)
	{
		// get the nerd
		$Business = CoreBusiness::find($id);

		// show the edit form and pass the nerd
		return View::make('admin.index_edit')
			->with('nerd', $Business);
	}

public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			
			'title'      => '',
			'text'      => '',
			'image'      => '',
			'url'        => ''
                       
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
                    
			return Redirect::to('index_edit/' . $id . '/edit')
				->withErrors($validator);
				
		} else {
			// store
			$Business = CorporateInformation::find($id);
		
			$Business->title      = Input::get('title');
			$Business->text      = Input::get('text');
		
			if (Input::hasFile('image')){
				
				Input::file('image')->move(public_path()."/uploads/corporates/",Input::file('image')->getClientOriginalName());
				$Business->image      = Input::file('image')->getClientOriginalName();
			}
                        $Business->url      = Input::get('url');
                        
			$Business->save();

			// redirect
			Session::flash('message', 'The information has been updated successfully !');
			return Redirect::to('index_edit');
		}
	}
	
	
}