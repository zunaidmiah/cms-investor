<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	
	
	
public function grivance()
{
$id=100;
$report=Grievance::get();
	$banners=DB::connection('cms')->select('SELECT *,b.banner from page_banner as a left join banners as b on a.banner_id=b.id where a.page_id='.$id.' and status=1 order by a.id desc');

		//$banners=DB::select(DB::raw($raw));

		//dd($banners);
	if($banners)
	{
		$banner=$banners[0]->banner;
	}else{
		$banner='banner5.jpg';
		
	}
	$links = DB::connection("cms")->table("links")->get();
	
return View::make('grievancereportslisting',compact('report','banner','links'));
}
public function save_gravience()
{
// images
$data = Input::all();    

 $image=$data['Submit'];
// if($image)
// {
    
//          try {
//            $file = $image;
//             $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
//              $image->move("images", $name);
//          } catch (Illuminate\Filesystem\FileNotFoundException $e) {

//          }
//          $image_name=$name;
//       } 
//       else{
//         $image_name='';
//       }


  $file = Input::file('Submit');
  if($file)
  {
    $destinationPath = 'photos';
    $extension = $file->getClientOriginalExtension(); 
    $filename = str_random(12).".{$extension}";
    $upload_success = Input::file('Submit')->move($destinationPath, $filename);
}
else{
$filename='';
}
$image_name='';
$save=Grievance::insertGetId(array(
       'name'      => $data['Name'],
       'address'      => $data['Address'],

       'city'      => $data['City'],


       'job_title'      => $data['JobTitle'],
       'state'      => $data['State'],

       'email'      => $data['Email'],

       'postal_code'      => $data['PostalCode'],
       'telephone'      => $data['Phone'],

       'country'      => $data['DDLCountry'],



       'description'      => $data['message1'],
       'telephone'      => $data['Phone'],

       'updates_at'      => date('Y-m-d'),
       'image' =>$filename,
       'company_name'=>$data['CompanyName']
 
));
if($save){

Session::put('success_message', 'The information has been saved/updated successfully.');
return Redirect::to('grievanceform');
}
else{
Session::put('error_message', 'The information has not been saved/updated. Please correct the errors.');
return Redirect::to('grievanceform');
}
}
public function grivanceForm()
{
$id=101;
	$banners=DB::connection('cms')->select('SELECT *,b.banner from page_banner as a left join banners as b on a.banner_id=b.id where a.page_id='.$id.' and status=1 order by a.id desc');

		//$banners=DB::select(DB::raw($raw));

		//dd($banners);
	if($banners)
	{
		$banner=$banners[0]->banner;
	}else{
		$banner='banner5.jpg';
		
	}
	
return View::make('grievanceForm',compact('banner'));
}

}
