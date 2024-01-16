<?php

class VacancyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		
            //echo "its here";
		// get all the nerds
		if(Session::has('app_paginate')){
				$paginate=Session::get('app_paginate');
		}else{
				$paginate=10;
		}

		$current_page=max(1,Input::get('page'));
		$start=(($current_page-1)*$paginate)+1;
		$end=($start+$paginate)-1;
		$count=Vacancy::count();


		$vacancy = Vacancy::orderBy('updated_at', 'desc')->paginate($paginate);

		$last_updated = Vacancy::orderBy('updated_at', 'desc')->first();
    if($last_updated)
    {
     	$last_updated = date('d M, Y @ g:ia', strtotime($last_updated->updated_at));
    } else {
     	$last_updated = 'none';
    }
   
		return View::make('admin.career_online_applicants_edit')
			->with('online_Applications', $vacancy)
			->with('start',$start)
			->with('end',$end)
			->with('count',$count)
			->with('last_updated',$last_updated);
			
	}


	public function destroy($id)
	{
		// delete
		$vacancy = Vacancy::find($id);
		$vacancy->delete();

		// redirect
		Session::flash('message', 'The information has been deleted successfully!');
		return Redirect::to('careers_online_applicants_list');
	}


	public function app_selected_del(){
		$input=Input::get('checkbox');

		if(empty($input)){
			return Redirect::back()->with('error_message','Please select the items');
		}


		Vacancy::destroy($input);
		return Redirect::back()->with('message','Selected Items deleted Successfully');
	}

	public function app_set_paginate(){
		$paginate=Input::get('select');
		Session::put('app_paginate',$paginate);
		return Redirect::back();

	}

      public function ShowCareer(){

        $page = Page::where('type', 'career')->first();


		        return View::make('admin.careers',array(
                                                   'page' => $page
                                                    )
                                 );

      }
      public function update_career_page(){
       $rules = array(
			
                        'body1'       => 'required',
			'body2'       => 'required',
		);
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
			return Redirect::to('career')
				->withErrors($validator)
				->withInput();
            }
            $id = Input::get('id'); 
            $page = Page::where('type', 'career')->find($id);
            
            
            $page->body1          = Input::get('body1');
            $page->body2          = Input::get('body2');
            $page->save();
            Session::flash('message', 'The page has been saved successfully!');
            return Redirect::to('career');

    }
    public function online_apply_save(){
        $Vacancy = new Vacancy;
        $Vacancy->name = Input::get('Name');
        $Vacancy->DOB = Input::get('DOB');
        $Vacancy->Email = Input::get('Email');
        $Vacancy->MobileNumber = Input::get('Phone');
        $Vacancy->ContactNumber = Input::get('Phone');
        $Vacancy->EducationLevel = Input::get('educationlevel');
        $Vacancy->Address = Input::get('Address');
        $Vacancy->City = Input::get('City');
        $Vacancy->State = Input::get('State');
        $Vacancy->PostalCode = Input::get('Postal_Code');
        $Vacancy->Country = Input::get('Country');
        $Vacancy->career_vacancy_id = Input::get('career_vacancy_id'); 
		
        $career = Career::select('jobtitle')->where('id',Input::get('career_vacancy_id'))->get()->first();
		$Vacancy->JobName = $career->jobtitle; 
        
		if (Input::hasFile('CV_docs')){
		  	$cvname= str_random(10).Input::file('CV_docs')->getClientOriginalName();
            Input::file('CV_docs')->move(public_path()."/uploads/cv/",$cvname);
            $Vacancy->CV = $cvname;
        }


        $Vacancy->save();

        Session::flash('message', ' for applying for the position.');
        return Redirect::to('online_apply/'.Input::get('career_vacancy_id'));
    }



}