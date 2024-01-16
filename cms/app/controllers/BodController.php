<?php


class BodController extends BaseController {

	public function __construct() {
        if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }

    }

     public function showBod() {
         if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
           
           //$page = Page::where('heading1','=','bod')->get();

           $last= Bod::orderBy('updated_at', 'desc')->first();
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
         $bods = Bod::orderBy('display_order', 'asc')->paginate($noperpage);
         //dd($annualreport);
                     if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
           
        
           return View::make('admin.bodindex', array ( 'bods' => $bods, 'cntarray1' => $cntarray1, 'lastUpdated' => $lastUpdated,'noperpage1' => $noperpage ));
        }



    public function bodStore()
    {
        //dd(Input::all());
        //dd(Input::get('pages'));

        $rules = array(
        'display_order'             => 'unique:bod',            
        ); 
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('bod')
            ->withErrors($validator);

    }


        $bod = new Bod;
            $bod->bod_name = Input::get('bod_name');
            $bod->status = (Input::get('status')) ? Input::get('status') : 0;

            $bod->bod_date= Input::get('bod_date');
            $bod->display_order= Input::get('display_order');
            $bod->bod_position = Input::get('bod_position');
            $bod->country_age = Input::get('country_age');
            $bod->bod_description = Input::get('bod_description');
                       
          if (Input::hasFile('bod_image')){
            $bodname= str_random(10).Input::file('bod_image')->getClientOriginalName();
                        Input::file('bod_image')->move(public_path()."/uploads/bods/",$bodname);
                        $bod->bod_image= $bodname;
                        //$url = $file->getURL();

                    }
            $bod->save();

           Session::flash('message', 'The information has been saved successfully.');
            return Redirect::to('bod');
    }

 
       
    public function bodUpdate()
    {

        
        //dd(Input::get('display_order'));
        $bodId= Input::get('id');
        $bod = Bod::find($bodId);

        

        $bod->status = Input::get('status');
        $bod->bod_name = Input::get('bod_name');
        $bod->bod_date= Input::get('bod_date');
        $bod->display_order= Input::get('display_order');
        $bod->bod_position = Input::get('bod_position');
        $bod->country_age = Input::get('country_age');
        $bod->bod_description = Input::get('bod_description');

         if (Input::hasFile('bod_image')){

            if(file_exists(public_path().'/uploads/bods/'.$bod->bod_image)){
                unlink(public_path().'/uploads/bods/'.$bod->bod_image);
            }
            


            $bodname= str_random(10).Input::file('bod_image')->getClientOriginalName();
                        Input::file('bod_image')->move(public_path()."/uploads/bods/", $bodname);
                        $bod->bod_image      = $bodname;
                        //$url = $file->getURL();

                    }
        $bod->save();

        



        Session::flash('message', 'The information has been updated successfully!');
            return Redirect::to('bod');
    }




    public function dodestroybod($id)
    {
       
        $montages = Bod::find($id);

        if(file_exists(public_path().'/uploads/bods/'.$montages->bod_image)){
                unlink(public_path().'/uploads/bods/'.$montages->bod_image);
            }
        $montages->delete();

       

        // redirect
        Session::flash('message', 'The information has been deleted successfully!');
        return Redirect::to('bod');
    }



    public function dodestroyallbod()
    {
        $allbods = Bod::all();

        foreach($allbods as $bods)
        {
            if(file_exists(public_path().'/uploads/bods/'.$bods->bod_image)){
                unlink(public_path().'/uploads/bods/'.$bods->bod_image);
            }
        }

        $banners = Bod::truncate();
        
        Session::flash('message', 'The information has been deleted successfully!');
        return Redirect::to('bod');
    }

    public function deleteSelected(){
            
         

          $id = Input::get('deleteid'); 
        
          $ids= explode(',',$id[0]);

          for($i=0; $i<count($ids);$i++)
          {
                $montages = Bod::find($ids[$i]);

            if(file_exists(public_path().'/uploads/bods/'.$montages->bod_image)){
                    unlink(public_path().'/uploads/bods/'.$montages->bod_image);
                }
              }
          
           $banner = Bod::whereIn('id', $ids)->delete();



        

          

         Session::flash('message', 'The information has been deleted successfully!');
        return Redirect::to('bod');
                 
    }

    public function deleteImage($id)
    {
        $montages = Bod::find($id);

        if(file_exists(public_path().'/uploads/bods/'.$montages->bod_image)){
                unlink(public_path().'/uploads/bods/'.$montages->bod_image);
            }
             Session::flash('message', 'The Image has been deleted successfully!');
        return Redirect::to('bod');
    }



       

    //update order of the  bod
    public function updateOrder()
      {

       
          $data = json_decode($_POST['OrderData']);

          $model = ucwords(Input::get('model'));
          foreach(get_object_vars($data) as $k => $value) {
         
                   $bod = $model::find($k);
                   $bod->display_order = $value;
                   $bod->save();
         
                 }
        

      }


      public function checkOrder()
      {
        $bodId = $_POST['bodId'];
        $orderValue = $_POST['orderValue'];
        

        $bods= Bod::where('id','!=', $bodId)->get();
        $bodOrders=[];
        foreach($bods as $bod)
            {
                $bodOrders[]=$bod->display_order;
            }
        //return $bodOrders;

            if(in_array($orderValue, $bodOrders))
            {
                return 'err';
            }else{
                return 'trr';
            }



      }

      public function checkOrderAll()
      {
       
        $orderValue = $_POST['orderValue'];
        

        $bods= Bod::all();
        $bodOrders=[];
        foreach($bods as $bod)
            {
                $bodOrders[]=$bod->display_order;
            }
        //return $bodOrders;

            if(in_array($orderValue, $bodOrders))
            {
                return 'err';
            }else{
                return 'trr';
            }



      }

      // Contact Tracing Form

      public function show_contact_tracing(){
          if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
         $last= ContactTracing::orderBy('updated_at', 'desc')->first();
         
         if(!empty($last))
            {
                $lastUpdated =$last->updated_at;
                $lastUpdated=$lastUpdated->toDateTimeString();
            }else{
                $lastUpdated = date("Y-m-d H:i:s");

            }
           /* Paginate Count Section */
             $pgCount = ContactTracing::count();

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
         $bods = ContactTracing::orderBy('created_at', 'desc')->paginate($noperpage);
         //dd($bods);
                     if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
           
        
           return View::make('admin.contact_tracing', array ( 'bods' => $bods, 'cntarray1' => $cntarray1, 'lastUpdated' => $lastUpdated,'noperpage1' => $noperpage ));
         
         // $contact_list = ContactTracing::orderBy('created_at', 'desc')->get();
          //dd($contact_list );
          

      }

      public function dodestroytracing($id)
    {
       
        $montages = ContactTracing::find($id);

        $montages->delete();

       

        // redirect
        Session::flash('message', 'The information has been deleted successfully!');
        return Redirect::to('contact-tracing');
    }

    public function dodestroyall_contacttracing()
    {
        $allbods = ContactTracing::all();

        foreach($allbods as $bods)
        {
            
        }

        $banners = ContactTracing::truncate();
        
        Session::flash('message', 'The information has been deleted successfully!');
        return Redirect::to('contact-tracing');
    }

    public function deleteSelected_contacttracing(){
            
         

          $id = Input::get('deleteid'); 
        
          $ids= explode(',',$id[0]);

          for($i=0; $i<count($ids);$i++)
          {
                $montages = ContactTracing::find($ids[$i]);

           } 
          
           $banner = ContactTracing::whereIn('id', $ids)->delete();



        

          

         Session::flash('message', 'The information has been deleted successfully!');
        return Redirect::to('contact-tracing');
                 
    }


}
