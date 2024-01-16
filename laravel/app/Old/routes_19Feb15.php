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