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

Route::get('grievancereportslisting','HomeController@grivance');
Route::get('grievanceform','HomeController@grivanceForm');

Route::post('save_gravience','HomeController@save_gravience');


View::composer('layouts.front', function($view)
{
    if( Request::segment(1)=='news_centre_latest_media_news')
    {
        $id= 18;
    }else if(Request::segment(2)=='news_centre_latest_media_news_details')
    {
        $id =19;
    }else if(Request::segment(1)=='media')
    {
        $id =19;
    }
    

    
        $banners=DB::connection('cms')->select('SELECT *,b.banner from page_banner as a left join banners as b on a.banner_id=b.id where a.page_id='.$id.' order by a.id desc');

        //$banners=DB::select(DB::raw($raw));

        //dd($banners);
    if($banners)
    {
        $banner=$banners[0]->banner;
    }else{
        $banner='banner5.jpg';
        
    }

    $links = DB::connection("cms")->table("links")->get();

    $view->with('banner', $banner)->with('links', $links);




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

Route::group(array('prefix' => 'investor'), function()
{
   Route::get('/', function() {
      return Redirect::to(Config::get('app.investor'));
   });
   
   Route::get('/{param1}', function($param1) {
      return Redirect::to(Config::get('app.investor'). $param1);
   });

   Route::get('/{param1}/{param2}', function($param1, $param2) {
      $id = Input::get('show');
      return Redirect::to(Config::get('app.investor') . $param1 . "/" . $param2 . "?show=" . $id); 
   });

   Route::get('/{param1}/{param2}/{param3}', function($param1, $param2, $param3) {
      return Redirect::to(Config::get('app.investor') . $param1 . "/" . $param2 . "/" . $param3); 
   });
});


Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/1', function(){
   return View::make('hello')->with('error', 'Username Or Password Inccorrect');
});

Route::get('users', function()
{
    return 'Users!';
});

Route::get('admin', 'adminController@index');
//Route::get('admin/web_scrapping_list', 'AdminController@web_scrapping_list');
/*Route::filter('admins', function()
{
    //
    return 'some code';
});

Route::when('admin/*', 'admins');*/

//Route::get('/{controller}/{action}', '{$controller}Controller@{$action}');

Route::get('/{controller}/{action}', function($controller, $action) {

    return App::make($controller.'Controller')->$action();
});

Route::get('news_centre_latest_media_news', array('as'=>'news_centre_latest_media_news', 'uses'=>'newsController@news_centre_latest_media_news'));
Route::get('media', array('as'=>'media', 'uses'=>'mediaController@index'));

//Route::group(array('prefix' => 'admin','before' => 'auth'), function(){
Route::group(array('prefix' => 'admin'), function(){

//    die;

    //Route::get('/', 'AdminController@index');
    //Route::get('web_scrapping_list', 'AdminController@web_scrapping_list');
    Route::get('/', array('as'=>'admin', 'uses'=>'AdminController@index'));


    Route::get('web_scrapping_list', array('as'=>'web_scrapping_list', 'uses'=>'adminController@web_scrapping_list'));
    Route::get('web_scrapping_new', array('as'=>'web_scrapping_new', 'uses'=>'adminController@web_scrapping_new'));
    Route::match(array('GET', 'POST'), 'web_scrapping_new_save', array('as'=>'web_scrapping_new_save', 'uses'=>'adminController@web_scrapping_new_save'));
    Route::get('web_scrapping_edit', array('as'=>'web_scrapping_edit', 'uses'=>'adminController@web_scrapping_edit'));
    Route::match(array('GET', 'POST'), 'web_scrapping_edit_save', array('as'=>'web_scrapping_edit_save', 'uses'=>'adminController@web_scrapping_edit_save'));
    Route::get('web_scrapping_delete', array('as'=>'web_scrapping_delete', 'uses'=>'AdminController@web_scrapping_delete'));
    Route::match(array('POST'), 'web_scrapping_delete_all', array('as'=>'web_scrapping_delete_all', 'uses'=>'adminController@web_scrapping_delete_all'));

    Route::get('media_news_list', array('as'=>'media_news_list', 'uses'=>'adminController@media_news_list'));
    Route::get('media_news_new', array('as'=>'media_news_new', 'uses'=>'adminController@media_news_new'));
    Route::match(array('GET', 'POST'), 'media_news_new_save', array('as'=>'media_news_new_save', 'uses'=>'adminController@media_news_new_save'));
    Route::get('media_news_edit', array('as'=>'media_news_edit', 'uses'=>'adminController@media_news_edit'));
    Route::match(array('GET', 'POST'), 'media_news_edit_save', array('as'=>'media_news_edit_save', 'uses'=>'adminController@media_news_edit_save'));
    Route::get('media_news_delete', array('as'=>'media_news_delete', 'uses'=>'adminController@media_news_delete'));
    Route::match(array('POST'), 'media_news_delete_all', array('as'=>'media_news_delete_all', 'uses'=>'adminController@media_news_delete_all'));
	Route::post('media_news_send_emails', array('as'=>'media_news_send_emails', 'uses'=>'adminController@sendMediaNewsEmail')); 
	Route::get('publishNews', array('as'=>'publishNews', 'uses'=>'adminController@publishNews'));

});


Route::get('admin/logout', 'adminController@logout');
Route::post('admin/changePassword', 'adminController@changePassword');
Route::post('admin/login', 'loginController@login');
Route::get('forgetpassword', 'loginController@forgetPassword');
Route::post('forgetpassword', 'loginController@sendPassword');
Route::get('resetpassword23jkhkjhk239fasdll34lkldfas', 'loginController@sendPassword2');
Route::post('resetpassword', 'loginController@resetpassword');

//Route::get('resetpassword', function(){
//   return View::make('resetpassword')->with('error', 'Username Or Password Inccorrect');
//});

/* For dynamic routing maybe
Route::get('data/{data}', function($data){
    return View::make('data.single')
    ->with('data', $data);
});*/