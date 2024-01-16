<?php
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
class ScrapeComponent
{
 
    private $client;
    public  $url;
    public  $crawler;
    public  $filters;
    public  $filterParent;
    public  $content = array();
    
    /*
     * To get the last Executed Query
    $queries = DB::getQueryLog();
    $last_query = end($queries);
    */
    
    /**
     * Defining our Dependency Injection Here.
     * or Instantiate new Classes here.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client    = $client;
    }
 
 
 
    /**
     * Setup our scraper data. Which includes the url that
     * we want to scrape
     *
     * @param (String) $url = default is NULL
     *        (String) $method = Method Types its either POST || GET
     * @return void
     */
    public function setScrapeUrl($url = NULL, $method = 'GET')
    {
        $this->crawler = $this->client->request($method, $url);
        return $this->crawler;
    }
    
    /*
     * 
     * New Web Scrapping for OCK
     */
    
    public function grabAllData($url = null, $params = null)
    {
        if($url != null){
            $this->url = $url;
        }
        
        $this->setScrapeUrl( $this->url );
        
        $fieldsToBeScrapped = array();
        
        if($params != null){
            
            if(isset($params['title']))
                $fieldsToBeScrapped['title'] = $params['title'];
            
            if(isset($params['short_description']))
                $fieldsToBeScrapped['short_description'] = $params['short_description'];
            
            if(isset($params['date']))
                $fieldsToBeScrapped['date'] = $params['date'];

            if(isset($params['image_preview']))
                $fieldsToBeScrapped['image_preview'] = $params['image_preview'];

        }
        
        if(isset($params['parent']))
            $this->filterParent = $params['parent'];
        else
            $this->filterParent = '';
        
        $this->filters = $fieldsToBeScrapped;
        
        return $this->getContentsCustom();
    
    }
    
    
    /*
     * Get requested Content from scrapped URL
     */
    public function getContentsCustom()
    {
        return $this->content = $this->startScraperCustom();
    }
    
    
    /*
     * Scraping content using the URL and [aramenters requested.
     */
    private function startScraperCustom()
    {
        // lets check if our filter has result.
        // im using CssSelector Dom Components like jquery for selecting data attributes.
        if(isset($this->filters['title']))
            $countContent = $this->crawler->filter($this->filters['title'])->count();
        else if(isset($this->filters['short_description']))
            $countContent = $this->crawler->filter($this->filters['short_description'])->count();
        else if(isset($this->filters['link']))
            $countContent = $this->crawler->filter($this->filters['link'])->count();
 
        if ($countContent) {
            // loop through in each ".posts--list-large li" to get the data that we need.
            $this->content = $this->crawler->filter($this->filterParent)->each(function(Crawler $node, $i) {
               
                $return = array();
                
                foreach($this->filters as $key => $value){
                    
                    //$return[$key] = $node->filter($value)->text();
                    
                try{
                        if($key == 'title'){
                            $return['link'] = $node->filter($value)->attr('href');
                        }

                        if($key == 'image_preview'){
                                $return['news_image'] = $node->filter($value)->attr('src');
                        }

                        if($key == 'short_description'){
                            $return[$key] = implode('', $node->filter($value)->each(function(Crawler $node, $i)  {
				$text = $node->html();
				if (!empty($text)) {
return $text;
				}
				}));
                        }else{
                            $return[$key] = $node->filter($value)->text();
                        }
                    }catch(Exception $e){
                        # do nothing
                    }                  

                }
                
                return $return;
                 
            });
        }
        
        return $this->content;
    }
    
    
    
