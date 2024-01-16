<?php

Class loginController extends BaseController{
    
    /*
    |--------------------------------------------------------------------------
    | Default Admin Controller
    |--------------------------------------------------------------------------
    |
    |	Route::get('/', 'AdminController@index');
    |
    */
    
    public function __construct()
    {
      
    }
    
    public function index(){
        return View::make('home');
    }
    
    
    
    public function changePassword(){
         $id = Session::get('id');
         $id = $id[0]; 
         $password = Input::get('newPassword');
         $Cpassword = Input::get('Cpassword');
         $pwd = hash('sha512', $password);
         $query = User::where('id', $id);
         $array = array(
             'password' => $pwd
         );
         
         $result = $query->update($array);
         if($result){
         return Redirect::to('admin/media_news_list');
         }
         
    }
   public function login(){
       $name = Input::get('username');
       $password = Input::get('password');
       //$salt = substr(str_shuffle("./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz012345??6789"), 0, 8); 
       $pwd = hash('sha512', $password);
       $query = User::where(array('username' => $name, 'password' => $pwd));
       $result = $query->get();
       
       if(isset($result) && !empty($result) && count($result)> 0){
           Session::put('username', $result[0]->email);
           Session::push('id', $result[0]->id);
           return Redirect::to('admin/media_news_list');
       }
       else{
          return Redirect::to('/1');
       }
       
    }
    
    public function forgetPassword(){
       
        return View::make('forgetpassword');
    }
    
    public function sendPassword(){
        
        if(isset($_POST['email'])){
            
            $email =  Input::get('email');
           $query = User::where('email', $email)->get();
           
           
           if(isset($query) && count($query)>0 ){
               
               $message = 'Click on Below Link to reset your Password';
               
               $message = "<html><head></head><body><p>You have requested to change your password</p><br> <h2>click on below link to change your password</h2><br><a href='http://medianews.fareastholdingsbhd.com/resetpassword23jkhkjhk239fasdll34lkldfas'>Change Your Password</a></body></html>";
               
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <Support@medianews.fareastholdingsbhd.com>' . "\r\n";

                 mail('support@webqom.com', 'Forget Passowrd', $message, $headers);

               return View::make('hello')->with('error', 'Mail Sent : please check your email inbox or spam folder');
               
           }else{
               
               return View::make('forgetpassword')->with('error', 'Invalid Email');
           }
           
           
        }
    
    }
    
    public function sendPassword2(){
        return View::make('resetpassword');
    }
    
    public function resetpassword(){
        if(isset($_POST['password'])){
            $pwd = hash('sha512', $_POST['password']);
            $post = array('password'=>$pwd);
            $password = Input::get('password');
            $cpwd = Input::get('cpassword');
            if($password != $cpwd){
                $msg = 'Password and Confirm Password Not match';
                return View::make('resetpassword')->with('error', $msg);
            }else{
             $query =  User::where('id', '3');
             $query->update($post);
             $msg = 'Password Changed Successfully';
             return View::make('hello')->with('error', $msg);
            }
        }
    }
    
}