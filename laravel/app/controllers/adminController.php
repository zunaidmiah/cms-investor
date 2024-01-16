<?php

Class adminController extends BaseController{

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

    public function web_scrapping_list(){

        $Webscrappingurl = new Webscrappingurl();
        $number_of_record = Input::get('limit') ? Input::get('limit') : 10 ;

        $data['urls'] = $Webscrappingurl->getAll($number_of_record);
        $data['limit'] = $number_of_record;

        return View::make('pages.web_scrapping_list')->with($data);

    }

    public function web_scrapping_new(){

        return View::make('pages.web_scrapping_new');

    }

    public function web_scrapping_new_save(){

        /*
         * Data from the Add Url page web_scrapping_new
         */

        $Webscrappingurl = new Webscrappingurl();

        $data['url'] = Input::get('url');

        if(!preg_match('/(^|\s)((https?:\/\/)+\.?(:\d+)?(\/\S*)?)/', $data['url'])){
            $data['link'] = 'http://' . $data['url'];
        }else{
            $data['link'] = $data['url'];
        }

        $data['status'] = (Input::get('status') != null) ? Input::get('status') : 0 ;
        $insert = $Webscrappingurl->insertUrls($data);

        if ($insert)
        {
            Session::put('success', 1);
            Session::put('message', 'The information has been saved/updated successfully.');
        }
        else {
            Session::put('success', 2);
            Session::put('message', 'The information has not been saved/updated. Please correct the errors.');
        }
        return Redirect::to('admin/web_scrapping_list');

    }

    public function web_scrapping_edit(){

        $Webscrappingurl = new Webscrappingurl();

        $id = Input::get('id');
        $data['url'] = $Webscrappingurl->getUrl($id);
        return View::make('pages.web_scrapping_edit')->with($data);

    }

    public function web_scrapping_edit_save(){

        $Webscrappingurl = new Webscrappingurl();

        $data['id'] = Input::get('id');
        $data['url'] = Input::get('url');

        if(!preg_match('/(^|\s)((https?:\/\/)+\.?(:\d+)?(\/\S*)?)/', $data['url'])){
            $data['link'] = 'http://' . $data['url'];
        }else{
            $data['link'] = $data['url'];
        }

        $data['status'] = (Input::get('status') != null) ? Input::get('status') : 0 ;

        $update = $Webscrappingurl->updateSingle($data);

        if ($update)
        {
            Session::put('success', 1);
            Session::put('message', 'The information has been saved/updated successfully.');
        }
        else {
            Session::put('success', 2);
            Session::put('message', 'The information has not been saved/updated. Please correct the errors.');
        }
        return Redirect::to('admin/web_scrapping_list');

    }

    public function web_scrapping_delete()
    {
        $Webscrappingurl = new Webscrappingurl();

        $id = Input::get('id');
        $delete = $data['url'] = $Webscrappingurl->deleteUrl($id);

        if ($delete)
        {
            Session::put('success', 1);
            Session::put('message', 'Item Successfully Deleted');
        }
        else {
            Session::put('success', 2);
            Session::put('message', 'Something Went Wrong!! Please Try again');
        }
        return Redirect::to('admin/web_scrapping_list');
    }

    public function web_scrapping_delete_all()
    {

        $Webscrappingurl = new Webscrappingurl();

        if(Input::get('selectionCheck') != null){
            $id = array();
            $id = Input::get('selectionCheck');
            $delete = $Webscrappingurl->deleteMultipleUrls($id);
        }else{
            if( Input::get('deleteHidden') == 'all'){
                $delete = $Webscrappingurl->deleteMultipleUrls('all');
            }else{
                $delete = false;
            }
        }

        if ($delete)
        {
            Session::put('success', 1);
            Session::put('message', 'Item Successfully Deleted');
        }
        else {
            Session::put('success', 2);
            Session::put('message', 'Something Went Wrong!! Please Try again');
        }
        return Redirect::to('admin/web_scrapping_list');

    }

    public function media_news_list(){
         if(!Session::has('id'))
       {
           Redirect::to('')->send();
       }else{
        if(Session::has('REFERER')) Session::forget('REFERER');

        $number_of_record = Input::get('limit') ? Input::get('limit') : 50;
        $mediaNews = new Medianews();
        $data['mediaNews'] = $mediaNews->getAll($number_of_record);
        $data['lastUpdatedNews'] = $mediaNews->getMaxNews('updated_at');
        $data['limit'] = $number_of_record;
        return View::make('pages.media_news_list')->with($data);
       }
    }

    public function media_news_new(){

        return View::make('pages.media_news_new');

    }

    public function media_news_new_save(){

        $mediaNews = new Medianews();

        if(Input::get('date') != null){

            $data['date'] = Input::get('date');
            $explodedDate = explode('/', Input::get('date'));//dd/mm/yyyy format used
            $dateTimestamp = mktime(0,0,0,$explodedDate[1], $explodedDate[0], $explodedDate[2]);

            if (Input::hasFile('imgFile'))
            {
                $destinationPath = 'uploads/media_news/';
                $relativeDestinationPath = getcwd().'/'.$destinationPath;
                $fileName = Input::file('imgFile')->getClientOriginalName();
                Input::file('imgFile')->move($relativeDestinationPath, $fileName);
                $data['news_image'] = $destinationPath.$fileName;
            }
            else
            {
                $data['news_image'] = '';

            }

            $data['id'] = Input::get('id');
            $data['date'] = $dateTimestamp;
            $data['title'] = Input::get('title');
            $data['heading'] = Input::get('heading');
            $data['footer'] = Input::get('footer');
            $data['content'] = Input::get('content');
            $data['status'] = (Input::get('status') != null) ? Input::get('status') : 0 ;
            $insert = $mediaNews->insertMediaNews($data);

            if ($insert)
            {
                Session::put('success', 1);
                Session::put('message', 'The information has been saved/updated successfully.');
            }
            else {
                Session::put('success', 2);
                Session::put('message', 'The information has not been saved/updated. Please correct the errors.');
            }
        }else{
            Session::put('success', 2);
            Session::put('message', 'Please enter the date to continue');
            return Redirect::to('admin/media_news_new');
        }

        return Redirect::to('admin/media_news_list');

    }

    public function media_news_edit(){

        if(isset($_SERVER['HTTP_REFERER'])){
            $REFERER = Session::put('REFERER', $_SERVER['HTTP_REFERER']);
        }

        $mediaNews = new Medianews();

        $id = Input::get('id');
        $data['mediaNews'] = $mediaNews->getMediaNews($id);
        return View::make('pages.media_news_edit')->with($data);

    }

    public function media_news_edit_save(){

        $mediaNews = new Medianews();

        $data['date'] = Input::get('date');
        $explodedDate = explode('/', Input::get('date'));
        $dateTimestamp = mktime(0,0,0,$explodedDate[1], $explodedDate[0], $explodedDate[2]);

        if (Input::hasFile('imgFile'))
        {
            $destinationPath = 'uploads/media_news/';
            $relativeDestinationPath = getcwd().'/'.$destinationPath;
            $fileName = Input::file('imgFile')->getClientOriginalName();
            Input::file('imgFile')->move($relativeDestinationPath, $fileName);
            $data['news_image'] = $destinationPath.$fileName;

        }else if(Input::get('news_image') != ''){
            $data['news_image'] = Input::get('news_image');

        }else{
            $data['news_image'] = '';
        }

        $data['date'] = $dateTimestamp;
        $data['id'] = Input::get('id');
        $data['title'] = Input::get('title');
        $data['heading'] = Input::get('heading');
        $data['footer'] = Input::get('footer');
        $data['content'] = Input::get('content');
        $data['status'] = (Input::get('status') != null) ? Input::get('status') : 0 ;

        $update = $mediaNews->updateSingle($data);

        if ($update)
        {
            Session::put('success', 1);
            Session::put('message', 'The information has been saved/updated successfully.');
        }
        else {
            Session::put('success', 2);
            Session::put('message', 'The information has not been saved/updated. Please correct the errors.');
        }

        if(Session::has('REFERER')){
            $REFERER = Session::get('REFERER');
            Session::forget('REFERER');
            return Redirect::to($REFERER);
        }else{
            return Redirect::to('admin/media_news_list');
        }

    }

    public function media_news_delete()
    {
        $mediaNews = new Medianews();

        $id = Input::get('id');
        $delete = $data['mediaNews'] = $mediaNews->deleteMediaNews($id);

        if ($delete)
        {
            Session::put('success', 1);
            Session::put('message', 'Item Successfully Deleted');
        }
        else {
            Session::put('success', 2);
            Session::put('message', 'Something Went Wrong!! Please Try again');
        }
        //return Redirect::to('admin/media_news_list');
        return Redirect::back();
    }

    public function media_news_delete_all()
    {
        $mediaNews = new Medianews();

        if(Input::get('selectionCheck') != null){
            $id = array();
            $id = Input::get('selectionCheck');
            $delete = $mediaNews->deleteMultipleMediaNews($id);
        }else{
            if( Input::get('deleteHidden') == 'all'){
                $delete = $mediaNews->deleteMultipleMediaNews('all');
            }else{
                $delete = false;
            }
        }

        if ($delete)
        {
            Session::put('success', 1);
            Session::put('message', 'Selected Items Successfully Deleted');
        }
        else {
            Session::put('success', 2);
            Session::put('message', 'Something Went Wrong!! Please Try again');
        }
        //return Redirect::to('admin/media_news_list');
        return Redirect::back();;

    }

    /**
     * [sendMediaNewsEmail description]
     * To send each selected news to requested email ids
     * @return json 
     */
    public function sendMediaNewsEmail()
    {
		
        $mediaNews = new Medianews();
        $newsIds = explode(',', Input::get('news_ids'));
        $emailIds = explode(',', Input::get('email_ids'));
        $data['email_ids'] = $emailIds;
        $result = false;

        foreach($emailIds as $receipt){
            foreach ($newsIds as $newsId) {
                $result = false;
                $data['data'] = $mediaNews->getMediaNews($newsId);
                if($data['data']->status){ $data['data']->statusText = "Approved";}else{$data['data']->statusText = "Pending for Approval";}
                Mail::send('pages.media_news_email_template', $data, function($message) use ($receipt)
                {
                    $message->to($receipt)->subject('Far East Holdings Bhd Media News');
                });
                $mediaNews->updateEmailSentStatus($newsId);
                $result = true;
            }
        }
     
        if ($result)
        {
            Session::put('success', 1);
            Session::put('message', 'Selected Items Successfully Emailed');
        } else {
            Session::put('success', 2);
            Session::put('message', 'Something Went Wrong!! Please Try again');
        }

        return Response::json($result);
    }

    public function publishNews(){

        if(Input::get('publish') != null){
            $mediaNews  = new Medianews();
            $newsIds    = Input::get('publish');
            $return = $mediaNews->publishSelected($newsIds);

            if($return){
                //code when news successfullt published
                Session::put('success', 1);
                Session::put('message', 'Selected Items Successfully Published');
            }else{
                //code when successfully not published
                Session::put('success', 2);
                Session::put('message', 'Something Went Wrong!! Please Try again');
            }

            //return Redirect::to('admin/media_news_list');
            if ( ! Request::header('referer'))
            {
                return Redirect::to('admin/media_news_list');
            }else{
                return Redirect::back();
            }

        }else{
            if ( ! Request::header('referer'))
            {
                return Redirect::to('admin/media_news_list');
            }else{
                return Redirect::back();
            }

         }

    }

    public function grabAllNews() {

        /* //Get ajax or CURL response from this URL
         * https://www.google.com/alerts/preview?params=%5Bnull%2C%5Bnull%2Cnull%2Cnull%2C%5Bnull%2C%22ock%20group%22%2C%22com%22%2C%5Bnull%2C%22en%22%2C%22US%22%5D%2Cnull%2Cnull%2Cnull%2C0%2C1%5D%2Cnull%2C3%2C%5B%5Bnull%2C1%2C%22user%40example.com%22%2C%5Bnull%2Cnull%2C18%5D%2C2%2C%22en-US%22%2Cnull%2Cnull%2Cnull%2Cnull%2Cnull%2C%220%22%2Cnull%2Cnull%2C%22AB2Xq4hcilCERh73EFWJVHXx-io2lhh1EhC8UD8%22%5D%5D%5D%2C0%5D
         *
         * http://www.thestar.com.my/search/?q=ock%20bhd&qsort=newest&qrec=100&qstockcode=
         * http://www.thestar.com.my/search/?q=ock%20group%20bhd%20bhd&qsort=newest&qrec=100&qstockcode=
         *
         * http://www.nst.com.my/search?s=ock+bhd
         *
         * http://www.theedgemarkets.com/en/content/search-results?query=far%20east%20bhd
         *
         * http://search.sinchew.com.my/search/google?cx=012605229465411000741%3Aq70ti1atknw&cof=FORID%3A11&sort=metatags-pubdate&query=ock+bhd&op=&form_id=google_cse_searchbox_form
         *
         */

        /*
         * Fatal error: Allowed memory size of 134217728 bytes exhausted
         * (tried to allocate 122880 bytes) in /var/www/edgemyjoomla159/plugins/content/jcomments.content.php on line 175
         */

        $Webscrappingurl = new Webscrappingurl();

        $allUrls = $Webscrappingurl->fetchAllUrls();

        if(!empty($allUrls)){

            require_once('phpQuery/phpQuery/phpQuery.php');

            foreach ($allUrls as $allUrl){

                if(!empty($allUrl->rssurl)){
                    $url = $allUrl->rssurl;
                }else{
                    $url = $allUrl->link;
                }

                if(preg_match("/thestar/", $allUrl->url, $match)){
                    $scrappingUrl = 'http://www.thestar.com.my/search/?q=ock%20bhd&qsort=newest&qrec=100&qstockcode=';
                }else if(preg_match("/nst\.com/", $allUrl->url, $match)){
                    $scrappingUrl = 'http://www.nst.com.my/search?s=ock+bhd';
                }else if(preg_match("/theedgemarkets/", $allUrl->url, $match)){
                    $scrappingUrl = 'http://www.theedgemarkets.com/en/content/search-results?query=far%20east%20bhd';
                }else if(preg_match("/sinchew/", $allUrl->url, $match)){
                    $scrappingUrl = 'http://search.sinchew.com.my/search/google?cx=012605229465411000741%3Aq70ti1atknw&cof=FORID%3A11&sort=metatags-pubdate&query=ock+bhd&op=&form_id=google_cse_searchbox_form';
                }else{
                    $scrappingUrl = '';
                }
                /*
                if(strpos($url, 'http') === false){
                    $url = 'http://' . $url;
                }
                */
                if(!empty($scrappingUrl)){

                    $data = $this->get_curl_data($scrappingUrl);
                    $scrapKeywords = str_replace(' ', '\s', implode('|', $this->grabingKeywordsArray()));


                    $page = new DOMDocument();
                    @$page->loadHTML($data);

                    //$page = phpQuery::newDocumentHTML($data);
                    //phpQuery::selectDocument($page);
                    //print_r($page->find('article.story-list a'));exit;
                    /*
                    //Use regex which says that the match should appear in ANCHOR(<a>) tag
                    if(preg_match_all("/\b($scrapKeywords)\b/i", $data, $matches)){

                    }else{
                        echo 'not found';
                    }
                    */

                    foreach($page->getElementsByTagname('article') as $article){
                        $articleNode = $article->childNodes;

                        foreach($articleNode as $item){
                            if ($item->hasChildNodes()) {
                                $childs = $item->childNodes;

                                foreach($childs as $i) {

                                    if($i->nodeName == 'a'){
                                        echo $i->getAttribute('href') . "<br />";
                                    }
                                    //echo $i->getAttribute('href') . "<br />";
                                    //echo $i->nodeValue . "<br />";
                                }
                            }

                            //echo $val->nodeValue;
                        }
                        exit;
                    }
                }

            }//Foreach $allUrls

        }

        exit;

    }

    function grabingKeywordsArray(){
        return array(
            'fehb',
            'fehb bhd',
            'far east holdings bhd',
            'far east holdings',
            'far east',
        );
    }

    function get_curl_data($url) {

        $ua = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url); // The URL to fetch. This can also be set when initializing a session with curl_init().
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // The number of seconds to wait while trying to connect.
        curl_setopt($ch, CURLOPT_USERAGENT, $ua); // The contents of the "User-Agent: " header to be used in a HTTP request.
        curl_setopt($ch, CURLOPT_FAILONERROR, TRUE); // To fail silently if the HTTP code returned is greater than or equal to 400.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); // To follow any "Location: " header that the server sends as part of the HTTP header.
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE); // To automatically set the Referer: field in requests where it follows a Location: redirect.
        curl_setopt($ch, CURLOPT_TIMEOUT, 10); // The maximum number of seconds to allow cURL functions to execute.
        curl_setopt($ch, CURLOPT_MAXREDIRS, 1); // The maximum number of redirects

        $result = trim(curl_exec($ch));

        curl_close($ch);

        if (empty($result)) {
            $url = str_replace(' ', '%20', $url);
            $result = trim(file_get_contents($url));
        }

        return $result;
    }

    public function sendMail($param = null) {

        /*
         * Get newly scraped news.
         * Send email if any news scrapped
         */


        Mail::send('emails.news', array('key' => 'value'), function($message){
            $message->from('us@example.com', 'Laravel');
            $message->to('praggyagupta21@gmail.com', 'John Smith')->subject('Welcome!');
        });
    }

    public function SOme(){

    }
     public function logout() {
        Session::flush();
        return Redirect::to('');
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
       $query = User::where(array('email' => $name, 'password' => $pwd));
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


}