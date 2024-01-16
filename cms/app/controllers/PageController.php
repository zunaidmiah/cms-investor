<?php

class PageController extends BaseController {

	
        
        public function doStore()
	{
		// validate
		//print_r($_REQUEST);
                //exit;
		$rules = array(
			//'name'       => 'required',
			
			
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('index_edit')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$page = new Page;
			//$nerd->name       = Input::get('name');
			//$nerd->email      = Input::get('email');
			//$nerd->nerd_level = Input::get('nerd_level');
			//$nerd->save();

			// redirect
			Session::flash('message', 'The information has been saved successfully!');
			return Redirect::to('index_edit');
		}
	}
        public function updateContents(){
            print_r($_POST);
            //editorID
            $page = Page::find(1);
            switch(Input::get('editorID')){
                case"heading1":
                    $page->heading1       = Input::get('editabledata');
                    $page->save();
                    break;
                case"body1":
                    $page->body1          = Input::get('editabledata');
                    $page->save();
                    break;
                case"heading2":
                    $page->heading2          = Input::get('editabledata');
                    $page->save();
                    break;
                case"body2":
                    $page->body2          = Input::get('editabledata');
                    $page->save();
                    break;
            }
        }



        public function saveContents(){
            
            $rules = array(
			'heading1'       => 'required',
                        'body1'       => 'required',
			'heading2'       => 'required',
            'body2'       => 'required',
          
		);
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
			return Redirect::to('index_edit')
				->withErrors($validator)
				->withInput();
            } 
            $page = Page::find(1);
            
            $page->heading1       = Input::get('heading1');
            $page->body1          = Input::get('body1');
            $page->heading2       = Input::get('heading2');
            $page->body2          = Input::get('body2');
          
            $page->save();
            Session::flash('message', 'The information has been saved successfully!');
            return Redirect::to('index_edit');
             
        }

        public function saveCorporateInformations(){
           
            $rules = array(
		
            'heading3'       => 'required',
			'body3'       => 'required',
		);
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
			return Redirect::to('index_edit')
				->withErrors($validator)
				->withInput();
            } 
            $page = Page::find(1);
            
         
            $page->heading3       = Input::get('heading3');
            $page->body3          = Input::get('body3');
            $page->save();
            Session::flash('message', 'The information has been saved successfully!');
            return Redirect::to('index_edit');
             
        }

        public function updateVacancy($id){
            
            //print_r($_POST);
            //editorID
            $page = Career::find($id);  
            switch(Input::get('editorID')){
                case"job_requirements":
                    $page->requirements       = Input::get('editabledata');
                    $page->save();
                    break;
                case"job_responsibilities":
                    $page->responsibilities          = Input::get('editabledata');
                    $page->save();
                    break;
                case"job_footer_content":
                    $page->footertext         = Input::get('editabledata');
                    $page->save();
                    break;                
            }
        }
        
        
        //other pages

        public function news_events(){
            $page_title="News &amp; Events";
            $montages = Montage::where('status', '=', 1)->get();
            $CoreBusiness = CoreBusiness::all();
            
            $data=DB::select('select  id,eventtittle as title,file, category, YEAR(STR_TO_DATE(date, "%m/%d/%Y"))  as year from eventfolders where status = 1 group by year,title order by year desc');
            $year=DB::select('select category, YEAR(STR_TO_DATE(date, "%m/%d/%Y"))  as year from eventfolders where status = 1 group by year order by year desc');
            $category=DB::select('select category, YEAR(STR_TO_DATE(date, "%m/%d/%Y"))  as year from eventfolders where status = 1 group by category order by year desc');
			$stockdata          = DB::connection('charts')->select('SELECT * FROM ohlc ORDER BY `id` DESC LIMIT 0,1');
            return View::make('front.news_events')
                    ->with('page_title', $page_title)
                    ->with('montages', $montages)
                    ->with('businesses_create', $CoreBusiness)
                    ->with('group_year',$year)
                    ->with('group_cat', $category)
                    ->with('group_title',$data)
                    ->with('stockdata', $stockdata);
        }
        
         public function event_photo_view($id){

            $title=Events::find($id);
            $data=Photos::where('event_id',$id)->get();
            $page_title=$title->eventtittle;
            return View::make('front.event_photo_view_duplicate')
            ->with('title',$title)
            ->with('content',$data)
            ->with('page_title',$page_title);
        }
        

}
