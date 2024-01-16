<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::group(array('domain' => '{account}.myapp.com'), function()
//{
// for dynamic banner
View::composer(array('layouts.front', 'layouts.front_without_banner'), function($view)
{
	if( Request::segment(1)=='profile')
	{
		$id= 1;
	}else if(Request::segment(1)=='mission')
	{
		$id =2;
	}
	else if(Request::segment(1)=='board')
	{
		$id =3;
	}
	else if(Request::segment(1)=='structure')
	{
		$id =4;
	}
	else if(Request::segment(1)=='milestone')
	{
		$id =5;
	}
	else if(Request::segment(1)=='achievement')
	{
		$id =6;
	}
	else if(Request::segment(1)=='boardcharter')
	{
		$id =7;
	}
	else if(Request::segment(2)=='news_events')
	{
		$id =8;
	}
	else if(Request::segment(1)=='telecommunication')
	{
		$id =9;
	}
	else if(Request::segment(1)=='trading')
	{
		$id =10;
	}
	else if(Request::segment(1)=='greentech')
	{
		$id =11;
	}
	else if(Request::segment(1)=='engineeringworks')
	{
		$id =12;
	}else if(Request::segment(1)=='clients')
	{
		$id =13;
	}
	else if(Request::segment(1)=='calculator')
	{
		$id =15;
	}

	
		$banners=DB::connection('cms')->select('SELECT *,b.banner from page_banner as a left join banners as b on a.banner_id=b.id where a.page_id='.$id.' and status=1 order by a.id desc');

		//$banners=DB::select(DB::raw($raw));

		//dd($banners);
	if($banners)
	{
		$banner=$banners[0]->banner;
	}else{
		$banner='banner5.jpg';
		
	}

	$view->with('banner', $banner);




});


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

Route::group(array('prefix' => 'charts'), function()
{
   Route::get('/', function() {
      return Redirect::to(Config::get('app.charts'));
   });
   
   Route::get('/{param1}', function($param1) {
      return Redirect::to(Config::get('app.charts'). $param1);
   });

   Route::get('/{param1}/{param2}', function($param1, $param2) {
      return Redirect::to(Config::get('app.charts') . $param1 . "/" . $param2); 
   });

   Route::get('/{param1}/{param2}/{param3}', function($param1, $param2, $param3) {
      return Redirect::to(Config::get('app.charts') . $param1 . "/" . $param2 . "/" . $param3); 
   });
});

Route::group(array('prefix' => 'media_news'), function()
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




Route::get('/profile', 'IndexController@showProfile');

Route::get('/mission', 'IndexController@showMission');

Route::get('/board', 'IndexController@showBoard');

Route::get('/structure', 'IndexController@showStructure');

Route::get('/milestone', 'IndexController@showMilestone');

Route::get('/achievement', 'IndexController@showachivements');

Route::get('/boardcharter', 'IndexController@showCharter');


Route::get('/telecommunication', 'IndexController@showNetworks');

Route::get('/trading', 'IndexController@showTrading');

Route::get('/greentech', 'IndexController@showGreenTech');

Route::get('/engineeringworks', 'IndexController@showWorks');

Route::get('/clients', 'IndexController@showClients');

Route::get('/calculator', 'IndexController@showCalculator');

// View::composer('includes.header', function($view)
// {
//   $view->with('montages', Montage::where('status', '=', 1)->get());
// });







































