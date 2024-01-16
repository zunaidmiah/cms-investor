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

            
              $pgCount = Eventfolder::count();
             for ($i = 1; $i <= $pgCount; $i++ )
             {  
                 if($i == 1)
                 {
                 $cntArr[50] = 50;
                 }
                 if($i == 6)
                 {
                 $cntArr[100] = 100;
                 }
                 if($i == 11)
                 {
                 $cntArr[150] = 150;
                 }
                 
                 if($i == 21)
                 {
                 $cntArr[200] = 200;
                 }
                 
                 if($i == 31)
                 {
                 $cntArr[250] = 250;
                 }
                 
                 if($i >= 51)
                 {
                 $cntArr[300] = 300;
                 //exit;
                 }
             }
             if(Input::get('noperpage1'))
             {
               $noperpage = Input::get('noperpage1');  
             }
             else {
                  
                   $noperpage = 50;
               }
             /* End of Paginate Count Section */
                if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }

            $eventfolders = Eventfolder::orderBy('created_at', 'desc')->paginate($noperpage);
			/*	if($_SERVER['REMOTE_ADDR'] == '117.201.2.157') {
				echo "<pre>==>"; print_r(count($eventfolders)); echo "</pre>";
				echo "<br>==>".$eventfolders->getFrom();
				echo "<br>==>".$eventfolders->getTo();
				echo "<br>==>".$eventfolders->getTotal();
			}	*/
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
                   ->with('cntarray1', $cntarray1)
									/*->with('start',$start)
									->with('end',$end)
									->with('count',$count)*/
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
                        'category'  => 'required',
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
			
			$starteAt								= explode('/', Input::get('date'));
			$eventfolder->date      = $starteAt[1].'/'.$starteAt[0].'/'.$starteAt[2];
			
            //$eventfolder->date      = Input::get('date');
            $eventfolder->category      = Input::get('category');
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
                        'category'  => '',
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
                        $eventfolder->category      = Input::get('category');
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
