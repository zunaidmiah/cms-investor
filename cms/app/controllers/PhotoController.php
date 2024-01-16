<?php
class PhotoController Extends BaseController{

  public function show($id){

      $event_id=$id;

        $pgCount = Photos::where('event_id',$id)->count();
             for ($i = 1; $i <= $pgCount; $i++ )
             {  
                 if($i == 1)
                 {
                 $cntArr[5] = 5;
                 }
                 if($i == 6)
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
                 exit;
                 }
             }
             if(Input::get('noperpage1'))
             {
               $noperpage = Input::get('noperpage1');  
             }
             else {
                  
                   $noperpage = 5;
               }
             /* End of Paginate Count Section */
                if($pgCount > 0)
           {
           $cntarray1 = $cntArr;
           }
           else {
           $cntarray1 = 0;
           }

      
      $data=Photos::where('event_id',$id)->paginate($noperpage);

      $last_updated=Photos::orderBy('updated_at','desc')->where('event_id',$id)->first();
     
      if($last_updated){
        $last_updated = date('d M, Y @ g:ia', strtotime($last_updated->updated_at));
      } else {
        $last_updated ='none';
      }


      return View::make('eventfolders.event_photosduplicate')->with('eventfolders',$data)
      ->with('id',$event_id)
      ->with('cntarray1', $cntarray1)
      /*->with('start',$start)
      ->with('end',$end)
      ->with('count',$count)*/
      ->with('last_updated',$last_updated);
  }

  public function store(){

    $id=Input::get('id');
    $files=Input::file('file');
    $caption = Input::get('event_caption');
    
    foreach($files as $images){
      $photo=new Photos();
      $destinationPath = public_path().'/uploads/newsevent/';
      $filename=Str::random('5').'_'.$images->getClientOriginalName();
      $images->move($destinationPath, $filename);
      $photo->file=$filename;
      $photo->event_id=$id;
      $photo->eventcaption=$caption;
      $photo->save();
    }
    return Redirect::back()->with('message','Images Uploaded Successfully');
  }


  public function del_selected_photos(){
    $id=Input::get('id');
    $selected=Input::get('check_box');

    foreach($selected as $data){
      $photos=Photos::find($data);
      $path = public_path().'/uploads/newsevent/';
      File::delete($path.'/'.$photos->file);
    }

    Photos::destroy($selected);
    return Redirect::back()->with('message','Images Deleted Successfully');
  }

  public function del_photo($id){

    $photos=Photos::find($id);
    $path = public_path().'/uploads/newsevent/';
    File::delete($path.'/'.$photos->file);
    Photos::destroy($id);

    return Redirect::to('news_events_details/'.$photos->event_id)->with('message','Image Successfully Deleted');

  }


   public function update_photo($id){
      $photo=Photos::find($id);
      $file=Input::file('file');
      

      $caption = Input::get('event_caption');
      $path=public_path().'/uploads/newsevent';
      if($file!=null)
      {
        File::delete($path.'/'.$photo->file);
        $filename=Str::random('5').'_'.$file->getClientOriginalName();
        $file->move($path,$filename);
        $photo->file=$filename;
      }
      
      $photo->eventcaption=$caption;
      
      
      $photo->save();

      return Redirect::back()->with('message','Updated Successfully');
   }

  

}
