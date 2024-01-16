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
	}else if(Request::segment(1)=='create_vacancy')
	{
		$id =14;
	}
	else if(Request::segment(1)=='online_apply')
	{
		$id =70;
	}
	else if(Request::segment(1)=='event_photo_view')
	{
		$id =72;
	}

	if(Request::segment(1)!='')
	{
		$raw = 'SELECT *,b.banner from page_banner as a left join banners as b on a.banner_id=b.id where a.page_id='.$id.' and status=1  order by a.id desc';

		$banners=DB::select(DB::raw($raw));

		//dd($banners);
	if($banners)
	{
		$banner=$banners[0]->banner;
	}else{
		$banner='banner5.jpg';
		
	}

	$view->with('banner', $banner);
	}









});
//end dynamic banner

// Route::get('cr', function(){
// 	Sentry::register(array(
//     'email'    => 'sudip@sudip.com',
//     'password' => 'admin@123',
// ));
// });


Route::get('/', 'IndexController@index');

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





//update the order of the bod
Route::post('admin/updateorder', 'BodController@updateOrder');



// bod controller
Route::get('bod', 'BodController@showBod');
Route::post('bod', 'BodController@bodStore');

Route::post('/director/update', 'BodController@bodUpdate');

Route::post('deletebod/{id}', 'BodController@dodestroybod');

Route::post('deletebodimage/{id}', 'BodController@deleteImage');

Route::post('bod/deleteall', 'BodController@dodestroyallbod');

Route::post('bod/deleteselected', 'BodController@deleteSelected');
//bod controller end










//extra and other pages 
Route::get('pages/news_events','PageController@news_events');
Route::get('pages/{page}', 'IndexController@showPage');

//event photos view
Route::get('event_photo_view/{id}','PageController@event_photo_view');


Route::get('create_vacancy', 'IndexController@create');
Route::get('online_apply/{id}', 'IndexController@Online_job_vacancy');
Route::get('online_apply_form/{id}', 'IndexController@online_apply_form');
Route::post('Add_Application', 'IndexController@store');

Route::get('ListDeedAdmin',array('uses' => 'AdminController@index'));
Route::post('changepassword/{user_id}',array('uses' => 'AdminController@changepassword'));
Route::get('adminpages/{page}', 'AdminController@showPage');
Route::post('adminLogin', array('uses' => 'AdminController@adminLogin'));
Route::get('ForgotPassword', array('uses' => 'AdminController@ForgotPassword'));
Route::post('ForgotPassword', array('uses' => 'AdminController@ProcessForgotPassword'));
Route::get('ActivatePassword/{passcode}/{user_id}', array('uses' => 'AdminController@ActivateNewPassword'));
Route::post('ActivatePassword', array('uses' => 'AdminController@ProcessNewPassword'));

Route::get('ReturnToLogin', array('uses' => 'AdminController@index'));
Route::get('adminLogout', array('uses' => 'AdminController@adminLogout'));
Route::get('dashboard', array('uses' => 'AdminController@showDashboard'));
Route::get('index_edit', array('uses' => 'AdminIndexPageController@showIndexPageEditor'));
Route::post('set_page',array('uses' => 'AdminIndexPageController@set_paginate'));

//delte item by selection
Route::post('montage_del_id', array('uses' => 'AdminIndexPageController@delete_by_selection'));


Route::get('news_events_list', array('uses' => 'EventfoldersController@index'));
Route::get('careers_job_vacancy_list', array('uses' => 'AdminCareersController@showAdminVacancies'));
//Route::get('careers_online_applicants_list', array('uses' => 'AdminCareersController@showAdminOnlineApplicants'));


Route::post('adminsavepage', array('uses' => 'BusinessController@doStore'));
Route::post('save_page_contents', array('uses' => 'PageController@saveContents'));


Route::get('users', array('uses' => 'AdminController@home'));
Route::get('Profile/{id}',array('uses' => 'AdminController@userProfile'));

Route::get('edit-profile/{id}',array('uses' => 'AdminController@showEditProfile'));
Route::post('update-profile',array('uses' => 'AdminController@updateProfile'));
Route::post('businesses_create', 'BusinessController@doStore');
Route::post('businesses_update/{id}', 'BusinessController@update');
Route::post('montage', 'MontageController@Store');
Route::get('Add_Montages', 'MontageController@add_montages');
Route::get('edit_montages/{id}', 'MontageController@edit_montages');
Route::post('deletemontage/{id}', 'MontageController@dodestroy');
Route::post('update_emontage/{id}', 'MontageController@update');
//Route::post('Add_Vacancy', 'CareersController@Store');
Route::post('addvaccancy', 'CareersController@saveCareer');
Route::get('add_vacancy_view', 'CareersController@create_add_view');
Route::get('edit_career/{id}', 'CareersController@edit_career');
Route::get('career_vac_edit', 'CareersController@index');
Route::post('vacancy_selected_del', array('uses' => 'CareersController@vacancy_selected_del'));
Route::post('vacancy_set_pag', array('uses' => 'CareersController@vacancy_set_paginate'));


// banners controller
Route::get('banners', 'BannerController@showBanners');
Route::post('banners', 'BannerController@bannerStore');

Route::post('banners/upd', 'BannerController@bannerUpdate');

Route::post('deletebanner/{id}', 'BannerController@dodestroybanner');

Route::post('banners/deleteall', 'BannerController@dodestroyallbanner');

Route::post('banners/deleteselected', 'BannerController@deleteSelected');
//banners controller end



Route::post('deletevecancy/{id}', 'CareersController@dodestroy');
Route::post('update_career/{id}', 'CareersController@update');
Route::resource('addnew', 'EventfoldersController');
Route::post('del_selected_event','EventfoldersController@del_selected_event');

Route::post('update_event/{id}', 'EventfoldersController@update');
Route::post('delete_event/{id}', 'EventfoldersController@destroy');
Route::post('savecontents', 'PageController@updateContents');
Route::post('savevacancy/{id}', 'PageController@updateVacancy');

Route::get('careers_online_applicants_list', array('uses' => 'VacancyController@index'));
Route::post('app_selected_del', array('uses' => 'VacancyController@app_selected_del'));
Route::post('app_selected_pag', array('uses' => 'VacancyController@app_set_paginate'));

//upload news and events photos
Route::get('news_events_details/{id}',array('uses' => 'PhotoController@show'));
Route::post('upload_event_photos',array('uses'=>'PhotoController@store'));
Route::post('del_selected_photos',array('uses'=>'PhotoController@del_selected_photos'));
Route::post('del_photo/{id}',array('uses'=>'PhotoController@del_photo'));
Route::post('update_photo/{id}',array('uses'=>'PhotoController@update_photo'));


Route::post('delete_application/{id}', 'VacancyController@destroy');
Route::get('/download', 'IndexController@getDownload');



















