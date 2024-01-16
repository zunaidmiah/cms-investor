<?php
class PhotoController Extends BaseController{

  public function show($id){

      $event_id=$id;

      $paginate=5;
      $current_page=max(1,Input::get('page'));
      $start=(($current_page-1)*$paginate)+1;
      $end=($start+$paginate)-1;
      $count=Photos::where('event_id',$id)->count();
      $data=Photos::where('event_id',$id)->paginate($paginate);

      $last_updated=Photos::orderBy('updated_at','desc')->where('event_id',$id)->first();
     
      if($last_updated){
        $last_updated = date('d M, Y @ g:ia', strtotime($last_updated->updated_at));
      } else {
        $last_updated ='none';
      }


      return View::make('eventfolders.event_photos')->with('eventfolders',$data)
      ->with('id',$event_id)
      ->with('start',$start)
      ->with('end',$end)
      ->with('count',$count)
      ->with('last_updated',$last_updated);
  }

  public function store(){
    $id=Input::get('id');
    $files=Input::file('file');

    foreach($files as $images){
      $photo=new Photos();
      $destinationPath = public_path().'/uploads/newsevent/';
      $filename=Str::random('5').'_'.$images->getClientOriginalName();
      $images->move($destinationPath, $filename);
      $photo->file=$filename;
      $photo->event_id=$id;
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

      $path=public_path().'/uploads/newsevent';
      File::delete($path.'/'.$photo->file);

      $filename=Str::random('5').'_'.$file->getClientOriginalName();
      $file->move($path,$filename);

      $photo->file=$filename;
      $photo->save();

      return Redirect::back()->with('message','Updated Successfully');
   }

}
