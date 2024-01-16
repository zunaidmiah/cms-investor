<?php


class CEOMessageController extends BaseController {

  protected $redirect_url;

	 public function __construct() {
        if (!Session::has('user')) {          
                return Redirect::to('ListDeedAdmin');
            }

        $this->redirect_url = "ceo";
    }

    public function index($type) {
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
           
          
            $ceo_heading = "CEO Message";
           return View::make('admin.ceomessage.index', array ( 'CoreSubs' => $CoreSubs,'page'=>$page, 'cntarray1' => $cntarray1, 'lastUpdated' => $lastUpdated,'noperpage1' => $noperpage, 'ceo_heading' => $ceo_heading ));
    }

    public function update(){
        $id = Input::get('id'); 
        $page = Page::find($id);
        $content = Input::get('content');
        $type = $page->type;
        
        switch ($content) {
            case "heading1":
                $page->heading1     = Input::get('main_body_1');
              break;
            case "body1":
                 $page->body1       = Input::get('body1');
              break;
            case "heading2":
                $page->heading2     = Input::get('main_body_2');
              break;
            case "body2":
                 $page->body2       = Input::get('body2');
              break;
            case "body3":
                 $page->body3       = Input::get('body3');
              break;
            default:
                return Redirect::to($this->redirect_url.'/'.$type);
            
          }
       
        $page->save();
        
        Session::flash('message', 'The page has been saved successfully!');
        return Redirect::to($this->redirect_url.'/'.$type);
    }



    public function addimage()
    {
        //dd(Input::all());
        //dd(Input::get('pages'));

        // $rules = array(
        // 'display_order'             => 'unique:corporate_structures',            
        // ); 
        // $validator = Validator::make(Input::all(), $rules);
        $type = Input::get('type');
        // if ($validator->fails()) {

        // // get the error messages from the validator
        // $messages = $validator->messages();

        // // redirect our user back to the form with the errors from the validator
        // return Redirect::to('ceo/'.$type)
        //     ->withErrors($validator);
        //     }

            $Ceomessage = new CoreSub;
            $Ceomessage->status = Input::get('status');
            $Ceomessage->type = $type;
                       
          if (Input::hasFile('image')){
            $imageName= str_random(10).Input::file('image')->getClientOriginalName();
            Input::file('image')->move(public_path()."/uploads/ceomessage/",$imageName);
            $Ceomessage->image= $imageName;
          }

          $Ceomessage->save();

          Session::flash('message', 'The information has been saved successfully.');
          return Redirect::to($this->redirect_url.'/'.$type);
    }
       
    public function updateimage()
    {
        //dd(Input::get('display_order'));
        $CoreSubId= Input::get('id');
        // $type = Input::get('type');
        $CoreSub = CoreSub::find($CoreSubId);

        $CoreSub->status = Input::get('status');

        if (Input::hasFile('image')){
            if(file_exists(public_path().'/uploads/ceomessage/'.$CoreSub->image)){
                unlink(public_path().'/uploads/ceomessage/'.$CoreSub->image);
            }
            $CoreSubname= str_random(10).Input::file('image')->getClientOriginalName();
            Input::file('image')->move(public_path()."/uploads/ceomessage/",$CoreSubname);
            $CoreSub->image= $CoreSubname;
            //$url = $file->getURL();
        }
        
        $CoreSub->save();

        $type = $CoreSub->type;
        Session::flash('message', 'The information has been updated successfully!');
        return Redirect::to($this->redirect_url.'/'.$type);
    }

    public function deleteimage($id)
    {
        $montages = CoreSub::find($id);
        $type = $montages->type;

        if(file_exists(public_path().'/uploads/ceomessage/'.$montages->image)){
                unlink(public_path().'/uploads/ceomessage/'.$montages->image);
            }
        $montages->delete();

        // redirect
        Session::flash('message', 'The information has been deleted successfully!');
        return Redirect::to($this->redirect_url.'/'.$type);
    }



    /*public function dodestroyallCoreSub($type)
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
                 
    }*/


}