    public function fetchFromStar($sendMail = null){
        
        /*
         * Scraper dsplays current node list empty when the parent($paramsTemp['parent']) is not set properly.
         * All the params like title, link, description should be inside a parent div
         */
        
        $Webscrappingurl = new Webscrappingurl();
        
        //$allUrls = $Webscrappingurl->fetchAllUrls();
        $allUrls = $Webscrappingurl->fetchAllActiveUrls();
        var_dump('start STAR');
        
        if(!empty($allUrls)){
            
            
            $mediaNews = new Medianews();
            $insertData = array();
            $insertDataArray = array();
            
            foreach ($allUrls as $allUrl){
                
                $result = array();
                
                $params = array();
                $fullArticle = array();
                $resultGrab = array();
                $stopGrab = 0;
                
                if(preg_match("/thestar/", $allUrl->url, $match)){
                    $scrappingUrl = 'http://www.thestar.com.my/search/?q=ock+group&qsort=newest&qrec=100&qstockcode=';
                    
                    $params['title'] = '.story-list h2 a';
                    //$params['short_description'] = '.story-list p';
                    $params['date'] = '.story-list .date';
                    $params['parent'] = '.search-list .story-list';
                    
                    $result = $this->grabAllData($scrappingUrl, $params);
                    
                    if(!empty($result)){
                        
                        $fullArticle = array();
                        
                        foreach($result as $key => $val){
                            if(!$this->isValidURL($val['link'])){
                                $result[$key]['link'] = $this->unparse_url($this->url).$val['link'];
                            }
                            

                            $contentFields['title'] = $val['title'];
                            $contentFields['date'] = $val['date'];
                            $contentFields['link'] = $result[$key]['link'];
                            
                            $resultGrab[] = $contentFields;
                            $fullArticle[] = $result[$key]['link'];
                        }
                        
                        $paramsTemp['image_preview']='.story-image img';
                        $paramsTemp['short_description'] = 'div.story';
                        $paramsTemp['parent'] = '.story-container';

                        
                    }
                    
                    $insertData['footer'] = 'The Star Online';
                    
                }else{
                    $scrappingUrl = '';
                }
                
                if(!empty($scrappingUrl)){
                    
                    //if($scrappingUrl != 'http://www.thestar.com.my/search/?q=ock%20bhd&qsort=newest&qrec=100&qstockcode=') continue;
                    //if($scrappingUrl != 'http://www.nst.com.my/search?s=ock+bhd') continue;
                    //if($scrappingUrl != 'http://www.theedgemarkets.com/en/content/search-results?query=ock%20bhd') continue;
                    //if($scrappingUrl != 'http://search.sinchew.com.my/search/google?cx=012605229465411000741%3Aq70ti1atknw&cof=FORID%3A11&sort=metatags-pubdate&query=ock+bhd&op=&form_id=google_cse_searchbox_form') continue;
                    
                    if(!empty($fullArticle)){
                        //$result = $this->grabAllData($scrappingUrl, $params);
                        $result = array();
                        
                        //Getting list of already existed Links.
                        $getMediaNewsList = $mediaNews->getMediaNewsList('link', 'id', $allUrl->id);
                        
                        //Only Processs new links
                        if(!empty($getMediaNewsList)){
                            $getMediaNewsList = array_values($getMediaNewsList);
                            $fullArticle = array_diff($fullArticle, $getMediaNewsList);
                        }
//var_dump($fullArticle);
                        
                        //if($insertData['footer'] == 'Sinchew') {print_r($fullArticle);exit;}
                        foreach($fullArticle as $key => $link){
                            
                            $resultTemp = $this->grabAllData($link, $paramsTemp);
                            

                            //if($insertData['footer'] == 'Sinchew') {print_r($resultTemp);exit;}
                            if($insertData['footer'] == 'The Star Online'){
                                
                                foreach($resultGrab as $value){
                                    if($value['link'] == $link){
                                        $resultTemp[0]['title'] = $value['title'];
                                        $resultTemp[0]['date'] = $value['date'];
                                        $resultTemp[0]['link'] = $value['link'];
                                    }
                                }
                                
                                $resultTemp[0]['date'] = strtotime($resultTemp[0]['date']);
                            }
                            
                            $result[] = $resultTemp[0];
                        }
                        
                        $stopGrab = true;
                        
                    }else if($stopGrab){
                        $result = $resultGrab;
                    }else{
                        $result = $this->grabAllData($scrappingUrl, $params);
                    }
                    
                    if(!empty($result)){
                        
                        $insertDataArray = array();
                        $insertDataTitleArray = array();
                        
                        foreach($result as $resultData){
                            
                            if(isset($resultData['title'])){
                                $insertData['title'] = $resultData['title'];
                                $insertData['title'] = trim($insertData['title']);
                            }

                            if(isset($resultData['news_image'])){
                                $insertData['news_image'] = $resultData['news_image'];
                                $insertData['news_image'] = trim($insertData['news_image']);
                            }
                            
                            if(isset($resultData['link'])){
                                
                                if(!$this->isValidURL($resultData['link'])){
                                    $resultData['link'] = $this->unparse_url($this->url).$resultData['link'];
                                }
                                
                                $insertData['link'] = $resultData['link'];
                                //$insertData['link'] = $this->last_redirected_url($resultData['link']);
                            }
                            if(isset($resultData['short_description'])){
                                
                                $domainLink = $this->last_redirected_url($resultData['link']);
                                $hostLink = $this->unparse_url($domainLink);
                                
                                $resultData['short_description'] = $this->make_absolute_html($resultData['short_description'], $hostLink);
                                $resultData['short_description'] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $resultData['short_description']);
                                $resultData['short_description'] = preg_replace('#<style(.*?)>(.*?)</style>#is', '', $resultData['short_description']);
                                
                                $insertData['content'] = strip_tags($resultData['short_description'], '<a><img><p><br>');
                            }
                            
                            if(isset($resultData['date'])){
                                if($stopGrab){
                                    $insertData['date'] = $resultData['date'];
                                }else{
                                    $insertData['date'] = strtotime($resultData['date']);
                                }
                                
                            }
                            
                            $insertData['scraping_url_id'] = $allUrl->id;
                            $insertData['status'] = 0;
                            
                            $conditions['title'] = trim($insertData['title']);
                            $existing_id = $mediaNews->getMediaNewsWithConditions($conditions);
                            if($existing_id){
                                
                                $insertData['id'] = $existing_id;
                                
                                //Update data to Database
                                //$update = $mediaNews->updateSingleScraper($insertData);
                                
                            }else{
                                //Insert data to Database
                                //$insert = $mediaNews->insertScraper($insertData);
                                
                                $insertData['id'] = NULL;
                                $insertData['heading'] = '';
                                // $insertData['news_image'] = '';
                                $insertData['created_at'] = date("Y-m-d H:i:s", time());
                                $insertData['updated_at'] = date("Y-m-d H:i:s", time());
                                
                                $insertDataArray[] = $insertData;
                                $insertDataTitleArray[] = $insertData['title'];
                            }
                            
                            
                        }

                        
                        if(!empty($insertDataArray)){
                            //Insert data to Database
                            $insert = true;
                            foreach ($insertDataArray as $insertData) {
                                $item = new Medianews;
                                if (isset($insertData['id'])) {
                                        $item = Medianews::find($insertData['id']);
                                }
                                $item->fillData($insertData);
                                if (!$item->save()) {
                                    $insert = false;
                                    var_dump('ERROR');
                                }
                            }
                            
                            /*
                            $queries = DB::getQueryLog();
                            print_r($queries);
                            */
                            //print_r($insertDataArray);
                            if($insert){
                                //Send mail
                                //echo 'sendMail';
                                if($sendMail == true){
                                    $mailData = $mediaNews->getNewsFromTitles($insertDataTitleArray);
                                    $mailStatus = $this->sendMail($mailData, $type = 1);
                                    if($mailStatus){
                                        $mailStatusReturn = 1;
                                    }
                                }
                                //return array(1, $insertDataTitleArray);
                                
                            }else{
                                //Send Email to admin that the Cron is not inserting the data
                                //echo 'Data not inserted';
                                //return array(0, 'Data not inserted');
                            }

                        }else{
                            //No Data to insert
                            
                            //echo 'No New data to insert';
                            //return array(0, 'No New data to insert');
                        }
                        
                    }
                }
                
            }//Foreach $allUrls
            
            if(isset($mailStatusReturn) && $mailStatusReturn == 1){
                return 1;//At least one email sent
            }else{
                return 2;//No email sent
            }
            
        }
        
