<?php

class BaseController extends Controller {
    
        
    public function __construct(){
        
        //contruct ccde Here.
        date_default_timezone_set('Asia/Singapore');
        
    }
    

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
            if ( ! is_null($this->layout))
            {
                    $this->layout = View::make($this->layout);
            }
    }

}
