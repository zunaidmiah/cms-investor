<?php

Class ChartsController extends BaseController{
    
    /*
    |--------------------------------------------------------------------------
    | Default Chart Controller
    |--------------------------------------------------------------------------
    |
    |	Route::get('/', 'ChartController@index');
    |
    */
    
    public function __construct(){
        
        //contruct ccde Here. Eg; Checking the admin login
        
        
    }
    
    public function index(){
		$charts= Chart::all();
        return View::make('charts.index',['charts' => $charts]);
    }
    
    public function edit($id){
		$charts= Chart::find($id);
$dt=Ohlcv::orderBy('updated_at', 'desc')->first();
        return View::make('charts.edit',['chart' => $charts,'dt'=>$dt->updated_at]);
    }
    
    public function data(){
$data = Ohlcv::orderBy('date')->get();

        return $data;
    }
    public function updt(){
      $v=explode('_',Input::get('id'));
	  $affectedRows = Ohlcv::where('id', '=', $v[1])->update(array($v[0] => Input::get('value')));
	  return Input::get('value');

    }
    public function title(){
	  $affectedRows = Chart::where('id', '=',Input::get('id'))->update(array('title' => Input::get('value')));
	  return Input::get('value');

    }
    public function publish($id,$p){
	  $affectedRows = Chart::where('id', '=',$id)->update(array('published' => $p));
return Redirect::back();

    }
    public function addnew(){
$ch=new Ohlcv;
$ch->open=Input::get('open');
$ch->close=Input::get('close');
$ch->low=Input::get('low');
$ch->high=Input::get('high');
$ch->volume=Input::get('volume');
$ch->adjustment=Input::get('adjustment');
$a = strptime(Input::get('date'), '%d-%m-%Y');
$tm= ($a['tm_year']+1900).'-'.( $a['tm_mon']+1).'-'. $a['tm_mday'].' 00:00:00';// mktime(0, 0, 0, $a['tm_mon']+1, $a['tm_mday'], $a['tm_year']+1900);
$ch->date= $tm;
	 $ch->save();
return Redirect::back();
    }
    public function published(){
	  $affectedRows = Chart::where('id', '=',Input::get('id'))->update(array('published' => Input::get('value')));
	  return Input::get('value');

    }
public function updtpass(){
		$user = Auth::user();
		$current_password = Input::get('current_password');
		if (strlen($current_password) > 0 && !Hash::check($current_password, $user->password)) {
			return 'Please specify the good current password';
		}
    	
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		return 'Passowrd Successfully updated!';
		
	}
}