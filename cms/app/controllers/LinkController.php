<?php

class LinkController extends \BaseController {

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
           
           //$page = Page::where('heading1','=','bod')->get();

           $last= Links::orderBy('updated_at', 'desc')->first();
            if(!empty($last))
            {
                $lastUpdated =$last->updated_at;
                $lastUpdated=$lastUpdated->toDateTimeString();
            }else{
                $lastUpdated = date("Y-m-d H:i:s");

            }
       //dd($lastUpdated);
              /* Paginate Count Section */
             $pgCount = Bod::count();
//dd('hello');
             for ($i = 1; $i <= $pgCount; $i++ )
             {  
                 if($i == 1)
                 {
                 $cntArr[10] = 10;
                 }
                 
                 if($i == 11)
                 {
                 $cntArr[20] = 20;
                 }
                 
                 if($i == 21)
                 {
                 $cntArr[30] = 30;
                 }
                 
                 if($i == 31)
                 {
                 $cntArr[50] = 50;
                 }
                 
                 if($i == 51)
                 {
                 $cntArr[100] = 100;
                 //exit;
                 }
             }
             if(Input::get('noperpage1'))
             {
               $noperpage = Input::get('noperpage1');  
             }
             else {
                  
                   $noperpage = 10;
               }

               //dd($noperpage);
             /* End of Paginate Count Section */
         $links = Links::orderBy('created_at', 'asc')->paginate($noperpage);
         //dd($annualreport);
                     if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
           
        
           return View::make('admin.links', array ( 'links' => $links, 'cntarray1' => $cntarray1, 'lastUpdated' => $lastUpdated,'noperpage1' => $noperpage ));
        }

        /** store links data **/
        public function store()
        {
               $rules = array(
			
                        'link_name'       => 'required',
			'link_url'       => 'required',
                        'link_order'     => 'required',
                        'status'         => 'required'
		);
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
			return Redirect::to('links')
				->withErrors($validator)
				->withInput();
            }
            $id = Input::get('id'); 
            $link = new Links();
            
            
            $link->link_name          = Input::get('link_name');
            $link->link_url          = Input::get('link_url');
            $link->display_order          = Input::get('link_order');
            $link->status          = Input::get('status');
            $link->save();
            Session::flash('message', 'The link has been saved successfully!');
            return Redirect::to('links');
        }

        /** update links data **/
        public function update()
        {
               $rules = array(
			
                        'link_name'       => 'required',
			'link_url'       => 'required',
                        'link_order'     => 'required',
                        'status'         => 'required'
		);
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
			return Redirect::to('links')
				->withErrors($validator)
				->withInput();
            }
            $id = Input::get('id'); 
            $link = Links::find($id);
            
            
            $link->link_name          = Input::get('link_name');
            $link->link_url          = Input::get('link_url');
            $link->display_order          = Input::get('link_order');
            $link->status          = Input::get('status');
            $link->save();
            Session::flash('message', 'The link has been saved successfully!');
            return Redirect::to('links');
        }

        /** Delete link data **/
        public function delete()
        {
            $id = Input::get('id');
            $link = Links::find($id); 
           
            if($link->delete()) {
              Session::flash('message', 'The link has been deleted successfully!');
              return Redirect::to('links');
            } else {
                return Redirect::to('links')->withErrors('Some thing when wrong, please try again!');
            }
        }

        /** Delete selected link data **/
        public function link_delete_selected()
        {

          $id = Input::get('deleteid');
          $ids= explode(',',$id[0]);
          $link = Links::whereIn('id', $ids)->delete();
             
          Session::flash('message', 'The link has been deleted successfully!');
          return Redirect::to('links');
        }

        /** Delete all link data **/
        public function link_delete_all()
        {
          $link = Links::truncate();
             
          Session::flash('message', 'The link has been deleted successfully!');
          return Redirect::to('links');
        }
}