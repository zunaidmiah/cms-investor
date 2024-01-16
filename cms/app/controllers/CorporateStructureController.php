<?php


class CorporateStructureController extends BaseController {

	public function __construct() {
        if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }

    }

     public function showCorporateStructure() {
         if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
           
           //$page = Page::where('heading1','=','CorporateStructure')->get();

           $last= CorporateStructure::orderBy('updated_at', 'desc')->first();
            if(!empty($last))
            {
                $lastUpdated =$last->updated_at;
                $lastUpdated=$lastUpdated->toDateTimeString();
            }else{
                $lastUpdated = date("Y-m-d H:i:s");

            }
       //dd($lastUpdated);
              /* Paginate Count Section */
             $pgCount = CorporateStructure::count();
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
         $CorporateStructures = CorporateStructure::orderBy('display_order', 'asc')->paginate($noperpage);
         //dd($annualreport);
                     if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
           
        
           return View::make('admin.CorporateStructureindex', array ( 'CorporateStructures' => $CorporateStructures, 'cntarray1' => $cntarray1, 'lastUpdated' => $lastUpdated,'noperpage1' => $noperpage ));
        }



    public function CorporateStructureStore()
    {
        //dd(Input::all());
        //dd(Input::get('pages'));

        $rules = array(
        'display_order'             => 'unique:corporate_structures',            
        ); 
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('CorporateStructure')
            ->withErrors($validator);

    }


        $CorporateStructure = new CorporateStructure;
            $CorporateStructure->name = Input::get('name');
            $CorporateStructure->status = (Input::get('status')) ? Input::get('status') : 0;

            $CorporateStructure->date= Input::get('date');
            $CorporateStructure->display_order= Input::get('display_order');
            $CorporateStructure->position = Input::get('position');
            $CorporateStructure->country_age = Input::get('country_age');
            $CorporateStructure->description = Input::get('description');
                       
          if (Input::hasFile('image')){
            $CorporateStructurename= str_random(10).Input::file('image')->getClientOriginalName();
                        Input::file('image')->move(public_path()."/uploads/CorporateStructures/",$CorporateStructurename);
                        $CorporateStructure->image= $CorporateStructurename;
                        //$url = $file->getURL();

                    }
            $CorporateStructure->save();

           Session::flash('message', 'The information has been saved successfully.');
            return Redirect::to('CorporateStructure');
    }

 
       
    public function CorporateStructureUpdate()
    {

        
        //dd(Input::get('display_order'));
        $CorporateStructureId= Input::get('id');
        $CorporateStructure = CorporateStructure::find($CorporateStructureId);

        

        $CorporateStructure->status = Input::get('status');
        $CorporateStructure->name = Input::get('name');
        $CorporateStructure->date= Input::get('date');
        $CorporateStructure->display_order= Input::get('display_order');
        $CorporateStructure->position = Input::get('position');
        $CorporateStructure->country_age = Input::get('country_age');
        $CorporateStructure->description = Input::get('description');

         if (Input::hasFile('image')){

            if(file_exists(public_path().'/uploads/CorporateStructures/'.$CorporateStructure->image)){
                unlink(public_path().'/uploads/CorporateStructures/'.$CorporateStructure->image);
            }
            


            $CorporateStructurename= str_random(10).Input::file('image')->getClientOriginalName();
                        Input::file('image')->move(public_path()."/uploads/CorporateStructures/", $CorporateStructurename);
                        $CorporateStructure->image      = $CorporateStructurename;
                        //$url = $file->getURL();

                    }
        $CorporateStructure->save();

        



        Session::flash('message', 'The information has been updated successfully!');
            return Redirect::to('CorporateStructure');
    }




    public function dodestroyCorporateStructure($id)
    {
       
        $montages = CorporateStructure::find($id);

        if(file_exists(public_path().'/uploads/CorporateStructures/'.$montages->image)){
                unlink(public_path().'/uploads/CorporateStructures/'.$montages->image);
            }
        $montages->delete();

       

        // redirect
        Session::flash('message', 'The information has been deleted successfully!');
        return Redirect::to('CorporateStructure');
    }



    public function dodestroyallCorporateStructure()
    {
        $allCorporateStructures = CorporateStructure::all();

        foreach($allCorporateStructures as $CorporateStructures)
        {
            if(file_exists(public_path().'/uploads/CorporateStructures/'.$CorporateStructures->image)){
                unlink(public_path().'/uploads/CorporateStructures/'.$CorporateStructures->image);
            }
        }

        $banners = CorporateStructure::truncate();
        
        Session::flash('message', 'The information has been deleted successfully!');
        return Redirect::to('CorporateStructure');
    }

    public function deleteSelected(){
            
         

          $id = Input::get('deleteid'); 
        
          $ids= explode(',',$id[0]);

          for($i=0; $i<count($ids);$i++)
          {
                $montages = CorporateStructure::find($ids[$i]);

            if(file_exists(public_path().'/uploads/CorporateStructures/'.$montages->image)){
                    unlink(public_path().'/uploads/CorporateStructures/'.$montages->image);
                }
              }
          
           $banner = CorporateStructure::whereIn('id', $ids)->delete();



        

          

         Session::flash('message', 'The information has been deleted successfully!');
        return Redirect::to('CorporateStructure');
                 
    }

    public function deleteImage($id)
    {
        $montages = CorporateStructure::find($id);

        if(file_exists(public_path().'/uploads/CorporateStructures/'.$montages->image)){
                unlink(public_path().'/uploads/CorporateStructures/'.$montages->image);
            }
             Session::flash('message', 'The Image has been deleted successfully!');
        return Redirect::to('CorporateStructure');
    }



       

    //update order of the  CorporateStructure
    public function updateOrder()
      {

       
          $data = json_decode($_POST['OrderData']);

          $model = ucwords(Input::get('model'));
          foreach(get_object_vars($data) as $k => $value) {
         
                   $CorporateStructure = $model::find($k);
                   $CorporateStructure->display_order = $value;
                   $CorporateStructure->save();
         
                 }
        

      }


      public function checkOrder()
      {
        $CorporateStructureId = $_POST['CorporateStructureId'];
        $orderValue = $_POST['orderValue'];
        

        $CorporateStructures= CorporateStructure::where('id','!=', $CorporateStructureId)->get();
        $CorporateStructureOrders=[];
        foreach($CorporateStructures as $CorporateStructure)
            {
                $CorporateStructureOrders[]=$CorporateStructure->display_order;
            }
        //return $CorporateStructureOrders;

            if(in_array($orderValue, $CorporateStructureOrders))
            {
                return 'err';
            }else{
                return 'trr';
            }



      }

      public function checkOrderAll()
      {
       
        $orderValue = $_POST['orderValue'];
        

        $CorporateStructures= CorporateStructure::all();
        $CorporateStructureOrders=[];
        foreach($CorporateStructures as $CorporateStructure)
            {
                $CorporateStructureOrders[]=$CorporateStructure->display_order;
            }
        //return $CorporateStructureOrders;

            if(in_array($orderValue, $CorporateStructureOrders))
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
         $CorporateStructures = ContactTracing::orderBy('created_at', 'desc')->paginate($noperpage);
         //dd($CorporateStructures);
                     if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
           
        
           return View::make('admin.contact_tracing', array ( 'CorporateStructures' => $CorporateStructures, 'cntarray1' => $cntarray1, 'lastUpdated' => $lastUpdated,'noperpage1' => $noperpage ));
         
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
        $allCorporateStructures = ContactTracing::all();

        foreach($allCorporateStructures as $CorporateStructures)
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
