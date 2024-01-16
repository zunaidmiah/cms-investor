<?php

Class EmailController extends BaseController{
    
    /*
    |--------------------------------------------------------------------------
    | Default Email Controller
    |--------------------------------------------------------------------------
    |
    |	Route::get('/', 'EmailController@index');
    |
    */
    
    public function __construct(){
        
        //contruct ccde Here.
        
        
    }
    
    public function index(){
        return View::make('admin.home');
    }
    
    public function publishNews(){
        
        if(Input::get('publish') != null){
            $mediaNews  = new Medianews();
            $newsIds    = Input::get('publish');
            $return = $mediaNews->publishSelected($newsIds);
            
            if($return){
                //code when news successfullt published
            }else{
                //code when successfully not published
            }
            
            return Redirect::to('/news_centre_latest_media_news');
            
        }else{
            return Redirect::to('/');
        }
        
    }
    
    
    
    
}