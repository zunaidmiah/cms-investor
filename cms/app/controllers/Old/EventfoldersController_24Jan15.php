<?php

class EventfoldersController extends \BaseController {

	/**
	 * Display a listing of eventfolders
	 *
	 * @return Response
	 */
	public function index()
        {
            if (!Session::has('user')) {
                return Redirect::to('ListDeedAdmin');
            }
            $user = Session::get('user');

						$paginate=3;
						$current_page=max(1,Input::get('page'));
						$start=(($current_page-1)*$paginate)+1;
						$end=($start+$paginate)-1;
						$count=Eventfolder::count();

            $eventfolders = Eventfolder::paginate($paginate);
            $last_updated = Eventfolder::orderBy('updated_at', 'desc')->first();
            if($last_updated)
            {
            	$last_updated = date('d M, Y @ g:ia', strtotime($last_updated->updated_at));
            } else {
            	$last_updated = 'none';
            }
            return View::make('eventfolders.news_event_edit')
                   ->with('user', $user)
                   ->with('eventfolders', $eventfolders)
									->with('start',$start)
									->with('end',$end)
									->with('count',$count)
									->with('last_updated', $last_updated);
	}

	/**
	 * Show the form for creating a new eventfolder
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('eventfolders.create');
	}

	/**
	 * Store a newly created eventfolder in storage.
	 *
	 * @return Response
	 */
	public function store(){

		$data=Input::all();
		


        $rules = array(
			//'status'           => 'required',
			'eventtittle'         => 'required',
			'date'             => 'required',
                        'picture'             => 'required',

                        //'footertext'     => ''
		);


		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
                     Session::flash('error_message', 'The information has been Not saved successfully/ Please try again');
			return Redirect::to('news_events_list')
				->withErrors($validator);

		} else{

		//echo 'Asif';
			if(Input::get('status'))
			{
				$status = 1;
			} else {
				$status = 0;
			}

            $eventfolder= new Eventfolder;
            $image = Input::file('picture');
            $destinationPath = public_path().'/uploads/newsevent/';
            $filename = $image->getClientOriginalName();
            Input::file('picture')->move($destinationPath, $filename);
            $eventfolder->status       = $status;
            $eventfolder->date      = date('Y-m-d',strtotime(Input::get('date')));
            $eventfolder->eventtittle = Input::get('eventtittle');
            $eventfolder->file = $filename;
            $eventfolder->save();
            return Redirect::to('addnew/')->with('message','Event Added Successfully');
	}
        }
	/**
	 * Display the specified eventfolder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$eventfolder = Eventfolder::findOrFail($id);

		return View::make('eventfolders.show', compact('eventfolder'));
	}

	/**
	 * Show the form for editing the specified eventfolder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$eventfolder = Eventfolder::find($id);

		return View::make('eventfolders.edit', compact('eventfolder'));
	}

	/**
	 * Update the specified eventfolder in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
        public function update($id)
	{
		//print_r($_POST);
                //exit;
		$rules = array(
			'date'       => '',
			'status'      => '',
			'eventtittle'      => '',
                        'file'  => ''

		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('news_events_list/' . $id . '/edit')
				->withErrors($validator)
				;
		} else {
			// store
			$eventfolder = Eventfolder::find($id);
			$eventfolder->status       = Input::get('eventstatus');
			$eventfolder->date      = Input::get('Event_date');
                        $eventfolder->eventtittle  = Input::get('Event_title');

			if (Input::hasFile('Banner_event')){
                            Input::file('Banner_event')->move(public_path()."/uploads/newsevent/",Input::file('Banner_event')->getClientOriginalName());
                            $eventfolder->file      = Input::file('Banner_event')->getClientOriginalName();
                        //$url = $file->getURL();

                        }
                        $eventfolder->save();

			// redirect
			Session::flash('message', 'The information has been updated successfully!');
			return Redirect::to('news_events_list');
		}
	}


	public function del_selected_event(){
	
		
		$input=Input::get('check_box');		
		
		if(empty($input)) {
			return Redirect::back()->with('error_message','Please Select the items');
		}
				
		 Eventfolder::destroy($input);		
		return Redirect::back()->with('message','Selected Item Deleted Successfully');

	}


	/**
	 * Remove the specified eventfolder from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Eventfolder::destroy($id);
                Session::flash('message', 'The information has been Deleted successfully!');
		return Redirect::to('news_events_list');
	}
        public function showNewsEvent()
	{
            if (!Session::has('user')) {
                return Redirect::to('ListDeedAdmin');
            }
            $user = Session::get('user');
            return View::make('eventfolders.news_event_edit')->with('user', $user);
	}

}
