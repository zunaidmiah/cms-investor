<?php

class AnnouncementLinkController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function Announcement() 
	{
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	// public function store()
	// {
	// 	//
	// }


	public function addAnnouncementLink()
	{
		//
		$data = array();
    	if(isset($_REQUEST['status']) && !empty($_REQUEST['status'])){
			$data['status']=Input::get('status');
		}else{
			$data['status']=0;
    	}
    
		$data['announcementname'] = Input::get('announcementname');
		$data['announcementurl'] = Input::get('announcementurl');
		$data['announcementtype'] = Input::get('announcementtype');
		if(AnnouncementLinks::create($data))
		{
			return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Announcement Added Successfully.</p>
              </div>');
		}
		else
		{
			return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
		}
	}

	public function updateAnnouncementLink()
	{
		/* update requested data */
		$data = array();
		
		if(isset($_REQUEST['status']) && !empty($_REQUEST['status'])){
			$data['status']=Input::get('status');
		}else{
			$data['status']=0;
		}
		
		$data['announcementname'] = Input::get('announcementname');
		$data['announcementurl'] = Input::get('announcementurl');
		$data['announcementtype'] = Input::get('announcementtype');
		
		// print_r(Input::get('id'));
		// exit;

		if(AnnouncementLinks::where('Id', Input::get('id'))->update($data))
		{
			return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Announcement Edited Successfully.</p>
              </div>');
		}
		else
		{
			return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
		}
	}

	public function deleteAnnouncementLink(){
		$id = Input::get('id');
		$delLink = AnnouncementLinks::findOrFail($id);
		$delLink->delete();
		if($delLink)
		{
			return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Deleted Successfully.</p>
              </div>');
		}
		else
		{
			return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Error!</strong>
                <p>Something happened try again.</p>
              </div>');
		}
	}

	public function deleteMultipleAnnouncementLinks(){
		$id = Input::get('deleteid');
		
		$ids= explode(',',$id);
		$banner = AnnouncementLinks::whereIn('id', $ids)->delete();
		if($banner)
		{
			return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Deleted Successfully.</p>
              </div>');
		}
		else
		{
			return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>failed!</strong>
                <p>Something happened try again.</p>
              </div>');
		}
	}


	public function deleteAllAnnouncementlinks()
	{
		$dirp = AnnouncementLinks::where('status','1')->delete();
		if($dirp)
		{
			return Redirect::back()->with('message','<div class="alert alert-success alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>All Records Deleted Successfully.</p>
              </div>');
		}
		else
		{
			return Redirect::back()->with('message','<div class="alert alert-error alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check-circle"></i> <strong>Error!</strong>
                <p>Something happened try again.</p>
              </div>');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
