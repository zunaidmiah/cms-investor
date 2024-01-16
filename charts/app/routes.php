<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|->before('auth');
Route::get('new',function(){
User::create([
        'username' => 'admin',
        'password' => Hash::make('admin123'),
        ]);
return 'created';
});*/


// View::composer('frontview', function($view)
// {

// //$latestNews = DB::connection('cms')->select('SELECT * FROM montages WHERE `status` = 1');
//   //$view->with('montages', DB::connection('cms')->select('SELECT * FROM montages WHERE `status` = 1'));


// });

Route::get('grievancereportslisting','ChartsController@grivance');
Route::get('grievanceform','ChartsController@grivanceForm');

Route::post('save_gravience','ChartsController@save_gravience');


Route::group(array('prefix' => 'bursa'), function()
{
   Route::get('/', function() {
      return Redirect::to(Config::get('app.bursa'));
   });
   
   Route::get('/{param1}', function($param1) {
      return Redirect::to(Config::get('app.bursa'). $param1);
   });

   Route::get('/{param1}/{param2}', function($param1, $param2) {
      return Redirect::to(Config::get('app.bursa') . $param1 . "/" . $param2); 
   });

   Route::get('/{param1}/{param2}/{param3}', function($param1, $param2, $param3) {
      return Redirect::to(Config::get('app.bursa') . $param1 . "/" . $param2 . "/" . $param3); 
   });
});

Route::group(array('prefix' => 'cms'), function()
{
   Route::get('/', function() {
      return Redirect::to(Config::get('app.cms'));
   });
   
   Route::get('/{param1}', function($param1) {
      return Redirect::to(Config::get('app.cms'). $param1);
   });

   Route::get('/{param1}/{param2}', function($param1, $param2) {
      return Redirect::to(Config::get('app.cms') . $param1 . "/" . $param2); 
   });

   Route::get('/{param1}/{param2}/{param3}', function($param1, $param2, $param3) {
      return Redirect::to(Config::get('app.cms') . $param1 . "/" . $param2 . "/" . $param3); 
   });
});

Route::group(array('prefix' => 'medianews'), function()
{
   Route::get('/', function() {
      return Redirect::to(Config::get('app.media_news'));
   });
   
   Route::get('/{param1}', function($param1) {
      return Redirect::to(Config::get('app.media_news'). $param1);
   });

   Route::get('/{param1}/{param2}', function($param1, $param2) {
      $id = Input::get('show');
      return Redirect::to(Config::get('app.media_news') . $param1 . "/" . $param2 . "?show=" . $id); 
   });

   Route::get('/{param1}/{param2}/{param3}', function($param1, $param2, $param3) {
      return Redirect::to(Config::get('app.media_news') . $param1 . "/" . $param2 . "/" . $param3); 
   });
});

Route::get('/',function(){

    $banners=DB::connection('cms')->select('SELECT *,b.banner from page_banner as a left join banners as b on a.banner_id=b.id where a.page_id=17 and status=1 order by a.id desc');
    $links = DB::connection('cms')->select('SELECT * FROM links');
   
    if($banners)
    {
        $banner= $banners[0]->banner;
    }else{
        $banner='banner5.jpg';
    }
   
return View::make('chartindex')->with('banner', $banner)->with('links', $links);
});

Route::get('forgot', 'RemindersController@getRemind')->before('guest');
Route::post('addnew', 'ChartsController@addnew')->before('auth');
Route::post('forgot', 'RemindersController@postRemind')->before('guest');

Route::get('password/reset/{token}', 'RemindersController@getReset')->before('guest');

Route::post('password/reset', 'RemindersController@postReset')->before('guest');
Route::post('password/change', 'ChartsController@updtpass')->before('auth');
Route::get('login', array('as' => 'login', function () {
    return View::make('login');
}))->before('guest');
Route::post('login', function () {
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
        
        if (Auth::attempt($user,true)) {
            return Redirect::to('/charts')
                ->with('flash_notice', 'You are successfully logged in.');
        }
        
        // authentication failure! lets go back to the login page
        return Redirect::route('login')
            ->with('flash_error', 'Your username/password combination was incorrect.'.Input::get('username'))
            ->withInput();
});

Route::get('logout', array('as' => 'logout', function () {
    Auth::logout();

    return Redirect::route('login')
        ->with('flash_notice', 'You are successfully logged out.');
}))->before('auth');

Route::get('charts', 'ChartsController@index')->before('auth');
Route::get('/charts/data', 'ChartsController@data');
Route::post('/charts/updt', 'ChartsController@updt')->before('auth');
Route::post('/charts/title', 'ChartsController@title')->before('auth');
Route::post('/charts/published', 'ChartsController@published')->before('auth');
Route::get('/charts/{id}', 'ChartsController@edit')->before('auth');
Route::get('/charts/publish/{id}/{p}', 'ChartsController@publish')->before('auth');

/*function()
{
	//return 'hello';
	//return DB::table('users')->get();
	return View::make('index');
}*/