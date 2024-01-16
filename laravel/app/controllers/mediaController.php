<?php

Class mediaController extends BaseController{
    
    /*
    |--------------------------------------------------------------------------
    | Default Media Controller
    |--------------------------------------------------------------------------
    |
    |	
    |
    */

    public function index(){

        $media_date = DB::connection('medianews')->select('SELECT date FROM media_news WHERE status = 1 ORDER BY date DESC');
        $media = DB::connection('medianews')->select('SELECT * FROM media_news WHERE status = 1 ORDER BY date DESC');

        $dates = array();
        foreach($media_date as $m){
            $dates[date("d/m/Y", $m->date)] = date("M Y", $m->date);
        }
        $dates = array_unique($dates);

        $news = array(array());
        foreach($dates as $tyy){
            foreach($media as $v => $ty){
                if(date("M Y", $ty->date) == $tyy){
                    $news[$tyy][$ty->id] = $ty;
                }
            }
        }
        
        $dateKeys = array_keys($dates);

        $newsKeys = array_keys($news);
        unset($news[$newsKeys[0]]);
        unset($newsKeys[0]);


        return View::make('pages.media')
                    ->with('media', $news)
                    ->with('media_date', $dates)
                    ->with('dateKeys', $dateKeys)
                    ->with('newsKeys', $newsKeys);
    }  
    
}