        //echo '<pre>';
        //print_r($result);
        
    }

public function fetchFromNST($sendMail = null){
	print 'START NST';
        
        /*
         * Scraper dsplays current node list empty when the parent($paramsTemp['parent']) is not set properly.
         * All the params like title, link, description should be inside a parent div
         */
        
        $Webscrappingurl = new Webscrappingurl();
        
        //$allUrls = $Webscrappingurl->fetchAllUrls();
        $allUrls = $Webscrappingurl->fetchAllActiveUrls();
        
        if(!empty($allUrls)){
            
            
            $mediaNews = new Medianews();
            $insertData = array();
            $insertDataArray = array();
            
            foreach ($allUrls as $allUrl){
                
                $result = array();
                
                $params = array();
                $fullArticle = array();
                $resultGrab = array();
                $stopGrab = 0;
                
                if(preg_match("/nst\.com/", $allUrl->url, $match)){
                    $scrappingUrl = 'http://www.nst.com.my/search?s=ock+bhd';
                    //$scrappingUrl = 'http://www.nst.com.my/search?s=Najib+to+pay+last+respects+to+King+Abdullah+in+Riyadh';
                    
                    // $params['title'] = '.field-content a';
                    // $params['parent'] = '#content .views-row';
                    $params['title'] = 'a';
                    // $params['short_description'] = 'p';
                    $params['parent'] = '.view-content div';

                    $result = $this->grabAllData($scrappingUrl, $params);
                    
                    if(!empty($result)){
                        
                        $fullArticle = array();
                        
                        foreach($result as $key => $val){
                            if(!$this->isValidURL($val['link'])){
                                $result[$key]['link'] = $this->unparse_url($this->url).$val['link'];
                            }
                            $fullArticle[] = $result[$key]['link'];
                        }
                        
                        $paramsTemp['title'] = '.node-article .node-title a';
                        $paramsTemp['short_description'] = '.node-article .field-item';
                        $paramsTemp['image_preview']='.region .view-article-gallery .view-content img';
                        $paramsTemp['date'] = '.node-article .node-published-date';
                        $paramsTemp['parent'] = '#content';
                        
                    }
                    
                    $insertData['footer'] = 'New Straits Times Online';
                    
                }else{
                    $scrappingUrl = '';
                }
                
                if(!empty($scrappingUrl)){
                    
                    //if($scrappingUrl != 'http://www.thestar.com.my/search/?q=ock%20bhd&qsort=newest&qrec=100&qstockcode=') continue;
                    //if($scrappingUrl != 'http://www.nst.com.my/search?s=ock+bhd') continue;
                    //if($scrappingUrl != 'http://www.theedgemarkets.com/en/content/search-results?query=ock%20bhd') continue;
                    //if($scrappingUrl != 'http://search.sinchew.com.my/search/google?cx=012605229465411000741%3Aq70ti1atknw&cof=FORID%3A11&sort=metatags-pubdate&query=ock+bhd&op=&form_id=google_cse_searchbox_form') continue;
                    
                    if(!empty($fullArticle)){
                        //$result = $this->grabAllData($scrappingUrl, $params);
                        $result = array();
                        
                        //Getting list of already existed Links.
                        $getMediaNewsList = $mediaNews->getMediaNewsList('link', 'id', $allUrl->id);
                        
                        //Only Processs new links
                        if(!empty($getMediaNewsList)){
                            $getMediaNewsList = array_values($getMediaNewsList);
                            $fullArticle = array_diff($fullArticle, $getMediaNewsList);
                        }
                        
                        //if($insertData['footer'] == 'Sinchew') {print_r($fullArticle);exit;}
                        foreach($fullArticle as $key => $link){
                            
                            $resultTemp = $this->grabAllData($link, $paramsTemp);

                            
                            //if($insertData['footer'] == 'Sinchew') {print_r($resultTemp);exit;}
                            if($scrappingUrl == 'http://www.nst.com.my/search?s=ock+bhd'){
                            //if($scrappingUrl == 'http://www.nst.com.my/search?s=Najib+to+pay+last+respects+to+King+Abdullah+in+Riyadh'){
                                $resultTemp[0]['date'] = trim(strstr($resultTemp[0]['date'], '@', true));
                                $resultTemp[0]['date'] = strtotime($resultTemp[0]['date']);
                                
                            }
                            
                            $result[] = $resultTemp[0];
                        }
                        
                        $stopGrab = true;
                        
                    }else if($stopGrab){
                        $result = $resultGrab;
                    }else{
                        $result = $this->grabAllData($scrappingUrl, $params);
                    }
                    
                    //print_r($result);exit;
                    if(!empty($result)){
                        
                        $insertDataArray = array();
                        $insertDataTitleArray = array();
                        
                        foreach($result as $resultData){
                            
                            if(isset($resultData['title'])){
                                $insertData['title'] = $resultData['title'];
                                $insertData['title'] = trim($insertData['title']);
                            }

                            if(isset($resultData['news_image'])){
                                $insertData['news_image'] = $resultData['news_image'];
                                $insertData['news_image'] = trim($insertData['news_image']);
                            }
                                                        
                            if(isset($resultData['link'])){
                                
                                if(!$this->isValidURL($resultData['link'])){
                                    $resultData['link'] = $this->unparse_url($this->url).$resultData['link'];
                                }
                                
                                $insertData['link'] = $resultData['link'];
                                //$insertData['link'] = $this->last_redirected_url($resultData['link']);
                            }
                            
                            if(isset($resultData['short_description'])){
                                
                                $domainLink = $this->last_redirected_url($resultData['link']);
                                $hostLink = $this->unparse_url($domainLink);
                                
                                $resultData['short_description'] = $this->make_absolute_html($resultData['short_description'], $hostLink);
                                $resultData['short_description'] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $resultData['short_description']);
                                $resultData['short_description'] = preg_replace('#<style(.*?)>(.*?)</style>#is', '', $resultData['short_description']);
                                
                                $insertData['content'] = strip_tags($resultData['short_description'], '<a><img><p><br>');
                            }
                            
                            if(isset($resultData['date'])){
                                if($stopGrab){
                                    $insertData['date'] = $resultData['date'];
                                }else{
                                    $insertData['date'] = strtotime($resultData['date']);
                                }
                                
                            }
                            
                            $insertData['scraping_url_id'] = $allUrl->id;
                            $insertData['status'] = 0;
                            
                            $conditions['title'] = trim($insertData['title']);
                            $existing_id = $mediaNews->getMediaNewsWithConditions($conditions);
                            
                            if($existing_id){
                                
                                $insertData['id'] = $existing_id;
                                
                                //Update data to Database
                                //$update = $mediaNews->updateSingleScraper($insertData);
                                
                            }else{
                                //Insert data to Database
                                //$insert = $mediaNews->insertScraper($insertData);
                                
                                $insertData['id'] = NULL;
                                $insertData['heading'] = '';
                                // $insertData['news_image'] = '';
                                $insertData['created_at'] = date("Y-m-d H:i:s", time());
                                $insertData['updated_at'] = date("Y-m-d H:i:s", time());
                                
                                $insertDataArray[] = $insertData;
                                $insertDataTitleArray[] = $insertData['title'];
                            }
                            
                            
                        }
                        
                        if(!empty($insertDataArray)){
                            //Insert data to Database
                            $insert = $mediaNews->insertAllScraper($insertDataArray);
                            
                            /*
                            $queries = DB::getQueryLog();
                            print_r($queries);
                            */
                            //print_r($insertDataArray);
                            if($insert){
                                //Send mail
                                //echo 'sendMail';
                                if($sendMail == true){
                                    $mailData = $mediaNews->getNewsFromTitles($insertDataTitleArray);
                                    $mailStatus = $this->sendMail($mailData, $type = 1);
                                    if($mailStatus){
                                        $mailStatusReturn = 1;
                                    }
                                }
                                //return array(1, $insertDataTitleArray);
                                
                            }else{
                                //Send Email to admin that the Cron is not inserting the data
                                //echo 'Data not inserted';
                                //return array(0, 'Data not inserted');
                            }

                        }else{
                            //No Data to insert
                            
                            //echo 'No New data to insert';
                            //return array(0, 'No New data to insert');
                        }
                        
                    }
                }
                
            }//Foreach $allUrls
            
            if(isset($mailStatusReturn) && $mailStatusReturn == 1){
                return 1;//At least one email sent
            }else{
                return 2;//No email sent
            }
            
        }
        
        //echo '<pre>';
        //print_r($result);
        
    }    


    public function grabAllDataInit($sendMail = null){
        
        /*
         * Scraper dsplays current node list empty when the parent($paramsTemp['parent']) is not set properly.
         * All the params like title, link, description should be inside a parent div
         */
        
        $Webscrappingurl = new Webscrappingurl();
        
        //$allUrls = $Webscrappingurl->fetchAllUrls();
        $allUrls = $Webscrappingurl->fetchAllActiveUrls();
        var_dump('start');
        
        if(!empty($allUrls)){
            
            $mediaNews = new Medianews();
            $insertData = array();
            $insertDataArray = array();
            
            foreach ($allUrls as $allUrl){
                
                $result = array();
                
                $params = array();
                $fullArticle = array();
                $resultGrab = array();
                $stopGrab = 0;
                
                if(preg_match("/thestar/", $allUrl->url, $match)){
                    //Fetching from thestar is fetchFromStar function
                    continue;        
                    
                }else if(preg_match("/nst\.com/", $allUrl->url, $match)){
                   continue;
                    
                }else if(preg_match("/theedgemarkets/", $allUrl->url, $match)){
continue;
                    $scrappingUrl = 'http://www.theedgemarkets.com/en/content/search-results?query=ock%20bhd';
                    $originalScrappingUrl = 'http://lumina.knorex.com/ws/1.1/search/simple?repository=lumina&fields=label,comment,knxsys:isCreatedAt,knx:hasImages,tagima:stock_code&offset=0&limit=50&query=ock%20bhd';
                    
                    $pageContent = $this->get_curl_data($originalScrappingUrl);
                    $json_decoded_content = json_decode($pageContent, true);
                    
                    foreach($json_decoded_content['results'] as $key => $value){
                        
                        $contentFields['title'] = $value['fields']['rdfs:label'][0];
                        $dateChunks = explode('-', strstr($value['fields']['knxsys:isCreatedAt'][0], 'T', true));
                        $contentFields['date'] = mktime(0, 0, 0, $dateChunks[1], $dateChunks[2], $dateChunks[0]);
                        $contentFields['short_description'] = $value['fields']['rdfs:comment'][0];
                        $contentFields['link'] = $value['fields']['uri'][0];
                        
                        $resultGrab[] = $contentFields;
                    }
                   
                    $insertData['footer'] = 'The Edge Markets';
                    $stopGrab = 1;
                    
                }else if(preg_match("/sinchew/", $allUrl->url, $match)){
                    $scrappingUrl = 'http://search.sinchew.com.my/search/google?cx=012605229465411000741%3Aq70ti1atknw&cof=FORID%3A11&sort=metatags-pubdate&query=ock+bhd&op=&form_id=google_cse_searchbox_form';
                    $originalScrappingUrl = 'https://www.googleapis.com/customsearch/v1element?key=AIzaSyCVAXiUzRYsML1Pv6RwSG1gunmMikTzQqY&rsz=filtered_cse&num=20&hl=zh_TW&prettyPrint=false&source=gcsc&gss=.com&sig=23952f7483f1bca4119a89c020d13def&cx=012605229465411000741:q70ti1atknw&q=ock%20bhd&sort=&googlehost=www.google.com&oq=ock%20bhd&gs_l=partner.12...0.0.2.4354.0.0.0.0.0.0.0.0..0.0.gsnos%2Cn%3D13...0.0..1ac..25.partner..0.0.0.&callback=google.search.Search.apiary4095&nocache=1417713214140';
                    
                    $fullArticle = array();
                    
                    $pageContent = $this->get_curl_data($originalScrappingUrl);
                    $pageContent = strstr($pageContent, '{');
                    $pageContent = trim($pageContent,');');
                    
                    $json_decoded_content = json_decode($pageContent, true);
                    
                    foreach($json_decoded_content['results'] as $key => $value){
                        
                        $contentFields['title'] = $value['titleNoFormatting'];
                        if(isset($value['richSnippet']['metatags']['pubdate'])){
                            preg_match('/(\d{4})(\d{2})(\d{2})/', $value['richSnippet']['metatags']['pubdate'], $matches);

                            $year = $matches[1];
                            $month = $matches[2];
                            $date = $matches[3];

                            $contentFields['date'] = mktime(0, 0, 0, $month, $date, $year);
                        }else{
                            $contentFields['date'] = time();
                        }
                        
                        if(strpos($value['contentNoFormatting'], 'Copyright') !== false){
                            $contentFields['short_description'] = strstr($value['contentNoFormatting'], 'Copyright', true);
                        }else{
                            $contentFields['short_description'] = $value['contentNoFormatting'];
                        }
                        
                        $contentFields['link'] = $value['unescapedUrl'];
                        
                        $resultGrab[] = $contentFields;
                        $fullArticle[] = $value['unescapedUrl'];
                    }
                    
                    $paramsTemp['title'] = '.content_left .title';
                    $paramsTemp['short_description'] = 'div.content_wrapper';
                    $paramsTemp['date'] = 'div.submitted';
                    $paramsTemp['parent'] = '.content_left';
                    $insertData['footer'] = 'Sinchew';
                    $stopGrab = 1;
                    
                }else{
                    $scrappingUrl = '';
                }
                
                if(!empty($scrappingUrl)){
                    
                    //if($scrappingUrl != 'http://www.thestar.com.my/search/?q=ock%20bhd&qsort=newest&qrec=100&qstockcode=') continue;
                    //if($scrappingUrl != 'http://www.nst.com.my/search?s=ock+bhd') continue;
                    //if($scrappingUrl != 'http://www.theedgemarkets.com/en/content/search-results?query=ock%20bhd') continue;
                    //if($scrappingUrl != 'http://search.sinchew.com.my/search/google?cx=012605229465411000741%3Aq70ti1atknw&cof=FORID%3A11&sort=metatags-pubdate&query=ock+bhd&op=&form_id=google_cse_searchbox_form') continue;
                    
                    if(!empty($fullArticle)){
                        //$result = $this->grabAllData($scrappingUrl, $params);
                        $result = array();
                        
                        //Getting list of already existed Links.
                        $getMediaNewsList = $mediaNews->getMediaNewsList('link', 'id', $allUrl->id);
                        
                        //Only Processs new links
                        if(!empty($getMediaNewsList)){
                            $getMediaNewsList = array_values($getMediaNewsList);
                            $fullArticle = array_diff($fullArticle, $getMediaNewsList);
                        }
                        
                        //if($insertData['footer'] == 'Sinchew') {print_r($fullArticle);exit;}
                        foreach($fullArticle as $key => $link){
                            
                            $resultTemp = $this->grabAllData($link, $paramsTemp);
                            
                            //if($insertData['footer'] == 'Sinchew') {print_r($resultTemp);exit;}
                            // if($scrappingUrl == 'http://www.nst.com.my/search?s=ock+bhd'){
                            //     $resultTemp[0]['date'] = trim(strstr($resultTemp[0]['date'], '@', true));
                            //     $resultTemp[0]['date'] = strtotime($resultTemp[0]['date']);
                                
                            // }else 
                            if($insertData['footer'] == 'Sinchew'){
                                
                                if(!isset($resultTemp[0])) continue;
                                $resultTemp[0]['date'] = trim($resultTemp[0]['date']);
                                preg_match('/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2})/', $resultTemp[0]['date'], $matches);

                                $year = $matches[1];
                                $month = $matches[2];
                                $date = $matches[3];
                                $hour = $matches[4];
                                $minute = $matches[5];
                                $second = 0;
                                
                                $resultTemp[0]['link'] = $link;
                                $resultTemp[0]['date'] = mktime($hour, $minute, $second, $month, $date, $year);
                                
                                if(trim($resultTemp[0]['title']) == ''){
                                    foreach($resultGrab as $value){
                                        
                                        if($value['link'] == $link){
                                            $resultTemp[0]['title'] = $value['title'];
                                        }
                                    }
                                }
                                
                            }else if($insertData['footer'] == 'The Star Online'){
                                
                                foreach($resultGrab as $value){
                                    if($value['link'] == $link){
                                        $resultTemp[0]['title'] = $value['title'];
                                        $resultTemp[0]['date'] = $value['date'];
                                        $resultTemp[0]['link'] = $value['link'];
                                    }
                                }
                                
                                $resultTemp[0]['date'] = strtotime($resultTemp[0]['date']);
                            }
                            
                            $result[] = $resultTemp[0];
                        }
                        
                        $stopGrab = true;
                        
                    }else if($stopGrab){
                        $result = $resultGrab;
                    }else{
                        $result = $this->grabAllData($scrappingUrl, $params);
                    }
                    
                    if(!empty($result)){
                        
                        $insertDataArray = array();
                        $insertDataTitleArray = array();
                        
                        foreach($result as $resultData){
                            
                            if(isset($resultData['title'])){
                                $insertData['title'] = $resultData['title'];
                                $insertData['title'] = trim($insertData['title']);
                            }
                            
                            if(isset($resultData['link'])){
                                
                                if(!$this->isValidURL($resultData['link'])){
                                    $resultData['link'] = $this->unparse_url($this->url).$resultData['link'];
                                }
                                
                                $insertData['link'] = $resultData['link'];
                                //$insertData['link'] = $this->last_redirected_url($resultData['link']);
                            }
                            
                            if(isset($resultData['short_description'])){
                                
                                $domainLink = $this->last_redirected_url($resultData['link']);
                                $hostLink = $this->unparse_url($domainLink);
                                
                                $resultData['short_description'] = $this->make_absolute_html($resultData['short_description'], $hostLink);
                                $resultData['short_description'] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $resultData['short_description']);
                                $resultData['short_description'] = preg_replace('#<style(.*?)>(.*?)</style>#is', '', $resultData['short_description']);
                                
                                $insertData['content'] = strip_tags($resultData['short_description'], '<a><img><p><br>');
                            }
                            
                            if(isset($resultData['date'])){
                                if($stopGrab){
                                    $insertData['date'] = $resultData['date'];
                                }else{
                                    $insertData['date'] = strtotime($resultData['date']);
                                }
                                
                            }
                            
                            $insertData['scraping_url_id'] = $allUrl->id;
                            $insertData['status'] = 0;
                            
                            $conditions['title'] = trim($insertData['title']);

                            $existing_id = $mediaNews->getMediaNewsWithConditions($conditions);
                            



                            if($existing_id){
                                
                                $insertData['id'] = $existing_id;
                                
                                //Update data to Database
                                //$update = $mediaNews->updateSingleScraper($insertData);
                                
                            }else{
                                //Insert data to Database
                                //$insert = $mediaNews->insertScraper($insertData);
                                
                                $insertData['id'] = NULL;
                                $insertData['heading'] = '';
                                $insertData['news_image'] = '';
                                $insertData['created_at'] = date("Y-m-d H:i:s", time());
                                $insertData['updated_at'] = date("Y-m-d H:i:s", time());
                                
                                $insertDataArray[] = $insertData;
                                $insertDataTitleArray[] = $insertData['title'];
                            }
                            
                            
                        }
                        
                        if(!empty($insertDataArray)){
                            //Insert data to Database

                            $insert = $mediaNews->insertAllScraper($insertDataArray);
                            
                            /*
                            $queries = DB::getQueryLog();
                            print_r($queries);
                            */
                            //print_r($insertDataArray);
                            if($insert){
                                //Send mail
                                //echo 'sendMail';
                                if($sendMail == true){
                                    $mailData = $mediaNews->getNewsFromTitles($insertDataTitleArray);
                                    $mailStatus = $this->sendMail($mailData, $type = 1);
                                    if($mailStatus){
                                        $mailStatusReturn = 1;
                                    }
                                }
                                //return array(1, $insertDataTitleArray);
                                
                            }else{
                                //Send Email to admin that the Cron is not inserting the data
                                //echo 'Data not inserted';
                                //return array(0, 'Data not inserted');
                            }

                        }else{
                            //No Data to insert
                            
                            //echo 'No New data to insert';
                            //return array(0, 'No New data to insert');
                        }
                        
                    }
                }
                
            }//Foreach $allUrls
            
            if(isset($mailStatusReturn) && $mailStatusReturn == 1){
                return 1;//At least one email sent
            }else{
                return 2;//No email sent
            }
            
        }
        
        //echo '<pre>';
        //print_r($result);
        
    }
    
    
    public function unparse_url($url=null) {
        //$url = 'http://foobla.com/joomla/obrss';
        $parsed_url = parse_url($url);
        
        $scheme   = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '';
        $host     = isset($parsed_url['host']) ? $parsed_url['host'] : '';
        $port     = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '';
        $user     = isset($parsed_url['user']) ? $parsed_url['user'] : '';
        $pass     = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : '';
        $pass     = ($user || $pass) ? "$pass@" : '';
        $path     = isset($parsed_url['path']) ? $parsed_url['path'] : '';
        $query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
        $fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : '';
        //return "$scheme$user$pass$host$port$path$query$fragment";
        return "$scheme$user$pass$host$port";
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
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // The maximum number of seconds to allow cURL functions to execute.
        curl_setopt($ch, CURLOPT_MAXREDIRS, 1); // The maximum number of redirects
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // for https - To blindly accept any server certificate, without doing any verification as to which CA signed it, and whether or not that CA is trusted.

        $result = trim(curl_exec($ch));

        curl_close($ch);
       
        return $result;
    }
    
    public function last_redirected_url($url = null){
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $a = curl_exec($ch); // $a will contain all headers

        $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // This is what you need, it will return you the last effective URL

        // Uncomment to see all headers
        /*
        echo "<pre>";
        print_r($a);echo"<br>";
        echo "</pre>";
        */

        return $url; // Voila
    }
    
    
    public function isValidURL($url) {
        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
    }
    
    public function removeUnwantedHtmlTags($html, $tagsToRemove = null) {
        $doc = new DOMDocument();

        // load the HTML string we want to strip
        $doc->loadHTML($html);
        
        if(is_array($tagsToRemove)){
            foreach($tagsToRemove as $key => $value){
                $striped_tags = $doc->getElementsByTagName($value);
                $length = $striped_tags->length;
                for ($i = 0; $i < $length; $i++) {
                    $striped_tags->item($i)->parentNode->removeChild($striped_tags->item($i));
                }
            }
        }else if(is_string($tagsToRemove)){
            $striped_tags = $doc->getElementsByTagName($tagsToRemove);
            $length = $striped_tags->length;
            for ($i = 0; $i < $length; $i++) {
                $striped_tags->item($i)->parentNode->removeChild($striped_tags->item($i));
            }
        }
        // get all the script tags
        $script_tags = $doc->getElementsByTagName('script');

        $length = $script_tags->length;

        // for each tag, remove it from the DOM
        for ($i = 0; $i < $length; $i++) {
          $script_tags->item($i)->parentNode->removeChild($script_tags->item($i));
        }

        // get the HTML string back
        $no_script_html_string = $doc->saveHTML();
        
        return $no_script_html_string;
    }
    
    
    public function make_absolute_html($html, $domain){
        
        //$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
        $regexp = "<a\s+[^>]*href=[\'|\"]([^>]*)[\'|\"]\s*[^>]*.*?>(.*?)<\/a>";
        if(preg_match_all("/$regexp/siU", $html, $matches, PREG_SET_ORDER)){
            
            foreach($matches as $match){
                //$match[2] = link text
                $link = $match[1];
                $finalLink = $this->make_absolute_link($link, $domain);
                $html = str_replace($link, $finalLink, $html);
            }
            
        }
        
        $regexp = "<img\s+[^>]*src=[\'|\"]([^>]*)[\'|\"]\s*[^>]*(.*?)>";
        if(preg_match_all("/$regexp/i", $html, $matches, PREG_SET_ORDER)){
            
            foreach($matches as $match){
                //$match[2] = link address
                $link = $match[1];
                $finalLink = $this->make_absolute_link($link, $domain);
                $html = str_replace($link, $finalLink, $html);
            }
            
        }
        
        return $html;
        
    }
    
    public function make_absolute_link($link, $domain){
        
        if(strpos($link, 'http')!==0) {
            if(strpos($link, '/')!==0) {
                return $domain.'/'.$link;
            } else {
                return $domain.$link;
            }
        }
        return $link;
    }
    
    public function grabAllDataAdmin2() {
        $return = $this->fetchFromStar();
        return Redirect::to('admin/media_news_list');
    }    

    public function grabAllDataAdmin($sendMail = null) {
        $return = $this->grabAllDataInit($sendMail);
	DB::connection()->reconnect();
        $return = $this->fetchFromStar($sendMail);
	DB::connection()->reconnect();
        try{
            $return = $this->fetchFromNST($sendMail);
        }catch(Exception $e){
        }
        
        //return Redirect::to('admin/media_news_list');
    }
    
    
    
    function getNewsFromTitles($params = null) {
        
        $mediaNews = new Medianews();
        
        if($params == null){
            $params = array(
                "OCK to build more telco towers",
                "2012 may see IPO backlog",
            );
        }
        
        $return = $mediaNews->getNewsFromTitles($params);
        /*
        $queries = DB::getQueryLog();
        $last_query = end($queries);
        print_r($queries);
        */
        //print_r($return);
        return $return;
    }
    
    
    public function sendMail($param = null, $type = '1') {
        
        /*
         * Get newly scraped news.
         * Send email if any news scrapped
         */
        
        /*
         * $type wil be used in future to use different layouts for email
         */
        
        if($type == '1'){
            
            $mediaIds = array();
            
            foreach($param as $value){
                $mediaIds[] = $value->id;
                $source = $value->footer;
            }
            $mediaIdsImploded = implode(',', $mediaIds);
            
            $paramsToPass['emailParams'] = $param;
            $paramsToPass['mediaIds'] = $mediaIdsImploded;
            $paramsToPass['maildate'] = date('d M, Y', time());
            $paramsToPass['source'] = $source;
            
            $subject = "Media News: $source (Pending for Approval)";
            
        $emails = array("support@webqom.com"); 
        $bcc = array("hock@webqom.com","caroline@webqom.com"); 
            Mail::send('emails.news', $paramsToPass, function($message) use ($emails,$bcc,$subject){
                $message->from('admin@webqom.com', 'OCK Media News');
                $message->to($emails);
                $message->bcc($bcc);
                $message->subject($subject);
            });
            
            if( count(Mail::failures()) > 0) {
                /*
                echo "There was one or more failures. They were: <br />";

                foreach (Mail::failures as $email_address) {
                    echo " - $email_address <br />";
                }*/
                return 0;
            } else {
                //echo "No errors, all sent successfully!";
                return 1;
            }

            //var_dump($mailStatus);
            //return $mailStatus;
        }
        
    }
    
    
    public function sendTestMail($param = null, $type = '1') {
        $bcc = array("support@webqom.com");   
    $emails = array("hock@webqom.com"); 
        Mail::send('emails.testing', array('key'=>'value'), function($message)use ($emails,$bcc){
            $message->from('admin@webqom.com', 'OCK Media News');
            $message->to($emails);
                $message->bcc($bcc);
            $message->subject('Test Subject');
        });
       if( count(Mail::failures()) > 0) {
                
                return 0;
            } else {
                //echo "No errors, all sent successfully!";
                return 1;
        } 
    }
    
    public function testData(){
        $scrappingUrl = 'http://www.nst.com.my/search?s=ock+bhd';
        
        $this->url = $scrappingUrl;
                    
        $params['title'] = '.field-content a';
        $params['parent'] = '#content .view-search-articles .views-row';
        
        $result = $this->grabAllData($scrappingUrl, $params);
        
        if(!empty($result)){
            foreach($result as $key => $val){
                if(!$this->isValidURL($val['link'])){
                    $result[$key]['link'] = $this->unparse_url($this->url).$val['link'];
                }
                
            }
        }
        print_r($result);exit;
    }
    
    public function getIndex2()
    {
        $this->url = 'http://www.nst.com.my/search?s=ock+bhd';
        $this->setScrapeUrl2( $this->url );
        
        $this->filters = [
            'title'             => '.field-content a'
        ];
        
        //echo '<pre>';
        print_r($this->getContents2());exit;
        
        //return View::make('scraper')->with('contents', $this->getContents2());
    }
 
    /**
     * Setup our scraper data. Which includes the url that
     * we want to scrape
     *
     * @param (String) $url = default is NULL
     *        (String) $method = Method Types its either POST || GET
     * @return void
     */
    public function setScrapeUrl2($url = NULL, $method = 'GET')
    {
        $this->crawler = $this->client->request($method, $url);
        return $this->crawler;
    }
 
    /**
     * This will get all the return Result from our Web Scraper
     *
     * @return array
     */
    public function getContents2()
    {
        return $this->content = $this->startScraper2();
    }
 
    /**
     * It will handle all the scraping logic, filtering
     * and getting the data from the defined url in our method setScrapeUrl()
     *
     * @return array
     */
    private function startScraper2()
    {
        // lets check if our filter has result.
        // im using CssSelector Dom Components like jquery for selecting data attributes.
        $countContent = $this->crawler->filter('.field-content a')->count();
        
        if ($countContent) {
            // loop through in each ".posts--list-large li" to get the data that we need.
            $this->content = $this->crawler->filter('#content .view-search-articles div.views-row')->each(function(Crawler $node, $i) {
                return [
                        'title'             => $node->filter($this->filters['title'])->text(),
                        'url'               => $this->url.$node->filter($this->filters['title'])->attr('href')
                ];
            });
        }
        return $this->content;
    }
    
    
    function getDataContent() {
        
        
        $originalScrappingUrl = 'https://www.googleapis.com/customsearch/v1element?key=AIzaSyCVAXiUzRYsML1Pv6RwSG1gunmMikTzQqY&rsz=filtered_cse&num=10&hl=zh_TW&prettyPrint=false&source=gcsc&gss=.com&sig=23952f7483f1bca4119a89c020d13def&cx=012605229465411000741:q70ti1atknw&q=ock%20bhd&sort=&googlehost=www.google.com&oq=ock%20bhd&gs_l=partner.12...0.0.2.4354.0.0.0.0.0.0.0.0..0.0.gsnos%2Cn%3D13...0.0..1ac..25.partner..0.0.0.&callback=google.search.Search.apiary4095&nocache=1417713214140';
        $pageContent = $this->get_curl_data($originalScrappingUrl);
        print_r($pageContent);
    }
    
    function dateTest(){
        echo date_default_timezone_get();
    }
 

}


