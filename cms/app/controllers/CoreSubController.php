<?php


class CoreSubController extends BaseController {

	public function __construct() {
        if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }

    }

    public function update()
        {

            
            $id = Input::get('id'); 
            $page = Page::find($id);
            $content = Input::get('content');
            $type = $page->type;
            switch ($content) {
                case "heading1":
                    $page->heading1       = Input::get('heading1');
                  break;
                case "heading2":
                    $page->heading2       = Input::get('heading2');
                  break;
                case "body2":
                     $page->body2       = Input::get('body2');
                  break;
                default:
                return Redirect::to('CoreSub/'.$type);
                
              }
           
            $page->save();
            Session::flash('message', 'The page has been saved successfully!');
            return Redirect::to('CoreSub/'.$type);
        }

     public function showCoreSub($type) {
         if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }
           
           $page = Page::where('type','=',$type)->first();
        //    $page = Page::find(4);
           $last= CoreSub::where('type','=',$type)->orderBy('updated_at', 'desc')->first();
            if(!empty($last))
            {
                $lastUpdated =$last->updated_at;
                $lastUpdated=$lastUpdated->toDateTimeString();
            }else{
                $lastUpdated = date("Y-m-d H:i:s");

            }
       //dd($lastUpdated);
              /* Paginate Count Section */
             $pgCount = CoreSub::where('type','=',$type)->count();
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
         $CoreSubs = CoreSub::where('type','=',$type)->orderBy('display_order', 'asc')->paginate($noperpage);
         //dd($annualreport);
                     if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }
           
        
           return View::make('admin.CoreSubindex', array ( 'CoreSubs' => $CoreSubs,'page'=>$page, 'cntarray1' => $cntarray1, 'lastUpdated' => $lastUpdated,'noperpage1' => $noperpage ));
        }



    public function CoreSubStore()
    {
        //dd(Input::all());
        //dd(Input::get('pages'));

        $rules = array(
        'display_order'             => 'unique:corporate_structures',            
        ); 
        $validator = Validator::make(Input::all(), $rules);
        $type = Input::get('type');
        if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('CoreSub/'.$type)
            ->withErrors($validator);

            }


            $CoreSub = new CoreSub;
            $CoreSub->name = Input::get('name');
            $CoreSub->type = Input::get('type');
            $CoreSub->status = (Input::get('status')) ? Input::get('status') : 0;

            $CoreSub->date= Input::get('date');
            $CoreSub->display_order= Input::get('display_order');
            $CoreSub->position = Input::get('position');
            $CoreSub->country_age = Input::get('country_age');
            $CoreSub->description = Input::get('description');
            $CoreSub->morestatus = Input::get('morestatus');
            $CoreSub->url = Input::get('url');
                       
          if (Input::hasFile('image')){
            $CoreSubname= str_random(10).Input::file('image')->getClientOriginalName();
                        Input::file('image')->move(public_path()."/uploads/CoreSubs/",$CoreSubname);
                        $CoreSub->image= $CoreSubname;
                        //$url = $file->getURL();

                    }
            if (Input::hasFile('imagea')){
                $CoreSubname= str_random(10).Input::file('imagea')->getClientOriginalName();
                            Input::file('imagea')->move(public_path()."/uploads/CoreSubs/",$CoreSubname);
                            $CoreSub->imagea= $CoreSubname;
                            //$url = $file->getURL();

                        }
            if (Input::hasFile('imageb')){
                $CoreSubname= str_random(10).Input::file('imageb')->getClientOriginalName();
                            Input::file('imageb')->move(public_path()."/uploads/CoreSubs/",$CoreSubname);
                            $CoreSub->imageb= $CoreSubname;
                            //$url = $file->getURL();
    
                        }
            $CoreSub->save();

           Session::flash('message', 'The information has been saved successfully.');
           return Redirect::to('CoreSub/'.$type)
           ;
    }

 
       
    public function CoreSubUpdate()
    {

        
        //dd(Input::get('display_order'));
        $CoreSubId= Input::get('id');
        // $type = Input::get('type');
        $CoreSub = CoreSub::find($CoreSubId);

        

        $CoreSub->status = Input::get('status');
        $CoreSub->name = Input::get('name');
       
        $CoreSub->date= Input::get('date');
        $CoreSub->display_order= Input::get('display_order');
        $CoreSub->position = Input::get('position');
        $CoreSub->country_age = Input::get('country_age');
        $CoreSub->description = Input::get('description');
        $CoreSub->morestatus = Input::get('morestatus');
        $CoreSub->url = Input::get('url');
       

            if (Input::hasFile('image')){
                if(file_exists(public_path().'/uploads/CoreSubs/'.$CoreSub->image)){
                    unlink(public_path().'/uploads/CoreSubs/'.$CoreSub->image);
                }
                $CoreSubname= str_random(10).Input::file('image')->getClientOriginalName();
                            Input::file('image')->move(public_path()."/uploads/CoreSubs/",$CoreSubname);
                            $CoreSub->image= $CoreSubname;
                            //$url = $file->getURL();
    
                        }
                if (Input::hasFile('imagea')){
                    if(file_exists(public_path().'/uploads/CoreSubs/'.$CoreSub->imagea)){
                        unlink(public_path().'/uploads/CoreSubs/'.$CoreSub->imagea);
                    }
                    $CoreSubname= str_random(10).Input::file('imagea')->getClientOriginalName();
                                Input::file('imagea')->move(public_path()."/uploads/CoreSubs/",$CoreSubname);
                                $CoreSub->imagea= $CoreSubname;
                                //$url = $file->getURL();
    
                            }
                if (Input::hasFile('imageb')){
                    if(file_exists(public_path().'/uploads/CoreSubs/'.$CoreSub->imageb)){
                        unlink(public_path().'/uploads/CoreSubs/'.$CoreSub->imageb);
                    }
                    $CoreSubname= str_random(10).Input::file('imageb')->getClientOriginalName();
                                Input::file('imageb')->move(public_path()."/uploads/CoreSubs/",$CoreSubname);
                                $CoreSub->imageb= $CoreSubname;
                                //$url = $file->getURL();
        
                            }
        $CoreSub->save();

        


            $type = $CoreSub->type;
        Session::flash('message', 'The information has been updated successfully!');
        return Redirect::to('CoreSub/'.$type);
    }




    public function dodestroyCoreSub($id)
    {
       
        $montages = CoreSub::find($id);
        $type = $montages->type;

        if(file_exists(public_path().'/uploads/CoreSubs/'.$montages->image)){
                unlink(public_path().'/uploads/CoreSubs/'.$montages->image);
            }
        $montages->delete();

       

        // redirect
        Session::flash('message', 'The information has been deleted successfully!');
        return Redirect::to('CoreSub/'.$type);
    }



    public function dodestroyallCoreSub($type)
    {
        $allCoreSubs = CoreSub::where('type','=',$type)->get();

        foreach($allCoreSubs as $CoreSubs)
        {
            if(file_exists(public_path().'/uploads/CoreSubs/'.$CoreSubs->image)){
                unlink(public_path().'/uploads/CoreSubs/'.$CoreSubs->image);
            }
        }

        $banners = CoreSub::where('type','=',$type)->truncate();
        
        Session::flash('message', 'The information has been deleted successfully!');
        return Redirect::to('CoreSub'.$type);
    }

    public function deleteSelected(){
            
         

          $id = Input::get('deleteid'); 
        
          $ids= explode(',',$id[0]);

          for($i=0; $i<count($ids);$i++)
          {
                $montages = CoreSub::find($ids[$i]);
                return Redirect::to('CoreSub'.$type);;

            if(file_exists(public_path().'/uploads/CoreSubs/'.$montages->image)){
                    unlink(public_path().'/uploads/CoreSubs/'.$montages->image);
                }
              }
          
           $banner = CoreSub::whereIn('id', $ids)->delete();



        

          

         Session::flash('message', 'The information has been deleted successfully!');
         return Redirect::to('CoreSub'.$type);
                 
    }

    public function deleteImage($id)
    {
        $montages = CoreSub::find($id);
        return Redirect::to('CoreSub'.$type);
        if(file_exists(public_path().'/uploads/CoreSubs/'.$montages->image)){
                unlink(public_path().'/uploads/CoreSubs/'.$montages->image);
            }
             Session::flash('message', 'The Image has been deleted successfully!');
             Session::flash('message', 'The information has been deleted successfully!');

    }



       

    //update order of the  CoreSub
    public function updateOrder()
      {

       
          $data = json_decode($_POST['OrderData']);
          $type = $_POST['type'];

          $model = ucwords(Input::get('model'));
          foreach(get_object_vars($data) as $k => $value) {
         
                   $CoreSub = $model::where('type','=',$type)->find($k);
                   $CoreSub->display_order = $value;
                   $CoreSub->save();
         
                 }
        

      }


    public function checkOrder()
      {
        $CoreSubId = $_POST['CoreSubId'];
        $orderValue = $_POST['orderValue'];
        $type = $_POST['type'];
        

        $CoreSubs= CoreSub::where('type','=',$type)->where('id','!=', $CoreSubId)->get();
        $CoreSubOrders=[];
        foreach($CoreSubs as $CoreSub)
            {
                $CoreSubOrders[]=$CoreSub->display_order;
            }
        //return $CoreSubOrders;

            if(in_array($orderValue, $CoreSubOrders))
            {
                return 'err';
            }else{
                return 'trr';
            }



      }

    public function checkOrderAll()
      {
       
        $orderValue = $_POST['orderValue'];
        $type = $_POST['type'];
        

        $CoreSubs= CoreSub::where('type','=',$type)->get();
        $CoreSubOrders=[];
        foreach($CoreSubs as $CoreSub)
            {
                $CoreSubOrders[]=$CoreSub->display_order;
            }
        //return $CoreSubOrders;

            if(in_array($orderValue, $CoreSubOrders))
            {
                return 'err';
            }else{
                return 'trr';
            }



      }

    //   // Contact Tracing Form

    // public function show_contact_tracing(){
    //       if (!Session::has('user')) {          
    //             return Redirect::to('ListDeedAdmin');
    //         }
    //      $last= ContactTracing::orderBy('updated_at', 'desc')->first();
         
    //      if(!empty($last))
    //         {
    //             $lastUpdated =$last->updated_at;
    //             $lastUpdated=$lastUpdated->toDateTimeString();
    //         }else{
    //             $lastUpdated = date("Y-m-d H:i:s");

    //         }
    //        /* Paginate Count Section */
    //          $pgCount = ContactTracing::count();

    //          for ($i = 1; $i <= $pgCount; $i++ )
    //          {  
    //              if($i == 1)
    //              {
    //              $cntArr[10] = 10;
    //              }
                 
    //              if($i == 11)
    //              {
    //              $cntArr[20] = 20;
    //              }
                 
    //              if($i == 21)
    //              {
    //              $cntArr[30] = 30;
    //              }
                 
    //              if($i == 31)
    //              {
    //              $cntArr[50] = 50;
    //              }
                 
    //              if($i == 51)
    //              {
    //              $cntArr[100] = 100;
    //              //exit;
    //              }
    //          }
    //          if(Input::get('noperpage1'))
    //          {
    //            $noperpage = Input::get('noperpage1');  
    //          }
    //          else {
                  
    //                $noperpage = 10;
    //            }

    //            //dd($noperpage);
    //          /* End of Paginate Count Section */
    //      $CoreSubs = ContactTracing::orderBy('created_at', 'desc')->paginate($noperpage);
    //      //dd($CoreSubs);
    //                  if($pgCount > 0)
    //        {
    //        $cntarray1 = $cntArr;
    //        }
    //        else {
    //        $cntarray1 = 0;
    //        }
           
        
    //        return View::make('admin.contact_tracing', array ( 'CoreSubs' => $CoreSubs, 'cntarray1' => $cntarray1, 'lastUpdated' => $lastUpdated,'noperpage1' => $noperpage ));
         
    //      // $contact_list = ContactTracing::orderBy('created_at', 'desc')->get();
    //       //dd($contact_list );
          

    //   }

    // public function dodestroytracing($id)
    // {
       
    //     $montages = ContactTracing::find($id);

    //     $montages->delete();

       

    //     // redirect
    //     Session::flash('message', 'The information has been deleted successfully!');
    //     return Redirect::to('contact-tracing');
    // }

    // public function dodestroyall_contacttracing()
    // {
    //     $allCoreSubs = ContactTracing::all();

    //     foreach($allCoreSubs as $CoreSubs)
    //     {
            
    //     }

    //     $banners = ContactTracing::truncate();
        
    //     Session::flash('message', 'The information has been deleted successfully!');
    //     return Redirect::to('contact-tracing');
    // }

    // public function deleteSelected_contacttracing(){
            
         

    //       $id = Input::get('deleteid'); 
        
    //       $ids= explode(',',$id[0]);

    //       for($i=0; $i<count($ids);$i++)
    //       {
    //             $montages = ContactTracing::find($ids[$i]);

    //        } 
          
    //        $banner = ContactTracing::whereIn('id', $ids)->delete();



        

          

    //      Session::flash('message', 'The information has been deleted successfully!');
    //     return Redirect::to('contact-tracing');
                 
    // }


}
